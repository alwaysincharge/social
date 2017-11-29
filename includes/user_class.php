<?php

require_once('database_class.php');

class User {
    

    
       public function create_user($user_input, $password_input, $email_input, $random_input, $status_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO users (username, password, email, img_path, img_name, img_type, random, status) VALUES (?, ?, ?, ?, '', '', ?, ?)");
        
       $stmt->bind_param("ssssss", $username, $password, $email, $img_path, $random, $status);

       // set parameters and execute
        
       $username = $user_input;
        
       $password = $password_input;
        
       $email = $email_input; 
           
       $random = $random_input;
        
       $status = $status_input; 
           
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
    
    
    
    
    
    
    
    
         public function does_random_exist($random_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where random = ? and status = 'sent' limit 1");
        
         $stmt->bind_param("s", $random);

         // set parameters and execute
        
         $random = $random_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function does_random_exist_2($random_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where random2 = ? and status = 'verified' limit 1");
        
         $stmt->bind_param("s", $random);

         // set parameters and execute
        
         $random = $random_input;
          
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
    
    
    
    
    
    
    
    
    
    
             public function does_email_exist($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where email = ? and status = 'verified' limit 1");
        
         $stmt->bind_param("s", $current_user);

         // set parameters and execute
        
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function find_one_user($id_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where id = ? limit 1");
        
         $stmt->bind_param("i", $id);

         // set parameters and execute
        
         $id = $id_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function find_one_user_by_email($email_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where email = ? and status = 'verified' limit 1 ");
        
         $stmt->bind_param("s", $email);

         // set parameters and execute
        
         $email = $email_input;
          
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
    
    
    
    
    
        public function count_users() {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select count(*) as count from users where id > ?");
        
         $stmt->bind_param("i", $username);

         // set parameters and execute
        
         $username = 0;
          
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
    
    
    
    
    
    
    
    
    
    
    
         public function edit_random_2($email_input, $random_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("update users set random2 = ? where email = ? and status = 'verified' limit 1");
        
         $stmt->bind_param("ss", $random, $email);

         // set parameters and execute
        
         $email = $email_input;
             
         $random = $random_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
         public function edit_email($email_input, $user_input, $random_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("update users set email = ?, status = 'sent', random = ? where id = ? limit 1");
        
         $stmt->bind_param("ssi", $email, $random, $user);

         // set parameters and execute
        
         $email = $email_input;
             
         $random = $random_input;
             
         $user = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
    
    
    
    
    
             public function edit_verify($user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("update users set status = 'verified' where id = ? limit 1");
        
         $stmt->bind_param("i", $user);

         // set parameters and execute
        
        
             
         $user = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
          public function edit_password($pass_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("update users set password = ? where id = ? limit 1");
        
         $stmt->bind_param("si", $pass, $user);

         // set parameters and execute
        
         $user = $_SESSION['admin_id'];
             
         $pass = $pass_input;
          
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