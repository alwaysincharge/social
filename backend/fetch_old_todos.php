<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['fetchold']))  {
    
    
    $is_there = $posts->is_there_a_todo_in_this_group($_POST['group']);
    
    $is_there_result = $is_there->get_result();
    
    $is_there_num = $is_there_result->num_rows;
    
    if ( $is_there_num == 0 ) {

        echo 200; exit();
    
    }
    
    
    
      if ($_POST['offset'] == 0) {
          
          $old_posts = $posts->get_first_few_todos($_POST['group']);
          
          $old_posts_result = $old_posts->get_result();
          
          $num = $old_posts_result->num_rows;
          
          if ($num == 0) {
              
              echo 100; exit();
              
          }
          
          
          
      } elseif ($_POST['offset'] > 0) {
          
          $old_posts = $posts->get_next_few_todos($_POST['offset'], $_POST['group']);
          
          $old_posts_result = $old_posts->get_result();
          
          $num = $old_posts_result->num_rows;
          
          if ($num == 0) {
              
              echo 100; exit();
              
          }
          
          
      } else {
          
          
      }
    
    
  
    
    
          
    
          $row = array();
    
          while($r = $old_posts_result->fetch_assoc()) {
              
              
          //    $r["stamp"] = date("l jS \of F Y h:i:s A", $r["timeoutput"]);
              
              
                  $already_like = $like->find_like($_SESSION['admin_id'], $r['id'], $r['group_id']);
    
                  $already_like_result = $already_like->get_result();
    
                  $num = $already_like_result->num_rows;
    
    
    
                  if ($num == 1)  {
        
        
                      $r["like_src"] =  $_SESSION['url_placeholder'] . "frontend/html/pages/assets/like.svg";
        
        
                  } elseif ($num == 0)  {
        
        
                      $r["like_src"] =  $_SESSION['url_placeholder'] . "frontend/html/pages/assets/unlike.svg";
        
                  }
              
              
              
              
             
              
          $row[] = $r;
              
              
          }



    echo json_encode(array('old_posts' => $row));


    
    exit();
    
    
    
    
    
    
    
    
    
    
    
}


?>