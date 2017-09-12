<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


if(request_is_post()) {
   
if (isset($_POST['deletepost']))  {
    
    
          
    $posts->delete_post_by_id($_POST['post_id'], $_SESSION['admin_id']);
    
    
}
        
} else {
    
    echo "fuck off";
    
}








?>