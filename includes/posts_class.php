<?php

require_once('database_class.php');

class Posts {
    

    
       public function create_post_chat($message_input, $owner_input, $group_input, $time_input, $reply_input, $important_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (message, owner, group_id, deleted, type, timeinput, attach_name, attach_type, attach_path, reply_id, timeoutput, important) VALUES (?, ?, ?, ?, ?, ?, '', '', '', ?, ?, ?)");
        
       $stmt->bind_param("siissiiss", $message, $owner, $group, $deleted, $type, $time, $reply, $time3, $important);
        
       $message = $message_input;
        
       $owner = $owner_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $deleted = "live";   
           
       $type = "chat";
           
       $reply = $reply_input;
           
       $important = $important_input;
                         
       $time3 = time();
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
       public function create_todo($owner_input, $body_input, $group_input, $time_input, $imp_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (listname, owner, group_id, deleted, type, timeinput, important) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bind_param("siissis", $body, $owner, $group, $deleted, $type, $time, $imp);
        
       $body = $body_input;
           
       $imp = $imp_input;
        
       $owner = $owner_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $deleted = "live";   
           
       $type = "todo";
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function create_poll($owner_input, $group_input, $time_input, $question_input, $answer1_input, $answer2_input, $answer3_input, $answer4_input, $answer5_input, $answer6_input, $answer7_input, $answer8_input, $answer9_input, $answer10_input, $important_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (owner, group_id, deleted, type, timeinput, question, answer1, answer2, answer3, answer4, answer5, answer6, answer7, answer8, answer9, answer10, important) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bind_param("iississssssssssss", $owner, $group, $deleted, $type, $time, $question, $answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9, $answer10, $important);
        
       $owner = $owner_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $important = $important_input;
           
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
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.group_id as group_id, posts.owner as owner, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question,posts.reply_id as reply_id, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.timeinput as timeinput, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id > ? AND posts.group_id = ? AND posts.owner != 0 AND posts.deleted = 'live' order by posts.id desc limit 20");
        
       $stmt->bind_param("ii", $offset, $group);
        
       $offset = $offset_input;
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
           public function is_there_important_in_this_group() {

    global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image, groups.name as groupname FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       where groups.deleted = 'live' and membership.deleted = 'live' and  membership.member_id = ? AND posts.deleted = 'live' and posts.important = 'true' order by posts.id desc limit 1");
           
       $stmt->bind_param("i", $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function is_there_like_in_this_group() {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image, groups.name as groupname FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       INNER JOIN bookmark ON bookmark.post = posts.id
       
       where  membership.member_id = ? AND posts.deleted = 'live' and bookmark.owner = ? and groups.deleted = 'live'  and membership.deleted = 'live' order by posts.id desc limit 1");
           
       $stmt->bind_param("ii", $id, $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function get_first_like_posts() {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image, groups.name as groupname, bookmark.owner as book_owner FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       INNER JOIN bookmark ON bookmark.post = posts.id
       
       where  membership.member_id = ? AND posts.deleted = 'live' and bookmark.owner = ? and groups.deleted = 'live' and membership.deleted = 'live' order by posts.id desc limit 12");
           
       $stmt->bind_param("ii", $id, $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
       public function get_next_like_posts($offset_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image, groups.name as groupname, bookmark.owner as book_owner FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       INNER JOIN bookmark ON bookmark.post = posts.id
       
     
       where  membership.member_id = ? AND posts.deleted = 'live' and groups.deleted = 'live' and bookmark.owner = ? and posts.id < ?  and membership.deleted = 'live' order by posts.id desc limit 12
       
       ");
        
       $stmt->bind_param("iii", $id, $id, $offset);
           
       $id = $_SESSION['admin_id'];
        
       $offset = $offset_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    

    
    
    
       public function is_there_a_post_in_this_group($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT id from posts where group_id = ? and owner != 0 and deleted = 'live' and posts.type != 'todo' limit 1");
        
       $stmt->bind_param("i", $group);
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
           public function is_there_a_todo_in_this_group($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT id from posts where group_id = ? and owner != 0 and deleted = 'live' and type = 'todo' limit 1");
        
       $stmt->bind_param("i", $group);
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
       public function is_there_a_poll_in_this_group($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT id from posts where group_id = ? and owner != 0 and deleted = 'live' AND type = 'poll' limit 1");
        
       $stmt->bind_param("i", $group);
           
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function get_new_search($term_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.group_id as group_id, posts.owner as owner, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question,  posts.reply_id as reply_id, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where 
       
       ( posts.message like ? OR  posts.attach_name like ? OR posts.question like ? OR posts.answer1 like ? OR posts.answer2 like ? OR posts.answer3 like ? OR posts.answer4 like ? OR posts.answer5 like ? OR posts.answer6 like ? OR posts.answer7 like ? OR posts.answer8 like ? OR posts.answer9 like ? OR posts.answer10 like ?) AND posts.group_id = ? AND posts.owner != 0 AND posts.deleted = 'live' order by posts.id desc limit 20 ");
        
       $stmt->bind_param("sssssssssssssi", $term, $term, $term, $term, $term, $term, $term, $term, $term, $term, $term, $term, $term, $group);
        
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
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where  posts.group_id = ? AND deleted = 'live' and posts.type != 'todo' order by posts.id desc limit 12");
           
       $stmt->bind_param("i", $group);
          
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
       public function get_first_important_posts() {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image, groups.name as groupname, groups.id as groupid FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       where groups.deleted = 'live' and membership.deleted = 'live' and  membership.member_id = ? AND posts.deleted = 'live' and posts.important = 'true' order by posts.id desc limit 12");
           
       $stmt->bind_param("i", $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function important_posts_count() {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       SELECT count(posts.id) as count FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       where groups.deleted = 'live' and membership.deleted = 'live' and  membership.member_id = ? AND posts.deleted = 'live' and posts.important = 'true' 
       
       ");
           
       $stmt->bind_param("i", $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
       public function important_record($post_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT into important (member_id, post_id) values (?, ?) ");
           
       $stmt->bind_param("ii", $id, $post);
          
       $id = $_SESSION['admin_id'];
           
       $post = $post_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function important_num() {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       SELECT count(posts.id) as count FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       INNER JOIN important ON important.post_id = posts.id
       
       where groups.deleted = 'live' and membership.deleted = 'live' and  membership.member_id = ? AND posts.deleted = 'live' and posts.important = 'true' and important.member_id = ?
       
       ");
           
       $stmt->bind_param("ii", $id, $id);
          
       $id = $_SESSION['admin_id'];
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function important_search($post_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from important where member_id = ? and post_id = ? limit 1 ");
           
       $stmt->bind_param("ii", $id, $post);
          
       $id = $_SESSION['admin_id'];
           
       $post = $post_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function get_next_important_posts($offset_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.reply_id as reply_id, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image, groups.name as groupname, groups.id as groupid FROM posts 
       
       INNER JOIN users ON users.id = posts.owner 
       
       INNER JOIN groups ON groups.id = posts.group_id
       
       INNER JOIN membership ON membership.group_id = posts.group_id
       
       where groups.deleted = 'live' and membership.deleted = 'live' and  membership.member_id = ? AND posts.deleted = 'live' and posts.important = 'true' and posts.id < ? order by posts.id desc limit 12
       
       ");
        
       $stmt->bind_param("ii", $id, $offset);
           
       $id = $_SESSION['admin_id'];
        
       $offset = $offset_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function get_first_few_todos($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where  posts.group_id = ? AND deleted = 'live' and posts.type = 'todo' order by posts.id desc limit 12");
           
       $stmt->bind_param("i", $group);
          
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      public function get_first_few_polls($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where  posts.group_id = ? AND deleted = 'live' AND posts.type = 'poll' order by posts.id desc limit 12");
           
       $stmt->bind_param("i", $group);
          
       $group = $group_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function get_one_todo($post_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.listname as listname, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where  posts.id = ? AND deleted = 'live' AND posts.type = 'todo' limit 1");
           
       $stmt->bind_param("i", $post);
          
       $post = $post_input;
          
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
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.reply_id as reply_id, posts.timeoutput as timeoutput, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id < ? AND posts.group_id = ? AND deleted = 'live' and posts.type != 'todo' order by id desc limit 12");
        
       $stmt->bind_param("ii", $offset, $group);
        
       $offset = $offset_input;
           
       $group = $group_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
       public function get_reply_info($reply_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id = ? limit 1");
        
       $stmt->bind_param("i", $reply);
        
       $reply = $reply_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
       public function get_next_few_todos($offset_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, posts.listname as listname, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id < ? AND posts.group_id = ? AND deleted = 'live' and posts.type = 'todo' order by id desc limit 12");
        
       $stmt->bind_param("ii", $offset, $group);
        
       $offset = $offset_input;
           
       $group = $group_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
       public function get_next_few_polls($offset_input, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("SELECT posts.id as id, posts.message as message, posts.owner as owner, posts.group_id as group_id, posts.type as type, posts.attach_path as path, posts.attach_name as name, posts.attach_type as file_type, posts.question as question, posts.answer1 as answer1, posts.answer2 as answer2, posts.answer3 as answer3, posts.answer4 as answer4, posts.answer5 as answer5, posts.answer6 as answer6, posts.answer7 as answer7, posts.answer8 as answer8, posts.answer9 as answer9, posts.answer10 as answer10, users.username as username, users.img_path as image FROM posts INNER JOIN users ON users.id = posts.owner where posts.id < ? AND posts.group_id = ? AND deleted = 'live' AND posts.type = 'poll' order by id desc limit 12");
        
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
    
    
    
    
    
       public function insert_attach($path_input, $name_input, $type_input, $post_type_input, $group_input, $owner_id_input, $time_input, $important_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO posts (attach_path, attach_name, attach_type, type, group_id, deleted, owner, timeinput, message, timeoutput, important) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, '', ?, ?)");
        
       $stmt->bind_param("ssssisisss", $path, $name, $type, $post_type, $group, $deleted, $owner_id, $time, $time2, $important);
        
       $path = $path_input;
           
       $name = $name_input;
           
       $important = $important_input;
           
       $type = $type_input;
           
       $post_type = $post_type_input;
           
       $group = $group_input;
           
       $time = $time_input;
           
       $time2 = time();
           
       $deleted = "live";
           
       $owner_id = $owner_id_input;
           
       $stmt->execute();
           
       return $stmt;    

       }
    
    
}



$posts = new Posts();









?>