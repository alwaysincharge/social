<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['fetchnew']))  {
    
    $offset = $_POST['offset'];
    
    if ($offset == 0) {
      
        
            $new_chat = $posts->get_very_last_post($_POST['group']);
            
      
        
    } else {
        
        $new_chat = $posts->get_new_chat($offset, $_POST['group']);
        
    }
    
    
    
    $new_chat_result = $new_chat->get_result();
    
    $rows = array();
    
    while($r = $new_chat_result->fetch_assoc()) {
        
        
                  $already_like = $like->find_like($_SESSION['admin_id'], $r['id'], $r['group_id']);
    
                  $already_like_result = $already_like->get_result();
    
                  $num = $already_like_result->num_rows;
    
    
    
                  if ($num == 1)  {
        
        
                      $r["like_src"] =  $_SESSION['url_placeholder'] . "frontend/html/pages/assets/like.svg";
        
        
                  } elseif ($num == 0)  {
        
        
                      $r["like_src"] =  $_SESSION['url_placeholder'] . "frontend/html/pages/assets/unlike.svg";
        
                  }
        
        
        
    $rows[] = $r;
        
    }



    echo json_encode(array('new_posts' => $rows));

    
    exit();
    
    
    
    

}

?>