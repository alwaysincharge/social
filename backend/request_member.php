<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



if(request_is_post()) {
   
if (isset($_POST['newuser']))  {
    
    
    
    
         $is_admin = $member->get_admin($_SESSION['admin_id'], $_POST['group']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
            
                 
                 if ($admin_or_super_row['admin'] == "member")  {
                    
                    
                     
                     exit();   
                     
                 }
                 

                   
             }
    
          }
    
    
    
    
    
    
    
    
    
    
    
    
      $newuser = $user->does_user_exist($_POST['username']); 
    
      $newuser_result = $newuser->get_result();
    
    
      if($newuser_result->num_rows == 1) {
    
         
          while($user_row = $newuser_result->fetch_assoc()) {
              
              $member_id = $user_row['id'];
              
          }
          
          
          
          $already_request = $request->request_already_sent($member_id, $_POST['group']); 
          
          $already_request_result = $already_request->get_result();
          
        
          
          if ($already_request_result->num_rows == 1) {
              
              echo 1; exit();
        
          } 
          
          
          
          $already_member = $member->this_user_this_group($member_id, $_POST['group']); 
          
          $already_member_result = $already_member->get_result();
          
          if ($already_member_result->num_rows == 1) {
              
              echo 3; exit();
        
          }
          
          
              
              
          
          
          
          $send_request = $request->add_member_request($member_id, $_POST['group'], $_SESSION['admin_id']);
                  
          echo 4; exit();
              
          
          
          
          
          
          
      } else {
          
          echo 2; exit();
          
      }
    
    
}
    
}