<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


$user_details = $user->find_one_user($_SESSION['admin_id']);

$user_details_result = $user_details->get_result();

$user_info = $user_details_result->fetch_assoc();





if(request_is_post()) {
   
if (isset($_POST['newemail']))  {
    
    
    
    
       if (strlen(trim($_POST['email'])) == 0 ) {
           
           
           echo 1;
        
           exit();
    
        
        }  else {
        
        
               if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                   
                   $valid_email = true;
        
               } else {
           
                    echo 1;
                   
                    exit();
        
               }
        
        }
    
    
    
    
    
    
    
    
    if (strlen(trim($_POST['email'])) > 400)  {
        
        echo 1;
        
        exit();
        
    }
    
    
    
    
  if (strlen(trim($_POST['email'])) < 6)  {
        
        echo 1;
        
        exit();
        
    }
    
    
    

    
    
    
    
     $newemail = $user->does_email_exist(trim($_POST['email'])); 
    
    
    
     $newemail_result = $newemail->get_result();
    
    
    
     if($newemail_result->num_rows == 1) {
     
     echo 404; exit();
     
    }
    
    
    
        function randomString($length = 6) {
                 
	            $str = "";
                 
	            $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                 
	            $max = count($characters) - 1;
                 
	            for ($i = 0; $i < $length; $i++) {
                    
		        $rand = mt_rand(0, $max);
                    
		        $str .= $characters[$rand];
                    
	            }
                 
	            return $str;
                 
             }




       //      $_SESSION['random_string'] = randomString(13);
     
     
     
     $stamp = time() . randomString(34);
    
    
    
    
    
    $user->edit_email($_POST['email'], $_SESSION['admin_id'], $stamp);
    
    
    
    
    
    
    
    $from = new SendGrid\Email("Friday Camp", "noreply@fridaycamp.com");
$subject = "Verify your new Friday Camp email.";
$to = new SendGrid\Email("New Email", $_POST['email']);
$content = new SendGrid\Content("text/html", "

Hello '". $user_info['username'] ."', how are you doing? <br><br>

You recently updated your email address on Friday Camp. <br><br>

If this is really your email address, click the following link to verify it. <br><br>

https://fridaycamp.com/verify/". $stamp ." <br><br>

In case of any questions... <br><br>

Call us on 020 667 1696. <br><br>

Founder,<br>
Atsu Davoh.


");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);


    
    
    
    
      echo 3;
          
      exit();
    
    
    
}
    
} ?>