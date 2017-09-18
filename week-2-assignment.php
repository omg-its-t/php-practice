<?php

$name = "Theo";
$starting_weight = 200;
$target_weight = 180;
$numWeeks = 8;
$perWeekLoss = 0;
$weeks = [];

$perWeekLoss = ($starting_weight - $target_weight)/$numWeeks;

//checks to see if suggest week loss is over 2.5
//resets to 2lbs a week and sets a new number of weeks
if($perWeekLoss >= 2.5){
	$perWeekLoss = 2;
	$numWeeks = ($starting_weight - $target_weight)/2;
}

//fill the array with target week weights
for($i = 0; $i <= $numWeeks; $i++){
	array_push($weeks, $starting_weight-($i*$perWeekLoss));
}

?>
<!DOCTYPE html>
<html>
	<body>
	<head>
		<title><?php print $name."'s Custom Weight Loss Plan";?></title>
	</head>
		<h1>Weight Loss Plan for <?php print $name ?></h1>

		<p>Starting Weight: <?php print $starting_weight ?></p>
		<p>Target Weight: <?php print $target_weight ?></p>

		<?php
		
			//use foreach loop to display array here
			foreach ($weeks as $week => $pounds) {
				if($week == 0)
					continue;
				print "Week " .$week." Target: ".$pounds." pounds <br/>";
				}	
		?>
		<br>

	</body>
</html>