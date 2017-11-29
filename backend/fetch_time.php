<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


if(request_is_post()) {
   
if (isset($_POST['time']))  {
    
    

    
    
    
$is_time = $typing->get_time($_SESSION['admin_id'], $_POST['group_id']);

$is_time_r = $is_time->get_result();

$is_num_time = $is_time_r->num_rows;
    
$time_info = $is_time_r->fetch_assoc();
    
    
    
    
    if ((time() - $time_info['time_ago'])   < 61)  {

    
    
    echo "small"; exit();
    
    }
    
    
    


if ($is_num_time == 1) {
    
    


    echo time_elapsed_string('@' . $time_info['time_ago']); exit();
    
    
    
}



if ($is_num_time == 0) {
    
    echo "empty"; exit();
    
}


    
   
    
    
}
        
} else {
    
    echo "fuck off";
    
}








?>