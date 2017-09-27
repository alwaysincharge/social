<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['task']))  {
    
    
    $todo->delete_task($_POST['task_id']);
    

}

?>