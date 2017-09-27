

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
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_name = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_name['name'];
                        
                    }
                
                ?>
               </span>  <span class="logo-heading-2">//</span> all polls</a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
            <div style="float: right;">
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group polls" />
                
            
            
            
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
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
            
            
            </div>
            
                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div">
                
                
                
                
                
                
                <div class="col-xs-9">
                    
                    
            <input id="todobody"  maxlength="100" name="keywords" class="search-main"  placeholder="what are you working on?" />
                         <a>
                
            <button id="createtodo" class="btn new-group-1" style="margin-left: 15px; margin-top: 0px;">   
                    
            create to-do list</button>
            
            </a><br><br>
                    
                    <div id="main-div">
                      
                        
                    </div>

                    
                      
                        
                         
                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    
                    
                    
                    
                    
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

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
                    
$get_all_groups_of_user = $member->all_users_groups_except($_SESSION['admin_id'], $_GET['group']);

$get_all_groups_of_user_result = $get_all_groups_of_user->get_result();

$numRows = $get_all_groups_of_user_result->num_rows;

      
               if ($numRows > 0) {
                   
                   
                    while($row = $get_all_groups_of_user_result->fetch_assoc()) {
                        
                    
                        
                        
                        
                         $get_find_group_by_id = $group->find_group_by_id($row['group_id']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_other = $get_find_group_by_id_result->fetch_assoc()) {  ?>
                        
                        
                        
                        
                        
               
                        
                        
                        
                        
                        <div class="row group-list-row" onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>';">
                        
                        
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
                    
                    
                    
                    

                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    


</body>
    
 
    
</html>




    
<script type="text/javascript" src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/jquery-3.2.1.min.js"></script>



<script type="text/javascript">
    
page_group_id = "<?php echo $_GET['group'];  ?>";
    
currentArray = [];
    
new_post_id_num = 0;
    
new_post_id = "new_post" + new_post_id_num;
    
    
new_task_id_num = 0;
    
new_task_id = "new_task" + new_task_id_num;
    
    
new_comment_id_num = 0;
    
new_comment_id = "new_comment" + new_task_id_num;
    
    
   
    
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
    
    
    
    
    
    
    
    
    
      function createtodo(front_id, body ) {
        
          
          
          current = new Date();
        
          currentMilli = current.getTime();
         
          currentArray.push(currentMilli);
            
  
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>create_todo",
             type: "POST",
             async: true,
             data: {
                "todo": 1,
                 "body": body,
                 "group_id": page_group_id,
                 "time": currentMilli
             },
             success: function( data ) {
                 
             //  alert(data);
                 
             var jsonNewTodo = JSON.parse( data );
            
             var statusNewTodo =  jsonNewTodo[0];
                 
             var idNewTodo =  jsonNewTodo[1];
                 
             if (statusNewTodo == 1) {
                 
             $("#new_post_" + front_id).prepend('<input id=\"hidden_input_'+ front_id +'\" type=\"hidden\" value=\"' + idNewTodo + '\"  />');
                 
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
                 
             }

                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    
    
    
    function sendToDoing( back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>send_to_doing",
             type: "POST",
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
    
    
    
    
    
    function sendToDone( back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>send_to_done",
             type: "POST",
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
    
    
    
    
    
    
        function deleteTaskSend( back_id ) {
        
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>delete_task",
             type: "POST",
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
    
    
    
    
    
    
    
    function appendTodo(body) {
        
        
        append_todo = '<div id=\"new_post_'+ new_post_id_num +'\" class=\"to-do-main\">';
        
        append_todo += '<p class=\"to-do-heading\"> '+ body +' </p>';
        
        append_todo += '<div class=\"row\">';
        
        
        
        
        
        append_todo += '<div class=\"col-xs-4 to-do-right to-do-class\">';
        
        append_todo += '<p class=\"to-do-title\">To-do</p>';
        
        append_todo += '<p class=\"to-do-info\">Tasks you want to accomplish.</p>';
        
        append_todo += '<button id=\"new_create_task_'+ new_post_id_num +'\" onclick=\"toggleNewtask('+ new_post_id_num +')\"  class=\"btn new-todo-1\" style=\"margin-top: 20px;\">Create task</button>';
        
        
        append_todo += '<div id=\"new_task_'+ new_post_id_num +'\" style=\"display: none;\">';
        
        
        append_todo += '<textarea id=\"new_task_body_'+ new_post_id_num +'\"  maxlength=\"100\" name=\"keywords\" class=\"input-todo-1\"  placeholder=\"add new task\" ></textarea>';
        
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
        
        
        
        var new_items_todo = $( append_todo ).hide();
        
        $( '#main-div' ).prepend( new_items_todo );
        
        new_items_todo.show( 100 );
        
        
        
        
                    
        createtodo(new_post_id_num, body);          
        
        
        new_post_id_num = new_post_id_num + 1;
    
                        
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
    
    
    
    function toggleDeleteTask (new_task_num)  {
        
        
        $(".delete-link-1-" + new_task_num).toggle(300);
        
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
            
            task_body = $("#new_task_body_" + new_post_num).val();
            
            
                 append_task_1 = '';
        
        append_task_1 += '<div id=\"new_single_task_'+ new_task_id_num +'\" class=\"to-do-box\">';
                            
        append_task_1 += '<p class=\"to-do-task\">'+ task_body +'<br>';
                            
        append_task_1 += '<span class=\"to-do-link\"><a onclick=\"toggleNewComment('+ new_task_id_num  +')\">comment</a> /<a onclick=\"moveToDoing('+ new_task_id_num + ',' +   new_post_num + ',\'' + task_body +  '\')\"> "doing"</a> / <a onclick=\"toggleDeleteTask('+ new_task_id_num  +')\">delete</a></span></p>';   
          
            append_task_1 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ new_task_id_num +'\"><a>delete? </a> <a onclick=\"deleteTask('+ new_task_id_num  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ new_task_id_num  +')\"> No </a></p>';
            
        append_task_1 += '<textarea  id=\"new_task_comment_'+ new_task_id_num +'\" class=\"input-task-1 new_task_comment_'+ new_task_id_num +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
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
            
        append_comment_1 += '<p  class=\"to-do-comment\">'+ comment_body +'<br>';
        
        append_comment_1 += '<span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\">delete </a></span></p>';
                            
            
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
            
        append_comment_2 += '<p class=\"to-do-comment\">'+ comment_body +'<br>';
        
        append_comment_2 += '<span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\">delete </a></span></p>';
                            
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
                            
        append_task_2 += '<p class=\"to-do-task\">'+ task_body +'<br>';
                            
        append_task_2 += '<span class=\"to-do-link\"><a onclick=\"toggleNewComment2('+ task_id  +')\">comment</a> / <a onclick=\"moveToDone('+ task_id + ',' +   post_id + ',\'' + task_body +  '\')\">"done"</a> / <a onclick=\"toggleDeleteTask('+ task_id  +')\">delete</a></span></p>'; 
        
        
        append_task_2 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ task_id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ task_id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ task_id  +')\"> No </a></p>';
        
        
        append_task_2 += '<textarea  id=\"new_task_comment_2_'+ task_id +'\" class=\"input-task-1 new_task_comment_2_'+ task_id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_2 += '<a class=\"task-link-2 new_task_comment_2_'+ task_id +'\"  style=\"display: none;\" onclick=\"appendNewComment_2('+ task_id +')\" >submit</a>';
        
        append_task_2 += '<div id=\"append_task_comment_2_'+ task_id +'\"></div>';
        
        append_task_2 += '</div>';
        
        
        var new_items_task_2 = $( append_task_2 ).hide();
        
        
        $( '#segment_doing_' + post_id ).prepend( new_items_task_2 );
        
        new_items_task_2.show( 300 );
        

        sendToDoing($(".task_hidden_input_" + task_id).val());
            
      //  new_task_id_num = new_task_id_num + 1;
        
        
        
    }
    
    
    
    
    
    
    
    
    
        function moveToDone (task_id, post_id, task_body)  {
        
        $("#new_single_task_2_" + task_id).hide();
        
        
        
        
        append_task_3 = '';
        
        append_task_3 += '<div id=\"new_single_task_3_'+ task_id +'\" class=\"to-do-box\">';
                            
        append_task_3 += '<p class=\"to-do-task\">'+ task_body +'<br>';
                            
        append_task_3 += '<span class=\"to-do-link\"><a onclick=\"toggleDeleteTask('+ task_id  +')\">delete</a></span></p>';  
            
        append_task_3 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ task_id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ task_id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ task_id  +')\"> No </a></p>';
        
        append_task_3 += '</div>';
        
        
        var new_items_task_3 = $( append_task_3 ).hide();
        
        
        $( '#segment_done_' + post_id ).prepend( new_items_task_3 );
        
        new_items_task_3.show( 300 );
        
        sendToDone($(".task_hidden_input_" + task_id).val());
            
      //  new_task_id_num = new_task_id_num + 1;
        
        
        
    }
</script>   