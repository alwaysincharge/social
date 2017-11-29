<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>



<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
    
    
</head>
    
    
    
    
    
<body class="centered" style="">
    
    
<img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/tent.svg" width="130" height="130" style="display: table; margin: 0 auto;"  />
    
    
     <p class="login-logo">friday camp.</p>
    
    
    <p style="width: 300px; display: table; margin: 0 auto; margin-top: 10px; font-family: georgia; font-size: 16px;">Let's get your account back. If you've verified your email address earlier, fill in your email below.</p>
    
    
    
    <div style="display: table; margin: 0 auto; padding-right: 10px; padding-top: 30px;">
    
            <input id="newemail" maxlength="100" name="keywords" class="search-main" placeholder="write your verified email" />
        
        
            <button id="editemail" class="btn new-group-1" style="">Send</button><br><br> <a id="membererrore" style="display: none; font-family: georgia;"></a>
    
    </div>
    

    
     <p style="width: 300px; display: table; margin: 0 auto; margin-top: 50px; font-family: georgia; font-size: 16px;">If you haven't verified your email before, message atsu at atsunewjoint@gmail.com for some help.</p>
    
    
</body>
    
 
    
</html>



<script>







    
var url_placeholder = "<?php echo $_SESSION['url_placeholder']; ?>";
    
    
    
function alphanumeric(inputtxt)  {  
    
    var letterNumber = /^[0-9a-zA-Z]+$/;  
    
    if(inputtxt.match(letterNumber))  {  
    
        return "true";  
    
    }  
    
    else  {   
    
        return false;   
    }  
    
} 
    
    
    
    
 
    
    
    
    
    
    
    // Function to check email validation    
function ValidateEmail(mail)  { 
    
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  {  
      
    return true;
      
  }  else {
      
    return false;  
  }
    
       
} 
    
    
 
    
    
    
    
    
    
    
$("#editemail").on('click', function() {
    
  
     newemail = $("#newemail").val().trim();
    
    
    if (ValidateEmail(newemail)) {
        
        var valid_email = true;
        
    } else {
        
        var valid_email = false;
        
        $("#membererrore").hide(0);    
        
        $("#membererrore").show(300);
        
        $("#membererrore").html("That is not a valid email address.");
        
    }

    
    
    
    if (valid_email) {
        
         if (newemail.trim().length != 0) {
        
        var email_filled = true;
        
    } else {
        
        $("#membererrore").hide(0);    
        
        $("#membererrore").show(300);
        
        $("#membererrore").html("Don't leave the space blank.");
        
        var email_filled = false;
        
    }
        
    }

    
   
    
    
    
    
    if (email_filled) {

        if ( (newemail.trim().length > 400) || (newemail.trim().length < 6) ) {
        
            
        $("#membererrore").hide(0);    
             
        $("#membererrore").show(300);
        
        $("#membererrore").html("Email should be between 6 and 400 characters.");
            
        
        } else {
            
            var email_length_check = true;
            
        }
    
    }
    
    
    
    if (email_length_check) {
        
        edit_email(newemail.trim());
        
    }
    
    
});

    
    
 
 
            
function edit_email(email) {
    
   // alert(email)
    
   
    $.ajax({
        
       data: {"newemail": 1, "email": email},
       dataType: 'text',
       url: url_placeholder + 'password',
       type: "POST"
        
    }).done(function(data) {
        
    console.log(data.trim())
        
           if (data == 1) {
                
                    
                
                
            } else if (data == 404) {
                
                    $("#membererrore").hide(0);    
             
                    $("#membererrore").show(300);
        
                    $("#membererrore").html("This email address has not been verified or does not exist.");
                
                
            } else if (data == 3) {
                
                
                    $("#membererrore").hide(0);    
             
                    $("#membererrore").show(300);
        
                    $("#membererrore").html("Successful. You should receive a helping email soon.");
                
                
            }    else  {
                
                
                    $("#membererrore").hide(0);    
             
                    $("#membererrore").show(300);
        
                    $("#membererrore").html("Poor connection. Try again later.");

                
            }
        
        
        
        
        
        
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#membererrore").hide(0);    
             
                       $("#membererrore").show(300);
        
                       $("#membererrore").html("Poor connection. Try gain later.");
        
    });
    
    
}
    





</script>