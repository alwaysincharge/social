<?php  include_once('../../../includes/all_classes_and_functions.php');



if ( isset($_SESSION['admin_id']) ) {  redirect_to($_SESSION['url_placeholder'] . 'nogroups');  } 



?>


<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.">
    
   
    
    <?php include('../templates/head_info.php'); ?>
    
    
<script type="text/javascript">
    
    
    
    
        
    $( document ).ready( function() {
       
       $("#hide-box").hide();
        
        
        
        
    } );
    
    </script>
</head>
    
    
  
    
<body class="login-body">
    
    
    
    <div class="centered" style="padding-bottom: 60px;">
        
        
        
        
        
        <div class="row centered">
        
            
            
            <div class="col-xs-6">
            
                
                <div class="login-half" style="background: white; padding: 50px; max-width: 500px; float: right; min-height: 430px;">
                
                
    <p class="login-logo">friday camp.</p>
    
    
    <p class="login-sub-1">Talk to people, you already know.</p>
        
        
        
        <input id="username" maxlength="16" class="login-field-1" type="text" placeholder="username">
        
        
        <input id="password1" maxlength="16" class="login-field-1" type="password" placeholder="password">
        
        
                    
                    <div id="hide-box" style="display: none;">
                    
                    
        <input id="password2" maxlength="16" class="login-field-1" type="password" placeholder="repeat password"> 
        
        
        <input  id="email" maxlength="400" class="login-field-1" type="text" placeholder="email (optional)">
        
                    
                    
                    </div>
                    
        
        
        <p id="loginerror" class="login-error-1"></p>
        
        
        
        <div class="login-button-box-1">
        
        <button id="signup" class="btn login-button-1">sign up</button>
        
        <button id="login" class="btn login-button-1" style="margin-left: 10px;">login</button><br><br>
        
        <a href="<?php  echo $_SESSION['url_placeholder']; ?>forgot" style="font-family: georgia;">Forgot password or username? Click here.</a>
            
        </div>
    
    
                
                </div>
            
            
            </div>
            
            
            
            
            
            
            <div class="col-xs-6">
            
                            <div class="login-half" style="background: white; padding: 30px; max-width: 500px; height: 430px;">
                
   
                                <div class="row" style="margin-bottom: 20px;">
                                
                                
                                    
                                    <div class="col-xs-2">
                                    
                                    
                                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/log1.svg" width="30" height="30" class="current-user-img"  />
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="col-xs-10">
                                    
                                        <p style="font-family: Eczar; font-size: 22px; font-weight: bold;">Talk</p>
                                        
                                        
                                        <p style="font-family: Georgia; font-size: 15px;">Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.</p>
                                    
                                    </div>
                                
                                
                                
                                </div>
    
    
                                
                                
                                
                                
                                
                                
                                   
                                <div class="row" style="margin-bottom: 20px;">
                                
                                
                                    
                                    <div class="col-xs-2">
                                    
                                    
                                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/log2.svg" width="30" height="30" class="current-user-img"  />
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="col-xs-10">
                                    
                                        <p style="font-family: Eczar; font-size: 22px; font-weight: bold;">Organize</p>
                                        
                                        
                                        <p style="font-family: Georgia; font-size: 15px;">Use a poll to assess the group or let all the group members plan a party with the to-do list.</p>
                                    
                                    </div>
                                
                                
                                
                                </div>
    
    
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                   
                                <div class="row">
                                
                                
                                    
                                    <div class="col-xs-2">
                                    
                                    
                                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/log3.svg" width="30" height="30" class="current-user-img"  />
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="col-xs-10">
                                    
                                        <p style="font-family: Eczar; font-size: 22px; font-weight: bold;">Keep In Touch</p>
                                        
                                        
                                        <p style="font-family: Georgia; font-size: 15px;">Email atsu at atsunewjoint@gmail.com when you have a question or when you forget your login info. We are here to help.</p>
                                    
                                    </div>
                                
                                
                                
                                </div>
    
    
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                
                </div>
            
            
            </div>
        
        
        </div>
    
    </div>
    
    
    
    
    
</body>
    
    
    
    
    
</html>    



<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    


<script type="text/javascript">
    
    
    
    
        
    $( document ).ready( function() {
       
       $("#hide-box").hide();
        
        
        
        
    } );
    
    
    
    
var url_placeholder = "<?php echo $_SESSION['url_placeholder'];  ?>";
    
    
// Function to check letters and numbers  
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
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


// When user clicks the login button...
$("#login").on("click", function(){
      
    
        
    var username = $("#username").val().trim();
    
    var password1 = $("#password1").val().trim();
    
    var password2 = $("#password2").val().trim();  
    
    
    
    $("#hide-box").hide(200);
    
    
    
    
    
    if ((username.trim().length != 0) && (password1.trim().length != 0)) {
        
        var both_fields_filled = true;
        
    } else {
        
        $("#loginerror").hide(0);    
        
        $("#loginerror").show(300);
        
        $("#loginerror").html("None of the fields can be left blank.");
        
    }
    
    
    
    
    if (both_fields_filled) {

        if ((username.trim().length < 6) || (password1.trim().length < 6) || (username.trim().length > 16)  ||  (password1.trim().length > 16) ) {
        
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password cannot be shorter than 6 or bigger than 12 characters.");
            
        
        } else {
            
            var login_length_check = true;
            
        }
    
    }
    
    
    
    
    if (login_length_check) {
        
        
      var username_alphanum = alphanumeric(username);
        
      var password1_alphanum = alphanumeric(password1);
        
          
        if (username_alphanum && password1_alphanum) {

              var login_is_alphanum = true;
        
        } else {
            
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password must contain only letters and or numbers. No spaces or symbols.");
            
        }
           
    }
    
    
    
    
    
    if (login_is_alphanum  && both_fields_filled && login_length_check) {
        
        
        login_function(username, password1);
        
    }
    
    
    
    
    
    
});
    
    
    
    
    
    
function login_function(username, password1) {
   
    $.ajax({
        
       data: {"login": 1, "username": username, "password": password1},
       dataType: 'text',
       url: url_placeholder + 'backend/sign_in.php',
       type: "POST"
        
    }).done(function(data) {
        
    
        
            if (data == 2) {
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Wrong credentials. Try again.");
                
                
            } else if (data == 3) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("The request has to be of type POST.");
                
                
            } else if (data == 5) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Username and password fields cannot be shorter than 6 or bigger than 16 characters. Email cannot exceed 345 characters.");
                
                
            } else if (data == 4) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Username and password can only be made up of numbers or letters. No spaces or symbols.");
                
                
            }    else  {
                
                
                    var jsonLogin = JSON.parse( data );
            
                    var login_status =  jsonLogin[0];
            
                    var login_session_id =  jsonLogin[1];
                
                    if (login_status == 1) {
                        
                          window.location.href = jsonLogin[2] + "nogroups";
                        
                    } else {
                        
                       $("#loginerror").hide(0);    
             
                       $("#loginerror").show(300);
        
                       $("#loginerror").html("Error. Try again later.");
                
                        
                    }
                
            }
        
        
        
        
        
        
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#loginerror").hide(0);    
             
                       $("#loginerror").show(300);
        
                       $("#loginerror").html("Poor connection. Try again later.");
        
    });
    
    
}







    
$("#signup").on("click", function() {



        
    var username = $("#username").val().trim();
    
    var password1 = $("#password1").val().trim();
    
    var password2 = $("#password2").val().trim();  
    
    var email = $("#email").val().trim();

    
    $("#hide-box").show(200);
    
    
    
    
    
    
    
    if ((username.trim().length != 0) && (password1.trim().length != 0) && (password2.trim().length != 0)) {
        
        var both_fields_filled_register = true;
        
    } else {
        
        $("#loginerror").hide(0);    
        
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password fields cannot be left blank.");
        
    }
    
    
    
    
    if (both_fields_filled_register) {

        if ((username.trim().length < 6) || (password1.trim().length < 6) || (username.trim().length > 16)  ||  (password1.trim().length > 16)  ||  (email.trim().length > 400) ) {
        
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password fields cannot be shorter than 6 or bigger than 16 characters. Email cannot exceed 400.");
            
        
        } else {
            
            var login_length_check_register = true;
            
        }
    
    }
    
    
    
    
    
    if (login_length_check_register) {
        
        
      var username_alphanum_register = alphanumeric(username);
        
      var password1_alphanum_register = alphanumeric(password1);
        
          
        if (username_alphanum_register && password1_alphanum_register) {

              var login_is_alphanum_register = true;
        
        } else {
            
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password must contain only letters and or numbers. No spaces or symbols.");
            
        }
           
    }
    
    
    
    
    if (login_is_alphanum_register) {
        
        if ( $("#password1").val() == $("#password2").val() ) {
            
            var passwords_equal = true;
            
        } else {
            
            
            $("#loginerror").hide(0);    
             
            $("#loginerror").show(300);
        
            $("#loginerror").html("Passwords have to be identical.");
            
            
        }
            
    }
    
    
    
    
    
    if (login_is_alphanum_register  && both_fields_filled_register && login_length_check_register && passwords_equal) {
        
        
        
        
        
        if ( email.trim().length == 0 ) {
            
            sign_up_function(username, password1, password2, null);
            
        } else {
            
                var real_email = ValidateEmail(email);
            
                if (real_email) {
        
                    sign_up_function(username, password1, password2, email.trim());
        
                 } else {
        
        
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Your email is not valid.");
        
                }
        }
          
      }
    
    
    

    
    
});




    
function sign_up_function(username, password1, password2, email) {
   
    $.ajax({
        
        
       data: {"register": 1, "username": username, "password1": password1, "password2": password2, "email": email},
       dataType: 'text',
       url: url_placeholder + 'sign_up',
       type: "POST"
        
        
    }).done(function(data) {
        
  // alert(data.trim())
        
            if (data == 2) {
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Sorry, username already exists.");
                
                
            } else if (data == 3) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("The request has to be of type POST.");
                
                
            } else if (data == 5) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Username and password fields cannot be shorter than 6 or bigger than 16 characters. Email cannot exceed 345 characters.");
                
                
            } else if (data == 4) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Username and password can only be made up of numbers or letters.");
                
                
            }  else if (data == 6) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("You entered an invalid email address.");
                
                
            }   else if (data == 7) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Passwords have to be identical.");
                
                
            }    else if (data == 404) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("This email address has already been used and verified. Try another.");
                
                
            }   
        
        
        
        
        
        else  {
                
                
                    var jsonRegister = JSON.parse( data );
            
                    var register_status =  jsonRegister[0];
            
                    var register_session_id =  jsonRegister[1];
                
                    if (register_status == 1) {
                        
                        
                        window.location.href = jsonRegister[2] + "nogroups";
                        
                        
                    } else {
                        
                        
                       $("#loginerror").hide(0);    
             
                       $("#loginerror").show(300);
        
                       $("#loginerror").html("Poor connection. Try gain later.");
                        
                    }
                
            }
               

        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
        
                       $("#loginerror").hide(0);    
             
                       $("#loginerror").show(300);
        
                       $("#loginerror").html("Poor connection. Try gain later.");
        
    });
    
    
}

    



</script>
    
    
    