<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['poll']))  {
    
    if ( (strlen(trim($_POST['poll_q'])) == 0) ||
        
       (strlen(trim($_POST['poll_a1'])) == 0)  ||
        
       (strlen(trim($_POST['poll_a2'])) == 0) || 
       
       (strlen(trim($_POST['poll_q'])) > 140) 
       ) {
        
        
        exit();
        
        
    }
    
    
    
    if ( (strlen($_POST['poll_a1']) > 140) ||
        
       (strlen($_POST['poll_a2']) > 140) ||
        
       (strlen($_POST['poll_a3']) > 140) ||
       
       (strlen($_POST['poll_a4']) > 140) ||
        
       (strlen($_POST['poll_a5']) > 140) ) {
        
        
        exit();
        
        
    }
    
    
    
    
        if ( (strlen($_POST['poll_a6']) > 140) ||
        
       (strlen($_POST['poll_a7']) > 140) ||
        
       (strlen($_POST['poll_a8']) > 140) ||
       
       (strlen($_POST['poll_a9']) > 140) ||
        
       (strlen($_POST['poll_a10']) > 140) ) {
        
        
        exit();
        
        
       }
    
    
    
    
    if ( (strlen(trim($_POST['poll_a3'])) == 0) && (strlen(trim($_POST['poll_a4'])) > 0) ) {
        
        exit();
        
    }
    
    
    
    
   if ( (strlen(trim($_POST['poll_a4'])) == 0) && (strlen(trim($_POST['poll_a5'])) > 0) ) {
        
        exit();
        
    }
    
    
    
   if ( (strlen(trim($_POST['poll_a5'])) == 0) && (strlen(trim($_POST['poll_a6'])) > 0) ) {
        
        exit();
        
    }
    
    
    
   if ( (strlen(trim($_POST['poll_a6'])) == 0) && (strlen(trim($_POST['poll_a7'])) > 0) ) {
        
        exit();
        
    }
    
    
   if ( (strlen(trim($_POST['poll_a7'])) == 0) && (strlen(trim($_POST['poll_a8'])) > 0) ) {
        
        exit();
        
    }
    
    
    
    
   if ( (strlen(trim($_POST['poll_a8'])) == 0) && (strlen(trim($_POST['poll_a9'])) > 0) ) {
        
        exit();
        
    }
    
    
    
  if ( (strlen(trim($_POST['poll_a9'])) == 0) && (strlen(trim($_POST['poll_a10'])) > 0) ) {
        
        exit();
        
    }
    
    
    
    $posts->create_poll($_SESSION['admin_id'], $_POST['group_id'], $_POST['time'], $_POST['poll_q'], $_POST['poll_a1'], $_POST['poll_a2'], $_POST['poll_a3'], $_POST['poll_a4'], $_POST['poll_a5'], $_POST['poll_a6'], $_POST['poll_a7'], $_POST['poll_a8'], $_POST['poll_a9'], $_POST['poll_a10'], $_POST['important']);
    
    $post_id = mysqli_insert_id($database->connection);
    
    $attach_array = array("send_success"=> 1, "post_id"=> $post_id);     
    
    echo json_encode(array_values($attach_array));
        
    
}

?>