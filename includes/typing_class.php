<?php

require_once('database_class.php');

class Typing {
    
    
       public function send_typing($group_input, $owner_id_input, $time_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO typing (group_id, owner, timeinput) VALUES ( ?, ?, ?)");
        
       $stmt->bind_param("iis", $group, $owner_id, $time);

       $group = $group_input;
           
       $time = $time_input;
           
       $owner_id = $owner_id_input;
           
       $stmt->execute();
           
       return $stmt;    

       } 
    
    
    
    
    
       public function get_typing($group_input2) {

       global $database;
        
       $stmt = $database->connection->prepare("select * from typing where group_id = ? and ( (? - timeinput) <= 2)  order by id desc limit 1");
        
       $stmt->bind_param("ii", $group2, $time2);
           
       $time2 = time();

       $group2 = $group_input2;
           
       $stmt->execute();
           
       return $stmt;    

       } 
    
    
}
    


$typing = new Typing();

?>
    
