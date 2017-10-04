<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php

$user_details = $user->find_one_user($_SESSION['admin_id']);

$user_details_result = $user_details->get_result();

$user_info = $user_details_result->fetch_assoc();


?>



<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
    
    
</head>
    
    
    
    
    
<body class="dashboard-body" style="min-height: 110%;">
    
    
    
    
   <nav class="nav-head">
    
    <div class="row nav-main-row">
        
        
        <div class="col-xs-6">
            
            <a class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
                
edit profile
                
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
    
                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                <img id="my_image" src="<?php echo $_SESSION['url_placeholder'] . $user_info['img_path'];  ?>" width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    <div class="row post-editor">
                        
                    
                         <div class="row membership-main">
                        
                         
                        
                             
                             
                             
                        
                             <div class="new-member-1">
                                 
                                 <p class="membership-subtitle">Change username.</p>
                                 
                                 <input id="newusername" value="<?php echo $user_info['username']; ?>" maxlength="100" name="keywords" class="search-main" style="" placeholder="New member username" />
                                 
                                 <button id="edit" class="btn new-group-1" style="">Edit</button> <a id="membererror" style="display: none;"></a>
                                 
                             </div>
                             
                             

                             
                             <p class="membership-subtitle">Change profile picture.</p>
            
                        <!--     <button id="edit" class="btn new-group-1" style="margin-left: 0px;">Upload picture</button>  -->
                             
                             
                             <label id="file1label" for="groupimg" class="btn" style="background: #ddd; font-family: Work Sans; ">Upload group image</label>
                            
                             <input type="file" id="groupimg" class="btn" style="display: none;"/> <br><br>
                             
                             
                             <a id="groupnotif" style="display: none;"></a><br><br>
                             
                             <a id="img_name_notif" style="font-family: Work Sans; display: none;"></a><br><br>
                             
                             <a id="abort" style="text-decoration: underline; display: none; font-family: Work Sans;  
    max-width: 190px;">cancel upload</a>
                             
                             <br><br>
                        
            </div>

            <br><br><br>
            </div>
                    
                    
                    
                    
                    
            </div>
                    
                    
                    
                    

                    
                    

                    </div>
                   

 
                    

                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    
                    
                    <!--
                    
                    
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_this = $get_find_group_by_id_result->fetch_assoc()) { ?>
                        
                       
                    
                 <div class="row group-list-row">
                        
                        
                        <div class="col-xs-2">
                            
                           <img src="<?php echo $group_list_this['img_path']; ?>" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php echo $group_list_this['name']; ?></a><br>                            
                            <a class="group-list-membercount"> <?php
                                                                                            
                                              
$all_members_of_this_group = $member->all_members_of_this_group($group_list_this['id']);

$all_members_of_this_group_result = $all_members_of_this_group->get_result();                                                                  
                                                                                            
                         while($members_this = $all_members_of_this_group_result->fetch_assoc()) { echo $members_this['count'];  }                                                                   
                                                                                            
                                                                                            
                       ?> members</a>
                        
                        </div>
                        
                        
                        
                        <div class="col-xs-3 group-list-notif-1">
                            
                            <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/view.svg" width="30" height="30" style="group-list-notif-2"  />
                            
                        </div>
                        
                        
                    </div>
                    
                        
                 <?php   }
                
                ?>
                    
                    
                    
  <?php                  
                    
$get_all_groups_of_user = $member->all_users_groups_except($_SESSION['admin_id'], $_GET['members']);

$get_all_groups_of_user_result = $get_all_groups_of_user->get_result();

$numRows = $get_all_groups_of_user_result->num_rows;

      
               if ($numRows > 0) {
                   
                   
                    while($row = $get_all_groups_of_user_result->fetch_assoc()) {
                        
                    
                        
                        
                        
                         $get_find_group_by_id = $group->find_group_by_id($row['group_id']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_other = $get_find_group_by_id_result->fetch_assoc()) {  ?>
                        
                        
                        
                        
                        
               
                        
                        
                        
                        
                        <div class="row group-list-row" onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "members/" . $group_list_other['id'];   ?>';">
                        
                        
                        <div class="col-xs-2">
                            
                           <img src="<?php  echo $group_list_other['img_path'];   ?>" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php  echo $group_list_other['name'];   ?></a><br>                            
                            <a class="group-list-membercount">         <?php
                                                                                            
                                              
$all_members_of_this_group = $member->all_members_of_this_group($group_list_other['id']);

$all_members_of_this_group_result = $all_members_of_this_group->get_result();                                                                  
                                                                                            
                         while($members_other = $all_members_of_this_group_result->fetch_assoc()) { echo $members_other['count'];  }                                                                   
                                                                                            
                                                                                            
                       ?> members</a>
                        
                        </div>
                        
                        
                        
                        <div class="col-xs-3 group-list-notif-1">
                            
                            <a class="group-list-notifs">76+</a>
                            
                        </div>
                        
                        
                           </div> 
                        
                        
                        
                        
                        
                        
                        
                  <?php  }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    }
                   
                   

               } else {
                   
                   
                   
               } ?>
                    
                    
                    
                    

                    
                    
                    -->
                    
               
                
                </div>
                
            </div>
    
    
    
</body>
    
 
    
</html>


<script type="text/javascript" src="../../javascript/jquery-3.2.1.min.js"></script>
    


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
    
    
    
    
    
    
    
    

$("#edit").on('click', function() {
    
  
     newusername = $("#newusername").val();
    
    
    if (alphanumeric(newusername)) {
        
        var alpha_username = true;
        
    } else {
        
        var alpha_username = false;
        
        $("#membererror").hide(0);    
        
        $("#membererror").show(300);
        
        $("#membererror").html("Username must be alpha-numeric.");
        
    }

    
    
    
    if (alpha_username) {
        
         if (newusername.trim().length != 0) {
        
        var user_filled = true;
        
    } else {
        
        $("#membererror").hide(0);    
        
        $("#membererror").show(300);
        
        $("#membererror").html("Don't leave the space blank.");
        
        var user_filled = false;
        
    }
        
    }

    
   
    
    
    
    
    if (user_filled) {

        if ( (newusername.trim().length > 16) || (newusername.trim().length < 6) ) {
        
            
        $("#membererror").hide(0);    
             
        $("#membererror").show(300);
        
        $("#membererror").html("Username should be between 6 and 16 characters.");
            
        
        } else {
            
            var user_length_check = true;
            
        }
    
    }
    
    
    
    if (user_length_check) {
        
        edit_username(newusername.trim());
        
    }
    
    
});



    
        
function edit_username(username) {
    
    
   
    $.ajax({
        
       data: {"newusername": 1, "username": username},
       dataType: 'text',
       url: url_placeholder + 'edit_username',
       type: "POST"
        
    }).done(function(data) {
        
    
        
           if (data == 1) {
                
                    
                
                
            } else if (data == 2) {
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("That username already exists. Try again.");
                
                
            } else if (data == 3) {
                
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("Change successful.");
                
                
            }    else  {
                
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("Poor connection. Try again later.");

                
            }
        
        
        
        
        
        
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#membererror").hide(0);    
             
                       $("#membererror").show(300);
        
                       $("#membererror").html("Poor connection. Try gain later.");
        
    });
    
    
}
    
    
    
    
    
    
    
    
    
function _( el ) {
         return document.getElementById( el );
 }
 $( '#groupimg' )
         .change( function() {
                 uploadFile();
         } );

 function uploadFile() {
     

     
         file = _( 'groupimg' )
                 .files[ 0 ];
     
     if (file.name.length > 30) {
         
         temp_name = file.name.substr(0, 29) + "...";
         
     } else if (file.name.length <= 30) {
         
         temp_name = file.name;
         
     } else {}
     
     
   
         if ( file.size <= 1000000 ) {
                 file_size_validation = true;
         } else {
                 file_size_validation = false;
                 $( "#groupnotif" )
                         .show().html( temp_name + " is bigger than 1MB. Try again." );
         }
         if ( file_size_validation ) {
                 if ( ( file.type == "image/jpeg" ) || ( file.type == "image/jpg" ) || ( file.type == "image/png" ) || ( file.type == "image/gif" ) ) {
                         file_type_validation = true;
                 } else {
                         file_type_validation = false;
                         $( "#groupnotif" )
                                 .show().html( "Your file has to be an image of type jpeg, jpg, png or gif." );
                 }
         }
         if ( file_type_validation && file_size_validation ) {
                 send_image();
         }

         function send_image() {
                 var formdata = new FormData();
                 formdata.append( 'groupimg', file );
                  ajax1 = new XMLHttpRequest();
                 ajax1.upload.addEventListener( "progress", progressHandler, false );
                 ajax1.addEventListener( "load", completeHandler, false );
                 ajax1.addEventListener( "abort", abortHandler, false );
                 ajax1.open( "POST", url_placeholder + 'backend/edit_profilepic.php' );
                 ajax1.send( formdata );
         }

         function progressHandler( event ) {
                 var percent = ( event.loaded / event.total ) * 100;
             
                 $( "#groupnotif" )
                         .show().html( "Uploading  your image (" + Math.round( percent ) + "%)" );
             
             
                 $( "#img_name_notif" )
                         .show().html( temp_name );
             
             if (percent == 100) {
                 
                 $( "#groupnotif" )
                         .show().html( "Completing..." );
                 
             }
             
                          $( "#abort" )
                         .show();
         }

         function completeHandler( event ) {
             
             
             result = event.target.responseText;
             
             console.log(result)
             
             $( "#groupnotif" )
                         .show().html( "Upload succesful." );
             
             
             imageJson = JSON.parse(result);
             
             
             
             image_status = imageJson[0];
             
             
             
             image_new_path = imageJson[1];
             
             
             
             $('#my_image').attr('src', "<?php echo $_SESSION['url_placeholder']; ?>" + image_new_path);
             
             $( "#img_name_notif" )
                         .hide();
             
             
             
             $( "#abort" )
                         .hide();
             
               
         }

         function errorHandler( event ) {
             
             send_image();
            
         }

         function abortHandler( event ) {
             
            
             
                 $( "#groupnotif" )
                         .html( "Upload cancelled. Please try again." );
             
             
        
         }
 }
    
    
    
    
    $("#abort").on('click', function() {
    
    
   ajax1.abort(); 
    
      $("#groupimg").val("");  
        
        
        $( "#img_name_notif" )
                         .hide();
             
             
             
             $( "#abort" )
                         .hide();
    
    });
    

</script>