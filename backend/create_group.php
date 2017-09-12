<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>



<?php

$name = $_POST['groupname'];

$desc = $_POST['groupdesc'];

$img_path = $_POST['group_pic_path'];

$img_name = $_POST['group_pic_name'];

$img_type = $_POST['group_pic_type'];



    if ( 
        
        (strlen(trim($_POST['groupname'])) == 0) || 
        
        (strlen(trim($_POST['groupdesc'])) == 0) ||
        
        (strlen(trim($_POST['group_pic_path'])) == 0) ||
        
        (strlen(trim($_POST['group_pic_name'])) == 0) ||
        
        (strlen(trim($_POST['group_pic_type'])) == 0) )
        
        {
        
              echo 5;
            
              exit();
        
        }






    if ( 
        
        (strlen(trim($_POST['groupname'])) > 60) || 
        
        (strlen(trim($_POST['groupdesc'])) > 140) ||
        
        (strlen(trim($_POST['group_pic_path'])) > 400) ||
        
        (strlen(trim($_POST['group_pic_name'])) > 400) ||
        
        (strlen(trim($_POST['group_pic_type'])) > 400) )
        
        {
        
              echo 6;
            
              exit();
        
        }







$group->create_group($name, $desc, $img_path, $img_name, $img_type, $_SESSION['admin_id']);

$group_id = mysqli_insert_id($database->connection);

$member->create_member($group_id, $_SESSION['admin_id'], "superadmin");

$member_id = mysqli_insert_id($database->connection);

$posts->create_post_chat("test", 0, $group_id, time());



if ($group_id && $member_id) {
    
    echo 1; exit();
    
}





?>