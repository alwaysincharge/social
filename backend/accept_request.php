<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


if(request_is_post()) {
   
if (isset($_POST['group_id']))  {
    
    
          $already_request = $request->request_already_sent($_SESSION['admin_id'], $_POST['group_id']); 
          
          $already_request_result = $already_request->get_result();
          
        
          
          if ($already_request_result->num_rows == 1) {
                
              
              
              $already_member = $member->this_user_this_group($_SESSION['admin_id'], $_POST['group_id']); 
          
              $already_member_result = $already_member->get_result();
          
              if ($already_member_result->num_rows == 1) {
              
                   echo 3; exit();
        
              }
              
              
              
              $member->create_member($_POST['group_id'], $_SESSION['admin_id'], "member");
              
              
              $request->delete_request($_SESSION['admin_id'], $_POST['group_id']);
              
              
              redirect_to($_SESSION['url_placeholder'] . 'nogroups');
              
          } 
    
    
    

    
    
    
    
    
    
    
}
        
} else {
    
    echo "fuck off";
    
}








?>