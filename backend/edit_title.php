<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


if(request_is_post()) {
   
if (isset($_POST['newtitle'])) {
    
    
    
    
    
      $is_admin = $member->get_admin($_SESSION['admin_id'], $_POST['group_id']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
              
                 
                 if ($admin_or_super_row['admin'] == "admin")  {
                    
                     
                     exit();   
                     
                 }   elseif ($admin_or_super_row['admin'] == "member")  {
                    
                     
                     exit();   
                     
                 }
                 
             
             }
    
          }
    
    
    
    
    
    if (strlen(trim($_POST['data'])) == 0 ) {
        
        exit();
        
    }
    
    
    
    
    
    
    
     if (strlen($_POST['data']) > 140 ) {
        
        exit();
        
    }
    
    
    
    
    if ($_POST['newtitle'] == 1) {
        
        
        $group->edit_title($_POST['data'], $_POST['group_id']);
        
        echo 100;
        
    }
    
    
    
    
    
    
    if ($_POST['newtitle'] == 2) {
        
        
        $group->edit_desc($_POST['data'], $_POST['group_id']);
        
        echo 100;
        
    }
    
    
    
}
    
    
    
}