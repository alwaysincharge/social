<?php

require_once('database_class.php');

class Like {
    

    
       public function new_like($owner_input, $post_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO bookmark (owner, post, group_id) VALUES (?, ?, ?)");
        
       $stmt->bind_param("iii", $owner, $post, $group);
        
       $owner = $owner_input;
           
       $post = $post_input;
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function find_like($owner_input, $post_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT * from bookmark where owner = ? AND post = ? AND group_id = ? limit 1");
        
       $stmt->bind_param("iii", $owner, $post, $group);
        
       $owner = $owner_input;
           
       $post = $post_input;
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function unlike($owner_input, $post_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("DELETE from bookmark where owner = ? AND post = ? AND group_id = ? limit 1");
        
       $stmt->bind_param("iii", $owner, $post, $group);
        
       $owner = $owner_input;
           
       $post = $post_input;
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    

    
    
}



$like = new Like();



?>