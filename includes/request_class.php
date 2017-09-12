<?php

require_once('database_class.php');

class Request {
    

    
   
       public function request_already_sent($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from request_member where member_id = ? AND group_id = ? limit 1");
        
       $stmt->bind_param("ii", $member_id, $group_id);
        
       $member_id = $member_id_input;  
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function add_member_request($member_id_input, $group_id_input, $sender_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO request_member (group_id, member_id, sender_id) VALUES (?, ?, ?)");
        
       $stmt->bind_param("iii",  $group_id, $member_id, $sender_id);
        
       $member_id = $member_id_input;  
           
       $group_id = $group_id_input;
           
       $sender_id = $sender_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function current_member_requests($member_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from request_member where member_id = ?");
        
       $stmt->bind_param("i",  $member_id);
        
       $member_id = $member_id_input;  
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function delete_request($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("delete from request_member where member_id = ? AND group_id = ? limit 1");
        
       $stmt->bind_param("ii",  $member_id, $group_id);
        
       $member_id = $member_id_input;  
           
       $group_id = $group_id_input; 
          
       $stmt->execute();
           
       return $stmt;    

       }
   
     



}



$request = new Request();









?>