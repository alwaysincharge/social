<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


if(request_is_post()) {
   
if (isset($_POST['deleterequest']))  {
    
    
          $already_request = $request->request_already_sent($_SESSION['admin_id'], $_POST['group_id']); 
          
          $already_request_result = $already_request->get_result();
          
        
          
          if ($already_request_result->num_rows == 1) {
              
              
              $request->delete_request($_SESSION['admin_id'], $_POST['group_id']);
              
              
              echo 1; exit();
              
          } 
    
    
    

    
    
    
    
    
    
    
}
        
} else {
    
    echo "fuck off";
    
}








?>