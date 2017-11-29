

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
    
    
    
    
    
<body class="dashboard-body">
    
    
    

    
    
   <nav class="nav-head ">
    
    <div class="row nav-main-row div-scale">
        
        
        <div class="col-xs-6">
            
            <a href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
group requests
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
            <div style="float: right;">
            
            
            
            
            <a href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
            <button class="btn new-group-1">   
                    
            Create group</button>
            
            </a>
            

                
                
                
                
                
                
                
                                
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
                        
                        End of requests.
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
                   

 
                    
                 

                      
                        
                          <div id="wedges" style="display: table; margin: 0 auto;">
                        
                        
                      <!--  <p id="loadagain" style="display: none;">Poor connection. Try again. <a>Here</a></p> -->
                        
                        
                        
                        <img id="loading" style="display: none;" width="60px" height="60px" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif" />
                    
                    
                    
                    </div>
                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    

                    
                    <p style="font-family: Work Sans; font-size: 20px; margin-left: 20px;">Group requests.</p>
                    
                    
                    
                    <p style="font-family: Work Sans; font-size: 17px; margin-left: 20px;">Requests from other users to join their groups.</p>
                    
                    

                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    


</body>
    
 
    
</html>




    
<script type="text/javascript" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/jquery-3.2.1.min.js"></script>



<script type="text/javascript">
    
    
    
    
    
        
    
    
    function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
    
    
    
    
    function Utils() {

}

Utils.prototype = {
    constructor: Utils,
    isElementInView: function (element, fullyInView) {
        var pageTop = $(window).scrollTop();
        var pageBottom = pageTop + $(window).height();
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).height();

        if (fullyInView === true) {
            return ((pageTop < elementTop) && (pageBottom > elementBottom));
        } else {
            return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
        }
    }
};

var Utils = new Utils();
    
    
    
 isElementInView = Utils.isElementInView($('#wedges'), false);   
    
    
    
    
    
  
    
    
    
    
    
    
    
    
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
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $( document ).ready( function() {
         
         
         
         
                  
         count_important();
         
         count_request();
         
         count_replypage();
         
         
         
         

    
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
        
        
        
        
        
        
        
            
                           if (isElementInView) {
                        
                        displayFromDatabasePagination();
                               $(window).unbind("scroll");
   // alert('in view');
} else {
   // alert('out of view');
}
           
        
        
        
        
        
        
    /*   if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
           
        displayFromDatabasePagination();
           
           
           
          $(window).unbind("scroll");
           
       }  */
        
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
                   
                
                oldPostHtml +=  '<p style=\"word-wrap: break-word; width: 300px;\"><span>'+ resultOldPost.username  +'</span> wants you to join the group: <span style=\"word-wrap: break-word;\">'+ resultOldPost.group_name  +'</span></p></div>';
                    
                
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
                    
                    
                        
                           if (isElementInView) {
                        
                        displayFromDatabasePagination();
                               $(window).unbind("scroll");
   // alert('in view');
} else {
   // alert('out of view');
}
           
        
                    
                    
                
             /*     if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
                      
                      displayFromDatabasePagination();
                      
                      $(window).unbind("scroll");
                      
                  } */
                
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