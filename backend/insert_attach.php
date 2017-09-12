<?php  include_once('../includes/all_classes_and_functions.php');  ?>




<?php

if(isset($_POST['insert_attach']))  {
    
    $path = $_POST['path'];
    
    $name = $_POST['name'];
    
    $type = $_POST['type'];
    
    $posttype = $_POST['posttype'];
    
    $group = $_POST['group'];
    
    
}
        
        
    $posts->insert_attach($path, $name, $type, $posttype, $group, $_SESSION['admin_id'], $_POST['time']);   

    $post_id_attach = mysqli_insert_id($database->connection);
    
    $attach_array = array("send_success"=> 1, "post_id"=> $post_id_attach);     
    
    echo json_encode(array_values($attach_array));
         
    exit();
    



?>