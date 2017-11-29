<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php




 



$user_input = '';

$password_input = '';

$email_input = '';




if(request_is_post()) {

    
if (isset($_POST['register']))  {
    
    

    $user_input = $_POST['username'];
    
    $password_input = password_hash(test_input($_POST['password1']), PASSWORD_DEFAULT);
    
    $email_input = trim($_POST['email']); 
    
    
  
    
    
         if (ctype_alnum($user_input)) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
    
    
    
    
    
    
        if (ctype_alnum($_POST['password1'])) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
    
    
    
    
    
    
    
         if ($_POST['password1'] != $_POST['password2']) {
        
        
                 echo 7;
             
                 exit();
        
         }
    
    
    
    
    
    if ( 
        
        (strlen(trim($_POST['username'])) > 16) || 
        
        (strlen(trim($_POST['username'])) < 6) ||
        
        (strlen(trim($_POST['password1'])) > 16) ||
        
        (strlen(trim($_POST['password1'])) < 6) ||
        
        (strlen(trim($_POST['email'])) > 400) )
        
        {
        
              echo 5;
            
              exit();
        
        }
    
    
        
        
        
        if (strlen(trim($_POST['email'])) == 0 ) {
    
        
        }  else {
        
        
               if (!filter_var($email_input, FILTER_VALIDATE_EMAIL) === false) {
                   
                   $valid_email = true;
        
               } else {
           
                    echo 6;
                   
                    exit();
        
               }
        
        }
        
        
       
    
    
   $newemail = $user->does_email_exist(trim($_POST['email'])); 
    
    
    
    $newemail_result = $newemail->get_result();
    
    
    
    if($newemail_result->num_rows == 1) {
     
     echo 404; exit();
     
    }
    
    
    
    
    
    
    
    
    
    
    
    

  

    
    

        
  $newuser = $user->does_user_exist($user_input); 
    
    
    
  $newuser_result = $newuser->get_result();
    
    
    
 if($newuser_result->num_rows == 0) {
     
     
     
     
     
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
     
     
     if ($valid_email) {
         
         
         $user->create_user($user_input, $password_input, $email_input, $stamp, "sent");
         
         
         
$from = new SendGrid\Email("Friday Camp", "noreply@fridaycamp.com");
$subject = "Verify your Friday Camp account.";
$to = new SendGrid\Email("New User", $email_input);
$content = new SendGrid\Content("text/html", "

Hello '". $_POST['username'] ."', how are you doing? <br><br>

We noticed that you recently signed up to Friday Camp. We really appreciate your interest in a local business like ours. <br><br>

If this is really your email address, click the following link to verify it. <br><br>

https://fridaycamp.com/verify/". $stamp ." <br><br>

On Friday Camp, you can create groups within which you can chat, share files, make polls, and add to to-do lists. Our main aim is to provide simple but capable tools that groups can use to organize themselves. <br><br>

We are excited to see what you do with Friday Camp. <br><br>

Call us on 020 667 1696. <br><br>

Founder,<br>
Atsu Davoh.


");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);



         
     } else {
         
         
         $user->create_user($user_input, $password_input, $email_input, "", "");
         
     }
     
     
       
     
      
     
     
      $id = mysqli_insert_id($database->connection);
     
     
      $_SESSION['admin_id'] = $id;
     
     
      $register_array = array("status"=> 1, "id"=> $id, "urlplaceholder"=> $_SESSION['url_placeholder']); 
     
     
     
     
     
      $countuser = $user->count_users($user_input); 
    
    
    
  $countuser_result = $countuser->get_result();
     
  $c_row = $countuser_result->fetch_assoc();  
     
      
$from = new SendGrid\Email("User Count", "noreply@fridaycamp.com");
$subject = "We have a new user.";
$to = new SendGrid\Email("Atsu", "atsunewjoint@gmail.com");
$content = new SendGrid\Content("text/plain", "Account with username '". $_POST['username'] . "' has just been registered. The current user count stands at ". $c_row['count'] . ". ");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
     
     
     
     
     $from = new SendGrid\Email("User Count", "noreply@fridaycamp.com");
$subject = "We have a new user.";
$to = new SendGrid\Email("Sammy", "boahensam@gmail.com");
$content = new SendGrid\Content("text/plain", "Account with username '". $_POST['username'] . "' has just been registered. The current user count stands at ". $c_row['count'] . ". ");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
   
     
     
     
       $from = new SendGrid\Email("User Count", "noreply@fridaycamp.com");
$subject = "We have a new user.";
$to = new SendGrid\Email("Lixter", "kinglixter@gmail.com");
$content = new SendGrid\Content("text/plain", "Account with username '". $_POST['username'] . "' has just been registered. The current user count stands at ". $c_row['count'] . ". ");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
     
     
// echo $response->statusCode();
// print_r($response->headers());
// echo $response->body();




    
         
       echo json_encode(array_values($register_array));
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
       exit();  
         
 
     
     


}  else {
    
     
       echo 2;
     
       exit();
     
 } 
    
    
      
    

}}
    
 else  {
    
       echo 3;
       exit();
}    


?>