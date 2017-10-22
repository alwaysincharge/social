<?php

require_once('database_class.php');

class Request {
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
       public function is_there_request() {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       
       SELECT request_member.member_id as member_id, request_member.sender_id as sender_id, request_member.group_id as group_id, users.username as username, groups.name as group_name, groups.img_path as group_img FROM request_member
       
       
       INNER JOIN groups ON groups.id = request_member.group_id
       
       INNER JOIN users ON users.id = request_member.sender_id
       
       
       where request_member.member_id = ? and groups.deleted = 'live' 
       
       limit 1");
           
       $stmt->bind_param("i", $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
      public function request_count() {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       
       SELECT count(*) as count FROM request_member
       
       
       INNER JOIN groups ON groups.id = request_member.group_id
       
       INNER JOIN users ON users.id = request_member.sender_id
       
       
       where request_member.member_id = ? and groups.deleted = 'live' 
       
       ");
           
       $stmt->bind_param("i", $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
       public function get_first_request() {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       
       SELECT request_member.member_id as member_id, request_member.sender_id as sender_id, request_member.group_id as group_id, users.username as username, groups.name as group_name, groups.img_path as group_img, groups.id as groupid FROM request_member
       
       
       INNER JOIN groups ON groups.id = request_member.group_id
       
       INNER JOIN users ON users.id = request_member.sender_id
       
       
       where request_member.member_id = ? and groups.deleted = 'live' 
       
       limit 12");
           
       $stmt->bind_param("i", $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
       public function get_next_request($offset_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       
       SELECT request_member.member_id as member_id, request_member.sender_id as sender_id, request_member.group_id as group_id, users.username as username, groups.name as group_name, groups.img_path as group_img, groups.id as groupid FROM request_member
       
       
       INNER JOIN groups ON groups.id = request_member.group_id
       
       INNER JOIN users ON users.id = request_member.sender_id
       
       
       where request_member.member_id = ? and groups.deleted = 'live'  and request_member.id > ?
       
       limit 12");
           
       $stmt->bind_param("ii", $id, $offset);
          
       $id = $_SESSION['admin_id'];
               
       $offset = $offset_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
   
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