<?php

require_once('database_class.php');

class Poll {
    

    
       public function new_vote($poll_post_id_input, $group_id_input, $selection_input, $voter_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO polls (poll_post_id, group_id, selection, voter) VALUES (?, ?, ?, ?)");
        
       $stmt->bind_param("iiii", $poll_post_id, $group_id, $selection, $voter);
           
       $poll_post_id = $poll_post_id_input;
        
       $group_id = $group_id_input;
           
       $selection = $selection_input;
           
       $voter = $voter_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function find_vote($poll_post_id_input, $group_id_input, $selection_input, $voter_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT * from polls where poll_post_id = ? AND group_id = ? AND voter = ? limit 1");
        
       $stmt->bind_param("iii", $poll_post_id, $group_id, $voter);
        
       $poll_post_id = $poll_post_id_input;
        
       $group_id = $group_id_input;
           
       $selection = $selection_input;
           
       $voter = $voter_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       
       public function find_vote_percent($poll_post_id_input, $selection_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT * from polls where poll_post_id = ? AND selection = ?");
        
       $stmt->bind_param("ii", $poll_post_id, $selection);
        
       $poll_post_id = $poll_post_id_input;
           
       $selection = $selection_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function find_user_choice($poll_post_id_input, $voter_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT * from polls where poll_post_id = ? AND voter = ?");
        
       $stmt->bind_param("ii", $poll_post_id, $voter);
        
       $poll_post_id = $poll_post_id_input;
           
       $voter = $voter_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
 
    
    
    
    
        
       public function delete_vote($poll_post_id_input, $group_id_input, $selection_input, $voter_input) {

       global $database;
        
       $stmt = $database->connection->prepare("delete from polls where poll_post_id = ? AND group_id = ? AND selection = ? AND voter = ? limit 1");
        
       $stmt->bind_param("iiii", $poll_post_id, $group_id, $selection, $voter);
        
       $poll_post_id = $poll_post_id_input;
        
       $group_id = $group_id_input;
           
       $selection = $selection_input;
           
       $voter = $voter_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function update_vote($poll_post_id_input, $group_id_input, $selection_input, $voter_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update polls set poll_post_id = ?, group_id = ?, selection = ?, voter = ?  where poll_post_id = ? AND group_id = ? AND voter = ? limit 1");
        
       $stmt->bind_param("iiiiiii", $poll_post_id, $group_id, $selection, $voter, $poll_post_id, $group_id, $voter);
        
       $poll_post_id = $poll_post_id_input;
        
       $group_id = $group_id_input;
           
       $selection = $selection_input;
           
       $voter = $voter_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    

    
    
}



$poll = new Poll();



?>