

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
    
    
    
    
    
<body class="dashboard-body">
    
    
    

    
    
   <nav class="nav-head ">
    
    <div class="row nav-main-row div-scale">
        
        
        <div class="col-xs-6">
            
            <a class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
likes
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
            <div style="float: right;">
            
            
            
            
            <a href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
            <button class="btn new-group-1">   
                    
            Create group</button>
            
            </a>
            
            
                <div class="dropdown">
           
                      <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/notification.svg" width="35" height="35" class="current-user-img"  />
                    
                <div class="dropdown-content">
                    
                      <?php
                    
                    
                      $request_list = $request->current_member_requests($_SESSION['admin_id']); 
          
                      $request_list_result = $request_list->get_result();
          
          
                      if ($request_list_result->num_rows > 0) {
              
                        
                          while($row_list_request = $request_list_result->fetch_assoc()) { ?>
                              
                              
                                <?php 
                              
                                $group_details = $group->find_group_by_id($row_list_request['group_id']); 
          
                                $group_details_result = $group_details->get_result();
                              
                                $row_group = $group_details_result->fetch_assoc();
                              
                                
                              
                              
                              
                              
                                $user_details = $user->find_one_user($row_list_request['sender_id']); 
          
                                $user_details_result = $user_details->get_result();
                              
                                $row_user = $user_details_result->fetch_assoc();
                                                                                          
                                ?>
                    
                    
                              
                              <div class="row" id="group<?php echo $row_group['id'];  ?>">
                    
                                  <div class="col-xs-2">
                                  
                                      <img src="<?php echo $row_group['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
                                  
                                  </div>
                    
                                  
                                  
                                  <div class="col-xs-6" style="font-weight: bold; font-size: 16px;font-family: Josefin Slab;">
                                  <p><?php echo $row_user['username'];  ?> wants you to join <span style="color: blue;"><?php echo $row_group['name'];  ?></span></p>
                                  
                                  </div>
                                  
                                  
                                  <div class="col-xs-4">
                                      
                                      
                                      <form method="post" action="<?php echo $_SESSION['url_placeholder'];  ?>accept_request" style="width: 30px; display: inline;">
                                      
                                      <input type="text" name="group_id" style="display: none;" value="<?php echo $row_group['id'];  ?>" />
                                         
                                          
                                      
                                          
                                     <input type="submit" name="submit" value="accept" class="btn" style="outline: 0px ! important; font-weight: bold; font-size: 14px;font-family: Josefin Slab; background: #ddd; padding: 7px; border-radius: 4px; margin-right: 1px;" /> 
                                      
                                      
                                      </form>
                                      
                                      
                                              
                                      
                                      
                                      
                                      
                                                      <div style="width: 30px; display: inline;">
                                      

                                         
                                          
                                      
                                          
                                     <input type="submit" onclick="myFunction('<?php echo $row_group['id'];  ?>')" name="submit" value="decline" class="btn" style="font-weight: bold; font-size: 14px;font-family: Josefin Slab; background: #ddd; padding: 7px; border-radius: 4px; margin-right: 0px;" /> 
                                      
                                      
                                      </div>
                                      
                                      

                                  
                                  </div>
                    
                    
                              </div>
                              
                       <?php   }
                          
                          
        
                      } else {
                          
                          echo "none";
                      }
            
                    
                      ?>
                    
                </div>
                    
                </div>
                
                <div class="dropdown">
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
                    
                    
                    <div class="dropdown-content-2">
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>profile" style="font-size: 15px; font-family: Work Sans;">Edit profile</a> //
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>logout" style="font-size: 15px; font-family: Work Sans;">Logout</a>
                    </div>
            
                </div>
            
            </div>
            
                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div div-scale" style="">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                <img src="
                              
                <?php

                        echo $user_info['img_path'];
                        
                    
                
                ?>   " width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    
                    <div id="content-div" style="margin-left: 40px; padding-top: -90px;">
                    
                    
                    
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        
                        
                       <div style="margin-top: 20px; display: none;" id="typing">
                        
                      <p style="font-family: Work Sans; font-size: 16px;">Someone is typing...</p>
                      
                    
                        
                    </div>
                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                 
                    
                    
<div id="postsdiv" style="margin-top: 0px;">
    
    
    

                        

                            
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                        
                        
                        
                        
                        
                        
                        <div style="display: table; margin: 0 auto;">
                        
                                                <p id="start" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        No requests here yet. 
                        </p>
                        
                        
                        
                        <p id="continue" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        No requests here yet. 
                        </p>
                        
                        
                        <p id="end" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        End of posts.
                        </p>
                        
                        
                        </div>
                        

                
                        
                        
                        
                        
                        
                    
                    </div>
                    
                 
                    
                    <div id="search-div" style="display: none;">
                    
                    
                        
                    <p style="display: table; margin: 0 auto; margin-top: 16px; font-weight: bold; font-size: 19px;font-family: Work Sans;">Searching for "<span id="term1"></span>".</p>
                            
                            
                    <div id="areas3" style="margin-top: 40px;">
                                                
                                   
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                            
                            
                        
                        
                    </div>
                    
                    
                </div>
                    
                    
                    
                    

                    
                    

                    </div>
                   

 
                    
                 

                      
                        
                          <div style="display: table; margin: 0 auto;">
                        
                        
                      <!--  <p id="loadagain" style="display: none;">Poor connection. Try again. <a>Here</a></p> -->
                        
                        
                        
                        <img id="loading" style="display: none;" width="60px" height="60px" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif" />
                    
                    
                    
                    </div>
                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    

                    
                    <p style="font-family: Work Sans; font-size: 20px; margin-left: 20px;">Liked posts.</p>
                    
                    
                    
                    <p style="font-family: Work Sans; font-size: 17px; margin-left: 20px;">These are posts that you have liked from all your groups.</p>
                    
                    

                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    


</body>
    
 
    
</html>




    
<script type="text/javascript" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/jquery-3.2.1.min.js"></script>



<script type="text/javascript">
    
    
    
    
    
  
    
    
    
    
    
    
    
    
      $( '#text' ).on( "focus", function() {
       

              
    $("#text").keyup(function(ee){
        
         if ( ee.which != 13 ) {
             
             send_typing();
              
          }
        
        
    });
    
          
          
    } );
    
    

    
   function send_typing()  {
       
       
             typing_url = "<?php echo $_SESSION['url_placeholder'];  ?>send_typing";
        
        
             $.ajax( {
             url: typing_url,
             type: "POST",
             async: true,
             timeout: 5000,
             data: {
                "typing": 1,
                 "group_id": page_group_id,
             },
             success: function( data ) {
                 
                 
                 
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                
             }
          } );
       
       
   } 
    
    
    typing_alt_1 = setTimeout(hide_typing, 2000);
    
    var_alt_1 = setTimeout(title_alt_1, 500);
    
        var_alt_2 = setTimeout(title_alt_2, 500);
    
    
    function display_typing()  {
        
        clearTimeout(typing_alt_1);
        
        $("#typing").show(300);
        
        typing_alt_1 = setTimeout(hide_typing, 2000);
        
    }
    
    
    
     function hide_typing()  {
        
        
        $("#typing").hide(300);
        
       
        
    }
    
    
    
    
    function get_typing()  {
       
       
             typing_url_2 = "<?php echo $_SESSION['url_placeholder'];  ?>get_typing";
        
        
             $.ajax( {
             url: typing_url_2,
             type: "POST",
             async: true,
             timeout: 5000,
             data: {
                "typing": 1,
                 "group_id": page_group_id,
             },
             success: function( data ) {
                 
                 
                 
                if (data.trim() == "100") {
                    
                    display_typing();
                    
                }
                 
                                  
              setTimeout(get_typing, 500);
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                                  
              setTimeout(get_typing, 500);
                 
                
             }
          } );
       
       
   } 
    
    
    
    
    
    
    
beep = new Audio();
    
beep.src = "<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/alert.mp3";
    



 leave = false;
    
    
     
function alert_alt_1() {
    
    
    if (leave) {
        
       beep.play();
        
    }
 
    
}   
    
    
    
function title_alt_1() {
    
    
    if (leave)  {
        
        
           $("title").text("New message(s)");
    
           var_alt_2 = setTimeout(title_alt_2, 500); 
        
        
    }
    

}
    
    
    
function title_alt_2() {
    
    if (leave)  {
        
         $("title").text("Friday Camp - connect with people, you already know.");
    
     var_alt_1 = setTimeout(title_alt_1, 500); 
        
    }
    
  
}
    
    
    


  function call_out_time()  {
      
      
      if (!leave) {
          
          
        $("title").text("Friday Camp - connect with people, you already know.");
        
        clearTimeout(var_alt_1);
        
    
      
        clearTimeout(var_alt_2);
      
          
          
          
      }
      

        
        
    }
    
    
     $( document ).ready( function() {
         
         
         get_typing();
    
         time_out_1 = setInterval(call_out_time, 500);
         
         
   
         
         
    } );
    
    
    
 
$(window).focus(function() {
    //do something
        
    time_out_1 = setInterval(call_out_time, 500);
        
    leave = false;
});
    
    
    
  
    
    
$(window).blur(function() {
    //do something
        
    // time_out_1 = setInterval(call_out_time, 100);
        
    clearInterval(time_out_1);
    
    clearInterval(time_out_1);
    
    leave = true;
    
});
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
var url_placeholder = "<?php echo $_SESSION['url_placeholder'];  ?>";  
    
    

page_group_id = 9;
    
currentArray = [];
    
replyArray = [];
    
   var lastTimeID = 0;
    var firstTimeID = 0;
    new_post_id_num = 0;
    new_post_id = "new_post" + new_post_id_num;

    
    
    
    
 $("#poll-a3").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a4").show(300);
            
        } 
        
    
});   
    
    
    
$("#poll-a4").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a5").show(300);
            
        } 
        
    
});
    
    
    
    
    
    
$("#poll-a5").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a6").show(300);
            
        } 
        
    
});
    
    
    
    
$("#poll-a6").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a7").show(300);
            
        } 
        
    
});

    
    
$("#poll-a7").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a8").show(300);
            
        } 
        
    
});
    
    
    
$("#poll-a8").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a9").show(300);
            
        } 
        
    
});
    
    
    
$("#poll-a9").on("input", function() {
        
        if ( $(this).val().trim().length > 0 ) { 
               
           $("#poll-a10").show(300);
            
        } 
        
    
});
    
    
    
 
    
    function pollError(message)  {
        
        $("#pollerror").html(message);
        
    }
    
   
    

    
    
    
    $("#closereply").on("click", function() {
        
        $("#replyid").val("");
          
          $("#replytextvalue").val("");
          
          $("#replyusernamevalue").val("");
        
        
      $("#replybox").hide(300);
    
});
    
    
    
    
    
    
    
    
    
    
     function voteagainold(back_id) {
        
        window["votebuttonold" + back_id] = false;
        
        
                 $("#pollvote_old" + back_id).show();
                 
                 $("#pollchange_old" + back_id).hide();
                 
                 $("#pollvote_old" + back_id).blur();
                 
                 
                 $(".radio-first-old" + back_id).show(300);
                 
                 $(".radio-second-old" + back_id).hide(300);
        
            //    $(".poll-totalold" + front_id).hide().html(totalJsonChoice + " total votes.");
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  
    
    
    
    
function _(el) {
            
    return document.getElementById(el);
            
}
    
    

    
$('#file1').change(function() { 
    
    uploadFile();
    
});
    
    

    
    
    

    $( window ).on( "scroll", function() {
        
       if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
           
        displayFromDatabasePagination();
           
           
           
          $(window).unbind("scroll");
           
       }
        
    } );
    
    
    
    
    $( '#text' ).on( "focus", function() {
       
       $( '#text' ).keypress( function( e ) {
          if ( e.which == 13 ) {
             
             sendAppend( e, null, null );
              
          }
       } );
    } );
      
    
    function closeAllBoxes()  {
        
        $('#chatbox').hide();
            
        $('#text').val("");
        
        $('#file1label').hide();
        
        
        
        $('#pollbox').hide();
        
    }
    
    
    
  $('#chatboxicon').click(function() { 
        
        closeAllBoxes();
      
        $('#chatbox').show(100);
      
  });
    
    
    
    
  $('#chatboxclose').click(function() { 
        
            closeAllBoxes();
            
  });
    
    
    
  $('#chatboxfile').click(function() { 
            
        $('#file1label').toggle(160);
      
  });
    
    
    
    
    
    
    
    $('#pollicon').click(function() { 
        
        closeAllBoxes();
        
        $('#pollbox').show(100);
  });
    
    
    
    
  $('#pollboxclose').click(function() { 
        
      
        closeAllBoxes();
            
    
  });
    
    
    
    
 
    
    
    
    
    $( document ).ready( function() {
       
       displayFromDatabasePagination();
        
       $(window).unbind("scroll");
       

        
    } );
    
    
    

    
    
    
    
 
        function how_many_tasks( back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>tasks_count",
             type: "POST",
              timeout: 15000,
             async: true,
             data: {
                "task": 1,
                 "todo_id": back_id
                
             },
             success: function( data ) {
                 
             
             
                 $(".old-num-task-" + back_id).html(data + " Tasks |");
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
        
  
    
    
    

    
function displayFromDatabasePagination() {
        
    completedPosts = false;
    
    fetch_old_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_join_group";
      
    var flag;
        
    flag =   $.ajax( {
        
          url: fetch_old_url,
          type: "POST",
          async: true,
          data: {
              
             "fetchold": 1,
             "offset": firstTimeID
              
          },
          success: function( data ) {
           
            console.log(data)
    
              if (data == 100) {
                  
                  $(window).unbind("scroll");
                  completedPosts = true;
                  $('#loading').hide();
                  $('#end').show();
                 return; 
              }
              
              
                if (data == 200) {
                  
                  $(window).unbind("scroll");
                  completedPosts = true;
                  $('#loading').hide();
                  $('#end').hide();
                  $('#continue').show();
                  $('#start').hide();
                 return; 
              }
              
               
              
            if (flag.readyState == 4 && flag.status == 200) { 
                                                              
                                                              
               $('#loadagain').hide();
                
               $('#loading').hide();
                
               var jsonOldPost = JSON.parse( data );
                
               var jsonOldLength = jsonOldPost.old_posts.length;
              
               var oldPostHtml = "";
                
               for ( var for_oldpost = 0; for_oldpost < jsonOldLength; for_oldpost++ ) {
                   
                   
                  var resultOldPost = jsonOldPost.old_posts[ for_oldpost ];
                   
                  firstTimeID = resultOldPost.id;
                   
                   
                
                   
                   
                   
                   
                   
                   
                   
                   
                   
                oldPostHtml += '<div class=\"group'+ resultOldPost.group_id +' row add-row\">';
                       
                oldPostHtml += '<div class=\"col-xs-2\">';
        
                oldPostHtml += '<img src=\"' + '<?php echo $_SESSION['url_placeholder2'];  ?>'  + resultOldPost.group_img  +'\" width=\"40\" height=\"40\" style=\"float: right;\" class=\"writer-profile-img\" /></div>';
        
                
                oldPostHtml +=  '<div class=\"col-xs-6\" style=\"font-family: Work Sans; font-size: 16px;\">';
                   
                
                oldPostHtml +=  '<p><span>'+ resultOldPost.username  +'</span> wants you to join the group: <span>'+ resultOldPost.group_name  +'</span></p></div>';
                    
                
                oldPostHtml +=  '<div class=\"col-xs-4\">';
                
    
                oldPostHtml += '<div><a onclick=\"accept_request('+ resultOldPost.group_id  +')\" class=\"add-link\">Accept</a></div>';
                
                oldPostHtml += '<div><a onclick=\"decline_request('+ resultOldPost.group_id  +')\" class=\"add-link\">Decline</a></div>';
                
            
            
                
                oldPostHtml += '</div></div>';
                
    
                
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
             }
                
             $( '#postsdiv' ).append( oldPostHtml );      
                
               
                                                              
        } 
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
                $('#loading').hide();
                
                $('#loadagain').show();
                
             },
                    
            complete: function( ) {
                
                
                  
                if (!completedPosts) {
                    
                $(window).bind("scroll", (function () {
                
                  if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
                      
                      displayFromDatabasePagination();
                      
                      $(window).unbind("scroll");
                      
                  }
                
            } ));   }          
                
          }
        
        
       } ); 
       
    if (!completedPosts) {
        
      $('#loading').show();
    
    } 
    
    
    if (completedPosts) { 
    
    $('#loading').hide();
        
    }
}
    
    
    
    
    
   function accept_request(group) {
       
       post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "accept_request";
       
       $.ajax( {
             url: post_url,
             type: "POST",
             async: true,
             data: {
                "deleterequest": 1,
                "group_id": group
             },
             success: function( data ) {
                 
                if ( data == 100 ) {
                  
                   window.location.href = '<?php echo $_SESSION['url_placeholder'] . 'dashboard/';  ?>' + group;
                } 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   } 
    

    
    
    
    
    
    
   function decline_request(group) {
       
       post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "decline_request";
       
       $.ajax( {
             url: post_url,
             type: "POST",
             async: true,
             data: {
                "deleterequest": 1,
                "group_id": group
             },
             success: function( data ) {
                 
                if ( data == 1 ) {
                  
                   $(".group" + group).hide(400);
                } 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   } 
    

    
</script>   