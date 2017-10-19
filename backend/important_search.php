<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


if(request_is_post()) {
   
if (isset($_POST['important'])) {
    
    
     
    
    $count = $posts->important_search($_POST['post_id']);
    
    $count_result = $count->get_result();
    
    $count_num = $count_result->num_rows;
    
    
    if ($count_num == 0) {
        
        $posts->important_record($_POST['post_id']);
        
    }
    
    
    
}
    
}

















?>