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
    
    <meta name="description" content="Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body class="dashboard-body" style="min-height: 110%;">
    
    
    
    
   <nav class="nav-head">
    
    <div class="row nav-main-row" >
        
        
        <div class="col-xs-6">
            
            <a href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">create group</span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6" >
                
            
            <div style="float: right;">
            
                    
                
                
                 <a data-toggle="tooltip" data-placement="bottom" title="important posts" href="<?php echo $_SESSION['url_placeholder'];  ?>important"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/import.svg" width="30" height="30" class="current-user-img"  /> <span style="font-family: Work Sans;" id="alert_one"></span></a>
                
                
                <a data-toggle="tooltip" data-placement="bottom" title="replies" href="<?php echo $_SESSION['url_placeholder'];  ?>reply"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/replypage.svg" width="30" height="30" class="current-user-img"  /> <span style="font-family: Work Sans;" id="alert_three"></span></a>
                
                
                <a data-toggle="tooltip" data-placement="bottom" title="group requests" href="<?php echo $_SESSION['url_placeholder'];  ?>add"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/notification.svg" width="30" height="30" class="current-user-img"  /> <span style="font-family: Work Sans;" id="alert_two"></span></a>
                
                

                
                      <div class="dropdown">
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
                    
                    
                    <div class="dropdown-content-2">
                        <p style="font-size: 15px; font-family: Work Sans;"><i><?php echo $user_info['username'];  ?></i></p>
                        
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>profile" style="font-size: 15px; font-family: Work Sans;">Edit profile</a> //
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>logout" style="font-size: 15px; font-family: Work Sans;">Logout</a>
                    </div>
            
                </div>
                
                
                
                
                
                
                
                
                
            

            
            
            </div>
            

                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                    <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    <div class="row post-nogroups">
                        
                        
                        
                        <div style="width: 350px; display: table; margin: 0 auto;">
                            
                            
                        <p class="newgroups-text">Create a new group</p>
                            
                            
                        <input id="groupname" class="newgroup-field-1" maxlength="60" type="text" placeholder="group name">
        
        
                        <textarea id="groupdesc" class="newgroup-field-2" maxlength="140" type="password" placeholder="group description"></textarea><br><br>
        

                          
                            
                            
                            
                            
                                      <p class="membership-subtitle" style=" margin-left: 10px;">Add group picture (optional).</p>
            
                        <!--     <button id="edit" class="btn new-group-1" style="margin-left: 0px;">Upload picture</button>  -->
                             
                             
                             <label id="file1label" for="groupimg" class="btn" style="background: #ddd; font-family: Work Sans; margin-left: 10px;">Upload group image</label>
                            
                             <input type="file" id="groupimg" class="btn" style="display: none;"/> <br><br>
                             
                             
                             <a style=" padding-left: 10px; display: none;" id="groupnotif"></a><br><br>
                             
                             
                             
                             <a id="abort" style="margin-left: 10px; text-decoration: underline; display: none; font-family: Work Sans;  
    max-width: 190px;">cancel upload</a>
                             
                            
                            
                        <p class="newgroups-text-2" id="progressMessage"></p>
                            
                         <p class="newgroups-text-3" id="groupnotif"></p>
                            
                    
                            
                            
                        <a style="margin-top: -40px;">
                
                        <button id="groupsubmit" class="btn new-group-1">   
                

                    
                        Submit</button>
            
                        </a>
                
                        </div>
                        
                    
                        
                        
                        
                    
                    </div>
                    
                    
                    
                    
                
                    
                    
                </div>
                    
                    
                    
                    

                    
                    

                    </div>
                   

 
                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    
                    
                    
                    
                    
                  
                    
                              
                  <div class="row" style="width: 200px;">
                        
                        
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/chatting.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/typography.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                      
                      
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/camera.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    <div class="row" style="width: 200px; margin-top: 20px;">
                        
                        
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/video-camera.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/hands.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                      
                      
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/controls.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                        
                    </div>
                        
                    
                    
                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    
    
</body>
    
 
    
</html>




<script type="text/javascript" src="../../javascript/jquery-3.2.1.min.js"></script>
    


<script type="text/javascript">
    
 var url_placeholder = "<?php echo $_SESSION['url_placeholder']; ?>";
 
 
    
    
    $( "#groupsubmit" )
    
         .on( "click", function() {
        
        
        
                 groupname = $( "#groupname" ).val();
        
                 groupdesc = $( "#groupdesc" ).val();
        
        
        
       
                 if ( ( groupname.trim().length != 0 ) && ( groupdesc.trim().length != 0 ) ) {
                     
                         var both_fields_filled = true;
                     
                 } else {
                     
                     
                         var both_fields_filled = false;

                         $( "#groupnotif" ).html( "None of the fields can be left blank." );
                     
                     
                 }
                 if ( both_fields_filled ) {
                     
                     
                    
                     
                         if ( ( groupname.length > 60 ) || ( groupdesc.length > 140 ) ) {
                             
                                 var both_length_check = false;
                                 
                                 $( "#groupnotif" ).html( "Group name cannot exceed 60 characters. Description cannot exceed 140." );
                             
                         } else {
                             
                                 var both_length_check = true;
                             
                         }
                 }
        
        
                 if ( both_fields_filled && both_length_check ) {
                     
                         group_text_ready = true;
                     
                 } else {
                     
                         group_text_ready = false;
                     
                 }
        
                 if ( group_text_ready ) {
                     
                     
                     if (group_picture_ready)  {
                         
                         
                         send_both_text_and_pic( groupname, groupdesc, group_pic_path, group_pic_name, group_pic_type );
                         
                         $("#groupsubmit").hide();
                         
                         $("#groupnotif").html("posting...");
                         
                     } else {
                         
                         
                         send_both_text_and_pic( groupname, groupdesc, null, null, null );
                         
                         $("#groupsubmit").hide();
                         
                         $("#groupnotif").html("posting...");

                     }
                     
                     
                    
                 }
         } );
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

 function _( el ) {
         return document.getElementById( el );
 }
    
    
    
 $( '#groupimg' ).change( function() {
     
                 uploadFile();
     
 } );
    

 function uploadFile() {
     
     
     $( "#groupnotif" ).show();
     
     
         file = _( 'groupimg' ).files[ 0 ];
     
     
     
     
     
     if (file.name.length > 30) {
         
         temp_name = file.name.substr(0, 29) + "...";
         
     } else if (file.name.length <= 30) {
         
         temp_name = file.name;
         
     } else {}
     
     
     
     
     
     
     
     
     
     
         if ( file.size <= 1000000 ) {
             
                 file_size_validation = true;
             
         } else {
             
                 file_size_validation = false;

             
                 $( "#groupnotif" ).show();
             
             
                 $( "#groupnotif" ).html( temp_name + " is bigger than 1MB. Try again." );
             
             
         }
     
     
         if ( file_size_validation ) {
             
             
                 if ( ( file.type == "image/jpeg" ) || ( file.type == "image/jpg" ) || ( file.type == "image/png" ) || ( file.type == "image/gif" ) ) 
                 
                 {
                         file_type_validation = true;
                     
                 } else {
                     
                         file_type_validation = false;
                     
                         $( "#groupnotif" ).html( "Your file has to be an image of type jpeg, jpg, png or gif." );
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
                 ajax1.open( "POST", url_placeholder + 'backend/newgroupimg.php' );
                 ajax1.send( formdata );
         }

     
     
         function progressHandler( event ) {
             
                 var percent = ( event.loaded / event.total ) * 100;
             
                 $( "#groupnotif" ).html( "Uploading  your file (" + Math.round( percent ) + "%)" );
             
             
             
                 if (percent == 100) {
                 
                 $( "#groupnotif" ).html( "Completing..." );
                 
                 }
            
             
                 $("#abort").show();
         }

     
     
     
     
         function completeHandler( event ) {
             
             
                 $("#abort").hide();
             
             
                 result = event.target.responseText;
             
                 if ( result.trim() === "1" ) {
                     
                         $( "#groupnotif" ).html( "You have to upload an image." );
                     
                 } else if ( result.trim() === "2" ) {
                     
                         $( "#groupnotif" ).html( "Your image can only be jpg, png, jpeg or gif." );
                     
                 } else if ( result.trim() === "3" ) {
                     
                         $( "#groupnotif" ).html( "Your file must be an image." );
                     
                 } else {
                     
                         jsonGroup = JSON.parse( result );
                         group_status = jsonGroup[ 0 ];
                         group_pic_path = jsonGroup[ 1 ];
                         group_pic_name = jsonGroup[ 2 ];
                         group_pic_type = jsonGroup[ 3 ];
                         if ( group_status === 1 ) {
                             
                                 group_picture_ready = true;
                             
                                 $( "#groupnotif" ).html( temp_name + " has successfully loaded." );

                         } else {
                             
                                 group_picture_ready = false;
                             
                                 $( "#groupnotif" ).html( "There is an unexplaind error. Please try again." );
                             
                         }
                 }
         }

     
     
         function errorHandler( event ) { 
             
                 $( "#groupnotif" ).html( "Upload fail. Please try again." );
             
         }

     
     
     
         function abortHandler( event ) {
             
             
             group_picture_ready = false;
             
             $( "#groupnotif" ).html( "Upload aborted. Please try again." );
             
         }
 }


    
    
    
    
    
    
    
    
    
    $("#abort").on('click', function() {
    
        ajax1.abort(); 
        
        $("#groupimg").val("");  
        
        $( "#abort" ).hide();
    
    });    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

 function send_both_text_and_pic( groupname, groupdesc, group_pic_path, group_pic_name, group_pic_type ) {
         $.ajax( {
                         data: {
                                 "groupname": groupname,
                                 "groupdesc": groupdesc,
                                 "group_pic_path": group_pic_path,
                                 "group_pic_name": group_pic_name,
                                 "group_pic_type": group_pic_type
                         },
                         dataType: 'text',
                         url: url_placeholder + 'backend/create_group.php',
                         type: "POST",
                         timeout: 15000
                 } )
                 .done( function( data ) {
             
             
             console.log(data)
             
                         if ( data.trim() == 1 ) {
                             
                         window.location.href = url_placeholder + "nogroups";
                             
                         } else if ( data == 5 ) {
                               
                                 $( "#groupnotif" ).html( "No fields can be left empty." );
                             
                             
                             $("#groupsubmit").show();
                             
                             
                         } else if ( data == 6 ) {
                                
                                 $( "#groupnotif" ).html( "Group name cannot exceed 60 characters. Description cannot exceed 140. File name cannot be too long." );
                             
                             $("#groupsubmit").show();
                             
                         } else {}
                 } )
                 .fail( function( jqXHR, textStatus, errorThrown ) {

                         $( "#groupnotif" ).html( "Poor connection. Try again." );
             
             
                         $("#groupsubmit").show();
                 } );
 }

</script>
    
    
  


<script type="text/javascript">


    
    
    
    
    
         $( document ).ready( function() {
             
             
            $( "#groupnotif" ).show();
         
            count_request();
             
            count_important();
             
            count_replypage();
         
            group_picture_ready = false;
   
            $(function () {
               $('[data-toggle="tooltip"]').tooltip()
            })
         
        } );
    
    
    
    
    
    


    function count_request()  {
       
       
             typing_url_request = "<?php echo $_SESSION['url_placeholder'];  ?>tally";
        
        
             $.ajax( {
             url: typing_url_request,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "important": 1,
                 
             },
             success: function( data ) {
                 
                 
             //    console.log(data);
                 
                 
            var jsonCountAppend_request = JSON.parse( data );
            
            var attach_count_status_request =  jsonCountAppend_request[0];
            
            var attach_count_back_count_request =  jsonCountAppend_request[1];
        
            
        
           if (attach_count_status_request == 1) {
               
               if (attach_count_back_count_request == 0) {
                   
                   $("#alert_two").hide();
                   
               } else if (attach_count_back_count_request > 99) {
                   
                   $("#alert_two").show();
                   
                   $("#alert_two").html("(99+)");
                   
               }  else {
                   
                   $("#alert_two").show();
                   
                   $("#alert_two").html("(" + attach_count_back_count_request + ")");
                   
                   
               }
               
           }
        
                   
                  setTimeout(count_request, 5000);
        
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                 
                 
            
                
                  setTimeout(count_request, 5000);
    
                 
                
             }
          } );
       
       
   } 
       
    
  



    
    
        
    
    
 
    function count_important()  {
       
       
             typing_url_count = "<?php echo $_SESSION['url_placeholder'];  ?>count";
        
        
             $.ajax( {
             url: typing_url_count,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "important": 1,
                 
             },
             success: function( data ) {
                 
                 
             //    console.log(data);
                 
                 
            var jsonCountAppend = JSON.parse( data );
            
            var attach_count_status =  jsonCountAppend[0];
            
            var attach_count_back_count =  jsonCountAppend[1];
        
            
        
           if (attach_count_status == 1) {
               
               if (attach_count_back_count == 0) {
                   
                   $("#alert_one").hide();
                   
               } else if (attach_count_back_count > 99) {
                   
                   $("#alert_one").show();
                   
                   $("#alert_one").html("(99+)");
                   
               }  else {
                   
                   $("#alert_one").show();
                   
                   $("#alert_one").html("(" + attach_count_back_count + ")");
                   
                   
               }
               
           }
        
                   
                  setTimeout(count_important, 5000);
        
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                 
                 
            
                
                  setTimeout(count_important, 5000);
    
                 
                
             }
          } );
       
       
   } 
       
    

    
    
    
    
    
      
    function count_replypage()  {
       
       
             typing_url_reply_page = "<?php echo $_SESSION['url_placeholder'];  ?>quota";
        
        
             $.ajax( {
             url: typing_url_reply_page,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "important": 1,
                 
             },
             success: function( data ) {
                 
                 
                 console.log("infdiue" + data)
                 
                 if (data == 100) {
                     
                    $("#alert_three").show();
                   
                    $("#alert_three").html("(new)");
                     
                 } else {
                     
                     
                    $("#alert_three").hide(); 
                     
                 }
                
                 
                 
                 setTimeout(count_replypage, 5000);
                 
          
             },
             error: function( xhr, textStatus, errorThrown ) {
                 
                 
            
                
                  setTimeout(count_replypage, 5000);
    
                 
                
             }
          } );
       
       
   } 
       
    






</script>