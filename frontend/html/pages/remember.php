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
    
           
      $newuser = $user->does_random_exist_2(trim($_GET['random'])); 
    
    
    
      $newuser_result = $newuser->get_result();
    
    
    
      if($newuser_result->num_rows == 1) {
    
      $row = $newuser_result->fetch_assoc();
    
   //   $_SESSION['admin_id'] = $row['id'];
          
   //   $user->edit_random_2($row['email'], "");
          
   //   redirect_to("https://fridaycamp.com/profile"); ?> 
    
    
        <p style="width: 300px; display: table; margin: 0 auto; margin-top: 10px; font-family: georgia; font-size: 16px; padding-left: 20px;">Fill the form below to change your password.</p><br><br>
    
          
                            <div class="new-member-1" style="display: table; margin: 0 auto; padding-left: 60px;">
                                 
                                 <p class="membership-subtitle">Change password.</p>
                                 
            
                                 
                                 <input id="pass2" maxlength="100" type="password" name="keywords" class="search-main" style="" placeholder="New password" /><br><br>
                                 
                                 
                                 <input id="pass3" maxlength="100" type="password" name="keywords" class="search-main" style="" placeholder="Repeat password" />
                                 
                                 <button id="edit2" class="btn new-group-1" style="">Edit</button> <a id="membererror2" style="display: none; margin-top: 10px; font-family: georgia;"></a>
                                 
                                
                                
                             </div>  
        
      
  <?php  ?>
    

     
     <?php } else { ?>
          
        <p style="width: 300px; display: table; margin: 0 auto; margin-top: 30px; font-family: georgia; font-size: 16px;">The verification key has already been used or it does not exist. Try again. </p>
    
    
 <p style="width: 300px; display: table; margin: 0 auto; margin-top: 30px; font-family: georgia; font-size: 16px;"><a href="https://fridaycamp.com/nogroups">Go to Friday Camp.</a> </p>
    
    <?php  }
    
    
     ?>
    
    
</body>
    
 
    
</html>


<script>



    
    url_placeholder = "<?php echo $_SESSION['url_placeholder']; ?>";
    
        
    
function alphanumeric(inputtxt)  {  
    
    var letterNumber = /^[0-9a-zA-Z]+$/;  
    
    if(inputtxt.match(letterNumber))  {  
    
        return "true";  
    
    }  
    
    else  {   
    
        return false;   
    }  
    
} 
    
    
    
    
    
    
    
    
    
 

$("#edit2").on('click', function() {
    
  
    
    
     pass2 = $("#pass2").val().trim();
    
     pass3 = $("#pass3").val().trim();
    
    


    
 
    
    
    
    
    
    if (alphanumeric(pass2)) {
        
        var alpha_pass = true;
        
    } else {
        
        var alpha_pass = false;
        
        $("#membererror2").hide(0);    
        
        $("#membererror2").show(300);
        
        $("#membererror2").html("Passwords must be alpha-numeric.");
        
    }

    
    
    

    
    
    
    if (alphanumeric(pass3)) {
        
        var alpha_pass = true;
        
    } else {
        
        var alpha_pass = false;
        
        $("#membererror2").hide(0);    
        
        $("#membererror2").show(300);
        
        $("#membererror2").html("Passwords must be alpha-numeric.");
        
    }
    
    
    
    
    
    
    
    
    if (alpha_pass) {
        
        
          if ( (pass2.trim().length != 0) || (pass3.trim().length != 0)) {
        
         pass_filled = true;
        
    } else {
        
        $("#membererror2").hide(0);    
        
        $("#membererror2").show(300);
        
        $("#membererror2").html("Don't leave the space blank.");
        
         pass_filled = false;
        
    }  
        
        
    }
        

        
    

    
   
    
    
    
    
    if (pass_filled) {

        if ( (pass2.trim().length > 16) || (pass2.trim().length < 6) || (pass3.trim().length > 16) || (pass3.trim().length < 6) ) {
        
            
        $("#membererror2").hide(0);    
             
        $("#membererror2").show(300);
        
        $("#membererror2").html("Passwords should be between 6 and 16 characters.");
            
        
        } else {
            
             pass_length_check = true;
            
        }
    
    }
    
    
    
    if (pass_length_check) {
        
        
        if (pass2 == pass3) {
            
           
            
            $("#membererror2").hide(0);    
        
        $("#membererror2").show(300);
        
        $("#membererror2").html("");
            
             edit_password(pass2);
            
        } else {
            
            
                   
        $("#membererror2").hide(0);    
             
        $("#membererror2").show(300);
        
        $("#membererror2").html("The two new passwords have to be identical.");
       
            
            
        }
        
        
        
        
        
        
    }
    
    
});

    
    
  
    
    rand_string = "<?php echo $_GET['random']; ?>";
    
    
            
function edit_password(pass2) {
    
    
   
    $.ajax({
        
       data: {"password": 1, "random": rand_string, "pass2": pass2},
       dataType: 'text',
       url: url_placeholder + 'change',
       type: "POST"
        
    }).done(function(data) {
        
    
       // alert(data.trim())
        if (data == 100) {
                
                
                    $("#membererror2").hide(0);    
             
                    $("#membererror2").show(300);
        
                    $("#membererror2").html("Change successful. Visit Friday Camp now.");
            
            
            
                      
                    
    
                    $("#pass2").val("");
    
                    $("#pass3").val("");
    
                
            window.location.href = "https://fridaycamp.com/" + "nogroups";
                
            }    else if (data == 2) {
                
                
                    $("#membererror2").hide(0);    
             
                    $("#membererror2").show(300);
        
                    $("#membererror2").html("This session key has expired. Refresh the page.");

                
            }
        
        
        
        
        
        else  {
                
                
                    $("#membererror2").hide(0);    
             
                    $("#membererror2").show(300);
        
                    $("#membererror2").html("Poor connection. Try again later.");

                
            }
        
        
        
        
        
        
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#membererror2").hide(0);    
             
                       $("#membererror2").show(300);
        
                       $("#membererror2").html("Poor connection. Try again later.");
        
    });
    
    
}
    


</script>




     
    