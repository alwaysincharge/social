

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
            
            <a style="font-size: 16px;" href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> to-dos <span class="logo-heading-2">//</span> <span class="logo-heading-3">
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
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group to-dos" />
                
            
            
            
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
                    
                    
                    <div id="content-div">
                    
                                        
            <input id="todobody"  maxlength="100" name="keywords" class="search-main" style="margin-left: 150px; font-size: 13px;"  placeholder="what are you working on?" />
                         <a>
                
            <button id="createtodo" class="btn new-group-1-todo" style="margin-left: 15px; margin-top: 0px; padding: 5px;">   
                    
            create to-do list</button>
            
            </a>
                    
                       <a id="check1" data-placement="left" title="When you check this box, all members of this group will be notified about the post you send immediately after." style="margin-left: 30px; font-family: Work Sans;"><label><input id="important1" type="checkbox" value=""> Important?</label></a>
                    
                    
                    <br><br>
                    
                    
                    
                    <div id="main-div">
                        
                    </div>

                    

                       <div id="wedges" style="display: table; margin: 0 auto; width: 200px;">
                    
                    
                        <img id="loading" style="display: none;" width="60px" height="60px" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/wedges.gif" /> 
                        
                    
                    </div>
                    
                    
                    
                    
                    
                    
                                         <div style="display: table; margin: 0 auto;">
                        
                                                <p id="start" style="display: none; margin-left: -50px; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        No to-dos created yet. 
                        </p>
                        
                        
                        
                        <p id="continue" style="display: none;  margin-left: -50px; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        No to-dos created yet. 
                        </p>
                        
                        
                        <p id="end" style="display: none;  margin-left: -50px; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
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
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">    

                    
                    
                    
                           <p style="font-family: Work Sans; font-size: 20px; margin-left: 20px;">Todo.</p>
                    
                    
                    
                    <p style="font-family: Work Sans; font-size: 17px; margin-left: 20px;">These are the to-do lists in the above named group. </p>
                    
                    

                     
                
                </div>
                
            </div>
    
    


</body>
    
 
    
</html>




    
<script type="text/javascript" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/jquery-3.2.1.min.js"></script>



<script type="text/javascript">
    
    
      
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
page_group_id = "<?php echo $_GET['group'];  ?>";
    
currentArray = [];
    
new_post_id_num = 0;
    
new_post_id = "new_post" + new_post_id_num;
    
    
new_task_id_num = 0;
    
new_task_id = "new_task" + new_task_id_num;
    
    
new_comment_id_num = 0;
    
new_comment_id = "new_comment" + new_task_id_num;
    
    
firstTimeID = 0;
    
    
   
    
$("#createtodo").on("click", function(){
      
    
        
    var todobody = $("#todobody").val();
    
    filled = false;
    
    
    if (todobody.trim().length != 0) {
        
        filled = true;
        
    } else {
        
        filled = false;
        
        $("#loginerror").hide(0);    
        
        $("#loginerror").show(300);
        
        $("#loginerror").html("None of the fields can be left blank.");
        
    }
    
    
    if (filled) {
        
        appendTodo(todobody);
        $("#todobody").val("");
        
    }
    
    
} );
    
    
    
    
    
    
    
    
    
      function createtodo(front_id, body , important) {
        
          
          
          current = new Date();
        
          currentMilli = current.getTime();
         
          currentArray.push(currentMilli);
            
  
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>create_todo",
             type: "POST",
             async: true,
              timeout: 15000,
             data: {
                "todo": 1,
                 "body": body,
                 "group_id": page_group_id,
                 "time": currentMilli,
                 "important": important
             },
             success: function( data ) {
                 
             //  alert(data);
                 
             var jsonNewTodo = JSON.parse( data );
            
             var statusNewTodo =  jsonNewTodo[0];
                 
             var idNewTodo =  jsonNewTodo[1];
                 
             if (statusNewTodo == 1) {
                 
             $("#new_post_" + front_id).prepend('<input id=\"hidden_input_'+ front_id +'\" type=\"hidden\" value=\"' + idNewTodo + '\"  />');
                 
             $(".new_post_opt_" + front_id).show(300);
                 
             $("#new_create_task_" + front_id).show(300);
                 
             }
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    function sendNewTask( front_num, body, post_front_num ) {
        
       //   alert(front_num)
          
          current_2 = new Date();
        
          currentMilli_2 = current_2.getTime();
         
          currentArray.push(currentMilli_2);
            
  
          db_todo_id = $("#hidden_input_" + post_front_num).val();
        
        
      //  alert($("#hidden_input_" + post_front_num).val())
        
       // alert(db_todo_id)
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>create_task",
             type: "POST",
              timeout: 15000,
             async: true,
             data: {
                "task": 1,
                 "body": body,
                 "group_id": page_group_id,
                 "time": currentMilli_2,
                 "post_id": db_todo_id
             },
             success: function( data ) {
                                  console.log(data)
              
             var jsonNewTask = JSON.parse( data );
            
             var statusNewTask =  jsonNewTask[0];
                 
             var idNewTask =  jsonNewTask[1];
                 

                 
             if (statusNewTask == 1) {
                 
                 
                 
             $("#new_single_task_" + front_num).prepend('<input class=\"task_hidden_input_'+ front_num +'\" type=\"hidden\" value=\"' + idNewTask + '\"  />');
                 
                 
             $("#new_task_option_todo_" + front_num).show(300);
                 
             
                 
                 
                 
                 
             }
                 
                 
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    function sendNewComment(task, body, comment, state ) {
        
        current_4 = new Date();
        
        currentMilli_4 = current_4.getTime();
        
        
        
        if (state == "to-do") {
            
            comment_state = 1;
            
        } else if (state == "doing") {
            
            comment_state = 2;
            
        } else if (state == "done") {
            
            comment_state = 3;
            
        }
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>create_comment",
             type: "POST",
              timeout: 15000,
             async: true,
             data: {
                 "comment": 1,
                 "body": body,
                 "group_id": page_group_id,
                 "time": currentMilli_4,
                 "task_id": task,
                 "state": comment_state
                
             },
             success: function( data ) {
                 
             var jsonNewComment = JSON.parse( data );
            
             var statusNewComment =  jsonNewComment[0];
                 
             var idNewComment =  jsonNewComment[1];
                 

                 
             if (statusNewComment == 1) {
                 
                 
                 
             $("#newcomment_id_" + comment).prepend('<input class=\"comment_hidden_input_'+ comment +'\" type=\"hidden\" value=\"' + idNewComment + '\"  />');
                 
                 
             $("#new_comment_option_" + comment).show(300);
                 
             }

                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    
    
    
    function sendToDoing(front_num, back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>send_to_doing",
             type: "POST",
              timeout: 15000,
             async: true,
             data: {
                "task": 1,
                 "task_id": back_id
                
             },
             success: function( data ) {
                 
             var jsonDoing = JSON.parse( data );
            
             var statusDoing =  jsonDoing[0];
                 
             var idDoing =  jsonDoing[1];
                 

                 
             if (statusDoing == 1) {
                 
             $("#new_task_option_doing_" + front_num).show(300);
                 
             }
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    function sendToDone(front_num, back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>send_to_done",
             type: "POST",
              timeout: 15000,
             async: true,
             data: {
                "task": 1,
                 "task_id": back_id
                
             },
             success: function( data ) {
                 
             var jsonDone = JSON.parse( data );
            
             var statusDone =  jsonDone[0];
                 
             var idDone =  jsonDone[1];
                 

                 
             if (statusDone == 1) {
                 
             $("#new_task_option_done_" + front_num).show(300);
                 
             }
                 
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
    
    
    
    
    
    
    
    
    
    
    function search_posts(term) {
        
        search_posts_url = "<?php echo $_SESSION['url_placeholder'];  ?>search_todos";
        
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
              
        //  alert(d.trim())
              
              
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
                 
                 
                        if (resultSearch.type == "todo") {
                    
                    how_many_tasks(resultSearch.id);
                    
                    htmlSearch += '<div class=\"old-todo-row row\">';
                    
                    htmlSearch += '<div class=\"col-xs-2\">';
                    
                    htmlSearch += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultSearch.image  +' \" class=\"chat-left-1\"  /></a>';
                    
                    htmlSearch += '</div>';
                    
                    htmlSearch += '<div class=\"col-xs-10\">';
                    
                    htmlSearch += '<div class=\"old-todo-main\">';
                    
                    htmlSearch += '<p class=\"old-todo-para\">'+ resultSearch.listname +'</p>';
                    
                    htmlSearch += '<a><div class=\"old-todo-links\"> <a>'+ resultSearch.username +' |</a> <a class=\"old-num-task-'+ resultSearch.id +'\"></a> <a href=\"'+ '<?php echo $_SESSION['url_placeholder']; ?>list/' + resultSearch.group_id + '/' + resultSearch.id +'">View To-do list</a> </div></a>';
                    
                    htmlSearch += '</div></div></div>';
                    
                    
                     
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
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        function deleteTaskSend( back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>delete_task",
             type: "POST",
              timeout: 15000,
             async: true,
             data: {
                "task": 1,
                 "task_id": back_id
                
             },
             success: function( data ) {
                 
             console.log(data);

                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
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
    
    
    
    
    function appendTodo(body) {
        
        
        current_username = '<?php echo $user_info['username']; ?>';
        
        
        append_todo = '<div id=\"new_post_'+ new_post_id_num +'\" class=\"to-do-main\">';
        
        append_todo += '<div class=\"row\">';
        
        append_todo += '<div class=\"col-xs-6\">';
        
        append_todo += '<p style=\"margin-left: 30px;\" class=\"to-do-heading-x\"> '+ body +' </p>';
        
        append_todo += '</div>';
        
        append_todo += '<div class=\"col-xs-6\" style=\"padding-top: 10px;\"><div class=\"new_post_opt_'+ new_post_id_num +'\" style=\"display: none; float: right; padding-right: 20px;\">';
        
        append_todo += '<a class=\"work-font\">'+  current_username +' | </a>';
        
        append_todo += '<a class=\"work-font delete_new_opt_'+ new_post_id_num +'\">delete?</a> <a onclick=\"deletenewpost(' + new_post_id_num + ') \" class=\"work-font delete_new_opt_'+ new_post_id_num +'\">yes  //</a> <a class=\"work-font delete_new_opt_'+ new_post_id_num +'\" onclick=\"show_delete(' + new_post_id_num + ') \">no</a>';
        
        append_todo += '<a><img style=\" margin-left: 10px; height: 15px; width: 15px;\" onclick=\"show_delete(' + new_post_id_num + ') \" class=\" size-3-todo '+ 'start_delete' + new_post_id_num +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" /></a>';
        
        
        append_todo += '<a><img  style=\" margin-left: 10px; height: 15px; width: 15px;\" class=\" '+ 'start_delete' + new_post_id_num + '   like_delete'  +  new_post_id_num  +  '    \" src=\"' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' + '\" onclick=\"likenewpost(' + new_post_id_num + ') \" /></a>';
        
        
        append_todo += '<a>  <img style=\" width: 17px; margin-left: 7px;\" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a>';
        
        append_todo += '</div></div>';
        
        append_todo += '</div>';
        
        
        
        append_todo += '<div class=\"row\">';
        
        
        
        
        
        append_todo += '<div class=\"col-xs-4 to-do-right to-do-class\">';
        
        append_todo += '<p class=\"to-do-title\">To-do</p>';
        
        append_todo += '<p class=\"to-do-info\">Tasks you want to accomplish.</p>';
        
        append_todo += '<button id=\"new_create_task_'+ new_post_id_num +'\" onclick=\"toggleNewtask('+ new_post_id_num +')\"  class=\"btn new-todo-1\" style=\"margin-top: 20px; display: none;\">Create task</button>';
        
        
        append_todo += '<div id=\"new_task_'+ new_post_id_num +'\" style=\"display: none;\">';
        
        
        append_todo += '<textarea id=\"new_task_body_'+ new_post_id_num +'\"  maxlength=\"100\" name=\"keywords\" class=\"input-todo-1-x\"  placeholder=\"add new task\" ></textarea>';
        
        append_todo += '<a onclick=\"appendNewtask('+ new_post_id_num +')\" class=\"to-do-link-2\">submit</a>';
        
        append_todo += '</div>';
        
        append_todo += '<div class=\"segment\" id=\"segment_todo_'+ new_post_id_num +'\"></div>';
        
        append_todo += '</div>';
        
        
        
        
        append_todo += '<div class=\"col-xs-4 to-do-right to-do-class\">';
        
        append_todo += '<p class=\"to-do-title\">Doing</p>';
        
        append_todo += '<p class=\"to-do-info\">Tasks that are still going on.</p>';
        
        append_todo += '<div class=\"segment\" id=\"segment_doing_'+ new_post_id_num +'\"></div>';
        
        append_todo += '</div>';
        
        
        
        
        append_todo += '<div class=\"col-xs-4 to-do-class\">';
        
        append_todo += '<p class=\"to-do-title\">Done</p>';
        
        append_todo += '<p class=\"to-do-info\">Completed tasks.</p>';
        
        append_todo += '<div class=\"segment\" id=\"segment_done_'+ new_post_id_num +'\"></div>';
        
        append_todo += '</div>';
        
        
        
        append_todo += '</div></div>';
        
        $("#start").hide();
        
        $("#continue").hide();
        
        var new_items_todo = $( append_todo ).hide();
        
        $( '#main-div' ).prepend( new_items_todo );
        
        new_items_todo.show( 100 );
        
        
        $(".delete_new_opt_" + new_post_id_num).hide();
        
        
                    
          if ($('#important1').is(':checked')) {
        
          important_var = "true";   
          
          } else {
        
          important_var = "false";
          
          }  
        
                    
        createtodo(new_post_id_num, body, important_var);
        
        
         $('#important1').prop('checked', false);
        
        
        new_post_id_num = new_post_id_num + 1;
    
                        
    }
    
    
    
    
    
        
    function likenewpost(front_id) {
           
           
            if ( $('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
           like_new_back_id = $("#hidden_input_" + front_id).val();
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
           timeout: 15000,
             async: true,
             data: {
                "likepost": 1,
                "post_id": like_new_back_id,
                 "group_id": page_group_id
             },
             success: function( data ) {
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } ); 
           
           
     } 
    
    
    
    
    
      function deletenewpost(front_id) {
    
       $("#new_post_" + front_id).hide(200);
     
       delete_post_url_new = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_post";
        
       delete_new_back_id = $("#hidden_input_" + front_id).val();
       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
           timeout: 15000,
             async: true,
             data: {
                "deletepost": 1,
                "post_id": delete_new_back_id
             },
             success: function( data ) {
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );  
       
       
   }  
    
    
    
    
    
    
    function deleteTask (front)  {
        
        
        $("#new_single_task_" + front).hide(300);
        
        $("#new_single_task_2_" + front).hide(300);
        
        $("#new_single_task_3_" + front).hide(300);
        
        deleteTaskSend($(".task_hidden_input_" + front).val());
        
    }
    
    
    
    
    function deleteComment (front)  {
        
        
        $("#newcomment_id_" + front).hide(300);
        

        
       deleteTaskSend($(".comment_hidden_input_" + front).val());
        
    }
    
    
    
  
    function toggleNewtask (new_post_num)  {
        
        
        $("#new_task_" + new_post_num).toggle(300);
        
    }
    
    
    
    function show_delete (new_post_num)  {
        
        
        $(".delete_new_opt_" + new_post_num).toggle(300);
        
    }
    
    
    
    function toggleDeleteTask (new_task_num)  {
        
        
        $(".delete-link-1-" + new_task_num).toggle(300);
        
    }
    
    
    
        function toggleDoingTask (new_task_num)  {
        
        
        $(".doing-link-1-" + new_task_num).toggle(300);
        
    }
    
    
    
    function toggleDeleteComment (new_comment_num)  {
        
        
        $(".delete-link-2-" + new_comment_num).toggle(300);
        
    }
    
    
    
    function toggleNewComment (new_post_num)  {
        
        
        $(".new_task_comment_" + new_post_num).toggle(300);
        
    }
    
    
    
    
    function toggleNewComment2 (new_post_num)  {
        
        
        $(".new_task_comment_2_" + new_post_num).toggle(300);
        
    }
    
    
    
    
    
    
    function appendNewtask(new_post_num) {
        
        if ($("#new_task_body_" + new_post_num).val().trim().length > 0) {
            
            task_body = $("#new_task_body_" + new_post_num).val().replace(/['"\\]+/g, "");
            
            
                 append_task_1 = '';
        
        append_task_1 += '<div id=\"new_single_task_'+ new_task_id_num +'\" class=\"to-do-box\">';
                            
        append_task_1 += '<p class=\"to-do-task-x\">'+ task_body +'<br>';
            
        
                            
        append_task_1 += '<div id=\"new_task_option_todo_'+ new_task_id_num +'\" style=\"display: none;\"><span class=\"to-do-link-x\"><a onclick=\"toggleNewComment('+ new_task_id_num  +')\">comment</a> /<a onclick=\"toggleDoingTask('+ new_task_id_num  +')\"> "doing"</a> / <a onclick=\"toggleDeleteTask('+ new_task_id_num  +')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';   
          
            append_task_1 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ new_task_id_num +'\"><a>delete? </a> <a onclick=\"deleteTask('+ new_task_id_num  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ new_task_id_num  +')\"> No </a></p>';
            
            
            append_task_1 += '<p style=\"display: none;\" class=\"to-do-link doing-link-1-'+ new_task_id_num +'\"><a>move to "doing"? </a> <a  onclick=\"moveToDoing('+ new_task_id_num + ',' +   new_post_num + ',\'' + task_body +  '\')\">Yes </a>//<a onclick=\"toggleDoingTask('+ new_task_id_num  +')\"> No </a></p>';
            
        append_task_1 += '<textarea  id=\"new_task_comment_'+ new_task_id_num +'\" class=\"input-task-1-x new_task_comment_'+ new_task_id_num +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_1 += '<a class=\"task-link-2 new_task_comment_'+ new_task_id_num +'\"  style=\"display: none;\" onclick=\"appendNewComment('+ new_task_id_num +')\" >submit</a>';
            
        append_task_1 += '<div id=\"append_task_comment_'+ new_task_id_num +'\"></div>';
            
        append_task_1 += '';
        
        append_task_1 += '</div>';
        
        
        var new_items_task_1 = $( append_task_1 ).hide();
        
        
        $( '#segment_todo_' + new_post_num ).prepend( new_items_task_1 );
        
        new_items_task_1.show( 100 );
        
         //   alert("sending this" + new_task_id_num)
            
        sendNewTask(new_task_id_num, task_body, new_post_num);
            
        new_task_id_num = new_task_id_num + 1;
        
      //  $("#new_create_task_" + new_post_num).hide();
        
        $("#new_task_body_" + new_post_num).val("");
        
        $("#new_task_" + new_post_num).hide();
            
        } else {
            
            
            
        }
        
        
    }
        
        
        
        
        
        function appendNewComment(new_task_num) {
        
        if ($("#new_task_comment_" + new_task_num).val().trim().length > 0) {
            
        comment_body = $("#new_task_comment_" + new_task_num).val();
            
            
      
        append_comment_1 = '';
            
        append_comment_1 += '<div id=\"newcomment_id_'+ new_comment_id_num  +'\">';
            
        append_comment_1 += '<p  class=\"to-do-comment-x\">'+ comment_body +'<br>';
        
        append_comment_1 += '<div id=\"new_comment_option_'+ new_comment_id_num +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\">delete </a>     <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                            
            
        append_comment_1 += '<p class=\"to-do-link delete-link-2-'+ new_comment_id_num +'\" ><a>delete? </a> <a onclick=\"deleteComment('+ new_comment_id_num  + ')\">Yes </a>//<a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\"> No </a></p>';
       
        append_comment_1 += '</div>';
        
        var new_items_comment_1 = $( append_comment_1 ).hide();
        
        
        $( '#append_task_comment_' + new_task_num ).prepend( new_items_comment_1 );
        
        new_items_comment_1.show( 100 );
            
            
        $(".delete-link-2-" + new_comment_id_num).hide();
        
        
            
        sendNewComment($(".task_hidden_input_" + new_task_num).val(), comment_body, new_comment_id_num, "to-do");
            
        new_comment_id_num = new_comment_id_num + 1;
        
    
        
        $("#new_task_comment_" + new_task_num ).val("");
        
        $(".new_task_comment_" + new_task_num ).hide();  
            
        } else {
            
            
            
        }
                            
                    
    }
    
    
    
    
    
    
    function appendNewComment_2(new_task_num) {
        
        if ($("#new_task_comment_2_" + new_task_num).val().trim().length > 0) {
            
        comment_body = $("#new_task_comment_2_" + new_task_num).val();
            
            
      
        append_comment_2 = '';
            
        append_comment_2 += '<div id=\"newcomment_id_'+ new_comment_id_num  +'\">';
            
        append_comment_2 += '<p class=\"to-do-comment-x\">'+ comment_body +'<br>';
        
        append_comment_2 += '<div id=\"new_comment_option_'+ new_comment_id_num +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\">delete </a><a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                            
        append_comment_2 += '<p class=\"to-do-link delete-link-2-'+ new_comment_id_num +'\" ><a>delete? </a> <a onclick=\"deleteComment('+ new_comment_id_num  + ')\">Yes </a>//<a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\"> No </a></p>';   
        
        append_comment_2 += '</div>'
        
        var new_items_comment_2 = $( append_comment_2 ).hide();
        
        
        $( '#append_task_comment_2_' + new_task_num ).prepend( new_items_comment_2 );
        
        new_items_comment_2.show( 100 );
            
            $(".delete-link-2-" + new_comment_id_num).hide();
            
        
        
            
        sendNewComment($(".task_hidden_input_" + new_task_num).val(), comment_body, new_comment_id_num, "doing");
            
        new_comment_id_num = new_comment_id_num + 1;
        
    
        
        $("#new_task_comment_2_" + new_task_num ).val("");
        
        $(".new_task_comment_2_" + new_task_num ).hide();  
            
        } else {
            
            
            
        }
                            
                    
    }
    
    


    
    function moveToDoing (task_id, post_id, task_body)  {
        
        $("#new_single_task_" + task_id).hide();
        
        
        
        
        append_task_2 = '';
        
        append_task_2 += '<div id=\"new_single_task_2_'+ task_id +'\" class=\"to-do-box\">';
                            
        append_task_2 += '<p class=\"to-do-task-x\">'+ task_body +'<br>';
                            
        append_task_2 += '<div id=\"new_task_option_doing_'+ task_id +'\" style=\"display: none;\"><span class=\"to-do-link-x\"><a onclick=\"toggleNewComment2('+ task_id  +')\">comment</a> / <a onclick=\"toggleDoingTask('+ task_id  +')\">"done"</a> / <a onclick=\"toggleDeleteTask('+ task_id  +')\">delete</a>  <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>'; 
        
        
        append_task_2 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ task_id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ task_id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ task_id  +')\"> No </a></p>';
        
        
        
        append_task_2 += '<p style=\"display: none;\" class=\"to-do-link doing-link-1-'+ task_id +'\"><a>move to "done"? </a> <a onclick=\"moveToDone('+ task_id + ',' +   post_id + ',\'' + task_body +  '\')\">Yes </a>//<a onclick=\"toggleDoingTask('+ task_id  +')\"> No </a></p>';
        
        
        append_task_2 += '<textarea  id=\"new_task_comment_2_'+ task_id +'\" class=\"input-task-1-x new_task_comment_2_'+ task_id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_2 += '<a class=\"task-link-2 new_task_comment_2_'+ task_id +'\"  style=\"display: none;\" onclick=\"appendNewComment_2('+ task_id +')\" >submit</a>';
        
        append_task_2 += '<div id=\"append_task_comment_2_'+ task_id +'\"></div>';
        
        append_task_2 += '</div>';
        
        
        var new_items_task_2 = $( append_task_2 ).hide();
        
        
        $( '#segment_doing_' + post_id ).prepend( new_items_task_2 );
        
        new_items_task_2.show( 300 );
        

        sendToDoing(task_id, $(".task_hidden_input_" + task_id).val());
            
      //  new_task_id_num = new_task_id_num + 1;
        
        
        
    }
    
    
    
    
    
    
    
    
    
        function moveToDone (task_id, post_id, task_body)  {
        
        $("#new_single_task_2_" + task_id).hide();
        
        
        
        
        append_task_3 = '';
        
        append_task_3 += '<div id=\"new_single_task_3_'+ task_id +'\" class=\"to-do-box\">';
                            
        append_task_3 += '<p class=\"to-do-task-x\">'+ task_body +'<br>';
                            
        append_task_3 += '<div id=\"new_task_option_done_'+ task_id +'\" style=\"display: none;\"><span class=\"to-do-link-x\"><a onclick=\"toggleDeleteTask('+ task_id  +')\">delete</a>  <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';  
            
        append_task_3 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ task_id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ task_id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ task_id  +')\"> No </a></p>';
        
        append_task_3 += '</div>';
        
        
        var new_items_task_3 = $( append_task_3 ).hide();
        
        
        $( '#segment_done_' + post_id ).prepend( new_items_task_3 );
        
        new_items_task_3.show( 300 );
        
        sendToDone(task_id, $(".task_hidden_input_" + task_id).val());
            
      //  new_task_id_num = new_task_id_num + 1;
        
        
        
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
        
        
        
       
       displayFromDatabasePagination();
        
       $(window).unbind("scroll");
       
    
        
    } );
    
    
    
    
   /* 
    
    
      $( window ).on( "scroll", function() {
        
       if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
           
        displayFromDatabasePagination();
           
          $(window).unbind("scroll");
           
       }
        
    } );
    
    
    */
    
    
 
function displayFromDatabasePagination() {
        
    completedPosts = false;
    
    fetch_old_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_old_todos";
      
    var flag;
        
    flag =   $.ajax( {
        
          url: fetch_old_url,
          type: "POST",
        timeout: 15000,
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
                                                              
               $('#loading').hide();
                
               var jsonOldPost = JSON.parse( data );
                
               var jsonOldLength = jsonOldPost.old_posts.length;
              
               var oldPostHtml = "";
                
               for ( var for_oldpost = 0; for_oldpost < jsonOldLength; for_oldpost++ ) {
                   
                   
                  var resultOldPost = jsonOldPost.old_posts[ for_oldpost ];
                   
                  firstTimeID = resultOldPost.id;
                   
                   
            
                if (resultOldPost.type == "todo") {
                    
                    how_many_tasks(resultOldPost.id);
                    
                    oldPostHtml += '<div class=\"old-todo-row row\">';
                    
                    oldPostHtml += '<div class=\"col-xs-2\">';
                    
                    oldPostHtml += '<a><img src=\" '+ '<?php echo $_SESSION['url_placeholder'];  ?>' + resultOldPost.image  +' \" class=\"chat-left-1\"  /></a>';
                    
                    oldPostHtml += '</div>';
                    
                    oldPostHtml += '<div class=\"col-xs-10\">';
                    
                    oldPostHtml += '<div class=\"old-todo-main\">';
                    
                    oldPostHtml += '<a href=\"'+ '<?php echo $_SESSION['url_placeholder']; ?>list/' + page_group_id + '/' + resultOldPost.id +'"><p class=\"old-todo-para\">'+ resultOldPost.listname +'</p></a>';
                    
                    oldPostHtml += '<div class=\"old-todo-links\"> <p style=\"width: 100px; display: inline;\">'+ resultOldPost.username +' |</p> <p style=\"width: 100px; display: inline;\" class=\"old-num-task-'+ resultOldPost.id +'\"></p> </div>';
                    
                    oldPostHtml += '</div></div></div>';
                    
                    
                     
                 }
                 
             }
                
             $( '#main-div' ).append( oldPostHtml );                            
                                                              
        } 
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                 $("#loading").hide();
                
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
                
            } ));     }      
                
          }
        
        
       } ); 
     
        if (!completedPosts) {
        
      $('#loading').show();
    
    } 
    
    
    if (completedPosts) { 
    
    $('#loading').hide();
        
    }

}
    
    
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</script>   