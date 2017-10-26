<?php  include_once('../includes/all_classes_and_functions.php');  ?>




<?php



        $b =  $posts->single_reply($_SESSION['admin_id']);
        
        $b_result =  $b->get_result();
        
        $b_rows = $b_result->fetch_assoc();
        
        $b_nums = $b_result->num_rows;
        
        
        
        if ($b_nums == 1) {
            
            echo 100; exit();
            
        } else if ($b_nums == 0) {
        
              

        
        }          









?>