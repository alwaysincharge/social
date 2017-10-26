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
        
       $stmt = $database->connection->prepare("select membership.id
       
       from membership 
       
       INNER JOIN groups ON groups.id = membership.group_id
       
       where membership.member_id = ? and membership.deleted = 'live' and groups.deleted = 'live' limit 1");
        
       $stmt->bind_param("i", $user);
        
       $user = $user_input;       
          
       $stmt->execute();
           
       return $stmt;    

       }
   
    
    
    
       public function all_users_groups_except($user_input, $not_group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership where member_id = ? AND group_id != ? and deleted = 'live' order by group_id desc");
        
       $stmt->bind_param("ii", $user, $not_group_id);
        
       $user = $user_input;  
           
       $not_group_id = $not_group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
       public function this_user_this_group($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership where member_id = ? AND group_id = ? and deleted = 'live' limit 1");
        
       $stmt->bind_param("ii", $member_id, $group_id);
        
       $member_id = $member_id_input;  
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
        public function this_user_this_group_alive($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership 
       
       INNER JOIN groups ON groups.id = membership.group_id
       
       where member_id = ? AND group_id = ? and membership.deleted = 'live' and groups.deleted = 'live' limit 1");
        
       $stmt->bind_param("ii", $member_id, $group_id);
        
       $member_id = $member_id_input;  
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function all_members_of_this_group($group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select count(*) as count from membership where group_id = ? and deleted = 'live' ");
        
       $stmt->bind_param("i", $group_id);
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function get_admin($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from membership where group_id = ? and member_id = ? and deleted = 'live' ");
        
       $stmt->bind_param("ii", $group_id, $member_id);
           
       $group_id = $group_id_input;
           
       $member_id = $member_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
       public function all_the_members($group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select count(*) as count from membership where group_id = ? and deleted = 'live' ");
        
       $stmt->bind_param("i", $group_id);
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
    
       public function make_admin($member_id_input, $group_id_input, $admin_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update membership set admin = ? where group_id = ? and member_id = ? ");
        
       $stmt->bind_param("sii",  $admin, $group_id, $member_id);
           
       $group_id = $group_id_input;
           
       $member_id = $member_id_input;
           
       $admin = $admin_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
    
    
       public function remove_member($member_id_input, $group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("update membership set deleted = 'deleted' where group_id = ? and member_id = ? ");
        
       $stmt->bind_param("ii",  $group_id, $member_id);
           
       $group_id = $group_id_input;
           
       $member_id = $member_id_input;
           
       
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
    
    
       public function non_current_user_members_of_group($group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select membership.id as id, membership.admin as admin, membership.group_id as group_id, membership.member_id as member_id, users.username as username, users.img_path as image from membership INNER JOIN users ON users.id = membership.member_id where membership.group_id = ? and membership.deleted = 'live' and membership.member_id != ? ");
        
       $stmt->bind_param("ii", $group_id, $_SESSION['admin_id']);
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }
    
    
    
        public function current_user_members_of_group($group_id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("select membership.id as id, membership.admin as admin, membership.group_id as group_id, membership.member_id as member_id, users.username as username, users.img_path as image from membership INNER JOIN users ON users.id = membership.member_id where membership.group_id = ? and membership.deleted = 'live' and membership.member_id = ? ");
        
       $stmt->bind_param("ii", $group_id, $_SESSION['admin_id']);
           
       $group_id = $group_id_input;
          
       $stmt->execute();
           
       return $stmt;    

       }

    
    

}



$member = new Member();









?>