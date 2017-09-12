<?php

require_once('database_class.php');

class Member {
    

    
       public function create_member($group_input, $member_input, $admin_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO membership (group_id, member_id, deleted, admin) VALUES (?, ?, ?, ?)");
        
       $stmt->bind_param("iiss", $group, $member, $deleted, $admin);
        
       $group = $group_input;
        
       $member = $member_input;
           
       $admin = $admin_input;
           
       $deleted = "live";       
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function all_users_groups($user_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership where member_id = ? order by group_id desc limit 1");
        
       $stmt->bind_param("i", $user);
        
       $user = $user_input;       
          
       $stmt->execute();
           
       return $stmt;    

       }
   
    
    
    
       public function all_users_groups_except($user_input, $not_group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership where member_id = ? AND group_id != ? order by group_id desc");
        
       $stmt->bind_param("ii", $user, $not_group_id);
        
       $user = $user_input;  
           
       $not_group_id = $not_group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function this_user_this_group($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership where member_id = ? AND group_id = ? limit 1");
        
       $stmt->bind_param("ii", $member_id, $group_id);
        
       $member_id = $member_id_input;  
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function all_members_of_this_group($group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select count(*) as count from membership where group_id = ?");
        
       $stmt->bind_param("i", $group_id);
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }


}



$member = new Member();









?>