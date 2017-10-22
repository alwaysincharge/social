<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


if(request_is_post()) {
   
if (isset($_POST['important'])) {
    
    
     
    
    $count = $request->request_count();
    
    $count_result = $count->get_result();
    
    $count_num = $count_result->fetch_assoc();
    
    
    
    $attach_array = array("send_success"=> 1, "post_id"=> $count_num['count']);     
    
 echo json_encode(array_values($attach_array));
    
    
}
    
}

















?>