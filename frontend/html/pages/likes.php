

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
likes
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
                        
                        No posts here yet. 
                        </p>
                        
                        
                        
                        <p id="continue" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        No posts here yet. 
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
                   

 
                    
                 

                      
                        
                          <div id="wedges" style="display: table; margin: 0 auto;">
                        
                        
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




            function scout_important(back)  {


                 typing_url_count = "<?php echo $_SESSION['url_placeholder'];  ?>scout";


                 $.ajax( {
                 url: typing_url_count,
                 type: "POST",
                 async: true,
                 timeout: 15000,
                 data: {
                    "important": 1,
                     "post_id": back

                 },
                 success: function( data ) {




                 },
                 error: function( xhr, textStatus, errorThrown ) {





                     $.ajax( this );
                    return;




                 }
              } );


       } 




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






       function sendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10, post_id_poll, poll_num_poll, important) {



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
               "important": important,
               "group_id": page_group_id,
               "time": currentMilliPoll



           },
           dataType: 'text',
           async: true,
           timeout: 15000,
           url: url_placeholder + 'poll_send',
           type: "POST",

           success: function( data ) {  

         //  console.log(data)           

                var jsonPollAppend = JSON.parse( data );

                var attach_poll_status =  jsonPollAppend[0];

                var attach_poll_back_id =  jsonPollAppend[1];



                poll_is_submitted(attach_poll_back_id);




            },
                 error: function( xhr, textStatus, errorThrown ) {


                     $.ajax( this );
                    return;

                 }



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






        function reply_old(back_id) {

             window.scrollTo(0, 0);

            //  closeAllBoxes();

            $('#chatbox').show(100);

            $("#replybox").show(300);




            if ($("#old_reply_text"+ back_id).val().length > 101) {

                short_reply_text = $("#old_reply_text"+ back_id).val().substr(0, 100) + "...";

            } else if ($("#old_reply_text"+ back_id).val().length <= 101) {

                short_reply_text =  $("#old_reply_text"+ back_id).val();

            }



            $("#replytext").html(short_reply_text);


              $("#replytextvalue").val(short_reply_text);


              $("#replyusernamevalue").val($("#old_reply_username"+ back_id).val());


              $("#replyid").val(back_id);


        }








        function reply_old_search(back_id) {

             window.scrollTo(0, 0);





            $("#myTextBox").val("");

             $("#content-div").show(600);

                $("#search-div").hide(500);

            //  closeAllBoxes();

            $('#chatbox').show(100);

            $("#replybox").show(300);




            if ($("#old_reply_text_search"+ back_id).val().length > 101) {

                short_reply_text = $("#old_reply_text_search"+ back_id).val().substr(0, 100) + "...";

            } else if ($("#old_reply_text_search"+ back_id).val().length <= 101) {

                short_reply_text =  $("#old_reply_text_search"+ back_id).val();

            }



            $("#replytext").html(short_reply_text);


              $("#replytextvalue").val(short_reply_text);


              $("#replyusernamevalue").val($("#old_reply_username"+ back_id).val());


              $("#replyid").val(back_id);


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

















    $("#myTextBox").on("input", function() {

            if ( $(this).val().trim().length != 0 ) { 

                $("#content-div").hide(600);

                $("#search-div").show(500);

                $("#term1").html($("#myTextBox").val());

                search_posts($(this).val());

            } else {

                $("#content-div").show(600);

                $("#search-div").hide(500);

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
















        function sendPollVote(selection, back_db_id, front_client_id)  {


                 poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";


                 $.ajax( {
                 url: poll_vote_url,
                 type: "POST",
                 async: true,
                 timeout: 15000,
                 data: {
                    "vote": 1,
                    "choice": selection,
                     "group_id": page_group_id,
                     "post_id": back_db_id
                 },
                 success: function( data ) {


                     window["votebutton" + front_client_id] = true;

                     getPollVote(back_db_id, front_client_id);

                  //   setInterval(getPollVote, 10000, back_db_id, front_client_id);


                 },
                 error: function( xhr, textStatus, errorThrown ) {


                     $.ajax( this );
                    return;

                 }
              } );

        }







        function sendPollVoteOld(selection, back_db_id)  {


                 poll_vote_url = "<?php echo $_SESSION['url_placeholder'];  ?>poll_vote";


                 $.ajax( {
                 url: poll_vote_url,
                 type: "POST",
                 async: true,
                 timeout: 15000,
                 data: {
                    "vote": 1,
                    "choice": selection,
                     "group_id": page_group_id,
                     "post_id": back_db_id
                 },
                 success: function( data ) {


                     window["votebuttonold" + back_db_id] = true;

                     getOldPollVote(back_db_id);

                  //   setInterval(getOldPollVote, 10000, back_db_id);


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
                 timeout: 15000,
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



                 },
                      complete: function( ) {

                    $.ajax( this );
                    return;

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

                             $(".radio-first-old" + back_id).show(300);

                             $(".radio-second-old" + back_id).hide(30);

                             $("#pollvote_old" + back_id).show(300);

                     $("#pollchange_old" + back_id).hide(300);

                     $("#pollvote_old" + back_id).blur();








                        $(".poll-totalold" + back_id).hide(300);



                         } else if  (jsonUserOldChoice > 0)  {

                             $(".radio-first-old" + back_id).hide(300);

                             $(".radio-second-old" + back_id).show(300);

                             $("#pollvote_old" + back_id).hide(300);

                     $("#pollchange_old" + back_id).show(300);

                     $("#pollvote_old" + back_id).blur();

                             $(".poll-totalold" + back_id).show(300).html(totalJsonOldChoiceSum + " total votes.");

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















        function AppendPoll(question, answer1, answer2, answer3, answer4, answer5, answer6, answer7, answer8, answer9, answer10)  {




            var new_poll_html = '';

            new_poll_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row poll-div\">';


            new_poll_html += '<div class=\"col-xs-2\"><img src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/nopic.png\" style=\"width: 40px; margin-left: 10px;\"  /></div>';

            new_poll_html += '<div id=\"'+ 'whole_body_' + new_post_id +'\" class=\"col-xs-10 poll-body\">';

            new_poll_html += '<p class=\"poll-quest-box\"> ' +  question +' </p>';


            new_poll_html += '<form action=\"#\">';




            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-1'+ new_post_id_num +'\" value=\"1\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-1'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer1 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer1 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll1'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score1'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img1'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';





            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-2'+ new_post_id_num +'\" value=\"2\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-2'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer2 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer2 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll2'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score2'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img2'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';



            if (answer3.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-3'+ new_post_id_num +'\" value=\"3\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-3'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer3 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer3 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll3'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score3'+ new_post_id_num +'\"> 30% | 34 votes</a>';

            new_poll_html += '<img class=\"poll-img3'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';                

            }



            if (answer4.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-4'+ new_post_id_num +'\" value=\"4\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-4'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer4 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer4 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll4'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score4'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img4'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';                

            }


            if (answer5.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-5'+ new_post_id_num +'\" value=\"5\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-5'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer5 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer5 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll5'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score5'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img5'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';

            }



            if (answer6.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-6'+ new_post_id_num +'\" value=\"6\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-6'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer6 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer6 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll6'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score6'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img6'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';                 

            }



            if (answer7.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-7'+ new_post_id_num +'\" value=\"7\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-7'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer7 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer7 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll7'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score7'+ new_post_id_num +'\"> 30% | 34 votes</a>';

            new_poll_html += '<img class=\"poll-img7'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';                

            }




            if (answer8.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-8'+ new_post_id_num +'\" value=\"8\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-8'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer8 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer8 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll8'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score8'+ new_post_id_num +'\"> 30% | 34 votes</a>';

            new_poll_html += '<img class=\"poll-img8'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';                 

            }



            if (answer9.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-9'+ new_post_id_num +'\" value=\"9\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-9'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer9 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer9 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll9'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score9'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img9'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';  

            }



            if (answer10.trim().length > 0) {

            new_poll_html += '<p class=\"poll-answer-box'+ new_post_id_num +'\">';       

            new_poll_html += '<div class=\"radio-first  radio-first-'+ new_post_id_num +'\"><input class=\"radio-new-class-'+ new_post_id_num +'\"  type=\"radio\" id=\"poll-id-10'+ new_post_id_num +'\" value=\"10\" name=\"radio_group_' + new_post_id + '\">';

            new_poll_html += '<label for=\"poll-id-10'+ new_post_id_num +'\" class=\"poll-answer-style-1\"><span> ' + answer10 + '</span></label><br></div>';

            new_poll_html +=  '<div class=\"radio-second radio-second-'+ new_post_id_num +'\" style=\"display: none;\">';

            new_poll_html +=  '<p class=\"poll-answer-style-1\"> ' + answer10 + ' </p>';

            new_poll_html +=  '<progress value=\"30\" max=\"100\" id=\"progressPoll10'+ new_post_id_num +'\" class=\"poll-progress\"></progress>'; 

            new_poll_html +=  '<a class=\"poll-score poll-score10'+ new_post_id_num +'\"> 30% | 34 votes</a>'; 

            new_poll_html += '<img class=\"poll-img10'+ new_post_id_num +'\" src=\"<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/poll-check.svg\" width=\"20\" height=\"20\"  style=\"margin-left: 10px; display: none;\" /></p>';

            new_poll_html +=  '</div>';                 

            }


            new_poll_html += '</form>';

            new_poll_html += '</div></div><br>';                



              var new_items_poll = $( new_poll_html ).hide();
              $( '#postsdiv' ).prepend( new_items_poll );
              new_items_poll.show( 100 );



              if ($('#important2').is(':checked')) {

              important_var_2 = "true";   

              } else {

              important_var_2 = "false";

              }





              sendPoll(poll_q, poll_a1, poll_a2, poll_a3, poll_a4, poll_a5, poll_a6, poll_a7, poll_a8, poll_a9, poll_a10, new_post_id, new_post_id_num, important_var_2);



              $('#important2').prop('checked', false);

              new_post_id_num = new_post_id_num + 1;
              new_post_id = "new_post" + new_post_id_num;

        }

















    function _(el) {

        return document.getElementById(el);

    }




    $('#file1').change(function() { 

        uploadFile();

    });




    function uploadFile() { 


            var file = _('file1').files[0];


            if (file.size <= 1000000) {

            $('#progressBar').show();


            var formdata = new FormData();

            formdata.append('file1', file);



            var ajax = new XMLHttpRequest();

            ajax.upload.addEventListener("progress", progressHandler, false);

            ajax.addEventListener("load", completeHandler, false);

            ajax.addEventListener("abort", abortHandler, false);

            ajax.open("POST", "<?php echo $_SESSION['url_placeholder'];  ?>send_attach");

            ajax.send(formdata);

            } else {

                _('progressMessage').innerHTML = file.name + " is bigger than 1MB. Try again. <br><br> ";

            }

            function progressHandler(event) {

            //    _('loadedbytes').innerHTML = "Uploaded " + event.loaded + " of" + event.total;

                var percent = (event.loaded / event.total) * 100;

                _('progressBar').value = Math.round(percent);

                 $('#progressMessage').show();

                _('status').innerHTML = Math.round(percent) + "%";

                _('progressMessage').innerHTML = "Uploading " + file.name;

                $('#file1label').hide();

                $('#chatboxclose').hide();

                $('#chatboxfile').hide();
            }



            function completeHandler(event) {


             //   alert(event.target.responseText);

                _('status').innerHTML = "";


                  sendAppend("", event.target.responseText, $("#file1").val());

                $('#file1label').hide(160);



                _('progressBar').value = 0;

               $('#progressBar').hide();

               _('progressMessage').innerHTML = "";

                 $('#chatboxclose').show();

                $('#chatboxfile').show();
            }



            function errorHandler(event) {

                _('status').innerHTML = "Upload fail";


            }




            function abortHandler(event) {

                _('status').innerHTML = "Upload aborted";


            }






        }









        $( window ).on( "scroll", function() {






                               if (isElementInView) {

                            displayFromDatabasePagination();
                                   $(window).unbind("scroll");
       // alert('in view');
    } else {
       // alert('out of view');
    }





         /*   
           if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {

            displayFromDatabasePagination();



              $(window).unbind("scroll");

           } */

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

          startPostLoop();

        if ($("#poll-a3").val().length > 0) {

            alert("mkodad");

        }

        } );




        function startPostLoop() {

           displayFromDatabase();

        }





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

        fetch_old_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_likes_posts";

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




                         if (resultOldPost.groupname.length > 16) {

                resultOldPost.groupname = resultOldPost.groupname.substr(0, 15) + "...";

            } else if (resultOldPost.groupname.length <= 16) {

                resultOldPost.groupname =  resultOldPost.groupname;

            }





                             if (resultOldPost.type == "todo") {

                      how_many_tasks(resultOldPost.id);

                        oldPostHtml += '<div class=\"old-todo-row row\">';

                        oldPostHtml += '<div class=\"col-xs-2\" style=\"margin-right: -20px;\">';

                        oldPostHtml += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-left-1\"  /></a>';

                        oldPostHtml += '</div>';

                        oldPostHtml += '<div class=\"col-xs-10\">';



                        oldPostHtml += '<div class=\"old-todo-main\"><br>';

                        oldPostHtml += '<a class=\"text-username\" style="margin-left: 20px; margin-right: -20px;"> ' + resultOldPost.username + '</a> <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans; margin-left: 20px;\">// ' + resultOldPost.groupname + '</a>';

                        oldPostHtml += '<p class=\"old-todo-para\">'+ resultOldPost.listname +'</p>';

                        oldPostHtml += '<a><div class=\"old-todo-links\"> <a>'+ resultOldPost.username +' |</a> <a class=\"old-num-task-'+ resultOldPost.id +'\"></a> <a href=\"'+ '<?php echo $_SESSION['url_placeholder']; ?>list/' + resultOldPost.group_id + '/' + resultOldPost.id +'">View To-do list</a> </div></a>';

                        oldPostHtml += '</div></div></div>';



                     }











                      if(resultOldPost.type == 'poll' && resultOldPost.owner == "<?php echo $user_info['id']; ?>") { 




            oldPostHtml += '<div id=\"'+ 'whole_old_post' + resultOldPost.id +'\" class=\"row poll-div\" style=\"margin-bottom: 20px;\">';


            oldPostHtml += '<div class=\"col-xs-2\"><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image +'  \" style=\"width: 50px; border-radius: 3px;\"  /></div>';

            oldPostHtml += '<div class=\"col-xs-10 poll-body\">';



                          oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '  <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></p>';


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




              oldPostHtml += '<img class=\" size-2 '+ 'start_delete_old' + resultOldPost.id + '   like_delete_old'  +  resultOldPost.id  +  '    \" src=\"' + resultOldPost.like_src + '\" onclick=\"likeoldpoll(' +  resultOldPost.id + ',' + resultOldPost.group_id + ') \" />';



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




            oldPostHtml += '<div id=\"'+ 'whole_old_post' + resultOldPost.id +'\" class=\"row poll-div-2\" style=\"margin-bottom: 20px;\">';


            oldPostHtml += '<div class=\"col-xs-10 poll-body\">';

            oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '  <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></p>';

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




              oldPostHtml += '<img class=\" size-2 '+ 'start_delete_old' + resultOldPost.id + '   like_delete_old'  +  resultOldPost.id  +  '    \" src=\"' + resultOldPost.like_src + '\" onclick=\"likeoldpoll(' +  resultOldPost.id + ',' + resultOldPost.group_id + ') \" />';




              oldPostHtml += '</div>';


              oldPostHtml += '<div class=\"col-xs-5\" >';




              oldPostHtml += '</div>';



              oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';





              oldPostHtml += '</div>';



              oldPostHtml += '</div></div>';

              oldPostHtml += '<div class=\"col-xs-2\"><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image +'  \" style=\"width: 50px;  border-radius: 3px;\"  /></div></div>';

                window["votebuttonold" + resultOldPost.id] = true;

                   // setTimeout(getOldPollVote, 10000, resultOldPost.id);     

                     //     $(".radio-first-old" + resultOldPost.id).hide(0);

                     //     $(".radio-second-old" + resultOldPost.id).hide(0);

                 getOldPollVote(resultOldPost.id);

                   }








                     if(resultOldPost.type == 'attach' && resultOldPost.owner == "<?php echo $user_info['id']; ?>") {




                         if ( (resultOldPost.file_type == 'image/jpeg') || (resultOldPost.file_type == 'image/jpg') ||  (resultOldPost.file_type == 'image/png') || (resultOldPost.file_type == 'image/gif')  ) {


                             oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\" style=\"background: white; border-radius: 3px; margin-bottom: 30px;\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"'+ resultOldPost.name +'\">';

                             oldPostHtml += '<div style=\"padding: 12px;\"><a class=\"text-username\"> ' + resultOldPost.username + '</a><a class=\"text-body\" href=\" ' + '<?php echo $_SESSION['url_placeholder2'];  ?>' + resultOldPost.path  + ' \" download>' + ' | Download' + '</a>  <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></div>';

                             oldPostHtml += '<img style=\"width: 100%;\" src=\"'+ '<?php echo $_SESSION['url_placeholder2'];  ?>' + resultOldPost.path +'\" />';


                        /*
                             oldPostHtml += '<span style=\"display: table; margin: 0 auto; width: 300px; margin-top: 10px;\" id=\"' + new_post_id + '\" ></span>'; */






                             oldPostHtml += '<span style=\"display: table; margin: 0 auto; width: 300px; margin-top: 10px;\"><div class=\"row\" >';


                         oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ',' + resultOldPost.group_id + ') \" />';

                         oldPostHtml += '<img onclick=\"show_delete(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';

                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-5\" >';


                         oldPostHtml += '<a class=\"delete-2 '+ 'show_delete' + resultOldPost.id +'\" onclick=\"deleteoldpost(' + resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultOldPost.id +'\" > //</a>';


                          oldPostHtml += '<a onclick=\"hide_delete(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete' + resultOldPost.id +'\">don\'t</a>';


                         oldPostHtml += '</div>';





                        oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';


                         oldPostHtml += '</div>';



                         oldPostHtml += '</div></span>';

















                             oldPostHtml += '</div>';



                         } else {




                    oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                    oldPostHtml += '<div class=\"col-xs-2\">';
                    oldPostHtml += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-left-1\"  /></a>';
                    oldPostHtml += '</div>';
                    oldPostHtml += '<div class=\"col-xs-10\">';
                    oldPostHtml += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                    oldPostHtml += '<div class=\"talktext\">';
                    oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + ' <a class=\"text-body\" href=\" ' + '<?php echo $_SESSION['url_placeholder2'];  ?>' + resultOldPost.path  + ' \" download>' + ' | Download' + '</a>   <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></p>';
                    oldPostHtml += '<p class=\"text-body\"><a href=\" ' + resultOldPost.path  + ' \" download>' + resultOldPost.name + '</a></p>';




                         oldPostHtml += '<div class=\"row\" >';


                         oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ',' + resultOldPost.group_id + ') \" />';

                         oldPostHtml += '<img onclick=\"show_delete(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';

                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-5\" >';


                         oldPostHtml += '<a class=\"delete-2 '+ 'show_delete' + resultOldPost.id +'\" onclick=\"deleteoldpost(' + resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultOldPost.id +'\" > //</a>';


                          oldPostHtml += '<a onclick=\"hide_delete(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete' + resultOldPost.id +'\">don\'t</a>';


                         oldPostHtml += '</div>';





                        oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';


                         oldPostHtml += '</div>';



                         oldPostHtml += '</div>';






                    oldPostHtml += ' </div></div></div></div>';    


                         }




                     }  



                        if(resultOldPost.type == 'attach' && resultOldPost.owner != "<?php echo $user_info['id']; ?>") {





                         if ( (resultOldPost.file_type == 'image/jpeg') || (resultOldPost.file_type == 'image/jpg') ||  (resultOldPost.file_type == 'image/png') || (resultOldPost.file_type == 'image/gif')  ) {


                             oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\" style=\"background: white; border-radius: 3px; margin-bottom: 30px;\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"'+ resultOldPost.name +'\">';

                             oldPostHtml += '<div style=\"padding: 12px;\"><a class=\"text-username\"> ' + resultOldPost.username + '</a><a class=\"text-body\" href=\" ' + '<?php echo $_SESSION['url_placeholder2'];  ?>'  + resultOldPost.path  + ' \" download>' + ' | Download' + '</a>  <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></div>';

                             oldPostHtml += '<img style=\"width: 100%;\" src=\"'+ '<?php echo $_SESSION['url_placeholder2'];  ?>' + resultOldPost.path +'\" />';


                        /*
                             oldPostHtml += '<span style=\"display: table; margin: 0 auto; width: 300px; margin-top: 10px;\" id=\"' + new_post_id + '\" ></span>'; */






                             oldPostHtml += '<span style=\"display: table; margin: 0 auto; width: 300px; margin-top: 10px;\"><div class=\"row\" >';


                         oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id +  ',' + resultOldPost.group_id +') \" />';



                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-5\" >';



                         oldPostHtml += '</div>';





                        oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';


                         oldPostHtml += '</div>';



                         oldPostHtml += '</div></span>';

















                             oldPostHtml += '</div>';



                         }  else {







                       oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                       oldPostHtml += '<div class=\"col-xs-10\">';
                       oldPostHtml += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                       oldPostHtml += '<div class=\"talktext1\">';
                       oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + ' <a class=\"text-body\" href=\" ' + '<?php echo $_SESSION['url_placeholder2'];  ?>' + resultOldPost.path  + ' \" download>' + ' | Download' + '</a>   <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></p>';
                       oldPostHtml += '<p class=\"text-body\"><a href=\" ' + resultOldPost.path  + ' \" download>' + resultOldPost.name + '</a></p>';





                                                 oldPostHtml += '<div class=\"row\" >';


                         oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ',' + resultOldPost.group_id + ') \" />';



                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-5\" >';

                         // Empty div.

                         oldPostHtml += '</div>';





                        oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';


                        // Empty div.

                         oldPostHtml += '</div>';



                         oldPostHtml += '</div>';







                       oldPostHtml += ' </div></div></div>';
                       oldPostHtml += '<div class=\"col-xs-2\">';
                       oldPostHtml += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-right-2\"  /></a>';
                       oldPostHtml += '</div>';
                       oldPostHtml += '</div>';



                         }






                     }









                     if (resultOldPost.type == "chat" && resultOldPost.owner == "<?php echo $user_info['id']; ?>") {



                         find_reply(resultOldPost.reply_id, resultOldPost.id);

                    oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                    oldPostHtml += '<div class=\"col-xs-2\">';
                    oldPostHtml += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image +'  \" class=\"chat-left-1\"  /></a>';
                    oldPostHtml += '</div>';
                    oldPostHtml += '<div class=\"col-xs-10\">';
                    oldPostHtml += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                    oldPostHtml += '<div class=\"talktext\">';
                          oldPostHtml += '<a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a>';


                 //   oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + '</p>';
                    oldPostHtml += '<p class=\"text-body\">'  + resultOldPost.message + '</p>';



                    oldPostHtml += '<div id=\"append_reply' + resultOldPost.id + '\" ></div>';





                         oldPostHtml += '<div class=\"row\" >';


                         oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\">';



                         oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ','  +  resultOldPost.group_id + ') \" />';




                         oldPostHtml += '<img onclick=\"show_delete(' + resultOldPost.id + ') \" class=\" size-3 '+ 'start_delete' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';

                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-5\" >';


                         oldPostHtml += '<a class=\"delete-2 '+ 'show_delete' + resultOldPost.id +'\" onclick=\"deleteoldpost(' + resultOldPost.id + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + resultOldPost.id +'\" > //</a>';


                          oldPostHtml += '<a onclick=\"hide_delete(' + resultOldPost.id + ') \" class=\"delete-3 '+ 'show_delete' + resultOldPost.id +'\">don\'t</a>';


                         oldPostHtml += '</div>';





                        oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';




                         oldPostHtml += '</div>';



                         oldPostHtml += '</div>';

                         oldPostHtml += '<input type=\"hidden\" id=\"old_reply_text'+ resultOldPost.id  +'\" value=\"'+ resultOldPost.message + '\" />';


                         oldPostHtml += '<input type=\"hidden\" id=\"old_reply_username'+ resultOldPost.id  +'\" value=\"'+ resultOldPost.username + '\" />';

                        oldPostHtml += '</div></div></div></div>'; 

                     }



                    if (resultOldPost.type == "chat" && resultOldPost.owner != "<?php echo $user_info['id']; ?>") {





                        find_reply(resultOldPost.reply_id, resultOldPost.id);


                       oldPostHtml += '<div id=\"'+ 'old_post' + resultOldPost.id +'\" class=\"row\">';
                       oldPostHtml += '<div class=\"col-xs-10\">';
                       oldPostHtml += '<div class=\"talk-bubble1 tri-right1 left-top1\" class=\"chat-right-1\">';
                       oldPostHtml += '<div class=\"talktext1\">';
                       oldPostHtml += '<p class=\"text-username\">' + resultOldPost.username + ' <a href=\"'+ '<?php  echo $_SESSION['url_placeholder'];  ?>dashboard/'  +  resultOldPost.group_id  +'\" style=\"font-family: Work Sans;\">// ' + resultOldPost.groupname + '</a></p>';
                       oldPostHtml += '<p class=\"text-body\">' + resultOldPost.message + '</p>';


                    oldPostHtml += '<div id=\"append_reply' + resultOldPost.id + '\" ></div>';



                         oldPostHtml += '<div class=\"row\" >';


                         oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         oldPostHtml += '<img onclick=\"start_delete(' + resultOldPost.id + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-3\" style=\" height: 25px;\"> ';





                         oldPostHtml += '<img class=\" size-2 '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"' +  resultOldPost.like_src + '\" onclick=\"likeoldpost(' + resultOldPost.id + ',' + resultOldPost.group_id + ') \" />';




                         oldPostHtml += '</div>';


                         oldPostHtml += '<div class=\"col-xs-5\" >';

                         // Empty div.

                         oldPostHtml += '</div>';





                        oldPostHtml += '<div class=\"col-xs-2\" style=\" height: 25px;\">';




                         oldPostHtml += '<input type=\"hidden\" id=\"old_reply_text'+ resultOldPost.id  +'\" value=\"'+ resultOldPost.message + '\" />';


                         oldPostHtml += '<input type=\"hidden\" id=\"old_reply_username'+ resultOldPost.id  +'\" value=\"'+ resultOldPost.username + '\" />';

                         oldPostHtml += '</div>';



                         oldPostHtml += '</div>';







                       oldPostHtml += ' </div></div></div>';
                       oldPostHtml += '<div class=\"col-xs-2\">';
                       oldPostHtml += '<a><img src=\" ' +  '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-right-2\"  /></a>';
                       oldPostHtml += '</div>';
                       oldPostHtml += '</div>';





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








                 /*       


                      if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {

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









        function sendPostData(textMessage, e, sent_post_id, text, post_id_num, reply_id, important ) {

           var is_sent_already = function( post_ui, post_id_0 ) {



                         append_post_sent_1 = "";

                         append_post_sent_1 += '<div class=\"row\" >';


                         append_post_sent_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         append_post_sent_1 += '<img onclick=\"start_delete(' + post_id_0 + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         append_post_sent_1 += '</div>';


                         append_post_sent_1 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';




                         append_post_sent_1 += '<img class=\" size-2 '+ 'start_delete' + post_id_0 + '   like_delete'  +  post_id_0  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likeoldpost(' + post_id_0 + ') \" />';



                         append_post_sent_1 += '<img onclick=\"show_delete(' + post_id_0 + ') \" class=\" size-3 '+ 'start_delete' + post_id_0 +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';

                         append_post_sent_1 += '</div>';


                         append_post_sent_1 += '<div class=\"col-xs-5\" >';


                         append_post_sent_1 += '<a class=\"delete-2 '+ 'show_delete' + post_id_0 +'\" onclick=\"deletenewpost(' +  post_id_num + ',' + post_id_0 + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + post_id_0 +'\" > //</a>';


                          append_post_sent_1 += '<a onclick=\"hide_delete(' + post_id_0 + ') \" class=\"delete-3 '+ 'show_delete' + post_id_0 +'\">don\'t</a>';


                         append_post_sent_1 += '</div>';





                        append_post_sent_1 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';




                         append_post_sent_1 += '<img   onclick=\"reply_old(' + post_id_0 + ') \"  class=\" size-1-x \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/reply.svg' + '\" />';



                          append_post_sent_1 += '<input type=\"hidden\" id=\"old_reply_text'+ post_id_0  +'\" value=\"'+ textMessage + '\" />';


                          append_post_sent_1 += '<input type=\"hidden\" id=\"old_reply_username'+ post_id_0 +'\" value=\"'+ '<?php echo $user_info['username']; ?>' + '\" />';



                         append_post_sent_1 += '</div>';



                         append_post_sent_1 += '</div>';






               var new_items_chat_append_1 = $( append_post_sent_1 ).hide();

               $( "#" + post_ui ).prepend( new_items_chat_append_1 );

               new_items_chat_append_1.show(500);

           };




              // true shit

              e.preventDefault();


              post_url_2 = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "send_chat";   


              current = new Date();

              currentMilli = current.getTime();




              currentArray.push(currentMilli);


              $.ajax( {
                 url: post_url_2,
                 type: "POST",
                 async: true,
                 timeout: 15000,
                 data: {
                    "done": 1,
                    "message": textMessage,
                     "group_id": page_group_id,
                     "reply_id": reply_id,
                     "important": important,
                     "time": currentMilli
                 },
                 success: function( data ) {

                     console.log(data);


                 var jsonNewPost = JSON.parse( data );

                 var statusNewPost =  jsonNewPost[0];

                 var post_id_new_from_json =  jsonNewPost[1];

                    if ( statusNewPost == 1 ) {

                       is_sent_already( sent_post_id, post_id_new_from_json );

                    } else {}

                  //  $( "#text" ).val( "" );

                    e.preventDefault();
                 },
                 error: function( xhr, textStatus, errorThrown ) {
                    $.ajax( this );
                    return;
                 }
              } );

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














       function find_reply(reply_id, post_id) {



           post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "find_reply";


           find_reply_id = reply_id;


           if (find_reply_id)  {

                 $.ajax( {
                 url: post_url,
                 type: "POST",
                 async: true,
               timeout: 15000,
                 data: {
                    "find": 1,
                    "reply_id": find_reply_id
                 },
                 success: function( data ) {



                    var jsonOldReply = JSON.parse( data );

                    var jsonReplyLength = jsonOldReply.old_posts.length;




                   for ( var for_oldreply = 0; for_oldreply < jsonReplyLength; for_oldreply++ ) {


                        var resultOldReply = jsonOldReply.old_posts[ for_oldreply ];

                        new_reply_html = "";

                        new_reply_html += '<p style=\"font-family: Work Sans; font-weight: lighter;\" class=\"reply-body\">'+'<a> '+ resultOldReply.username +' </a> | ' +  resultOldReply.message  +'</p><br>'; 



                       var new_items_reply = $( new_reply_html ).hide();

                       $( '#append_reply' + post_id ).prepend( new_items_reply );

                       new_items_reply.show( 100 );


                   }



                 },

                 error: function( xhr, textStatus, errorThrown ) {

                       $.ajax( this );
                    return;

                 }
              } );

           }




       } 









       function find_reply_search(reply_id_s, post_id) {



           post_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "find_reply";

           find_reply_id_s = reply_id_s;


           if (find_reply_id_s) {


           $.ajax( {
                 url: post_url,
                 type: "POST",
                 async: true,
               timeout: 15000,
                 data: {
                    "find": 1,
                    "reply_id": find_reply_id_s
                 },
                 success: function( data ) {

                    var jsonOldReply_search = JSON.parse( data );

                    var jsonReplyLength_search = jsonOldReply_search.old_posts.length;




                   for ( var for_oldreply_search = 0; for_oldreply_search < jsonReplyLength_search; for_oldreply_search++ ) {


                        var resultOldReply_search = jsonOldReply_search.old_posts[ for_oldreply_search ];

                        new_reply_html_search = "";

                        new_reply_html_search += '<p style=\"font-family: Work Sans; font-weight: lighter;\" class=\"reply-body\">'+'<a> '+ resultOldReply_search.username +' </a> | ' +  resultOldReply_search.message  +'</p><br>'; 


                       $( '#append_reply_search' + post_id ).html( new_reply_html_search );



                   }



                 },

                 error: function( xhr, textStatus, errorThrown ) {

                       $.ajax( this );
                    return;

                 }
              } );


           }


       } 











           function likeoldpost(post_ui_id, group_id) {


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
                     "group_id": group_id
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










        function likeoldpoll(back_id, group_id) {


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
                     "group_id": group_id
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


        function sendPostDataAttach( post_id, path, name, type, posttype,  post_id_0, important) {

            var is_sent = function( post_id_new ) {


                         append_post_sent_2 = "";

                         append_post_sent_2 += '<div class=\"row\" >';


                         append_post_sent_2 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         append_post_sent_2 += '<img onclick=\"start_delete(' + post_id_new + ') \" class=\" size-0 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/arrow.svg' + '\" />';


                         append_post_sent_2 += '</div>';


                         append_post_sent_2 += '<div class=\"col-xs-3\" style=\" height: 25px;\">';



                         append_post_sent_2 += '<img class=\" size-2 '+ 'start_delete' + post_id_new + '   like_delete'  +  post_id_new  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likeoldpost(' + post_id_new + ') \" />';

                         append_post_sent_2 += '<img onclick=\"show_delete(' + post_id_new + ') \" class=\" size-3 '+ 'start_delete' + post_id_new +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" />';

                         append_post_sent_2 += '</div>';


                         append_post_sent_2 += '<div class=\"col-xs-5\" >';


                         append_post_sent_2 += '<a class=\"delete-2 '+ 'show_delete' + post_id_new +'\" onclick=\"deletenewpost(' +  post_id_0 + ',' + post_id_new + ') \">delete</a><a style=\"display: none; font-size: 13px;\" class=\"'+ 'show_delete' + post_id_new +'\" > //</a>';


                          append_post_sent_2 += '<a onclick=\"hide_delete(' + post_id_new + ') \" class=\"delete-3 '+ 'show_delete' + post_id_new +'\">don\'t</a>';


                         append_post_sent_2 += '</div>';





                        append_post_sent_2 += '<div class=\"col-xs-2\" style=\" height: 25px;\">';



                         append_post_sent_2 += '<img class=\" size-1 \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" />';


                         append_post_sent_2 += '</div>';



                         append_post_sent_2 += '</div>';






               var new_items_chat_append_2 = $( append_post_sent_2 ).hide();

               $( "#" + post_id ).prepend( new_items_chat_append_2 );

               new_items_chat_append_2.show(500);




            };




              insert_attach_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "insert_attach";


              current_attach = new Date();

              currentMilli_attach = current_attach.getTime();




              currentArray.push(currentMilli_attach);


              $.ajax( {
                 url: insert_attach_url,
                 type: "POST",
                 async: true,
                 data: {
                    "insert_attach": 1,
                    "path": path,
                     "name": name,
                     "type": type,
                     "posttype": posttype,
                     "important": important,
                     "group": page_group_id,
                     "time": currentMilli_attach
                 },
                 success: function( data ) {


                 var jsonNewPostAttach = JSON.parse( data );

                 var statusNewPostAttach =  jsonNewPostAttach[0];

                 var post_id_new_from_json_2 =  jsonNewPostAttach[1];

                    if ( statusNewPostAttach == 1 ) {

                       is_sent( post_id_new_from_json_2 );

                    } else {}



                 },
                 error: function( xhr, textStatus, errorThrown ) {
                    $.ajax( this );
                    return;
                 }
              } );

        }









            function metaLink( data33, new_post_id ) {

     var dooos1 = function( lam, data56, url, title, desc, img ) {

         var html45 = "";

        html45 +=   "<a href=\"  " + url + " \"><div class=\"row\" style=\"border: 2px solid #ddd; border-radius: 5px; padding: 10px; margin: 5px;\"><div>" 



    html45  += "<img src=\"  " + img +"  \" style=\"width: 100%;\" ></div><div><br>";





              html45 +=  " <p style=\" font-family: Josefin Slab; font-size: 15px; font-weight: bold;\">   " + title  +  "</p>";  

                           html45 +=    "<p style=\" font-family: Josefin Slab; font-size: 15px; font-weight: bold;\">  " + desc + " </p>        </div> </div></a>  ";






              $( "#" + new_post_id ).html(html45);
           };


              $.ajax( {
                 url: "<?php echo $_SESSION['url_placeholder']; ?>link_prepare",
                 type: "POST",
                 async: true,
                 dataType:"text",
                 data: {
                    "preview": 1,
                     "name": name,
                     relay: data33
                 },
                 success: function( datasss ) {

                     if (datasss) {


                        var jsonData16 = JSON.parse( datasss );



                        //  var attach_path12 =  jsonData16[0];
                       var metaurl = jsonData16.article["url"];
                        var metatitle = jsonData16.article["title"];
                         var metaimage = jsonData16.article['image']['src'];
                         var metadesc = jsonData16.article['description'];

                       //  alert(metaimage);
                         dooos1(new_post_id, datasss, metaurl, metatitle, metadesc, metaimage);

                     }


                 },
                 error: function( xhr, textStatus, errorThrown ) {
                    $.ajax( this );
                    return;
                 }
              } );

        }













          function previewLink( text, new_post_id ) {



              $.ajax( {
                 url: "<?php echo $_SESSION['url_placeholder']; ?>link_preview",
                 type: "POST",
                 async: true,
                 data: {
                    "preview": 1,
                     "text": text
                 },
                 success: function( data ) {

                     if (data) {

                        metaLink(data, new_post_id);

                     }


                 },
                 error: function( xhr, textStatus, errorThrown ) {
                    $.ajax( this );
                    return;
                 }
              } );

        }























        function sendAppend( e, attach, file ) {



            if ( $("#text").val().length > 200 ) {

                return;

            }






            if (attach) {


                var jsonChatAppend = JSON.parse( attach );

                var attach_chat_path =  jsonChatAppend[0];

                var attach_chat_name =  jsonChatAppend[1];

                var attach_chat_type = jsonChatAppend[2];

                var post_type_chat =  jsonChatAppend[3];



                if ( (attach_chat_type == "image/jpeg") || (attach_chat_type == "image/jpg") || (attach_chat_type == "image/png") || (attach_chat_type == "image/gif") )


                    {

                var new_chat_html = '';

                new_chat_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row\" style=\"background: white; border-radius: 3px; margin-bottom: 30px;\">';

                new_chat_html += '<div style=\"padding: 12px;\"><a class=\"text-username\"> ' + '<?php echo $user_info['username']; ?>' + '</a><a class=\"text-body\" href=\" ' + attach_chat_path  + ' \" download>' + ' | Download' + '</a></div>';

                new_chat_html += '<img style=\"width: 100%;\" src=\"'+ attach_chat_path +'\" />';



                new_chat_html += '<span style=\"display: table; margin: 0 auto; width: 300px; margin-top: 10px;\" id=\"' + new_post_id + '\" ></span>';

                new_chat_html += '</div>';

                var new_items_chat = $( new_chat_html ).hide();
                $( '#postsdiv' ).prepend( new_items_chat );
                new_items_chat.show( 'fast' );




                                  if ($('#important1').is(':checked')) {

              important_var = "true";   

              } else {

              important_var = "false";

              }   



                sendPostDataAttach( new_post_id, attach_chat_path, attach_chat_name, attach_chat_type, post_type_chat, new_post_id_num );


                $('#important1').prop('checked', false);


                new_post_id_num = new_post_id_num + 1;
                new_post_id = "new_post" + new_post_id_num;



                    } else {



                var new_chat_html = '';
                new_chat_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row\">';
                new_chat_html += '<div class=\"col-xs-2\">';
                new_chat_html += '<a><img src=\" '+  '<?php echo $_SESSION['url_placeholder'] . $user_info['img_path'];  ?>' +' \" class=\"chat-left-1\"  /></a>';
                new_chat_html += '</div>';
                new_chat_html += '<div class=\"col-xs-10\">';



                new_chat_html += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';
                new_chat_html += '<div class=\"talktext\">';
                new_chat_html += '<p class=\"text-username\"> ' + '<?php echo $user_info['username']; ?>' + '</p>';
                new_chat_html += '<p class=\"text-body\"><a href=\" ' + attach_chat_path  + ' \" download>' + attach_chat_name + '</a></p><span id=\"' + new_post_id + '\" ></span>';
                new_chat_html += ' </div></div></div></div>';

                var new_items_chat = $( new_chat_html ).hide();
                $( '#postsdiv' ).prepend( new_items_chat );
                new_items_chat.show( 'fast' );


              if ($('#important1').is(':checked')) {

              important_var = "true";   

              } else {

              important_var = "false";

              }   


                sendPostDataAttach( new_post_id, attach_chat_path, attach_chat_name, attach_chat_type, post_type_chat, new_post_id_num , important_var);

                $('#important1').prop('checked', false);



                new_post_id_num = new_post_id_num + 1;
                new_post_id = "new_post" + new_post_id_num;




                    }




            } else {


              var text = $( "#text" ).val();
              var textTrim = $( "#text" ).val().trim();

          if ( textTrim != "" ) {

              var new_chat_html = '';
              new_chat_html += '<div id=\"'+ 'whole_' + new_post_id +'\" class=\"row\">';
              new_chat_html += '<div class=\"col-xs-2\">';
              new_chat_html += '<a><img src=\" '+  '<?php echo $_SESSION['url_placeholder'] . $user_info['img_path'];  ?>' +' \" class=\"chat-left-1\"  /></a>';
              new_chat_html += '</div>';
              new_chat_html += '<div class=\"col-xs-10\">';




              new_chat_html += '<div class=\"talk-bubble tri-right left-top\" class=\"chat-left-2\">';




              new_chat_html += '<div class=\"talktext\">';
            //  new_chat_html += '<p class=\"text-username\">' + '<?php echo $user_info['username'];  ?>' + '</p>'; 








              new_chat_html += '<p class=\"text-body\">' + text + '</p>';

                        if ($("#replytextvalue").val().trim().length > 0) {

                            new_chat_html += '<p class=\"reply-body\">'+'<a> '+ $("#replyusernamevalue").val()  +' </a> | ' +    $("#replytextvalue").val()  +'</p><br>'; 


              }


              new_chat_html += '<span id=\"' + new_post_id + '\" ></span>';


              new_chat_html += ' </div></div></div></div>';



              var new_items_chat = $( new_chat_html ).hide();
              $( '#postsdiv' ).prepend( new_items_chat );
              new_items_chat.show( 100 );

              previewLink(name, new_post_id);





              if ($('#important1').is(':checked')) {

              important_var = "true";   

              } else {

              important_var = "false";

              }







              sendPostData(text, e, new_post_id, text,  new_post_id_num, $("#replyid").val(), important_var);

              $('#important1').prop('checked', false);


              $("#replyid").val("");

              $("#replytextvalue").val("");

              $("#replyusernamevalue").val("");

              $("#replybox").hide()


              $( "#text" ).val( "" ); 

              new_post_id_num = new_post_id_num + 1;
              new_post_id = "new_post" + new_post_id_num;

           } else {

               $( "#text" ).val( "" );
               e.preventDefault();
           }
        }


    }


</script>   