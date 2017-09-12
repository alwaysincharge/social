<?php
 
$json = file_get_contents('http://juicer.herokuapp.com/api/article?url=' . $_POST['relay']);

 
$obj = json_decode($json);


$array = json_encode($obj);


print_r($array);


?>