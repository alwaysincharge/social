<?php

require_once('database_class.php');

class Todo {
    

    
       public function create_task($post_input, $body_input, $state_input, $owner_input, $time_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO to_do_list (post_id, body, state, owner, type, deleted, time_input, group_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bind_param("isiisssi", $post, $body, $state, $owner, $type, $deleted, $time, $group);
        
       $post = $post_input;
        
       $body = $body_input;
           
       $state = $state_input;
           
       $owner = $owner_input;
           
       $time = $time_input;
           
       $group = $group_input;
           
       $type = "task";
           
       $deleted = "live";       
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function create_comment($comment_input, $body_input, $state_input, $owner_input, $time_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO to_do_list (comment_id, body, state, owner, type, deleted, time_input, group_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bind_param("isiisssi", $comment, $body, $state, $owner, $type, $deleted, $time, $group);
        
       $comment = $comment_input;
        
       $body = $body_input;
           
       $state = $state_input;
           
       $owner = $owner_input;
           
       $time = $time_input;
           
       $group = $group_input;
           
       $type = "comment";
           
       $deleted = "live";       
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
       public function doing_task($task_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update to_do_list set state = 2 where id = ? limit 1");
        
       $stmt->bind_param("i", $task_id);
        
       $task_id = $task_id_input;    
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    

    
        
       public function done_task($task_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update to_do_list set state = 3 where id = ? limit 1");
        
       $stmt->bind_param("i", $task_id);
        
       $task_id = $task_id_input;    
          
       $stmt->execute();
           
       return $stmt;    

       }
}



$todo = new Todo();









?>