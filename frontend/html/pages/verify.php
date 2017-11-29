<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>



<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
    
    
</head>
    
    
    
    
    
<body class="centered">
    
    
<img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/tent.svg" width="130" height="130" style="display: table; margin: 0 auto;"  />
    
    
     <p class="login-logo">friday camp.</p>
    
    
    
     <?php
    
           
      $newuser = $user->does_random_exist(trim($_GET['random'])); 
    
    
    
      $newuser_result = $newuser->get_result();
    
    
    
      if($newuser_result->num_rows == 1) {
    
      $row = $newuser_result->fetch_assoc();
    
      $_SESSION['admin_id'] = $row['id'];
          
      $user->edit_verify($row['id']);
          
    ?>
     
    
    
    
    <p style="width: 300px; display: table; margin: 0 auto; margin-top: 10px; font-family: georgia; font-size: 16px;">Dear '<?php echo $row['username']; ?>', thanks for verifying your account. You can now receive important information from us.</p>
    
    
    <p style="width: 300px; display: table; margin: 0 auto; margin-top: 30px; font-family: georgia; font-size: 16px;">Also, when you forget your password or username, we will send help to this email address: "<?php echo $row['email']; ?>". Thanks so much </p>
    
    
    <p style="width: 300px; display: table; margin: 0 auto; margin-top: 30px; font-family: georgia; font-size: 16px;"><a href="https://fridaycamp.com/nogroups">Go to Friday Camp.</a> </p>
    
     
     <?php } else { ?>
          
        <p style="width: 300px; display: table; margin: 0 auto; margin-top: 30px; font-family: georgia; font-size: 16px;">The verification key has already been used or it does not exist. Try again. </p>
    
    
 <p style="width: 300px; display: table; margin: 0 auto; margin-top: 30px; font-family: georgia; font-size: 16px;"><a href="https://fridaycamp.com/nogroups">Go to Friday Camp.</a> </p>
    
    <?php  }
    
    
     ?>
    
    
</body>
    
 
    
</html>

