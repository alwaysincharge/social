<?php  include_once('../includes/all_classes_and_functions.php');  ?>




<?php

    $fileName = $_FILES['file1']['name'];
    $fileTmpLoc = $_FILES['file1']['tmp_name'];
    $fileType = $_FILES['file1']['type'];
    $fileSize = $_FILES['file1']['size'];
    $fileerrorMsg = $_FILES['file1']['error'];
    
    
    $filePath = '../frontend/html/pages/show/' . $_SESSION['admin_id'] . time();

    if  (move_uploaded_file($fileTmpLoc, $filePath)) {     
         
         
    $attach_array = array("attach_path"=> $filePath, "attach_name"=> $fileName, "attach_type"=>$fileType, "post_type"=>"attach");     
    
    echo json_encode(array_values($attach_array));
         
    }
    
    
    
    exit();



?>