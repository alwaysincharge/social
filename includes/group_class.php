<?php

require_once('database_class.php');

class Group {
    

    
       public function create_group($name_input, $desc_input, $img_path_input, $img_name_input, $img_type_input, $admin_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO groups (name, description, img_path, img_name, img_type, superadmin, deleted) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bind_param("sssssis", $name, $desc, $img_path, $img_name, $img_type, $admin, $deleted);
        
       $name = $name_input;
        
       $desc = $desc_input;
        
       $img_path = $img_path_input;   
           
       $img_name = $img_name_input; 
           
       $img_type = $img_type_input; 
           
       $admin = $admin_input;
           
       $deleted = "live";       
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function find_group_by_id($id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from groups where id = ? and deleted = 'live' limit 1");
        
       $stmt->bind_param("i", $id);
        
       $id = $id_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
        
       public function remove_group($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update groups set deleted = 'deleted' where id = ? limit 1");
        
       $stmt->bind_param("i", $group);
        
       $group = $group_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
       public function edit_title($name_i, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update groups set name = ? where id = ? limit 1");
        
       $stmt->bind_param("si", $name, $group);
           
       $name = $name_i;
        
       $group = $group_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
       public function edit_desc($name_i, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update groups set description = ? where id = ? limit 1");
        
       $stmt->bind_param("si", $name, $group);
           
       $name = $name_i;
        
       $group = $group_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function edit_pic($name_i, $group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update groups set img_path = ? where id = ? limit 1");
        
       $stmt->bind_param("si", $name, $group);
           
       $name = $name_i;
        
       $group = $group_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
       public function is_seen($group_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       
       select * from seen 
    
       
       where group_id = ? and person = ? 
       
       limit 1
       
       
       ");
        
       $stmt->bind_param("ii", $group, $name);
           
       $name = $_SESSION['admin_id'];
        
       $group = $group_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       public function update_seen($group_input, $post_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update seen set post_id = ? where group_id = ? and person = ? limit 1");
        
       $stmt->bind_param("iii", $post, $group, $name);
           
       $name = $_SESSION['admin_id'];
        
       $group = $group_input;    
           
       $post = $post_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
       public function insert_seen($group_input, $post_input) {

       global $database;
        
       $stmt = $database->connection->prepare("
       
       INSERT INTO seen (group_id, post_id, person) VALUES (?, ?, ?)");
        
       $stmt->bind_param("iii", $group, $post, $name);
           
       $name = $_SESSION['admin_id'];
        
       $group = $group_input;    
           
       $post = $post_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
   


}



$group = new Group();









?>