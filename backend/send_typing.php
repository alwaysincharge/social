<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['typing']))  {
    
    $typing->send_typing($_POST['group_id'], $_SESSION['admin_id'], time());
    
    $typing_id = mysqli_insert_id($database->connection);
    
    $attach_array = array("send_success"=> 1, "typing_id"=> $typing_id);     
    
    echo json_encode(array_values($attach_array));
        
    
}

?>