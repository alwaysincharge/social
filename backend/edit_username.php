<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



if(request_is_post()) {
   
if (isset($_POST['newusername']))  {
    
    
    
    
       if (ctype_alnum($_POST['username'])) {
        
        
         } else {

                
             
                  exit();
       
         }
    
    
    
    if (strlen(trim($_POST['username'])) > 16)  {
        
        echo 1;
        
        exit();
        
    }
    
    
    
    
  if (strlen(trim($_POST['username'])) < 6)  {
        
        echo 1;
        
        exit();
        
    }
    
    
    
      $newusername = $user->does_user_exist($_POST['username']); 
    
      $newusername_result = $newusername->get_result();
    
    
      if($newusername_result->num_rows == 1) {
    
        echo 2;
          
        exit();
          
      }
    
    
    
    $user->edit_username($_POST['username'], $_SESSION['admin_id']);
    
      echo 3;
          
      exit();
    
    
    
}
    
}