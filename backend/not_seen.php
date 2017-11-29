<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


if(request_is_post()) {
   
if (isset($_POST['seen']))  {
    
    

    
    
    
$is_seen = $group->is_seen($_POST['group_id']);

$is_seen_r = $is_seen->get_result();

$is_num_seen = $is_seen_r->num_rows;
    
$seen_info = $is_seen_r->fetch_assoc();


if ($is_num_seen == 1) {
    
    $seen_num = $seen_info['post_id'];
    
}



if ($is_num_seen == 0) {
    
    $seen_num = 0;
    
}


    
    
    
    
    
 
$last_details = $posts->last_seen($_POST['group_id']);

$last_details_result = $last_details->get_result();

$last_info = $last_details_result->fetch_assoc();
    
    
    
    if ($last_info['owner'] == $_SESSION['admin_id']) {
        
        echo 0; exit();
        
    }
    

$diff = $last_info['id'] - $seen_info['post_id'];

    
    if ($diff > 0) {
        
        echo 1; exit();
        
    }
    
    
    
    
    if ($diff == 0) {
        
        echo 0; exit();
        
    }
    
    
    
    
    
    
}
        
} else {
    
    echo "fuck off";
    
}








?>