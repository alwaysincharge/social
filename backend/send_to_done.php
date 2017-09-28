<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['task']))  {
    
    $todo->done_task($_POST['task_id']);
    
    $todo_id = mysqli_insert_id($database->connection);
    
    $attach_array = array("send_success"=> 1, "task_id"=> $todo_id);     
    
    echo json_encode(array_values($attach_array));
        
    
}

?>