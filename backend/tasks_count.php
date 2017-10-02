<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['task']))  {
    
    $old_posts = $todo->count_tasks($_POST['todo_id']);
          
    $old_posts_result = $old_posts->get_result();
          
    $num = $old_posts_result->num_rows;
    
    echo $num;

}

?>