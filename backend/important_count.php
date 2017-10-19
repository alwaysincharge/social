<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


if(request_is_post()) {
   
if (isset($_POST['important'])) {
    
    
     
    
    $count = $posts->important_posts_count();
    
    $count_result = $count->get_result();
    
    $count_num = $count_result->fetch_assoc();
    
    
    
    
    $count2 = $posts->important_num();
    
    $count_result2 = $count2->get_result();
    
    $count_num2 = $count_result2->num_rows;
    
    
    
    
    $attach_array = array("send_success"=> 1, "post_id"=> $count_num['count'] - $count_num2);     
    
    echo json_encode(array_values($attach_array));
    
    
}
    
}

















?>