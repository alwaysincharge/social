<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['task']))  {
    
    
    
    
    if ( (strlen(trim($_POST['body'])) == 0) || (strlen(trim($_POST['body'])) > 140) ) {
        
        exit();
        
    }
    
    
    
    
    $todo->create_task($_POST['post_id'], $_POST['body'], 1, $_SESSION['admin_id'], $_POST['time'], $_POST['group_id']);
    
    $task_id = mysqli_insert_id($database->connection);
    
    $attach_array = array("send_success"=> 1, "post_id"=> $task_id);     
    
    echo json_encode(array_values($attach_array));
        
    
}

?>