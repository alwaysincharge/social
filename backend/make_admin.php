<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



if(request_is_post()) {
   
if (isset($_POST['admin']))  {
    
    
    
    
         $is_admin = $member->get_admin($_SESSION['admin_id'], $_POST['group']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
              
                 
                 if ($admin_or_super_row['admin'] == "member")  {
                    
                     
                     exit();   
                     
                 }
                 
                 
                 
                  if ($admin_or_super_row['admin'] == "admin")  {
                    
                     
                     exit();   
                     
                 }
                   
             }
    
          }
    
    
    
    
    
    
    
          $already_admin = $member->get_admin($_POST['person'], $_POST['group']); 
          
          $already_admin_result = $already_admin->get_result();
          
          if ($already_admin_result->num_rows == 1) {
              
              
              
             while($admin_row = $already_admin_result->fetch_assoc()) {
              
                 
                 if ($admin_row['admin'] == "member")  {
                    
                     
                     $member->make_admin($_POST['person'], $_POST['group'], "admin"); 
                     
                     echo 100;
                     
                     exit();
                     
                     
                 } elseif ($admin_row['admin'] == "admin")  {
                     
                     
                     $member->make_admin($_POST['person'], $_POST['group'], "member"); 
                     
                     echo 200;
                     
                     exit();
                     
                 } else {
                     
                     
                     
                 }
                 
                 
              
             }
              
              
              
           //  exit();
        
          }
    
    
    
    
    
}
    
    
}
    
    