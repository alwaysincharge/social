<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>






<?php

if(isset($_POST['search']))  {
    
    
    if ((strlen(trim($_POST['term']))) == 0) {
        
      
        
    } else {
        
        $new_search = $posts->get_new_file("%" . $_POST['term'] . "%", $_POST['group']);
        
    }
    
    
    
    $new_search_result = $new_search->get_result();
    
    $rows = array();
    
    while($r = $new_search_result->fetch_assoc()) {
        
        
        
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


// echo $_POST['term'];
    echo json_encode(array('new_search' => $rows));

    
    exit();
    
    
    
    
}

?>