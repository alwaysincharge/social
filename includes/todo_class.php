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
    
    
    
    
    
       public function delete_task($task_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update to_do_list set deleted = 'deleted' where id = ? limit 1");
        
       $stmt->bind_param("i", $task_id);
        
       $task_id = $task_id_input;    
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function count_tasks($todo_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from to_do_list where post_id = ? and deleted = 'live' ");
        
       $stmt->bind_param("i", $todo_id);
        
       $todo_id = $todo_id_input;    
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function get_one_task($todo_id_input, $state_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       SELECT to_do_list.id as id, to_do_list.owner as owner, to_do_list.group_id as group_id, to_do_list.type as type, to_do_list.body as body, users.username as username, users.img_path as image FROM to_do_list INNER JOIN users ON users.id = to_do_list.owner where  to_do_list.post_id = ? AND to_do_list.state = ? and to_do_list.deleted = 'live' AND to_do_list.type = 'task'  order by to_do_list.id desc ");
        
       $stmt->bind_param("ii", $todo_id, $state_id);
        
       $todo_id = $todo_id_input;  
               
       $state_id = $state_id_input;    
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function get_one_comment($todo_id_input, $state_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       SELECT to_do_list.id as id, to_do_list.owner as owner, to_do_list.group_id as group_id, to_do_list.type as type, to_do_list.body as body, users.username as username, users.img_path as image FROM to_do_list INNER JOIN users ON users.id = to_do_list.owner where  to_do_list.comment_id = ? AND to_do_list.state = ? and to_do_list.deleted = 'live' AND to_do_list.type = 'comment' order by to_do_list.id desc ");
        
       $stmt->bind_param("ii", $todo_id, $state_id);
        
       $todo_id = $todo_id_input;  
               
       $state_id = $state_id_input;    
          
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