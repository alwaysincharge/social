<?php


$string = $_POST['text'];

$url = "/(http\:\/\/|https\:\/\/|ftp\:\/\/|ftps\:\/\/|www\.)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

preg_match_all($url, $string, $match);
    
    
    $matchUnique = array_unique($match[0]);
    
    
    
    foreach ($matchUnique as $matchUniqueIterate) {
        
        
         if(!isset($urlArrayIndex)) {
             
             $urlArrayIndex = 0;
             
         }
        
        
        if (substr($matchUniqueIterate, 0, 4) === "www.") {
        
             $attach_array[$urlArrayIndex] = str_replace("www.", "http://", $matchUniqueIterate);   
             
             $urlArrayIndex++;
            
        } else {
             
             $attach_array[$urlArrayIndex] = $matchUniqueIterate;  
             
             $urlArrayIndex++;
    } 
        
        
    }
    
if (isset($attach_array))  {
    
    
    echo($attach_array[0]);
    
    
}

?>