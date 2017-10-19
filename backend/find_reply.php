<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php



if(isset($_POST['find']))  {
    
    
    if ($_POST['reply_id'] < 1) {

    exit();
    
    }
    
    
    
    
          $old_posts = $posts->get_reply_info($_POST['reply_id']);
          
          $old_posts_result = $old_posts->get_result();
    
    
    
        
          $row = array();
    
          while($r = $old_posts_result->fetch_assoc()) {
             
              $row[] = $r;
                 
          }
    
    
    
          echo json_encode(array('old_posts' => $row));

          exit();
    
    
}








?>