<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



if(request_is_post()) {
   
if (isset($_POST['percent']))  {
    
    
    
      $vote1 = $poll->find_vote_percent($_POST['post_id'], 1); 
    
      $vote1_result = $vote1->get_result();
    
      $choice1 = $vote1_result->num_rows;
    
    
    
      $vote2 = $poll->find_vote_percent($_POST['post_id'], 2); 
    
      $vote2_result = $vote2->get_result();
    
      $choice2 = $vote2_result->num_rows;
    
    
    
      $vote3 = $poll->find_vote_percent($_POST['post_id'], 3); 
    
      $vote3_result = $vote3->get_result();
    
      $choice3 = $vote3_result->num_rows;
    
    
  
      $vote4 = $poll->find_vote_percent($_POST['post_id'], 4); 
    
      $vote4_result = $vote4->get_result();
    
      $choice4 = $vote4_result->num_rows;
    
    
    
      $vote5 = $poll->find_vote_percent($_POST['post_id'], 5); 
    
      $vote5_result = $vote5->get_result();
    
      $choice5 = $vote5_result->num_rows;
    
    
    
      $vote6 = $poll->find_vote_percent($_POST['post_id'], 6); 
    
      $vote6_result = $vote6->get_result();
    
      $choice6 = $vote6_result->num_rows;
    
    
    
      $vote7 = $poll->find_vote_percent($_POST['post_id'], 7); 
    
      $vote7_result = $vote7->get_result();
    
      $choice7 = $vote7_result->num_rows;
    
    
    
      $vote8 = $poll->find_vote_percent($_POST['post_id'], 8); 
    
      $vote8_result = $vote8->get_result();
    
      $choice8 = $vote8_result->num_rows;
    
    
  
      $vote9 = $poll->find_vote_percent($_POST['post_id'], 9); 
    
      $vote9_result = $vote9->get_result();
    
      $choice9 = $vote9_result->num_rows;
    
    
    
      $vote10 = $poll->find_vote_percent($_POST['post_id'], 10); 
    
      $vote10_result = $vote10->get_result();
    
      $choice10 = $vote10_result->num_rows;
    
    
    
    
      $user_choice = $poll->find_user_choice($_POST['post_id'], $_SESSION['admin_id']); 
    
      $user_choice_result = $user_choice->get_result();
    
      while ($user_selection = $user_choice_result->fetch_assoc()) {
          
          $user_choice_selection = $user_selection['selection'];
          
      }
    
    
    
      $attach_array = array("choice1"=> $choice1, "choice2"=> $choice2, "choice3"=> $choice3, "choice4"=> $choice4, "choice5"=> $choice5, "choice6"=> $choice6, "choice7"=> $choice7, "choice8"=> $choice8, "choice9"=> $choice9, "choice10"=> $choice10, "user_choice"=> $user_choice_selection);     
    
      echo json_encode(array_values($attach_array));
    
}
    
}