<?php 

	if(!empty($_GET['location'])){
		$apikey = {API KEY};
		$url = 'http://api.openweathermap.org/data/2.5/forecast?zip='.urlencode($_GET['location']).',us&APPID='.$apikey;

		//makes the request
		$weather_json = file_get_contents($url); 

		// returns json data

		//parse the json into an object
		$weather = json_decode($weather_json);

		//saving temp which is inside main, which is inside of an array
		$kTemp = $weather->list[0]->main->temp;
		$name = $weather->city->name;
		//converting kelvin temp to F
		$temp = round($kTemp*(9/5)-459.67, 1);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>API Demo</title>
</head>
<body>
	<form action="">
		<input type="text" name="location" placeholder="Enter Zip Code">
		<button type="submit">Submit</button>
	</form>
		<p>
			<?php print "The temp is ".$temp." in ".$name;?>
		</p>
</body>
</html>
