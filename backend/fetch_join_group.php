<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['fetchold']))  {
    
    
    $is_there = $request->is_there_request();
    
    $is_there_result = $is_there->get_result();
    
    $is_there_num = $is_there_result->num_rows;
    
    if ( $is_there_num == 0 ) {

        echo 200; exit();
    
    }
    
    
    
      if ($_POST['offset'] == 0) {
          
          $old_posts = $request->get_first_request();
          
          $old_posts_result = $old_posts->get_result();
          
          $num = $old_posts_result->num_rows;
          
          if ($num == 0) {
              
              echo 100; exit();
              
          }
          
          
          
      } elseif ($_POST['offset'] > 0) {
          
         $old_posts = $posts->get_next_request($_POST['offset']);
          
          $old_posts_result = $old_posts->get_result();
          
          $num = $old_posts_result->num_rows;
          
          if ($num == 0) {
              
              echo 100; exit();
              
          }
          
          
      } else {
          
          
      }
    
    
  
    
    
          
    
          $row = array();
    
          while($r = $old_posts_result->fetch_assoc()) {
              
              
              
          $row[] = $r;
              
              
          }



    echo json_encode(array('old_posts' => $row));


    
    exit();
    
    
    
    
    
    
    
    
    
    
    
}


?>