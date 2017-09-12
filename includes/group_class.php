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
        
       $stmt = $database->connection->prepare("select * from groups where id = ? limit 1");
        
       $stmt->bind_param("i", $id);
        
       $id = $id_input;      
          
       $stmt->execute();
           
       return $stmt;    

       }
   


}



$group = new Group();









?>