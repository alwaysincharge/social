<?php

require_once('database_class.php');

class Posts {
    

    
       public function create_post_chat($message_input, $owner_input, $group_input, $time_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (message, owner, group_id, deleted, type, timeinput, attach_name, attach_type, attach_path) VALUES (?, ?, ?, ?, ?, ?, '', '', '')");
        
       $stmt->bind_param("siissi", $message, $owner, $group, $deleted, $type, $time);
        
       $message = $message_input;
        
       $owner = $owner_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $deleted = "live";   
           
       $type = "chat";
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function create_poll($owner_input, $group_input, $time_input, $question_input, $answer1_input, $answer2_input, $answer3_input, $answer4_input, $answer5_input, $answer6_input, $answer7_input, $answer8_input, $answer9_input, $answer10_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (owner, group_id, deleted, type, timeinput, question, answer1, answer2, answer3, answer4, answer5, answer6, answer7, answer8, answer9, answer10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bind_param("iississsssssssss", $owner, $group, $deleted, $type, $time, $question, $answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9, $answer10);
        
       $owner = $owner_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $deleted = "live";   
           
       $type = "poll";
           
       $question = $question_input;
           
       $answer1 = $answer1_input;
           
       $answer2 = $answer2_input;
           
       $answer3 = $answer3_input;
           
       $answer4 = $answer4_input;
           
       $answer5 = $answer5_input;
           
       $answer6 = $answer6_input;
           
       $answer7 = $answer7_input;
           
       $answer8 = $answer8_input;
           
       $answer9 = $answer9_input;
           
       $answer10 = $answer10_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    


    
       public function get_new_chat($offset_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.group_id as group_id, posts.owner as owner, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.timeinput as timeinput, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id > ? AND posts.group_id = ? AND posts.owner != 0 AND posts.deleted = 'live' order by posts.id desc limit 20");
        
       $stmt->bind_param("ii", $offset, $group);
        
       $offset = $offset_input;
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
       public function is_there_a_post_in_this_group($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT id from posts where group_id = ? and owner != 0 and deleted = 'live' limit 1");
        
       $stmt->bind_param("i", $group);
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
       public function get_new_search($term_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.group_id as group_id, posts.owner as owner, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where 
       
       ( posts.message like ? OR  posts.attach_name like ? ) AND posts.group_id = ? AND posts.owner != 0 AND posts.deleted = 'live' order by posts.id desc limit 20 ");
        
       $stmt->bind_param("ssi", $term, $term, $group);
        
       $term = $term_input;
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    

    
    
       public function get_test_post($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.group_id as group_id, posts.owner as owner, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.timeinput as timeinput, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = 1 where   posts.group_id = ? AND posts.owner = 0 limit 20");
        
       $stmt->bind_param("i", $group);
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }

    
    

    
    
       public function get_first_few_posts($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where  posts.group_id = ? AND deleted = 'live' order by posts.id desc limit 12");
           
       $stmt->bind_param("i", $group);
          
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function get_very_last_post($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT * from posts where group_id = ? order by id desc limit 1");
           
       $stmt->bind_param("i", $group);
          
       $group = $group_input;
           
       $stmt->execute();
           
       return $stmt;    

       }

    
    

    
    
    
    
       public function get_next_few_posts($offset_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id < ? AND posts.group_id = ? AND deleted = 'live' order by id desc limit 12");
        
       $stmt->bind_param("ii", $offset, $group);
        
       $offset = $offset_input;
           
       $group = $group_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
       public function delete_post_by_id($id_input, $owner_input) {

       global $database;
        
       $stmt = $database->connection->prepare("UPDATE posts set deleted = 'deleted' where id = ? and owner = ? limit 1 ");
        
       $stmt->bind_param("ii", $id, $owner);
        
       $id = $id_input;
           
       $owner = $owner_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function insert_attach($path_input, $name_input, $type_input, $post_type_input, $group_input, $owner_id_input, $time_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (attach_path, attach_name, attach_type, type, group_id, deleted, owner, timeinput, message) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, '')");
        
       $stmt->bind_param("ssssisis", $path, $name, $type, $post_type, $group, $deleted, $owner_id, $time);
        
       $path = $path_input;
           
       $name = $name_input;
           
       $type = $type_input;
           
       $post_type = $post_type_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $deleted = "live";
           
       $owner_id = $owner_id_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
}



$posts = new Posts();









?>