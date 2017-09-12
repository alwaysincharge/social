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
    
    <div class="row nav-main-row" >
        
        
        <div class="col-xs-6">
            
            <a class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">create group</span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6" >
                
            
            <div style="float: right;">
            
                        
            <a>
                
            <button class="btn new-group-1">   
                    
            Create group</button>
            
            </a>
            
            
            
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
            
            
            
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
        

                            
                                                      
                       <label id="file1label" for="groupimg" class="newgroups-text-2">Upload group image</label>
                            
                       <input type="file" id="groupimg" class="btn" style="display: none;"/><br><br>
                            
                            
                            
                            
                        <p class="newgroups-text-2" id="progressMessage"></p>
                            
                         <p class="newgroups-text-3" id="groupnotif"></p>
                            
                        <p id="grouperror" class="group-error-1"></p>
                            
                            
                        <a>
                
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
 // When user clicks the login button...
 $( "#groupsubmit" )
         .on( "click", function() {
                 groupname = $( "#groupname" )
                         .val();
                 groupdesc = $( "#groupdesc" )
                         .val();
                 if ( ( groupname.trim()
                                 .length != 0 ) && ( groupdesc.trim()
                                 .length != 0 ) ) {
                         var both_fields_filled = true;
                 } else {
                         var both_fields_filled = false;
                         $( "#grouperror" )
                                 .hide( 0 );
                         $( "#grouperror" )
                                 .show( 300 );
                         $( "#grouperror" )
                                 .html( "None of the fields can be left blank." );
                 }
                 if ( both_fields_filled ) {
                         if ( ( groupname.length > 60 ) || ( groupdesc.length > 140 ) ) {
                                 var both_length_check = false;
                                 $( "#grouperror" )
                                         .hide( 0 );
                                 $( "#grouperror" )
                                         .show( 300 );
                                 $( "#grouperror" )
                                         .html( "Group name cannot exceed 60 characters. Description cannot exceed 140." );
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
                         get_text_img();
                 }
         } );

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
         if ( file.size <= 1000000 ) {
                 file_size_validation = true;
         } else {
                 file_size_validation = false;
                 $( "#groupnotif" )
                         .html( file.name + " is bigger than 1MB. Try again." );
         }
         if ( file_size_validation ) {
                 if ( ( file.type == "image/jpeg" ) || ( file.type == "image/jpg" ) || ( file.type == "image/png" ) || ( file.type == "image/gif" ) ) {
                         file_type_validation = true;
                 } else {
                         file_type_validation = false;
                         $( "#groupnotif" )
                                 .html( "Your file has to be an image of type jpeg, jpg, png or gif." );
                 }
         }
         if ( file_type_validation && file_size_validation ) {
                 send_image();
         }

         function send_image() {
                 var formdata = new FormData();
                 formdata.append( 'groupimg', file );
                 var ajax = new XMLHttpRequest();
                 ajax.upload.addEventListener( "progress", progressHandler, false );
                 ajax.addEventListener( "load", completeHandler, false );
                 ajax.addEventListener( "abort", abortHandler, false );
                 ajax.open( "POST", url_placeholder + 'backend/newgroupimg.php' );
                 ajax.send( formdata );
         }

         function progressHandler( event ) {
                 var percent = ( event.loaded / event.total ) * 100;
                 $( "#groupnotif" )
                         .html( "Uploading  your file (" + Math.round( percent ) + "%)" );
         }

         function completeHandler( event ) {
             
             
                 result = event.target.responseText;
                 if ( result.trim() === "1" ) {
                         $( "#groupnotif" )
                                 .html( "You have to upload an image." );
                 } else if ( result.trim() === "2" ) {
                         $( "#groupnotif" )
                                 .html( "Your image can only be jpg, png, jpeg or gif." );
                 } else if ( result.trim() === "3" ) {
                         $( "#groupnotif" )
                                 .html( "Your file must be an image." );
                 } else {
                         jsonGroup = JSON.parse( result );
                         group_status = jsonGroup[ 0 ];
                         group_pic_path = jsonGroup[ 1 ];
                         group_pic_name = jsonGroup[ 2 ];
                         group_pic_type = jsonGroup[ 3 ];
                         if ( group_status === 1 ) {
                                 group_picture_ready = true;
                                 $( "#groupnotif" )
                                         .html( file.name + " has successfully loaded." );
                                 $( "#grouperror" )
                                         .hide( 0 );
                         } else {
                                 group_picture_ready = false;
                                 $( "#groupnotif" )
                                         .html( "There is an unexplaind error. Please try again." );
                         }
                 }
         }

         function errorHandler( event ) {
                 $( "#groupnotif" )
                         .html( "Upload fail. Please try again." );
         }

         function abortHandler( event ) {
                 $( "#groupnotif" )
                         .html( "Upload aborted. Please try again." );
         }
 }

 function get_text_img() {
         $( "#grouperror" )
                 .hide( 0 );
         $( "#grouperror" )
                 .show( 300 );
         $( "#grouperror" )
                 .html( "Please upload an image." );
         if ( group_text_ready && group_picture_ready ) {
                 send_both_text_and_pic( groupname, groupdesc, group_pic_path, group_pic_name, group_pic_type );
                 $( "#grouperror" )
                         .hide( 0 );
         }
 }

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
                         type: "POST"
                 } )
                 .done( function( data ) {
                         if ( data == 1 ) {
                                 window.location.href = url_placeholder + "nogroups";
                         } else if ( data == 5 ) {
                                 $( "#grouperror" )
                                         .hide( 0 );
                                 $( "#grouperror" )
                                         .show( 300 );
                                 $( "#grouperror" )
                                         .html( "No fields can be left empty." );
                         } else if ( data == 6 ) {
                                 $( "#grouperror" )
                                         .hide( 0 );
                                 $( "#grouperror" )
                                         .show( 300 );
                                 $( "#grouperror" )
                                         .html( "Group name cannot exceed 60 characters. Description cannot exceed 140. File name cannot be too long." );
                         } else {}
                 } )
                 .fail( function( jqXHR, textStatus, errorThrown ) {
                         $( "#grouperror" )
                                 .hide( 0 );
                         $( "#grouperror" )
                                 .show( 300 );
                         $( "#grouperror" )
                                 .html( "Poor connection. Try again." );
                 } );
 }

</script>
    
    
    