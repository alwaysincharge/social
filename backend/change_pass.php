<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php




if(request_is_post()) {
   
if (isset($_POST['password']))  {
    
    

    

    
    
    
    
        if (ctype_alnum($_POST['pass2'])) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
   
    

    
    
    
    
    
        if ( 
        
       
        
        (strlen(trim($_POST['pass2'])) > 16) ||
        
        (strlen(trim($_POST['pass2'])) < 6) )
        
        {
        
              echo 5;
            
              exit();
        
        }
    
    
    
    
    
    
    
     $newuser = $user->does_random_exist_2(trim($_POST['random'])); 
    
    
    
      $newuser_result = $newuser->get_result();
    
    
    
      if($newuser_result->num_rows == 1) {
    
      $row = $newuser_result->fetch_assoc();
          
      $_SESSION['admin_id'] = $row['id'];
          
      $user->edit_random_2($row['email'], "");
          
      $user->edit_password(password_hash(test_input($_POST['pass2']), PASSWORD_DEFAULT));
          
          echo 100; exit();
      }
    
      else  {
        
        echo 2; exit();
        
    }
    
    
    
}
    
    
}



?>