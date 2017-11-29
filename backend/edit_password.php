<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php




if(request_is_post()) {
   
if (isset($_POST['password']))  {
    
    

    
    
    
  
         if (ctype_alnum($_POST['pass1'])) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
    
    
    
    
    
    
        if (ctype_alnum($_POST['pass2'])) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
   
    

    
    
    
    
    
        if ( 
        
        (strlen(trim($_POST['pass1'])) > 16) || 
        
        (strlen(trim($_POST['pass1'])) < 6) ||
        
        (strlen(trim($_POST['pass2'])) > 16) ||
        
        (strlen(trim($_POST['pass2'])) < 6) )
        
        {
        
              echo 5;
            
              exit();
        
        }
    
    
    
    
    
    
     
 $founduser = $user->does_user_exist_by_id($_SESSION['admin_id']); 
    
 $founduser_result = $founduser->get_result();
    
    
    
 if($founduser_result->num_rows == 1) {
     
     
    
         while($row = $founduser_result->fetch_assoc()) {
             
    
               if (password_verify($_POST['pass1'], $row['password'])) { 
                   
                   
              $user->edit_password(password_hash(test_input($_POST['pass2']), PASSWORD_DEFAULT));
                   
              
                    //  echo password_hash(test_input($_POST['pass2']), PASSWORD_DEFAULT);
                   
                      echo 100;
                   
                      exit();
            
             

               }
     
               else {
         
                      echo 2;
     
                      exit();
     
                 
               }
     
         }
    
    
     
}
    

}
    
} else  {
    
    
      
}    




?>