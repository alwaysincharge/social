<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['typing']))  {
    
    $typing_get = $typing->get_typing($_POST['group_id']);
    
    $typing_get_result = $typing_get->get_result();
    
    $num = $typing_get_result->num_rows;
    
    
    if ($num == 1) {
        
         
        

        while($row = $typing_get_result->fetch_assoc()) {
        
        
   
          if ($row['owner'] != $_SESSION['admin_id']) {
                
              echo 100;
                
        }
                
           }
        
    }
        
 //   }
    
    
    /*
    
    
    
        
    
    while($row = $typing_get_result->fetch_assoc()) {
        
        echo $row['timeinput'];
   
         //  if ($row['owner'] != $_SESSION['admin_id']) {
                
                

                
           }
            
            

    
    
    
    */
    
    
    
    
    
}

?>