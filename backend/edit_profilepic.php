<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php


    $fileName = $_FILES['groupimg']['name'];
    $fileTmpLoc = $_FILES['groupimg']['tmp_name'];
    $fileType = $_FILES['groupimg']['type'];
    $fileSize = $_FILES['groupimg']['size'];
    $fileerrorMsg = $_FILES['groupimg']['error'];
    
    
    $filePath =  '../frontend/html/pages/profilepic/' . $_SESSION['admin_id'] . "and" . ( time() );

    $img_path =  'frontend/html/pages/profilepic/' . $_SESSION['admin_id'] . "and" . ( time() );



    if (empty($_FILES['groupimg']['name']))  {
        
        
         echo 1; exit();
        
            
    }  





    if( ($fileType != "image/jpg" && $fileType != "image/png" && $fileType != "image/jpeg"
         
            
        && $fileType != "image/gif")  )  { 
             

        echo 2; exit();
             
    } 
    
    
    
    
    $image_info = getimagesize($_FILES["groupimg"]["tmp_name"]);
    
        if (!$image_info) {
            
        
        echo 3; exit();
            
    }
    


    if  (move_uploaded_file($fileTmpLoc, $filePath)) {
        
        $user->edit_profilepic($img_path, $_SESSION['admin_id']);
        
        //$profile = mysqli_insert_id($database->connection);
        
        
        
    
                      
          $attach_array = array("status"=> 1, "attach_path"=> $img_path, "attach_name"=> $fileName, "attach_type"=>$fileType);     
    
          echo json_encode(array_values($attach_array));  
            
        

            
    

        
         
    }



    exit();









?>