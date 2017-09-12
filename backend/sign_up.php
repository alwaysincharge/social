<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php




 



$user_input = '';

$password_input = '';

$email_input = '';




if(request_is_post()) {

    
if (isset($_POST['register']))  {
    
    

    $user_input = $_POST['username'];
    
    $password_input = password_hash(test_input($_POST['password1']), PASSWORD_DEFAULT);
    
    $email_input = $_POST['email']; 
    
    
  
    
    
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
        
               } else {
           
                    echo 6;
                   
                    exit();
        
               }
        
        }
        
        
        

  

    
    

        
  $newuser = $user->does_user_exist($user_input); 
    
    
    
  $newuser_result = $newuser->get_result();
    
    
    
 if($newuser_result->num_rows == 0) {
       
     
      $user->create_user($user_input, $password_input, $email_input);
     
     
      $id = mysqli_insert_id($database->connection);
     
     
      $_SESSION['admin_id'] = $id;
     
     
      $register_array = array("status"=> 1, "id"=> $id, "urlplaceholder"=> $_SESSION['url_placeholder']); 
    
         
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