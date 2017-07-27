<?php
$error = "";
$emailStatus = "";
$msg = "";

    if($_POST){
        
        //checking to see if each form field has a value - true or false is returned
        if(!$_POST["email"]){
            $error .= "An email address is required.<br>";
        }
        if(!$_POST["subject"]){
            $error .= "A subject is required.<br>";
        }
        if(!$_POST["msg-body"]){
            $error .= "A message is required.<br>";
        }
        if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false ){
            $error .= "The email address is invalid.<br>";
        }
        //if error string is not empty a error message is constructed
        if($error != ""){
            $msg = '<div class="alert alert-danger" role="alert"><p><strong>There were some error(s) in your form:</strong></p>'.$error.'</div>';
        }
        //fills email vars
        else{  
            $emailTo = "blackvq35@gmail.com";
            $subject = $_POST["subject"];
            $msgBody = $_POST["msg-body"];
            $headers = "From: ". $_POST["email"];
            
            //constructing and sending mail
            if(mail($emailTo, $subject, $msgBody, $headers)){ 
                $emailStatus = '<div class="alert alert-success" role="alert"><p>You message was sent successfully!</p></div>';
            }
            else{
                $emailStatus = '<div class="alert alert-danger" role="alert"><p>There was a problem, your message was not sent.</p></div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Contact Us</h1>
            <div id = "error">
                <?php echo $msg.$emailStatus ?>
            </div>
            <form method = "POST">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
              </div>
       
              <div class="form-group">
                <label for="msg-body">What would you like to ask us?</label>
                <textarea class="form-control" id="msg-body" rows="3" name="msg-body"></textarea>
              </div>

              <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script type = "text/javascript">
            //upon submitting the form this function will run checks first
            $("form").submit(function (e){
                
                var error = "";
                
                if($("#email").val() == ""){
                    error += "Please enter an email address.<br>";
                }
                
                if($("#subject").val() == ""){
                    error += "Please enter a subject.<br>";
                }
                
                if($("#msg-body").val() == ""){
                    error += "Message cannot be blank.";
                }
                
                if(error != ""){
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were some error(s) in your form:</strong></p>' + error + '</div>');
                    return false;
                }
                else{
                    //if no error
                   return true;
                }
            });
        </script>
    </body>
</html>

