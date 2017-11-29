<?php

require_once('database_class.php');

class Typing {
    
    
       public function send_typing($group_input, $owner_id_input, $time_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO typing (group_id, owner, timeinput) VALUES ( ?, ?, ?)");
        
       $stmt->bind_param("iis", $group, $owner_id, $time);

       $group = $group_input;
           
       $time = $time_input;
           
       $owner_id = $owner_id_input;
           
       $stmt->execute();
           
       return $stmt;    

       } 
    
    
    
    
    
       public function get_typing($group_input2) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from typing where group_id = ? and ( (? - timeinput) <= 2)  order by id desc limit 1");
        
       $stmt->bind_param("ii", $group2, $time2);
           
       $time2 = time();

       $group2 = $group_input2;
           
       $stmt->execute();
           
       return $stmt;    

       } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function update_time($user_input, $time_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update online set time_ago = ? where user = ? limit 1");
        
       $stmt->bind_param("si", $time, $user);
        
       $user = $user_input;    
           
       $time = $time_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
       public function is_time($user_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from online where user = ? order by id desc limit 1");
        
       $stmt->bind_param("i", $user);
        
       $user = $user_input;    
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function get_time($user_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from online
       
       INNER JOIN membership ON membership.member_id = online.user
       
       INNER JOIN groups ON groups.id = membership.group_id
       
       
       
       
       
       where groups.id = ? and groups.deleted = 'live' and membership.member_id != ? and membership.deleted = 'live' order by online.id desc limit 1");
        
       $stmt->bind_param("ii", $group, $user);
        
       $user = $user_input; 
           
       $group = $group_input; 
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
       public function insert_time($user_input, $time_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       INSERT INTO online (user, time_ago) VALUES (?, ?)");
        
       $stmt->bind_param("is", $user, $time);
        
       $user = $user_input;    
           
       $time = $time_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
}
    


$typing = new Typing();

?>
    
