<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



if(request_is_post()) {
   
if (isset($_POST['admin']))  {
    
    
    
    
         $is_admin = $member->get_admin($_SESSION['admin_id'], $_POST['group']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
              
                 
                 if ($admin_or_super_row['admin'] == "superadmin")  {
                    
                     
                     exit();   
                     
                 } else {
                     
                     
                      $member->remove_member($_SESSION['admin_id'], $_POST['group']); 
          
                             echo 100;
    
                             exit();
                     
                     
                     
                 }
                 
                 
                 
                 
                 
                   
             }
    
          }
    
    
    
    
    
   
    
    
    
    
    
    
    

    
    
    
    
}
    
    
}
    
    