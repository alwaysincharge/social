

<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php

$user_details = $user->find_one_user($_SESSION['admin_id']);

$user_details_result = $user_details->get_result();

$user_info = $user_details_result->fetch_assoc();





$is_mem = $member->this_user_this_group_alive($_SESSION['admin_id'], $_GET['group']);

$is_mem_r = $is_mem->get_result();

$is_num = $is_mem_r->num_rows;



if ($is_num != 1) {
    
    redirect_to($_SESSION['url_placeholder'] . 'nogroups');
    
}






?>



<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body class="dashboard-body" style="min-height: 110%;">
    
    
    

    
    
   <nav class="nav-head">
    
    <div class="row nav-main-row div-scale">
        
        
        <div class="col-xs-4">
            
            <a style="font-size: 16px;" href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> polls <span class="logo-heading-2">//</span> <span class="logo-heading-3">
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_name = $get_find_group_by_id_result->fetch_assoc()) {
                        
                             if (strlen($group_name['name']) <= 16)  {
                            
                            echo $group_name['name'];
                            
                        } else if (strlen($group_name['name']) > 16) {
                            
                            echo "<span style='font-size: 18px;'>" . substr($group_name['name'], 0, 16). "...</span>";
                            
                        }
                        
                        
                        
                    }
                
                ?>
               </span>  </a>
                            
        </div>
        
        
        
        
        <div class="col-xs-8">
            
            
            <div style="float: right;">
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group polls" />
                
            
            
            
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

                    
    
    
    
    
            <div class="row main-body-div div-scale">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                <img src="
                              
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_img = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_img['img_path'];
                        
                    }
                
                ?>   " width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    
                    <div id="content-div">
                    
                    
                    
                        
                       

                    
                    
                    
                    
                    
                    
                    
<div id="postsdiv" style="margin-top: 10px;">
                        
    
    
     <div style="display: table; margin: 0 auto;">
                        
                        <p id="nopoll" style=" display: none; margin-bottom: 30px; font-size: 17px; font-family: Eczar;">No polls here yet.</p> 
                        
                        
                        </div>

                            
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                        
                        
                        
        
                        
                                                
                        <div style="display: table; margin: 0 auto;">
                        
                               
                        
                        
                        <p id="end" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        End of posts.
                        </p>
                        
                        
                        </div>
                        


                
                        
                        
                        
                        
                        
                    
                    </div>
                    
                 
                    
                    <div id="search-div" style="display: none;">
                    
                    
                        <p id="somesearch" style="display: table; margin: 0 auto; margin-top: 10px; font-size: 16px;font-family: Work Sans; width: 300px; word-break: break-all;">Showing results for "<span class="term1"></span>".
                        
                        
                        <a class="termclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 10px; cursor: pointer;"  /></a> 
                        
                        </p>
                        
                        
                    <p id="nosearch" style="display: table; margin: 0 auto; margin-top: 10px; font-size: 16px;font-family: Work Sans; width: 300px; word-break: break-all;">Sorry. No results for "<span class="term1"></span>".
                        
                        
                        <a class="termclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 10px; cursor: pointer;"  /></a> 
                        
                        </p>
                            
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
                    
                    

                    
                       <p style="font-family: Work Sans; font-size: 20px; margin-left: 20px;">Polls.</p>
                    
                    
                    
                    <p style="font-family: Work Sans; font-size: 17px; margin-left: 20px;">This is a list of polls from the above named group.</p>
                    
                    

                    
                    
               
                
                </div>
                
            </div>
    
    


</body>
    
 
    
</html>




    
<script type="text/javascript" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/jquery-3.2.1.min.js"></script>



<script type="text/javascript">
    

 
var url_placeholder = "<?php echo $_SESSION['url_placeholder'];  ?>";  
    
    

page_group_id = "<?php echo $_GET['group'];  ?>";
    
currentArray = [];
    
   var lastTimeID = 0;
    var firstTimeID = 0;
    new_post_id_num = 0;
    new_post_id = "new_post" + new_post_id_num;

    
    
    
    
   
    
    
    
    
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
    
    
$("#submitpoll").on("click", function() {
    
    
        
     poll_q = $("#poll-q").val();
    
     poll_a1 = $("#poll-a1").val();
    
     poll_a2 = $("#poll-a2").val();  
    
     poll_a3 = $("#poll-a3").val();
    
     poll_a4 = $("#poll-a4").val();
    
     poll_a5 = $("#poll-a5").val();
    
     poll_a6 = $("#poll-a6").val();  
    
     poll_a7 = $("#poll-a7").val();
    
     poll_a8 = $("#poll-a8").val();
    
     poll_a9 = $("#poll-a9").val();
    
     poll_a10 = $("#poll-a10").val();
    
     question_filled = false;
    
     first_two_answers = false;
    
     rank_disparity = false;
    
    
    
    
    
    if (poll_q.trim().length > 0)  {
        
        question_filled = true;
        
    } else {
        
        question_filled = false;
        
        pollError("Poll question cannot be left blank.");
        
    }
    
    
    
    if (question_filled)  {
        
        
        if ( (poll_a1.trim().length > 0) && (poll_a2.trim().length > 0) )  {
        
             first_two_answers = true;
        
        } else {
        
             first_two_answers = false;
        
             pollError("A poll must have at least two answers.");
        
        }
        
        
    }
    
    
    
    if (first_two_answers) {
        
        
        if ( (poll_a3.trim().length == 0) && (poll_a4.trim().length > 0) )  {
        
             rank_disparity = true;
        
        } 
        
        
        
        
        if ( (poll_a4.trim().length == 0) && (poll_a5.trim().length > 0) )  {
            
             rank_disparity = true;
        
        } 
        
        
        
        
        
        if ( (poll_a5.trim().length == 0) && (poll_a6.trim().length > 0) )  {
        
             rank_disparity = true;
        
        } 
        
        
        
        if ( (poll_a6.trim().length == 0) && (poll_a7.trim().length > 0) )  {

        
             rank_disparity = true;
        
        } 
        
        
        
        
        if ( (poll_a7.trim().length == 0) && (poll_a8.trim().length > 0) )  {
            
        
             rank_disparity = true;
        
        }
        
        
        
        
        
        if ( (poll_a8.trim().length == 0) && (poll_a9.trim().length > 0) )  {
    
        
             rank_disparity = true;
        
        } 
        
        
        
        
        
        if ( (poll_a9.trim().length == 0) && (poll_a10.trim().length > 0) )  {
    
        
             rank_disparity = true;
        
        } 
        
        
        
        if(rank_disparity) {
            
            pollError("If an answer box is filled, the one above it cannot be left empty.");
            
        }
        
    }
    
    
    
    
    
   if(!rank_disparity && first_two_answers && question_filled) {
       
       pollError("");
       
       AppendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10);
       
       
        $("#poll-q").val("");
    
        $("#poll-a1").val("");
    
        $("#poll-a2").val("");  
    
        $("#poll-a3").val("");
    
        $("#poll-a4").val("");
    
        $("#poll-a5").val("");
    
        $("#poll-a6").val("");  
    
        $("#poll-a7").val("");
    
        $("#poll-a8").val("");
    
        $("#poll-a9").val("");
    
        $("#poll-a10").val("");
       
       
       
       $("#poll-a4").hide(300);
       
       $("#poll-a5").hide(300);
       
       $("#poll-a6").hide(300);
       
       $("#poll-a7").hide(300);
       
       $("#poll-a8").hide(300);
       
       $("#poll-a9").hide(300);
       
       $("#poll-a10").hide(300);
       
       
       closeAllBoxes();
    
       
   }
    
    
    
        
    
});
    
    
    
    
    
    
   function sendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10, post_id_poll, poll_num_poll) {
       
       
       
          function  poll_is_submitted(new_back_id)  {
              
        
           
          var new_poll_sub = "";
              
          new_poll_sub += '<div class=\"row\">';                    
                            
          new_poll_sub += '<div class=\"col-xs-12\">';
              
                            
          new_poll_sub += '<a  onclick=\"pollvote('+ poll_num_poll + ',' + new_back_id + ')\">';    
        
          new_poll_sub += '<button id=\"pollvote_'+ poll_num_poll +'\" class=\"btn poll-1\">';
        
          new_poll_sub += 'Vote</button></a>';
              
              
          new_poll_sub += '<a onclick=\"voteagain('+ poll_num_poll + ',' + new_back_id + ')\" id=\"pollchange_'+ poll_num_poll +'\" style=\"display: none;\">';    
        
          new_poll_sub += '<button class=\"btn poll-1\">';
        
          new_poll_sub += 'Change Vote</button></a>';
              
              
        
          new_poll_sub += '<a class=\"poll-total'+ poll_num_poll +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          new_poll_sub += '</div></div><br>';
              
              
                     
          new_poll_sub += '<div class=\"row\" >';
                     
                     
          new_poll_sub += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          new_poll_sub += '<img onclick=\"start_delete(' + poll_num_poll + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          new_poll_sub += '</div>';
                     
                     
          new_poll_sub += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          new_poll_sub += '<img class=\" size-2 '+ 'start_delete' + poll_num_poll + '   like_delete'  +  poll_num_poll  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likenewpoll(' +  new_back_id + ',' + poll_num_poll + ') \" />';
           
           
                     
          new_poll_sub += '<img onclick=\"show_delete(' + poll_num_poll + ') \" class=\" size-3 '+ 'start_delete' + poll_num_poll +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
          new_poll_sub += '</div>';
                     
                     
          new_poll_sub += '<div class=\"col-xs-5\" >';
                     
                     
          new_poll_sub += '<a class=\"delete-2 '+ 'show_delete' + poll_num_poll +'\" onclick=\"deletenewpoll(' +  new_back_id + ',' + poll_num_poll + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + poll_num_poll +'\" > //</a>';
                     
                     
          new_poll_sub += '<a onclick=\"hide_delete(' + poll_num_poll + ') \" class=\"delete-3 '+ 'show_delete' + poll_num_poll +'\">don\'t</a>';
                     
                     
          new_poll_sub += '</div>';
                     
                         
                     
          new_poll_sub += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          new_poll_sub += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
          new_poll_sub += '</div>';
                     
                     
                     
          new_poll_sub += '</div>';
                     
                     
                     
              
              
           var new_items_poll_send = $( new_poll_sub ).hide();
           
           $( "#whole_body_" + post_id_poll ).append( new_items_poll_send );
           
           new_items_poll_send.show(200);
              
          }
       
       
       
       
       
          currentPoll = new Date();
        
          currentMilliPoll = currentPoll.getTime();
           
          currentArray.push(currentMilliPoll);
       
       
       
   
    $.ajax({
        
       data: {
           
           "poll": 1, 
           "poll_q": poll_q,
           "poll_a1": poll_a1,
           "poll_a2": poll_a2,
           "poll_a3": poll_a3,
           "poll_a4": poll_a4,
           "poll_a5": poll_a5,
           "poll_a6": poll_a6,
           "poll_a7": poll_a7,
           "poll_a8": poll_a8,
           "poll_a9": poll_a9,
           "poll_a10": poll_a10,
           "group_id": page_group_id,
           "time": currentMilliPoll
           
       
       
       },
       dataType: 'text',
       url: url_placeholder + 'poll_send',
       type: "POST"
        
    }).done(function(data) {
        
        
            var jsonPollAppend = JSON.parse( data );
            
            var attach_poll_status =  jsonPollAppend[0];
            
            var attach_poll_back_id =  jsonPollAppend[1];
        
            
        
            poll_is_submitted(attach_poll_back_id);
        
        
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        

        
        
    });
    
    
} 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function voteagain(front_id, back_id) {
        
        window["votebutton" + front_id] = false;
        
        
                 $("#pollvote_" + front_id).show();
                 
                 $("#pollchange_" + front_id).hide();
                 
                 $("#pollvote_" + front_id).blur();
                 
                 
                 $(".radio-first-" + front_id).show(300);
                 
                 $(".radio-second-" + front_id).hide(300);
        
                $(".poll-total" + front_id).hide().html(totalJsonChoice + " total votes.");
        
        
    }
    
    
    
    
    
    
    
     function voteagainold(back_id) {
        
        window["votebuttonold" + back_id] = false;
        
        
                 $("#pollvote_old" + back_id).show();
                 
                 $("#pollchange_old" + back_id).hide();
                 
                 $("#pollvote_old" + back_id).blur();
                 
                 
                 $(".radio-first-old" + back_id).show(300);
                 
                 $(".radio-second-old" + back_id).hide(300);
        
            //    $(".poll-totalold" + front_id).hide().html(totalJsonChoice + " total votes.");
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    function voteagainSearch(back_id) {
        
        window["votebuttonSearch" + back_id] = false;
        
        
                 $("#pollvote_Search" + back_id).show();
                 
                 $("#pollchange_Search" + back_id).hide();
                 
                 $("#pollvote_Search" + back_id).blur();
                 
                 
                 $(".radio-first-Search" + back_id).show(300);
                 
                 $(".radio-second-Search" + back_id).hide(300);
        
            //    $(".poll-totalold" + front_id).hide().html(totalJsonChoice + " total votes.");
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$("#myTextBox").on("input", function() {
        
        if ( $(this).val().trim().length != 0 ) { 
            
            $("#content-div").hide(600);
            
            $("#search-div").show(500);
            
            $("#wedges").hide(500);
            
            $(".term1").html($("#myTextBox").val());
            
            search_posts($(this).val());
            
        } else {
            
            $("#content-div").show(600);
            
            $("#search-div").hide(500);
            
            $("#wedges").show(500);
            
        }
        
    
});
    
    
    
    
    function pollvote(front_id, back_id)  {
        
        
        
        var which_radio = "radio_group_new_post" + front_id;
        
        if ( ( $('input[name="'+ which_radio +'"]:checked').val() > 0 ) && ( $('input[name="'+ which_radio +'"]:checked').val() < 11 ) ) {
            
            
            
            which_radio_selection = $('input[name="'+ which_radio +'"]:checked').val();
            
            sendPollVote(which_radio_selection, back_id, front_id);
            
            
            
        } else {
            
            alert("select soemthing");
            
        }
        
        
        
    }
    
    
    
    
    
    
    
    
        function pollvoteold(back_id)  {
        
        
        
        var which_radio_old = "radio_group_old" + back_id;
        
        if ( ( $('input[name="'+ which_radio_old +'"]:checked').val() > 0 ) && ( $('input[name="'+ which_radio_old +'"]:checked').val() < 11 ) ) {
            
            
            
            which_radio_selection_old = $('input[name="'+ which_radio_old +'"]:checked').val();
            
            
            
           sendPollVoteOld(which_radio_selection_old, back_id);
            
            
            
        } else {
            
            alert("select soemthing");
            
        }
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
            function pollvoteSearch(back_id)  {
        
        
        
        var which_radio_Search = "radio_group_Search" + back_id;
        
        if ( ( $('input[name="'+ which_radio_Search +'"]:checked').val() > 0 ) && ( $('input[name="'+ which_radio_Search +'"]:checked').val() < 11 ) ) {
            
            
            
            which_radio_selection_Search = $('input[name="'+ which_radio_Search +'"]:checked').val();
            
            
            
           sendPollVoteSearch(which_radio_selection_Search, back_id);
            
            
            
        } else {
            
            alert("select soemthing");
            
        }
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function sendPollVote(selection, back_db_id, front_client_id)  {
        
        
             poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";
        
        
             $.ajax( {
             url: poll_vote_url,
             type: "POST",
             async: true,
             data: {
                "vote": 1,
                "choice": selection,
                 "group_id": page_group_id,
                 "post_id": back_db_id
             },
             success: function( data ) {
                 
                 
                 window["votebutton" + front_client_id] = true;
                 
                 getPollVote(back_db_id, front_client_id);
                 
             //    setInterval(getPollVote, 10000, back_db_id, front_client_id);
                 
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 
                 
             }
          } );
        
    }
 
    
    
 
    
    
        
    function sendPollVoteOld(selection, back_db_id)  {
        
        
             poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";
        
        
             $.ajax( {
             url: poll_vote_url,
             type: "POST",
             async: true,
             data: {
                "vote": 1,
                "choice": selection,
                 "group_id": page_group_id,
                 "post_id": back_db_id
             },
             success: function( data ) {
                 
                 
                 window["votebuttonold" + back_db_id] = true;
                 
                 getOldPollVote(back_db_id);
                 
            //     setInterval(getOldPollVote, 10000, back_db_id);
                 
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 $.ajax( this );
                return;
                 
             }
          } );
        
    }
    
    
    
    
    
        $(".termclose").on("click", function() {
        

        $("#myTextBox").val("");
        
        
        $("#content-div").show(600);
            
            $("#search-div").hide(500);
            
            $("#wedges").show(500);
        
});
    
    
    
    
    
    
    
    
    function sendPollVoteSearch(selection, back_db_id)  {
        
        
             poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";
        
        
             $.ajax( {
             url: poll_vote_url,
             type: "POST",
             async: true,
             data: {
                "vote": 1,
                "choice": selection,
                 "group_id": page_group_id,
                 "post_id": back_db_id
             },
             success: function( data ) {
                 
                 
                 window["votebuttonSearch" + back_db_id] = true;
                 
                 getSearchPollVote(back_db_id);
                 
            //     setInterval(getOldPollVote, 10000, back_db_id);
                 
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 $.ajax( this );
                return;
                 
             }
          } );
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function getPollVote(back_id, front_id)  {
        
        
             poll_percent_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_percent";
        
        
             $.ajax( {
             url: poll_percent_url,
             type: "POST",
             async: true,
             timeout: 60000,
             data: {
                "percent": 1,
                 "post_id": back_id
             },
             success: function( data ) {
                 
                 
                
                 
                 
                 if(window["votebutton" + front_id]) {
                     
                     
                     
                 $("#pollvote_" + front_id).hide();
                 
                 $("#pollchange_" + front_id).show();
                 
                 $("#pollvote_" + front_id).blur();
                 
                 
                 $(".radio-first-" + front_id).hide(300);
                 
                 $(".radio-second-" + front_id).show(300);
                     
                
                     
                 }
                 
                 
                 
                 
                 
                 var jsonGetPoll = JSON.parse( data );
            
                 var jsonChoice1 =  jsonGetPoll[0];
                 
                 var jsonChoice2 =  jsonGetPoll[1];
                 
                 var jsonChoice3 =  jsonGetPoll[2];
                 
                 var jsonChoice4 =  jsonGetPoll[3];
                 
                 var jsonChoice5 =  jsonGetPoll[4];
                 
                 var jsonChoice6 =  jsonGetPoll[5];
                 
                 var jsonChoice7 =  jsonGetPoll[6];
                 
                 var jsonChoice8 =  jsonGetPoll[7];
                 
                 var jsonChoice9 =  jsonGetPoll[8];
                 
                 var jsonChoice10 =  jsonGetPoll[9];
                 
                 var jsonUserChoice = jsonGetPoll[10];
                 
                 
                 var totalJsonChoice = jsonChoice1 + jsonChoice2 + jsonChoice3 + jsonChoice4 + jsonChoice5 + jsonChoice6 + jsonChoice7 + jsonChoice8 + jsonChoice9 + jsonChoice10;
                 
                 
                 
                 for ( var poll_img_i = 1; poll_img_i < 11; poll_img_i++ ) {
                     
                     $(".poll-img" + poll_img_i + front_id).hide();
                     
                 }
                 
                 
                 $(".poll-img" + jsonUserChoice + front_id).show();
                 
                 
                 $(".poll-score1" + front_id).html(Math.round((jsonChoice1/totalJsonChoice) * 100) + "% | " + jsonChoice1 + " votes");
                 $("#progressPoll1" + front_id).val(((jsonChoice1/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score2" + front_id).html(Math.round((jsonChoice2/totalJsonChoice) * 100) + "% | " + jsonChoice2 + " votes");
                 $("#progressPoll2" + front_id).val(((jsonChoice2/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score3" + front_id).html(Math.round((jsonChoice3/totalJsonChoice) * 100) + "% | " + jsonChoice3 + " votes");
                 $("#progressPoll3" + front_id).val(((jsonChoice3/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score4" + front_id).html(Math.round((jsonChoice4/totalJsonChoice) * 100) + "% | " + jsonChoice4 + " votes");
                 $("#progressPoll4" + front_id).val(((jsonChoice4/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score5" + front_id).html(Math.round((jsonChoice5/totalJsonChoice) * 100) + "% | " + jsonChoice5 + " votes");
                 $("#progressPoll5" + front_id).val(((jsonChoice5/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score6" + front_id).html(Math.round((jsonChoice6/totalJsonChoice) * 100) + "% | " + jsonChoice6 + " votes");
                 $("#progressPoll6" + front_id).val(((jsonChoice6/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score7" + front_id).html(Math.round((jsonChoice7/totalJsonChoice) * 100) + "% | " + jsonChoice7 + " votes");
                 $("#progressPoll7" + front_id).val(((jsonChoice7/totalJsonChoice) * 100));
                 
                 
                 
                 $(".poll-score8" + front_id).html(Math.round((jsonChoice8/totalJsonChoice) * 100) + "% | " + jsonChoice8 + " votes");
                 $("#progressPoll8" + front_id).val(((jsonChoice8/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score9" + front_id).html(Math.round((jsonChoice9/totalJsonChoice) * 100) + "% | " + jsonChoice9 + " votes");
                 $("#progressPoll9" + front_id).val(((jsonChoice9/totalJsonChoice) * 100));
                 
                 
                 $(".poll-score10" + front_id).html(Math.round((jsonChoice10/totalJsonChoice) * 100) + "% | " + jsonChoice10 + " votes");
                 $("#progressPoll10" + front_id).val(((jsonChoice10/totalJsonChoice) * 100));
                 
                 
                 
                                  
                 if(window["votebutton" + front_id]) {
                     
                     
                 $(".poll-total" + front_id).show().html(totalJsonChoice + " total votes.");
                     
                 }
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                 
                 
             }
          } );
        
        
        
    }
    
    
    
    
  
    
    
    
    
    
    

    
    function getOldPollVote(back_id)  {
        
        
             poll_percent_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_percent";
        
        
             $.ajax( {
             url: poll_percent_url,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "percent": 1,
                 "post_id": back_id
             },
             success: function( data ) {
                 
                 
                
             $(".poll-load-old-" + back_id).hide();
                 
                 
             //   alert(data);
                 
                 
                 var jsonGetPollOld = JSON.parse( data );
            
                 var jsonOldChoice1 =  jsonGetPollOld[0];
                 
                 var jsonOldChoice2 =  jsonGetPollOld[1];
                 
                 var jsonOldChoice3 =  jsonGetPollOld[2];
                 
                 var jsonOldChoice4 =  jsonGetPollOld[3];
                 
                 var jsonOldChoice5 =  jsonGetPollOld[4];
                 
                 var jsonOldChoice6 =  jsonGetPollOld[5];
                 
                 var jsonOldChoice7 =  jsonGetPollOld[6];
                 
                 var jsonOldChoice8 =  jsonGetPollOld[7];
                 
                 var jsonOldChoice9 =  jsonGetPollOld[8];
                 
                 var jsonOldChoice10 =  jsonGetPollOld[9];
                 
                 var jsonUserOldChoice = jsonGetPollOld[10];
                 
                 
                 var totalJsonOldChoice = jsonOldChoice1 + jsonOldChoice2 + jsonOldChoice3 + jsonOldChoice4 + jsonOldChoice5 + jsonOldChoice6 + jsonOldChoice7 + jsonOldChoice8 + jsonOldChoice9 + jsonOldChoice10;
                 
                 
                 var totalJsonOldChoiceSum = jsonOldChoice1 + jsonOldChoice2 + jsonOldChoice3 + jsonOldChoice4 + jsonOldChoice5 + jsonOldChoice6 + jsonOldChoice7 + jsonOldChoice8 + jsonOldChoice9 + jsonOldChoice10;
                 
                 
                 if (totalJsonOldChoice == 0) {
                     
                     totalJsonOldChoice = 1;
                     
                 } else {
                     
                     totalJsonOldChoice = totalJsonOldChoice;
                     
                 }
                 
                 
                 
                 
                 
                 if(window["votebuttonold" + back_id]) {
                     
                     
                     
        
                     
                     
                     if(jsonUserOldChoice == 0) {
                         
                         $(".radio-first-old" + back_id).show(30);
                 
                         $(".radio-second-old" + back_id).hide(30);
                         
                         $("#pollvote_old" + back_id).show(30);
                 
                 $("#pollchange_old" + back_id).hide(30);
                 
                 $("#pollvote_old" + back_id).blur();
                         
                
                     
                     
                 
                     
            
                     
                    $(".poll-totalold" + back_id).hide(30);
                     
                 
                         
                     } else if  (jsonUserOldChoice > 0)  {
                         
                         $(".radio-first-old" + back_id).hide(30);
                 
                         $(".radio-second-old" + back_id).show(30);
                         
                         $("#pollvote_old" + back_id).hide(30);
                 
                 $("#pollchange_old" + back_id).show(30);
                 
                 $("#pollvote_old" + back_id).blur();
                         
                         $(".poll-totalold" + back_id).show(30).html(totalJsonOldChoiceSum + " total votes.");
                         
                     }
                 
                 
                 
                     
                
                     
                 }
                 
                 
                 for ( var poll_img_i_old = 1; poll_img_i_old < 11; poll_img_i_old++ ) {
                     
                     $(".poll-img" + poll_img_i_old + "-old" + back_id).hide();
                     
                 }
                 
                 
                 
                 
                 
                 $(".poll-img" + jsonUserOldChoice + "-old" + back_id).show();
                 
                 
                 $(".poll-score1-old" + back_id).html(Math.round((jsonOldChoice1/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice1 + " votes");
                 
                 $("#progressPoll1-old" + back_id).val(Math.round((jsonOldChoice1/totalJsonOldChoice) * 100));
                 
                 
                 
                 $(".poll-score2-old" + back_id).html(Math.round((jsonOldChoice2/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice2 + " votes");
                 
                 $("#progressPoll2-old" + back_id).val(Math.round((jsonOldChoice2/totalJsonOldChoice) * 100));
                 
                 
                     
                 $(".poll-score3-old" + back_id).html(Math.round((jsonOldChoice3/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice3 + " votes");
                 $("#progressPoll3-old" + back_id).val(((jsonOldChoice3/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score4-old" + back_id).html(Math.round((jsonOldChoice4/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice4 + " votes");
                 $("#progressPoll4-old" + back_id).val(((jsonOldChoice4/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score5-old" + back_id).html(Math.round((jsonOldChoice5/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice5 + " votes");
                 $("#progressPoll5-old" + back_id).val(((jsonOldChoice5/totalJsonOldChoice) * 100));
                 
                 
                 
                 $(".poll-score6-old" + back_id).html(Math.round((jsonOldChoice6/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice6 + " votes");
                 $("#progressPoll6-old" + back_id).val(((jsonOldChoice6/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score7-old" + back_id).html(Math.round((jsonOldChoice7/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice7 + " votes");
                 $("#progressPoll7-old" + back_id).val(((jsonOldChoice7/totalJsonOldChoice) * 100));
                 
                 
                 
                 $(".poll-score8-old" + back_id).html(Math.round((jsonOldChoice8/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice8 + " votes");
                 $("#progressPoll8-old" + back_id).val(((jsonOldChoice8/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score9-old" + back_id).html(Math.round((jsonOldChoice9/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice9 + " votes");
                 $("#progressPoll9-old" + back_id).val(((jsonOldChoice9/totalJsonOldChoice) * 100));
                 
                 
                 $(".poll-score10-old" + back_id).html(Math.round((jsonOldChoice10/totalJsonOldChoice) * 100) + "% | " + jsonOldChoice10 + " votes");
                 $("#progressPoll10-old" + back_id).val(((jsonOldChoice10/totalJsonOldChoice) * 100));
                 
                 
                 
                                  
              
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                
                 
             },
                 
                    complete: function( ) {
               
                $.ajax( this );
                return;
                
             }
          } );
        
        
        
    }
    
    
    
    
    
    
    
    
    
    function getSearchPollVote(back_id)  {
        
        
             poll_percent_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_percent";
        
        
             $.ajax( {
             url: poll_percent_url,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "percent": 1,
                 "post_id": back_id
             },
             success: function( data ) {
                 
                 
                
             $(".poll-load-Search-" + back_id).hide();
                 
                 
             //   alert(data);
                 
                 
                 var jsonGetPollSearch = JSON.parse( data );
            
                 var jsonSearchChoice1 =  jsonGetPollSearch[0];
                 
                 var jsonSearchChoice2 =  jsonGetPollSearch[1];
                 
                 var jsonSearchChoice3 =  jsonGetPollSearch[2];
                 
                 var jsonSearchChoice4 =  jsonGetPollSearch[3];
                 
                 var jsonSearchChoice5 =  jsonGetPollSearch[4];
                 
                 var jsonSearchChoice6 =  jsonGetPollSearch[5];
                 
                 var jsonSearchChoice7 =  jsonGetPollSearch[6];
                 
                 var jsonSearchChoice8 =  jsonGetPollSearch[7];
                 
                 var jsonSearchChoice9 =  jsonGetPollSearch[8];
                 
                 var jsonSearchChoice10 =  jsonGetPollSearch[9];
                 
                 var jsonUserSearchChoice = jsonGetPollSearch[10];
                 
                 
                 var totalJsonSearchChoice = jsonSearchChoice1 + jsonSearchChoice2 + jsonSearchChoice3 + jsonSearchChoice4 + jsonSearchChoice5 + jsonSearchChoice6 + jsonSearchChoice7 + jsonSearchChoice8 + jsonSearchChoice9 + jsonSearchChoice10;
                 
                 
                 var totalJsonSearchChoiceSum = jsonSearchChoice1 + jsonSearchChoice2 + jsonSearchChoice3 + jsonSearchChoice4 + jsonSearchChoice5 + jsonSearchChoice6 + jsonSearchChoice7 + jsonSearchChoice8 + jsonSearchChoice9 + jsonSearchChoice10;
                 
                 
                 if (totalJsonSearchChoice == 0) {
                     
                     totalJsonSearchChoice = 1;
                     
                 } else {
                     
                     totalJsonSearchChoice = totalJsonSearchChoice;
                     
                 }
                 
                 
                 
                 
                 
                 if(window["votebuttonSearch" + back_id]) {
                     
                     
                     
        
                     
                     
                     if(jsonUserSearchChoice == 0) {
                         
                         $(".radio-first-Search" + back_id).show(30);
                 
                         $(".radio-second-Search" + back_id).hide(30);
                         
                         $("#pollvote_Search" + back_id).show(30);
                 
                 $("#pollchange_Search" + back_id).hide(30);
                 
                 $("#pollvote_Search" + back_id).blur();
                         
                
                     
                     
                 
                     
            
                     
                    $(".poll-totalSearch" + back_id).hide(30);
                     
                 
                         
                     } else if  (jsonUserSearchChoice > 0)  {
                         
                         $(".radio-first-Search" + back_id).hide(30);
                 
                         $(".radio-second-Search" + back_id).show(30);
                         
                         $("#pollvote_Search" + back_id).hide(30);
                 
                 $("#pollchange_Search" + back_id).show(30);
                 
                 $("#pollvote_Search" + back_id).blur();
                         
                         $(".poll-totalSearch" + back_id).show(30).html(totalJsonSearchChoiceSum + " total votes.");
                         
                     }
                 
                 
                 
                     
                
                     
                 }
                 
                 
                 for ( var poll_img_i_Search = 1; poll_img_i_Search < 11; poll_img_i_Search++ ) {
                     
                     $(".poll-img" + poll_img_i_Search + "-Search" + back_id).hide();
                     
                 }
                 
                 
                 
                 
                 
                 $(".poll-img" + jsonUserSearchChoice + "-Search" + back_id).show();
                 
                 
                 $(".poll-score1-Search" + back_id).html(Math.round((jsonSearchChoice1/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice1 + " votes");
                 
                 $("#progressPoll1-Search" + back_id).val(Math.round((jsonSearchChoice1/totalJsonSearchChoice) * 100));
                 
                 
                 
                 $(".poll-score2-Search" + back_id).html(Math.round((jsonSearchChoice2/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice2 + " votes");
                 
                 $("#progressPoll2-Search" + back_id).val(Math.round((jsonSearchChoice2/totalJsonSearchChoice) * 100));
                 
                 
                     
                 $(".poll-score3-Search" + back_id).html(Math.round((jsonSearchChoice3/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice3 + " votes");
                 $("#progressPoll3-Search" + back_id).val(((jsonSearchChoice3/totalJsonSearchChoice) * 100));
                 
                 
                 $(".poll-score4-Search" + back_id).html(Math.round((jsonSearchChoice4/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice4 + " votes");
                 $("#progressPoll4-Search" + back_id).val(((jsonSearchChoice4/totalJsonSearchChoice) * 100));
                 
                 
                 $(".poll-score5-Search" + back_id).html(Math.round((jsonSearchChoice5/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice5 + " votes");
                 $("#progressPoll5-Search" + back_id).val(((jsonSearchChoice5/totalJsonSearchChoice) * 100));
                 
                 
                 
                 $(".poll-score6-Search" + back_id).html(Math.round((jsonSearchChoice6/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice6 + " votes");
                 $("#progressPoll6-Search" + back_id).val(((jsonSearchChoice6/totalJsonSearchChoice) * 100));
                 
                 
                 $(".poll-score7-Search" + back_id).html(Math.round((jsonSearchChoice7/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice7 + " votes");
                 $("#progressPoll7-Search" + back_id).val(((jsonSearchChoice7/totalJsonSearchChoice) * 100));
                 
                 
                 
                 $(".poll-score8-Search" + back_id).html(Math.round((jsonSearchChoice8/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice8 + " votes");
                 $("#progressPoll8-Search" + back_id).val(((jsonSearchChoice8/totalJsonSearchChoice) * 100));
                 
                 
                 $(".poll-score9-Search" + back_id).html(Math.round((jsonSearchChoice9/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice9 + " votes");
                 $("#progressPoll9-Search" + back_id).val(((jsonSearchChoice9/totalJsonSearchChoice) * 100));
                 
                 
                 $(".poll-score10-Search" + back_id).html(Math.round((jsonSearchChoice10/totalJsonSearchChoice) * 100) + "% | " + jsonSearchChoice10 + " votes");
                 $("#progressPoll10-Search" + back_id).val(((jsonSearchChoice10/totalJsonSearchChoice) * 100));
                 
                 
                 
                                  
              
        
             },
             error: function( xhr, textStatus, errorThrown ) {
                
                
                 
             },
                 
                    complete: function( ) {
               
                $.ajax( this );
                return;
                
             }
          } );
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function search_posts(term) {
        
        search_posts_url = "<?php echo $_SESSION['url_placeholder'];  ?>search_polls";
        
       $.ajax( {
        
          url: search_posts_url,
          type: "POST",
          async: true,
          data: {
              
             "term": term,
              "search": 1,
              "group": page_group_id
              
          },
          success: function( d ) {
              
           //   alert(d.trim())
              
              
             console.log(d);
             var jsonSearch = JSON.parse( d );
              
              
           //   alert(jsonSearch.new_search)
              
             var jsonSearchLength = jsonSearch.new_search.length;
             var htmlSearch = "";
              
              
              
              
                 if (jsonSearch.new_search.length == 0)  {
                 
                 
                 $("#nosearch").show(200);
                 $("#somesearch").hide(200);
                 
                 
                 
             } else if (jsonSearch.new_search.length > 0)  {
                 
                 $("#nosearch").hide(200);
                 $("#somesearch").show(200);
                 
                 
             }
             
             //If lastTimeID is zero.
           
             for ( var search_i = 0; search_i < jsonSearchLength; search_i++ ) {
                var resultSearch = jsonSearch.new_search[ search_i ];
                // For each row from the database, set the last processed id number to lastTimeID.
                
                // If the row's id is even.
                 
                 
                 
                    
                 
                 
                               if(resultSearch.type == 'poll' && resultSearch.owner == "<?php echo $user_info['id']; ?>") { 
                   
                   
                   
                      
        htmlSearch += '<div id=\"'+ 'whole_old_search' + resultSearch.id +'\" class=\"row poll-div\" style=\"margin-bottom: 20px;\">';
        
        
        htmlSearch += '<div class=\"col-xs-2\"><img src=\" '+  '<?php echo $_SESSION['url_placeholder'];  ?>' +  resultSearch.image  +' \" style=\"width: 40px; height: 40px; border-radius: 3px; margin-left: 0px;\"  /></div>';
        
        htmlSearch += '<div class=\"col-xs-10 poll-body\">';
        
        htmlSearch += '<p class=\"poll-quest-box\"> ' +  resultSearch.question +' </p>';
                                   
                                   
        htmlSearch += '<div class=\"poll-load-Search-'+ resultSearch.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';

    
        htmlSearch += '<form action=\"#\">';
    
        
        
    
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-1-Search'+ resultSearch.id +'\" value=\"1\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-1-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer1 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer1 + ' </p>';
        
        htmlSearch +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score1-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img1-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-2-Search'+ resultSearch.id +'\" value=\"2\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-2-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer2 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer2 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score2-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img2-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (resultSearch.answer3.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-3-Search'+ resultSearch.id +'\" value=\"3\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-3-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer3 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer3 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score3-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img3-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (resultSearch.answer4.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-4-Search'+ resultSearch.id +'\" value=\"4\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-4-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer4 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer4 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score4-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img4-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (resultSearch.answer5.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\"  style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-5-Search'+ resultSearch.id +'\" value=\"5\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-5-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer5 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer5 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score5-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img5-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (resultSearch.answer6.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\"  style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-6-Search'+ resultSearch.id +'\" value=\"6\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-6-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer6 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer6 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score6-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img6-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (resultSearch.answer7.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-7-Search'+ resultSearch.id +'\" value=\"7\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-7-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer7 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer7 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score7-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img7-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (resultSearch.answer8.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-8-Search'+ resultSearch.id +'\" value=\"8\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-8-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer8 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer8 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score8-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img8-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (resultSearch.answer9.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-9-Search'+ resultSearch.id +'\" value=\"9\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-9-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer9 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer9 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score9-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img9-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
           
                      
                if (resultSearch.answer10.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-10-Search'+ resultSearch.id +'\" value=\"10\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-10-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer10 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer10 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score10-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img10-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                            
        
        htmlSearch += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        htmlSearch += '<div class=\"row\">';                    
                            
          htmlSearch += '<div class=\"col-xs-12\">';
              
                            
          htmlSearch += '<a id=\"pollvote_Search'+ resultSearch.id +'\" style=\"display: none;\" onclick=\"pollvoteSearch('+ resultSearch.id + ')\">';    
        
          htmlSearch += '<button  class=\"btn poll-1\">';
        
          htmlSearch += 'Vote</button></a>';
              
              
          htmlSearch += '<a onclick=\"voteagainSearch('+ resultSearch.id + ')\" id=\"pollchange_Search'+ resultSearch.id +'\" style=\"display: none;\">';    
        
          htmlSearch += '<button class=\"btn poll-1\">';
        
          htmlSearch += 'Change Vote</button></a>';
              
              
        
          htmlSearch += '<a class=\"poll-totalSearch'+ resultSearch.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          htmlSearch += '</div></div><br>';
              
              
                     
          htmlSearch += '<div class=\"row\" >';
                     
                     
          htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          htmlSearch += '<img onclick=\"start_delete_old(' + resultSearch.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          htmlSearch += '</div>';
                     
                     
          htmlSearch += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          htmlSearch += '<img class=\" size-2 '+ 'start_delete_old' + resultSearch.id + '   like_delete_old'  +  resultSearch.id  +  '    \" src=\"' + resultSearch.like_src + '\" onclick=\"likeoldpoll(' +  resultSearch.id + ') \" />';
           
           
                     
          htmlSearch += '<img onclick=\"show_delete_old(' + resultSearch.id + ') \" class=\" size-3 '+ 'start_delete_old' + resultSearch.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
          htmlSearch += '</div>';
                     
                     
          htmlSearch += '<div class=\"col-xs-5\" >';
                     
                     
          htmlSearch += '<a class=\"delete-2 '+ 'show_delete_old' + resultSearch.id +'\" onclick=\"deletenewpoll_old(' +  resultSearch.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete_old' + resultSearch.id +'\" > //</a>';
                     
                     
          htmlSearch += '<a onclick=\"hide_delete_old(' + resultSearch.id + ') \" class=\"delete-3 '+ 'show_delete_old' + resultSearch.id +'\">don\'t</a>';
                     
                     
          htmlSearch += '</div>';
                     
                         
                     
          htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          htmlSearch += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
          htmlSearch += '</div>';
                     
                     
                     
          htmlSearch += '</div></div></div>';
                     
                        
                      
            window["votebuttonSearch" + resultSearch.id] = true;
              
               // setTimeout(getSearchPollVote, 10000, resultSearch.id);     
                      
                      $(".radio-first-Search" + resultSearch.id).hide(0);
                      
                      $(".radio-second-Search" + resultSearch.id).hide(0);
                      
             getSearchPollVote(resultSearch.id);
                   
               }
                 
                 
                 
                 
                 
                 
                 
                 
                 
                               if(resultSearch.type == 'poll' && resultSearch.owner != "<?php echo $user_info['id']; ?>") { 
                   
                   
                      
                      
        htmlSearch += '<div id=\"'+ 'whole_old_search' + resultSearch.id +'\" class=\"row poll-div-2\" style=\"margin-bottom: 20px;\">';
        
        
        
        
        htmlSearch += '<div class=\"col-xs-10 poll-body\">';
                                   
        htmlSearch += '<p class=\"text-username\">' + resultSearch.username + '</p>';
        
        htmlSearch += '<p class=\"poll-quest-box\"> ' +  resultSearch.question +' </p>';
                                   
                                   
        htmlSearch += '<div class=\"poll-load-Search-'+ resultSearch.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';

    
        htmlSearch += '<form action=\"#\">';
    
        
        
    
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-1-Search'+ resultSearch.id +'\" value=\"1\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-1-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer1 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer1 + ' </p>';
        
        htmlSearch +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score1-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img1-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-2-Search'+ resultSearch.id +'\" value=\"2\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-2-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer2 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer2 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score2-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img2-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (resultSearch.answer3.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-3-Search'+ resultSearch.id +'\" value=\"3\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-3-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer3 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer3 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score3-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img3-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (resultSearch.answer4.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-4-Search'+ resultSearch.id +'\" value=\"4\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-4-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer4 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer4 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score4-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img4-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (resultSearch.answer5.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\"  style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-5-Search'+ resultSearch.id +'\" value=\"5\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-5-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer5 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer5 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score5-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img5-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (resultSearch.answer6.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\"  style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-6-Search'+ resultSearch.id +'\" value=\"6\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-6-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer6 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer6 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score6-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img6-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (resultSearch.answer7.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-7-Search'+ resultSearch.id +'\" value=\"7\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-7-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer7 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer7 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score7-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img7-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (resultSearch.answer8.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-8-Search'+ resultSearch.id +'\" value=\"8\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-8-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer8 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer8 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score8-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img8-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (resultSearch.answer9.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-9-Search'+ resultSearch.id +'\" value=\"9\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-9-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer9 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer9 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score9-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img9-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
           
                      
                if (resultSearch.answer10.trim().length > 0) {          
            
        htmlSearch += '<p class=\"poll-answer-box-old'+ resultSearch.id +'\">';       
        
        htmlSearch += '<div class=\"radio-first  radio-first-Search'+ resultSearch.id +'\" style=\"display: none;\"><input class=\"radio-new-class-Search'+ resultSearch.id +'\"  type=\"radio\" id=\"poll-id-10-Search'+ resultSearch.id +'\" value=\"10\" name=\"radio_group_Search' + resultSearch.id + '\">';
        
        htmlSearch += '<label for=\"poll-id-10-Search'+ resultSearch.id +'\" class=\"poll-answer-style-1\"><span> ' + resultSearch.answer10 + '</span></label><br></div>';
        
        htmlSearch +=  '<div class=\"radio-second radio-second-Search'+ resultSearch.id +'\" style=\"display: none;\">';
        
        htmlSearch +=  '<p class=\"poll-answer-style-1\"> ' + resultSearch.answer10 + ' </p>';
        
        htmlSearch +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-Search'+ resultSearch.id +'\" class=\"poll-progress\"></progress>'; 
        
        htmlSearch +=  '<a class=\"poll-score poll-score10-Search'+ resultSearch.id +'\"> 30% | 34 votes</a>'; 
        
        htmlSearch += '<img class=\"poll-img10-Search'+ resultSearch.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        htmlSearch +=  '</div>';

        }
                      
                      
                      
                            
        
        htmlSearch += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        htmlSearch += '<div class=\"row\">';                    
                            
          htmlSearch += '<div class=\"col-xs-12\">';
              
                            
          htmlSearch += '<a id=\"pollvote_Search'+ resultSearch.id +'\" style=\"display: none;\" onclick=\"pollvoteSearch('+ resultSearch.id + ')\">';    
        
          htmlSearch += '<button  class=\"btn poll-1\">';
        
          htmlSearch += 'Vote</button></a>';
              
              
          htmlSearch += '<a onclick=\"voteagainSearch('+ resultSearch.id + ')\" id=\"pollchange_Search'+ resultSearch.id +'\" style=\"display: none;\">';    
        
          htmlSearch += '<button class=\"btn poll-1\">';
        
          htmlSearch += 'Change Vote</button></a>';
              
              
        
          htmlSearch += '<a class=\"poll-totalSearch'+ resultSearch.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          htmlSearch += '</div></div><br>';
              
              
                     
          htmlSearch += '<div class=\"row\" >';
                     
                     
          htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          htmlSearch += '<img onclick=\"start_delete_old(' + resultSearch.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          htmlSearch += '</div>';
                     
                     
          htmlSearch += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          htmlSearch += '<img class=\" size-2 '+ 'start_delete_old' + resultSearch.id + '   like_delete_old'  +  resultSearch.id  +  '    \" src=\"' + resultSearch.like_src + '\" onclick=\"likeoldpoll(' +  resultSearch.id + ') \" />';
           
           

                     
          htmlSearch += '</div>';
                     
                     
          htmlSearch += '<div class=\"col-xs-5\" >';
                     

                     
                     
          htmlSearch += '</div>';
                     
                         
                     
          htmlSearch += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
            
                     
                     
          htmlSearch += '</div>';
                     
                     
                     
          htmlSearch += '</div></div>';
                                   
                                   
                                   
          htmlSearch += '<div class=\"col-xs-2\"><img src=\" '+  '<?php echo $_SESSION['url_placeholder'];  ?>' +  resultSearch.image  +' \" style=\"width: 40px; height: 40px; border-radius: 3px; margin-left: 0px;\"  /></div></div>';
                     
                        
                      
            window["votebuttonSearch" + resultSearch.id] = true;
              
               // setTimeout(getSearchPollVote, 10000, resultSearch.id);     
                      
                      $(".radio-first-Search" + resultSearch.id).hide(0);
                      
                      $(".radio-second-Search" + resultSearch.id).hide(0);
                      
             getSearchPollVote(resultSearch.id);
                   
               }
                 
                 
                 
                 
                 
                 
                 

                 
                 
                 
                 
                 
     }
         
                // Return and prepend just parsed json from the database to the page. 
                var new_items_search = $( htmlSearch ).hide();
                $( '#areas3' ).html( new_items_search );
                new_items_search.show( 100 );
             }, //error after here.
           error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
       } );
        
    }
    

    
    

    
    
    
    
    
    

    $( window ).on( "scroll", function() {
        
        
        
        
        
        
        
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
        
    } );
    
    
    
    
    $( '#text' ).on( "focus", function() {
       
       $( '#text' ).keypress( function( e ) {
          if ( e.which == 13 ) {
             
             sendAppend( e, null );
              
          }
       } );
    } );
      
    
    function closeAllBoxes()  {
        
        $('#chatbox').hide(100);
            
        $('#text').val("");
        
        $('#file1label').hide(160);
        
        
        
        $('#pollbox').hide(100);
        
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
        
        
        
        
         count_important();
         
         count_request();
         
         count_replypage();
        
       
       displayFromDatabasePagination();
        
       $(window).unbind("scroll");
       
    
        
   
        
    } );
    
    
    

   
    atleast1poll = false;
    
    
    
function displayFromDatabasePagination() {
        
    completedPosts = false;
    
    fetch_old_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_recent_poll";
      
    var flag;
        
    flag =   $.ajax( {
        
          url: fetch_old_url,
          type: "POST",
          async: true,
          data: {
              
             "fetchold": 1,
             "offset": firstTimeID,
              "group": page_group_id
              
          },
          success: function( data ) {
              
           
    
              if (data == 100) {
                  
                  
                  $(window).unbind("scroll");
                  completedPosts = true;
                  $('#loading').hide();
                  
                  
                  if(atleast1poll) {
                    $('#end').show();  
                  } else {
                     $('#end').hide(); 
                      
                  }
                  
                 return; 
              }
              
              
                if (data == 200) {
                    
                    $('#nopoll').show();
                  
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
                   
                   
                   
                   
                  
                   
                   
                   
                   
                   
                   
                   
                   
                   
                  if(resultOldPost.type == 'poll' && resultOldPost.owner == "<?php echo $user_info['id']; ?>") { 
                   
                   
                      atleast1poll = true;
                      
        oldPostHtml += '<div id=\"'+ 'whole_old_post' + resultOldPost.id +'\" class=\"row poll-div\" style=\"margin-bottom: 20px;\">';
        
        
        oldPostHtml += '<div class=\"col-xs-2\"><img src=\" '+  '<?php echo $_SESSION['url_placeholder'] . $user_info['img_path'];  ?>' +' \" style=\"width: 40px; height: 40px; border-radius: 3px; margin-left: 0px;\"  /></div>';
        
        oldPostHtml += '<div class=\"col-xs-10 poll-body\">';
        
        oldPostHtml += '<p class=\"poll-quest-box\"> ' +  resultOldPost.question +' </p>';

        oldPostHtml += '<div class=\"poll-load-old-'+ resultOldPost.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';             
                      
                      
        oldPostHtml += '<form action=\"#\">';
    
        
        
    
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-1-old'+ resultOldPost.id +'\" value=\"1\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-1-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer1 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer1 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score1-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img1-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-2-old'+ resultOldPost.id +'\" value=\"2\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-2-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer2 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer2 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score2-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img2-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer3.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-3-old'+ resultOldPost.id +'\" value=\"3\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-3-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer3 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer3 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score3-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img3-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer4.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-4-old'+ resultOldPost.id +'\" value=\"4\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-4-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer4 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer4 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score4-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img4-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (resultOldPost.answer5.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-5-old'+ resultOldPost.id +'\" value=\"5\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-5-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer5 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer5 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score5-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img5-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (resultOldPost.answer6.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-6-old'+ resultOldPost.id +'\" value=\"6\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-6-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer6 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer6 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score6-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img6-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (resultOldPost.answer7.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-7-old'+ resultOldPost.id +'\" value=\"7\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-7-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer7 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer7 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score7-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img7-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (resultOldPost.answer8.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-8-old'+ resultOldPost.id +'\" value=\"8\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-8-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer8 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer8 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score8-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img8-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (resultOldPost.answer9.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-9-old'+ resultOldPost.id +'\" value=\"9\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-9-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer9 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer9 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score9-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img9-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
           
                      
                if (resultOldPost.answer10.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-10-old'+ resultOldPost.id +'\" value=\"10\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-10-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer10 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer10 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score10-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img10-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                            
        
        oldPostHtml += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        oldPostHtml += '<div class=\"row\">';                    
                            
          oldPostHtml += '<div class=\"col-xs-12\">';
              
                            
          oldPostHtml += '<a id=\"pollvote_old'+ resultOldPost.id +'\" onclick=\"pollvoteold('+ resultOldPost.id + ')\" style="display: none;">';    
        
          oldPostHtml += '<button class=\"btn poll-1\">';
        
          oldPostHtml += 'Vote</button></a>';
              
              
          oldPostHtml += '<a onclick=\"voteagainold('+ resultOldPost.id + ')\" id=\"pollchange_old'+ resultOldPost.id +'\" style=\"display: none;\">';    
        
          oldPostHtml += '<button class=\"btn poll-1\">';
        
          oldPostHtml += 'Change Vote</button></a>';
              
              
        
          oldPostHtml += '<a class=\"poll-totalold'+ resultOldPost.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          oldPostHtml += '</div></div><br>';
              
              
                     
          oldPostHtml += '<div class=\"row\" >';
                     
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          oldPostHtml += '<img onclick=\"start_delete_old(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          oldPostHtml += '<img class=\" size-2 '+ 'start_delete_old' + resultOldPost.id + '   like_delete_old'  +  resultOldPost.id  +  '    \" src=\"' + resultOldPost.like_src + '\" onclick=\"likeoldpoll(' +  resultOldPost.id + ') \" />';
           
           
                     
          oldPostHtml += '<img onclick=\"show_delete_old(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete_old' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';
                     
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     
          oldPostHtml += '<a class=\"delete-2 '+ 'show_delete_old' + resultOldPost.id +'\" onclick=\"deletenewpoll_old(' +  resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete_old' + resultOldPost.id +'\" > //</a>';
                     
                     
          oldPostHtml += '<a onclick=\"hide_delete_old(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete_old' + resultOldPost.id +'\">don\'t</a>';
                     
                     
          oldPostHtml += '</div>';
                     
                         
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';
                     
                     
          oldPostHtml += '</div>';
                     
                     
                     
          oldPostHtml += '</div></div></div>';
                     
                        
                      
            window["votebuttonold" + resultOldPost.id] = true;
              
               // setTimeout(getOldPollVote, 10000, resultOldPost.id);     
                      
                  //    $(".radio-first-old" + resultOldPost.id).hide(0);
                      
                   //   $(".radio-second-old" + resultOldPost.id).hide(0);
                      
             getOldPollVote(resultOldPost.id);
                   
               }
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    
                  if(resultOldPost.type == 'poll' && resultOldPost.owner != "<?php echo $user_info['id']; ?>") { 
                   
                   
                      atleast1poll = true;
                      
        oldPostHtml += '<div id=\"'+ 'whole_old_post' + resultOldPost.id +'\" class=\"row poll-div-2\" style=\"margin-bottom: 20px;\">';
        
        
        oldPostHtml += '<div class=\"col-xs-10 poll-body\">';
                      
        oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
        
        oldPostHtml += '<p class=\"poll-quest-box\"> ' +  resultOldPost.question +' </p>';

    
        oldPostHtml += '<div class=\"poll-load-old-'+ resultOldPost.id +'\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif\" width=\"90\" height=\"90\"  style=\"display: table; margin: 0 auto;\"  /></div>';              
                      
                      
        oldPostHtml += '<form action=\"#\">';
    
        
        
    
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-1-old'+ resultOldPost.id +'\" value=\"1\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-1-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer1 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer1 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"100\" max=\"100\" id=\"progressPoll1-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score1-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img1-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
                      
                
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-2-old'+ resultOldPost.id +'\" value=\"2\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-2-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer2 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer2 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score2-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img2-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer3.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-3-old'+ resultOldPost.id +'\" value=\"3\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-3-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer3 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer3 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score3-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img3-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      
                      
            if (resultOldPost.answer4.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-4-old'+ resultOldPost.id +'\" value=\"4\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-4-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer4 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer4 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score4-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img4-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
        if (resultOldPost.answer5.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-5-old'+ resultOldPost.id +'\" value=\"5\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-5-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer5 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer5 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score5-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img5-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
           
                      
               if (resultOldPost.answer6.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-6-old'+ resultOldPost.id +'\" value=\"6\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-6-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer6 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer6 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score6-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img6-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                      
                      
                      
                      
                      if (resultOldPost.answer7.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-7-old'+ resultOldPost.id +'\" value=\"7\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-7-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer7 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer7 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score7-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img7-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }       
                      
                      
                      
          
                      
                      
                      
                      
                             if (resultOldPost.answer8.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-8-old'+ resultOldPost.id +'\" value=\"8\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-8-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer8 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer8 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score8-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img8-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                
                      
                      
                      
                             if (resultOldPost.answer9.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-9-old'+ resultOldPost.id +'\" value=\"9\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-9-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer9 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer9 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score9-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img9-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
           
                      
                if (resultOldPost.answer10.trim().length > 0) {          
            
        oldPostHtml += '<p class=\"poll-answer-box-old'+ resultOldPost.id +'\">';       
        
        oldPostHtml += '<div class=\"radio-first  radio-first-old'+ resultOldPost.id +'\" style=\"display: none;\"><input class=\"radio-new-class-old'+ resultOldPost.id +'\"  type=\"radio\" id=\"poll-id-10-old'+ resultOldPost.id +'\" value=\"10\" name=\"radio_group_old' + resultOldPost.id + '\">';
        
        oldPostHtml += '<label for=\"poll-id-10-old'+ resultOldPost.id +'\" class=\"poll-answer-style-1\"><span> ' + resultOldPost.answer10 + '</span></label><br></div>';
        
        oldPostHtml +=  '<div class=\"radio-second radio-second-old'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        oldPostHtml +=  '<p class=\"poll-answer-style-1\"> ' + resultOldPost.answer10 + ' </p>';
        
        oldPostHtml +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10-old'+ resultOldPost.id +'\" class=\"poll-progress\"></progress>'; 
        
        oldPostHtml +=  '<a class=\"poll-score poll-score10-old'+ resultOldPost.id +'\"> 30% | 34 votes</a>'; 
        
        oldPostHtml += '<img class=\"poll-img10-old'+ resultOldPost.id +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';
        
        oldPostHtml +=  '</div>';

        }
                      
                      
                      
                            
        
        oldPostHtml += '</form>';
        
        
                      
                      
                      
                      
                      
                      
                      
                      
        oldPostHtml += '<div class=\"row\">';                    
                            
          oldPostHtml += '<div class=\"col-xs-12\">';
              
                            
          oldPostHtml += '<a  onclick=\"pollvoteold('+ resultOldPost.id + ')\" id=\"pollvote_old'+ resultOldPost.id +'\" style=\"display: none;\">';    
        
          oldPostHtml += '<button  class=\"btn poll-1\">';
        
          oldPostHtml += 'Vote</button></a>';
              
              
          oldPostHtml += '<a onclick=\"voteagainold('+ resultOldPost.id + ')\" id=\"pollchange_old'+ resultOldPost.id +'\" style=\"display: none;\">';    
        
          oldPostHtml += '<button class=\"btn poll-1\">';
        
          oldPostHtml += 'Change Vote</button></a>';
              
              
        
          oldPostHtml += '<a class=\"poll-totalold'+ resultOldPost.id +'\" style=\"display: none; margin-left: 30px;\">589 total votes</a>';
              
          oldPostHtml += '</div></div><br>';
              
              
                     
          oldPostHtml += '<div class=\"row\" >';
                     
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
          oldPostHtml += '<img onclick=\"start_delete_old(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';
                     
                     
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';
                     
                    
           
           
          oldPostHtml += '<img class=\" size-2 '+ 'start_delete_old' + resultOldPost.id + '   like_delete_old'  +  resultOldPost.id  +  '    \" src=\"' + resultOldPost.like_src + '\" onclick=\"likeoldpoll(' +  resultOldPost.id + ') \" />';
           
           
                     
        
          oldPostHtml += '</div>';
                     
                     
          oldPostHtml += '<div class=\"col-xs-5\" >';
                     
                     
         
                     
          oldPostHtml += '</div>';
                     
                         
                     
          oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';
                     
                    
                     
      
                     
          oldPostHtml += '</div>';
                     
                     
                     
          oldPostHtml += '</div></div>';
                     
          oldPostHtml += '<div class=\"col-xs-2\"><img src=\" '+  '<?php echo $_SESSION['url_placeholder']; ?>'  +  resultOldPost.image +' \" style=\"width: 40px; height: 40px; border-radius: 3px; margin-left: 0px;\"  /></div></div>';
                      
            window["votebuttonold" + resultOldPost.id] = true;
              
               // setTimeout(getOldPollVote, 10000, resultOldPost.id);     
                      
                 //     $(".radio-first-old" + resultOldPost.id).hide(0);
                      
                 //     $(".radio-second-old" + resultOldPost.id).hide(0);
                      
             getOldPollVote(resultOldPost.id);
                   
               }
                   
                   
                   
                   
                   
                   
                   
                   if(!atleast1poll)  {
                       
                       $("#nopoll").show();
                       
                   }
                   
        
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
      
                    
                    
                    
                
                /*  if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
                      
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
    
    
    
    
    
    
    
    
    
    
   function myFunction(group) {
       
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
                  //  alert(data);
                   $("#group" + group).hide();
                } 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   } 
    
    
  
    
       function likeoldpost(post_ui_id) {
           
           
          if ( $('.like_delete' + post_ui_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete' + post_ui_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete' + post_ui_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete' + post_ui_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
             async: true,
             data: {
                "likepost": 1,
                "post_id": post_ui_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
           
     } 
    
    
    
    
    
    
    
    
    
    
    function likenewpoll(back_id, front_id) {
           
           
            if ( $('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
             async: true,
             data: {
                "likepost": 1,
                "post_id": back_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
           
     } 
    
    
    
    
    
    
    
    
    
        
    function likeoldpoll(back_id) {
           
           
            if ( $('.like_delete_old' + back_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete_old' + back_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete_old' + back_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete_old' + back_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
             async: true,
             data: {
                "likepost": 1,
                "post_id": back_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
           
     } 
    
    
    
    
    
    
    
    
    
    
    
    
        
   function deleteoldpost(post_ui_id) {
       
       
    
       $("#old_post" + post_ui_id).hide(200);
       
       $("#search_post" + post_ui_id).hide(200);
       
       $("#whole_new_post" + post_ui_id).hide(200);
       
       delete_post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": post_ui_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
       
       
   } 
    
    
    
    
    
    
    
    function deletenewpost(post_ui, post_ui_id) {
    
       $("#whole_new_post" + post_ui).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": post_ui_id
             },
             success: function( data ) {
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }
    
    
    
  
    
    
    
    
    
    
    
       function deletenewpoll(back_id, front_id) {
    
       $("#whole_new_post" + front_id).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": back_id
             },
             success: function( data ) {
                 
                 
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }
    
    
    
    
    
    
    
    
        function deletenewpoll_old(back_id) {
    
       $("#whole_old_post" + back_id).hide(200);
            
        $("#whole_old_search" + back_id).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
             async: true,
             data: {
                "deletepost": 1,
                "post_id": back_id
             },
             success: function( data ) {
                 
                 
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 function start_delete(post_ui) {

     $(".start_delete" + post_ui).toggle(200);
       
       
}  
    
     function start_delete_old(back_id) {

     $(".start_delete_old" + back_id).toggle(200);
       
       
} 
    
    
 function show_delete(post_ui) {

     $(".show_delete" + post_ui).show(200);
       
       
}
    
    
    
     function show_delete_old(back_id) {

     $(".show_delete_old" + back_id).show(200);
       
       
}
    
    
    
  
function hide_delete(post_ui) {

     $(".show_delete" + post_ui).hide(200);
       
       
}
    
   
    
    
    function hide_delete_old(back_id) {

     $(".show_delete_old" + back_id).hide(200);
       
       
}
    
    
   
</script>   