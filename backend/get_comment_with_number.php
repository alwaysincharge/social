<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['fetchold']))  {
    
    
    $is_there = $todo->get_one_comment($_POST['post_id'], $_POST['type']);
    
    $is_there_result = $is_there->get_result();
    
    $is_there_num = $is_there_result->num_rows;
    
    if ( $is_there_num == 0 ) {

        echo 200; exit();
    
    } 
    
    
    
      
          
    
          $row = array();
    
          while($r = $is_there_result->fetch_assoc()) {
              
              
                     
          $row[] = $r;
              
              
          }



    echo json_encode(array('old_posts' => $row));


    
    exit();
    
    
    
    
    
    
    
    
    
    
    
}


?>