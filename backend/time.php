<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


if(request_is_post()) {
   
if (isset($_POST['time']))  {
    
    

    
    
    
$is_time = $typing->is_time($_SESSION['admin_id']);

$is_time_r = $is_time->get_result();

$is_num_time = $is_time_r->num_rows;
    
$time_info = $is_time_r->fetch_assoc();


if ($is_num_time == 1) {
    
    $typing->update_time($_SESSION['admin_id'], time());
    
}



if ($is_num_time == 0) {
    
    $typing->insert_time($_SESSION['admin_id'], time());
    
}


    
   
    
    
}
        
} else {
    
    echo "fuck off";
    
}








?>