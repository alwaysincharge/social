<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



if(request_is_post()) {
   
if (isset($_POST['vote']))  {
    
    
    
      $votealready = $poll->find_vote($_POST['post_id'], $_POST['group_id'], $_POST['choice'], $_SESSION['admin_id']); 
    
      $votealready_result = $votealready->get_result();
    
    
    
    
      if($votealready_result->num_rows == 0) {
    
         
          
           $poll->new_vote($_POST['post_id'], $_POST['group_id'], $_POST['choice'], $_SESSION['admin_id']);
          
          
          
          
      } elseif ($votealready_result->num_rows == 1) {
          
          
          
    
          
          $poll->update_vote($_POST['post_id'], $_POST['group_id'], $_POST['choice'], $_SESSION['admin_id']);
          
          
          
          
      }
    
    
}
    
}