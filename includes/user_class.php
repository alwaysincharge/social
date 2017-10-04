<?php

require_once('database_class.php');

class User {
    

    
       public function create_user($user_input, $password_input, $email_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO users (username, password, email, img_path, img_name, img_type) VALUES (?, ?, ?, ?, '', '')");
        
       $stmt->bind_param("ssss", $username, $password, $email, $img_path);

       // set parameters and execute
        
       $username = $user_input;
        
       $password = $password_input;
        
       $email = $email_input;   
           
       $img_path = "frontend/html/pages/assets/nopic.png";
          
       $stmt->execute();
           
       return $stmt;    

       }
   
      
    
         public function does_user_exist($user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select username, password, id from users where username = ? limit 1");
        
         $stmt->bind_param("s", $username);

         // set parameters and execute
        
         $username = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function does_user_exist_by_id($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select id, username, password from users where id = ?");
        
         $stmt->bind_param("i", $current_user);

         // set parameters and execute
        
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function find_one_user($id_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where id = ?");
        
         $stmt->bind_param("i", $id);

         // set parameters and execute
        
         $id = $id_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
          
    
         public function display_all_user_details($id_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where id = ?");
        
         $stmt->bind_param("i", $id);

         // set parameters and execute
        
         $id = $id_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function display_all_user_details_by_user($user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where username = ?");
        
         $stmt->bind_param("s", $username);

         // set parameters and execute
        
         $username = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function edit_username($username_input, $user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("update users set username = ? where id = ? limit 1");
        
         $stmt->bind_param("si", $username, $user);

         // set parameters and execute
        
         $username = $username_input;
             
         $user = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function edit_profilepic($img_input, $user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("update users set img_path = ? where id = ? limit 1");
        
         $stmt->bind_param("si", $img, $user);

         // set parameters and execute
        
         $img = $img_input;
             
         $user = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
 
}



$user = new User();









?>