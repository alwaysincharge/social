<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


if(request_is_post()) {
   
if (isset($_POST['done'])) {
    
    
        if  (strlen(trim($_POST['message'])) < 1)
        
        {
            
              exit();
        
        }
    
    
    
    
    if  ($_POST['reply_id'] > 0) {
        
        
     $a = $posts->single_post($_POST['reply_id']);
        
     $a_result =  $a->get_result();
        
     $a_rows = $a_result->fetch_assoc();
        
     $a_nums = $a_result->num_rows;
        
        
    if ($a_nums == 1)  {
        
        $b =   $posts->single_reply($a_rows['owner']);
        
        $b_result =  $b->get_result();
        
        $b_rows = $b_result->fetch_assoc();
        
        $b_nums = $b_result->num_rows;
        
        
        
        if ($b_nums == 1) {
            
            
            
        } else if ($b_nums == 0) {
        
        $posts->new_reply($a_rows['id'], $a_rows['owner']);

        
        }
        
            
    }    
    
        
        
    }
    
    
    
    
    
    
    
    $posts->create_post_chat(strip_tags($_POST['message']), $_SESSION['admin_id'], $_POST['group_id'], $_POST['time'], $_POST['reply_id'], $_POST['important']);
    
    $post_id = mysqli_insert_id($database->connection);
    
    $attach_array = array("send_success"=> 1, "post_id"=> $post_id);     
    
    echo json_encode(array_values($attach_array));
    
    
}
    
}

















?>