<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


if(request_is_post()) {
   
if (isset($_POST['likepost'])) {
    
    
    $already_like = $like->find_like($_SESSION['admin_id'], $_POST['post_id'], $_POST['group_id']);
    
    $already_like_result = $already_like->get_result();
    
    $num = $already_like_result->num_rows;
    
    
    
    if ($num == 1)  {
        
        
        $like->unlike($_SESSION['admin_id'], $_POST['post_id'], $_POST['group_id']);
        
        
    } elseif ($num == 0)  {
        
        
        $like->new_like($_SESSION['admin_id'], $_POST['post_id'], $_POST['group_id']);
        
    }
    
    
    
    
  //  $like_id = mysqli_insert_id($database->connection);
    

    
    
}
    
}

















?>