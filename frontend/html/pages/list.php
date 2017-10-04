

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
               </span>  <span class="logo-heading-2">//</span> all to-dos</a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
            <div style="float: right;">
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group to-dos" />
                
            
            
            
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
                    
                    
       
                    
                    <div id="main-div">
                      
                        
                        <a href="<?php echo $_SESSION['url_placeholder'];  ?>todo/<?php echo $_GET['group']; ?>" style="font-family: Work Sans;">New To-do | All group to-dos.</a>
                        
                        
                        
                        
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

top_post_id = "<?php echo $_GET['todo'];  ?>";
    
current_username = '<?php echo $user_info['username']; ?>';
    
    
    
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
    
    
    
    
    
    
    
    
    
      function createtodo(front_id, body ) {
        
          
          
          current = new Date();
        
          currentMilli = current.getTime();
         
          currentArray.push(currentMilli);
            
  
          
          $.ajax( {
             url: "<?php echo $_SESSION['url_placeholder']; ?>create_todo",
             type: "POST",
              timeout: 15000,
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
                 
             $(".new_post_opt_" + front_id).show(300);
                 
             }
                 
             },
             error: function( xhr, textStatus, errorThrown ) {
                $.ajax( this );
                return;
             }
          } );
      
    }
    
    
    
    
    
    
    
    function sendNewTask( front_num, body, back_num ) {
        
       //   alert(front_num)
          
          current_2 = new Date();
        
          currentMilli_2 = current_2.getTime();
         
          currentArray.push(currentMilli_2);
            
  
        
        
        
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
                 "post_id": back_num
             },
             success: function( data ) {
                                  
              
             var jsonNewTask = JSON.parse( data );
            
             var statusNewTask =  jsonNewTask[0];
                 
             var idNewTask =  jsonNewTask[1];
                 
//alert(statusNewTask)
                 
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
    
    
    
    
    
    
        function deleteTaskSend( back_id ) {
       // alert(back_id)
          
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
        
        
        
        
        
        append_todo = '<div id=\"new_post_'+ new_post_id_num +'\" class=\"to-do-main\">';
        
        append_todo += '<div class=\"row\">';
        
        append_todo += '<div class=\"col-xs-6\">';
        
        append_todo += '<p style=\"margin-left: 30px;\" class=\"to-do-heading\"> '+ body +' </p>';
        
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
        
        
        $(".delete_new_opt_" + new_post_id_num).hide();
        
                    
        createtodo(new_post_id_num, body);          
        
        
        new_post_id_num = new_post_id_num + 1;
    
                        
    }
    
    
    
    
    
        
    function likenewpost(front_id) {
           
           
            if ( $('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg' ) {
              
                   
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg');
              
               
           } else if ($('.like_delete' + front_id).attr('src') == '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/like.svg') {
              
              
                   $('.like_delete' + front_id).attr('src', '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/unlike.svg');
               
               
           }
           
          
           
       like_old_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "like_old";
       
       $.ajax( {
             url: like_old_url,
             type: "POST",
           timeout: 15000,
             async: true,
             data: {
                "likepost": 1,
                "post_id": front_id,
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
        

       
       $.ajax( {
             url: delete_post_url_new,
             type: "POST",
           timeout: 15000,
             async: true,
             data: {
                "deletepost": 1,
                "post_id": front_id
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
        
        deleteTaskSend(front);
        
    }
    
    
    
    
       function deleteTaskAppend (front)  {
        
           
        
        $("#new_single_task_" + front).hide(300);
        
        $("#new_single_task_2_" + front).hide(300);
        
        $("#new_single_task_3_" + front).hide(300);
         
        
        deleteTaskSend($(".task_hidden_input_" + front).val());
        
    }
    
    
    
    
    
     function deleteTaskNew (front)  {
         
         
        
        
        
        $("#new_single_task_" + front).hide(300);
        
        $("#new_single_task_2_" + front).hide(300);
        
        $("#new_single_task_3_" + front).hide(300);
        
        deleteTaskSend($(".task_hidden_input_" + front).val());
        
    }
    
    
    
    
    function deleteComment (front)  {
        
        
        $("#newcomment_id_" + front).hide(300);
        

        if ($(".comment_hidden_input_" + front).val() == null)  {
            
            deleteTaskSend(front);
            
        } else {
            
            deleteTaskSend($(".comment_hidden_input_" + front).val());
            
        }
        
        
        
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
    
    
    function toggleDeleteTaskNew (new_task_num)  {
        
       // alert("mooewfoiw");
        
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
            
           // alert(new_post_num)
        append_task_1 = '';
        
        append_task_1 += '<div id=\"new_single_task_'+ new_task_id +'\" class=\"to-do-box\">';
                            
        append_task_1 += '<p class=\"to-do-task\">'+ '<a style=\"cursor: auto;\">' + current_username + ' | </a>' + task_body +'<br>';
            
        
                            
        append_task_1 += '<div id=\"new_task_option_todo_'+ new_task_id +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleNewComment(\''+ new_task_id  +'\')\">comment</a> /<a onclick=\"toggleDoingTask(\''+ new_task_id  +'\')\"> "doing"</a> / <a onclick=\"toggleDeleteTaskNew(\''+ new_task_id  +'\')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';   
          
            append_task_1 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ new_task_id +'\"><a>delete? </a> <a onclick=\"deleteTaskNew(\''+ new_task_id  + '\')\">Yes </a>//<a onclick=\"toggleDeleteTaskNew(\''+ new_task_id  +'\')\"> No </a></p>';
            
            append_task_1 += '<p style=\"display: none;\" class=\"to-do-link doing-link-1-'+ new_task_id +'\"><a>move to "doing"? </a> <a  onclick=\"moveToDoing(\''+ new_task_id + '\',' +   new_post_num + ',\'' + task_body +  '\')\">Yes </a>//<a onclick=\"toggleDoingTask(\''+ new_task_id  +'\')\"> No </a></p>';
            
        append_task_1 += '<textarea  id=\"new_task_comment_'+ new_task_id +'\" class=\"input-task-1 new_task_comment_'+ new_task_id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_1 += '<a class=\"task-link-2 new_task_comment_'+ new_task_id +'\"  style=\"display: none;\" onclick=\"appendNewComment(\''+ new_task_id +'\')\" >submit</a>';
            
        append_task_1 += '<div id=\"append_task_comment_'+ new_task_id +'\"></div>';
            
        append_task_1 += '';
        
        append_task_1 += '</div>';
        
        
        var new_items_task_1 = $( append_task_1 ).hide();
        
        
        $( '#segment_todo_' + new_post_num ).prepend( new_items_task_1 );
        
        new_items_task_1.show( 100 );
        
         //   alert("sending this" + new_task_id)
            
        sendNewTask(new_task_id, task_body, new_post_num);
            
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
            
        append_comment_1 += '<p  class=\"to-do-comment\">'+ '<a style=\"cursor: auto;\">' + current_username + ' | </a>' + comment_body +'<br>';
        
        append_comment_1 += '<div id=\"new_comment_option_'+ new_comment_id_num +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\">delete </a>     <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                            
            
        append_comment_1 += '<p class=\"to-do-link delete-link-2-'+ new_comment_id_num +'\" ><a>delete? </a> <a onclick=\"deleteComment('+ new_comment_id_num  + ')\">Yes </a>//<a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\"> No </a></p>';
       
        append_comment_1 += '</div>';
        
        var new_items_comment_1 = $( append_comment_1 ).hide();
        
        
        $( '#append_task_comment_' + new_task_num ).prepend( new_items_comment_1 );
        
        new_items_comment_1.show( 100 );
            
            
        $(".delete-link-2-" + new_comment_id_num).hide();
        
        
            
            if ($(".task_hidden_input_" + new_task_num).val() == null) {
                
                sendNewComment(new_task_num, comment_body, new_comment_id_num, "to-do");
                
            } else {
                
                sendNewComment($(".task_hidden_input_" + new_task_num).val(), comment_body, new_comment_id_num, "to-do");
                
                
            }
            
        
            
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
            
        append_comment_2 += '<p class=\"to-do-comment\">'+ '<a style=\"cursor: auto;\">' + current_username + ' | </a>' + comment_body +'<br>';
        
        append_comment_2 += '<div id=\"new_comment_option_'+ new_comment_id_num +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteComment(\''+ new_comment_id_num  +'\')\">delete </a><a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                            
        append_comment_2 += '<p class=\"to-do-link delete-link-2-'+ new_comment_id_num +'\" ><a>delete? </a> <a onclick=\"deleteComment(\''+ new_comment_id_num  + '\')\">Yes </a>//<a onclick=\"toggleDeleteComment('+ new_comment_id_num  +')\"> No </a></p>';   
        
        append_comment_2 += '</div>'
        
        var new_items_comment_2 = $( append_comment_2 ).hide();
            
            
            

        
        
        $( '#append_task_comment_2_' + new_task_num ).prepend( new_items_comment_2 );
        
        new_items_comment_2.show( 100 );
            
            $(".delete-link-2-" + new_comment_id_num).hide();
            
        
        
            
            
                        if ($(".task_hidden_input_" + new_task_num).val() == null) {
                            
                sendNewComment(new_task_num, comment_body, new_comment_id_num, "doing");
                
            } else {
                
                sendNewComment($(".task_hidden_input_" + new_task_num).val(), comment_body, new_comment_id_num, "doing");
                
                
            }
            
            
        
            
        new_comment_id_num = new_comment_id_num + 1;
        
    
        
        $("#new_task_comment_2_" + new_task_num ).val("");
        
        $(".new_task_comment_2_" + new_task_num ).hide();  
            
        } else {
            
            
            
        }
                            
                    
    }
    
    


    
    function moveToDoing (task_id, post_id, task_body)  {
        
        $("#new_single_task_" + task_id).hide();
        
        
      // alert(post_id)
        
        append_task_2 = '';
        
        append_task_2 += '<div id=\"new_single_task_2_'+ task_id +'\" class=\"to-do-box\">';
                            
        append_task_2 += '<p class=\"to-do-task\">'+ '<a style=\"cursor: auto;\">' + current_username + ' | </a>' + task_body +'<br>';
                            
        append_task_2 += '<div id=\"new_task_option_doing_'+ task_id +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleNewComment2(\''+ task_id  +'\')\">comment</a> / <a onclick=\"toggleDoingTask(\''+ task_id  +'\')\">"done"</a> / <a onclick=\"toggleDeleteTask(\''+ task_id  +'\')\">delete</a>  <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>'; 
        
        
        append_task_2 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ task_id +'\"><a>delete? </a> <a onclick=\"deleteTaskAppend(\''+ task_id  + '\')\">Yes </a>//<a onclick=\"toggleDeleteTask(\''+ task_id  +'\')\"> No </a></p>';
        
        
        append_task_2 += '<p style=\"display: none;\" class=\"to-do-link doing-link-1-'+ task_id +'\"><a>move to "done"? </a> <a onclick=\"moveToDone(\''+ task_id + '\',' +   post_id + ',\'' + task_body +  '\')\">Yes </a>//<a onclick=\"toggleDoingTask(\''+ task_id  +'\')\"> No </a></p>';
        
        
        append_task_2 += '<textarea  id=\"new_task_comment_2_'+ task_id +'\" class=\"input-task-1 new_task_comment_2_'+ task_id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_2 += '<a class=\"task-link-2 new_task_comment_2_'+ task_id +'\"  style=\"display: none;\" onclick=\"appendNewComment_2(\''+ task_id +'\')\" >submit</a>';
        
        append_task_2 += '<div id=\"append_task_comment_2_'+ task_id +'\"></div>';
        
        append_task_2 += '</div>';
        
     //   alert(task_id)
        var new_items_task_2 = $( append_task_2 ).hide();
        
        
        $( '#segment_doing_' + post_id ).prepend( new_items_task_2 );
        
        new_items_task_2.show( 300 );
        
        
        
        if ($(".task_hidden_input_" + task_id).val() == null) {
            
            sendToDoing(task_id, task_id);
            
            
        } else {
            
            sendToDoing(task_id, $(".task_hidden_input_" + task_id).val());
        }

         
            
      //  new_task_id_num = new_task_id_num + 1;
        
        
        
    }
    
    
    
    
    
    
    
    
    
        function moveToDone (task_id, post_id, task_body)  {
        
        $("#new_single_task_2_" + task_id).hide();
        
        
        
        
        append_task_3 = '';
        
        append_task_3 += '<div id=\"new_single_task_3_'+ task_id +'\" class=\"to-do-box\">';
                            
        append_task_3 += '<p class=\"to-do-task\">'+ '<a style=\"cursor: auto;\">' + current_username + ' | </a>' + task_body +'<br>';
                            
        append_task_3 += '<div id=\"new_task_option_done_'+ task_id +'\" style=\"display: none;\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteTask(\''+ task_id  +'\')\">delete</a>  <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';  
            
        append_task_3 += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ task_id +'\"><a>delete? </a> <a onclick=\"deleteTaskAppend(\''+ task_id  + '\')\">Yes </a>//<a onclick=\"toggleDeleteTask(\''+ task_id  +'\')\"> No </a></p>';
        
        append_task_3 += '</div>';
        
        
        var new_items_task_3 = $( append_task_3 ).hide();
        
        
        $( '#segment_done_' + post_id ).prepend( new_items_task_3 );
        
        new_items_task_3.show( 300 );
            
            if ($(".task_hidden_input_" + task_id).val() == null)  {
                
                sendToDone(task_id, task_id);
                
            } else {
                
                sendToDone(task_id, $(".task_hidden_input_" + task_id).val());
                
            }
        
        
            
      //  new_task_id_num = new_task_id_num + 1;
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    $( document ).ready( function() {
       
       displayFromDatabasePagination();
        
       $(window).unbind("scroll");
       
    
        
    } );
    
    
    
    
    
    
    
      $( window ).on( "scroll", function() {
        
       if ( ( window.innerHeight + window.scrollY ) >= document.body.offsetHeight ) {
           
        displayFromDatabasePagination();
           
          $(window).unbind("scroll");
           
       }
        
    } );
    
    
    
    
    
 
function displayFromDatabasePagination() {
        
    
    
    fetch_old_url = "<?php echo $_SESSION['url_placeholder'];  ?>fetch_one_todo";
      
    var flag;
        
    flag =   $.ajax( {
        
          url: fetch_old_url,
          type: "POST",
        timeout: 15000,
          async: true,
          data: {
              
             "fetchold": 1,
             "post_id": top_post_id
              
              
          },
          success: function( data ) {
           

            if (flag.readyState == 4 && flag.status == 200) { 
                                                              
 
                
               var jsonOldPost = JSON.parse( data );
                
               var jsonOldLength = jsonOldPost.old_posts.length;
              
            
                
               for ( var for_oldpost = 0; for_oldpost < jsonOldLength; for_oldpost++ ) {
                   
                   
                  var resultOldPost = jsonOldPost.old_posts[ for_oldpost ];
                   
                  firstTimeID = resultOldPost.id;
                   
                   
            
                if (resultOldPost.type == "todo") {
                    
                 getTaskOne();
                    
                 getTaskTwo();
                    
                 getTaskThree();
                    
                    
                    append_todo_old = '<div id=\"new_post_'+ resultOldPost.id +'\" class=\"to-do-main\">';
        
        append_todo_old += '<div class=\"row\">';
        
        append_todo_old += '<div class=\"col-xs-6\">';
        
        append_todo_old += '<p style=\"margin-left: 30px;\" class=\"to-do-heading\"> '+ resultOldPost.listname +' </p>';
        
        append_todo_old += '</div>';
        
        append_todo_old += '<div class=\"col-xs-6\" style=\"padding-top: 10px;\"><div class=\"new_post_opt_'+ resultOldPost.id +'\" style=\"float: right; padding-right: 20px;\">';
        
        append_todo_old += '<a class=\"work-font\">'+  resultOldPost.username +' | </a>';
        
        append_todo_old += '<a style=\"display: none;\" class=\"work-font delete_new_opt_'+ resultOldPost.id +'\">delete?</a> <a onclick=\"deletenewpost(' + resultOldPost.id + ') \" style=\"display: none;\" class=\"work-font delete_new_opt_'+ resultOldPost.id +'\">yes  //</a> <a style=\"display: none;\" class=\"work-font delete_new_opt_'+ resultOldPost.id +'\" onclick=\"show_delete(' + resultOldPost.id + ') \">no</a>';
        
                    
                    if (resultOldPost.owner  == '<?php  echo $_SESSION['admin_id']; ?>')  {
                        
                        append_todo_old += '<a><img style=\" margin-left: 10px; height: 15px; width: 15px;\" onclick=\"show_delete(' + resultOldPost.id + ') \" class=\" size-3-todo '+ 'start_delete' + resultOldPost.id +' \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/garbage.svg' + '\" /></a>';
                        
                    } else {

                    
                    
                    }
        
        
        
        append_todo_old += '<a><img  style=\" margin-left: 10px; height: 15px; width: 15px;\" class=\" '+ 'start_delete' + resultOldPost.id + '   like_delete'  +  resultOldPost.id  +  '    \" src=\"'  +  resultOldPost.like_src +'\" onclick=\"likenewpost(' + resultOldPost.id + ') \" /></a>';
        
        
        append_todo_old += '<a>  <img style=\" width: 17px; margin-left: 7px;\" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a>';
        
        append_todo_old += '</div></div>';
        
        append_todo_old += '</div>';
        
        
        
        append_todo_old += '<div class=\"row\">';
        
        
        
        
        
        append_todo_old += '<div class=\"col-xs-4 to-do-right to-do-class\">';
        
        append_todo_old += '<p class=\"to-do-title\">To-do</p>';
        
        append_todo_old += '<p class=\"to-do-info\">Tasks you want to accomplish.</p>';
        
        append_todo_old += '<button id=\"new_create_task_'+ resultOldPost.id +'\" onclick=\"toggleNewtask('+ resultOldPost.id +')\"  class=\"btn new-todo-1\" style=\"margin-top: 20px;\">Create task</button>';
        
        
        append_todo_old += '<div id=\"new_task_'+ resultOldPost.id +'\" style=\"display: none;\">';
        
        
        append_todo_old += '<textarea id=\"new_task_body_'+ resultOldPost.id +'\"  maxlength=\"100\" name=\"keywords\" class=\"input-todo-1\"  placeholder=\"add new task\" ></textarea>';
        
        append_todo_old += '<a onclick=\"appendNewtask('+ resultOldPost.id +')\" class=\"to-do-link-2\">submit</a>';
        
        append_todo_old += '</div>';
        
        append_todo_old += '<div class=\"segment\" id=\"segment_todo_'+ resultOldPost.id +'\"></div>';
        
        append_todo_old += '</div>';
        
        
        
        
        append_todo_old += '<div class=\"col-xs-4 to-do-right to-do-class\">';
        
        append_todo_old += '<p class=\"to-do-title\">Doing</p>';
        
        append_todo_old += '<p class=\"to-do-info\">Tasks that are still going on.</p>';
        
        append_todo_old += '<div class=\"segment\" id=\"segment_doing_'+ resultOldPost.id +'\"></div>';
        
        append_todo_old += '</div>';
        
        
        
        
        append_todo_old += '<div class=\"col-xs-4 to-do-class\">';
        
        append_todo_old += '<p class=\"to-do-title\">Done</p>';
        
        append_todo_old += '<p class=\"to-do-info\">Completed tasks.</p>';
        
        append_todo_old += '<div class=\"segment\" id=\"segment_done_'+ resultOldPost.id +'\"></div>';
        
        append_todo_old += '</div>';
        
        
        
        append_todo_old += '</div></div>';
                    
                     
                 }
                 
             }
                
             $( '#main-div' ).append( append_todo_old );                            
                                                              
        } 
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                
                
                
          }
        
        
       } ); 
       

}
    
    
       
    
    
    
    
 
function getTaskOne() {
        
    
    
    fetch_task_url = "<?php echo $_SESSION['url_placeholder'];  ?>get_task_with_number";
      
       $.ajax( {
        
          url: fetch_task_url,
          type: "POST",
           timeout: 15000,
          async: true,
          data: {
              
             "fetchold": 1,
             "post_id": top_post_id,
              "type": 1
              
              
          },
          success: function( data ) {
           

           // alert(data)
            

                                                              
 
                
               var jsonOldTask = JSON.parse( data );
                
               var jsonOldLengthTask = jsonOldTask.old_posts.length;
              
                  append_task_old = '';
               for ( var for_oldtask = 0; for_oldtask < jsonOldLengthTask; for_oldtask++ ) {
                   
                   
                  var resultOldTask = jsonOldTask.old_posts[ for_oldtask ];
                   
                
                   
                   
            
                if (resultOldTask.type == "task") {
                    
                 //   how_many_tasks(resultOldPost.id);
                    
                    
                    
                    
          
        
        append_task_old += '<div id=\"new_single_task_'+ resultOldTask.id +'\" class=\"to-do-box\">';
                            
        append_task_old += '<p class=\"to-do-task\">'+ '<a style=\"cursor: auto;\">' + resultOldTask.username + ' | </a>' + resultOldTask.body +'<br>';
            
        
                    if (resultOldTask.owner == "<?php echo $user_info['id']; ?>") {
                      
                        append_task_old += '<div id=\"new_task_option_todo_'+ resultOldTask.id +'\"><span class=\"to-do-link\"><a onclick=\"toggleNewComment('+ resultOldTask.id  +')\">comment</a> /<a onclick=\"toggleDoingTask('+ resultOldTask.id  +')\"> "doing"</a> / <a onclick=\"toggleDeleteTask('+ resultOldTask.id  +')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';   
                        
                        
                    } else {
                        
                        append_task_old += '<div id=\"new_task_option_todo_'+ resultOldTask.id +'\"><span class=\"to-do-link\"><a onclick=\"toggleNewComment('+ resultOldTask.id  +')\">comment</a> <a style=\"display: none;\" onclick=\"moveToDoing('+ resultOldTask.id + ',' +   resultOldTask.id + ',\'' + resultOldTask.body +  '\')\"> "doing"</a>  <a style=\"display: none;\" onclick=\"toggleDeleteTask('+ resultOldTask.id  +')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';   
                        
                        
                    }
                            
        
          
            append_task_old += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ resultOldTask.id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ resultOldTask.id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ resultOldTask.id  +')\"> No </a></p>';
                    
                    
             append_task_old += '<p style=\"display: none;\" class=\"to-do-link doing-link-1-'+ resultOldTask.id +'\"><a>move to "doing"? </a> <a onclick=\"moveToDoing('+ resultOldTask.id + ',' +   top_post_id + ',\'' + resultOldTask.body +  '\')\">Yes </a>//<a onclick=\"toggleDoingTask('+ resultOldTask.id  +')\"> No </a></p>';
            
        append_task_old += '<textarea  id=\"new_task_comment_'+ resultOldTask.id +'\" class=\"input-task-1 new_task_comment_'+ resultOldTask.id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_old += '<a class=\"task-link-2 new_task_comment_'+ resultOldTask.id +'\"  style=\"display: none;\" onclick=\"appendNewComment('+ resultOldTask.id +')\" >submit</a>';
            
        append_task_old += '<div id=\"append_task_comment_'+ resultOldTask.id +'\"></div>';
            
        append_task_old += '';
        
        append_task_old += '</div>';
        
                    
          getCommentOne(resultOldTask.id);         

                     
                 }
                 
             }
                
             $( '#segment_todo_' + top_post_id ).append( append_task_old );                            
                                                              
        
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                
                
                
          }
        
        
       } ); 
       

}
    
    
       
       
    
 
        
    
 
function getTaskTwo() {
        
    
    
    fetch_task_url = "<?php echo $_SESSION['url_placeholder'];  ?>get_task_with_number";
      
       $.ajax( {
        
          url: fetch_task_url,
          type: "POST",
           timeout: 15000,
          async: true,
          data: {
              
             "fetchold": 1,
             "post_id": top_post_id,
              "type": 2
              
              
          },
          success: function( data ) {
           

           // alert(data)
            
            
                                                              
 
                
               var jsonOldTaskTwo = JSON.parse( data );
                
               var jsonOldLengthTaskTwo = jsonOldTaskTwo.old_posts.length;
              
                  append_task_old_two = '';
               for ( var for_oldtaskTwo = 0; for_oldtaskTwo < jsonOldLengthTaskTwo; for_oldtaskTwo++ ) {
                   
                   
                  var resultOldTaskTwo = jsonOldTaskTwo.old_posts[ for_oldtaskTwo ];
                   
                
                   
                   
            
                if (resultOldTaskTwo.type == "task") {
                    
                 //   how_many_tasks(resultOldPost.id);
                    
                    
                    
                    
          
        
        append_task_old_two += '<div id=\"new_single_task_2_'+ resultOldTaskTwo.id +'\" class=\"to-do-box\">';
                            
        append_task_old_two += '<p class=\"to-do-task\">'+ '<a style=\"cursor: auto;\">' + resultOldTaskTwo.username + ' | </a>'+ resultOldTaskTwo.body +'<br>';
                    
                    
            
        if (resultOldTaskTwo.owner == "<?php echo $user_info['id']; ?>") {
                            
        append_task_old_two += '<div id=\"new_task_option_todo_'+ resultOldTaskTwo.id +'\"><span class=\"to-do-link\"><a onclick=\"toggleNewComment2(\''+ resultOldTaskTwo.id  +'\')\">comment</a> /<a  onclick=\"toggleDoingTask('+ resultOldTaskTwo.id  +')\"> "done"</a> / <a onclick=\"toggleDeleteTask('+ resultOldTaskTwo.id  +')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';   
          
        } else {
            
            append_task_old_two += '<div id=\"new_task_option_todo_'+ resultOldTaskTwo.id +'\"><span class=\"to-do-link\"><a onclick=\"toggleNewComment2(\''+ resultOldTaskTwo.id  +'\')\">comment</a> <a style=\"display: none;\" onclick=\"moveToDoing('+ resultOldTaskTwo.id + ',' +   resultOldTaskTwo.id + ',\'' + resultOldTaskTwo.body +  '\')\"> "done"</a> <a style=\"display: none;\" onclick=\"toggleDeleteTask('+ resultOldTaskTwo.id  +')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>'; 
            
            
            
        }
            
            
            
            append_task_old_two += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ resultOldTaskTwo.id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ resultOldTaskTwo.id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ resultOldTaskTwo.id  +')\"> No </a></p>';
                    
                    
          append_task_old_two += '<p style=\"display: none;\" class=\"to-do-link doing-link-1-'+ resultOldTaskTwo.id +'\"><a>move to "done"? </a> <a onclick=\"moveToDone('+ resultOldTaskTwo.id + ',' +   top_post_id + ',\'' + resultOldTaskTwo.body +  '\')\">Yes </a>//<a onclick=\"toggleDoingTask('+ resultOldTaskTwo.id  +')\"> No </a></p>';
            
        append_task_old_two += '<textarea  id=\"new_task_comment_2_'+ resultOldTaskTwo.id +'\" class=\"input-task-1 new_task_comment_2_'+ resultOldTaskTwo.id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_old_two += '<a class=\"task-link-2 new_task_comment_2_'+ resultOldTaskTwo.id +'\"  style=\"display: none;\" onclick=\"appendNewComment_2(\''+ resultOldTaskTwo.id +'\')\" >submit</a>';
            
        append_task_old_two += '<div id=\"append_task_comment_2_'+ resultOldTaskTwo.id +'\"></div>';
            
        append_task_old_two += '';
        
        append_task_old_two += '</div>';
        
                    
                    
        getCommentTwo(resultOldTaskTwo.id);
                     
                 }
                 
             }
                
             $( '#segment_doing_' + top_post_id ).append( append_task_old_two );                            
                                                              
        
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                
                
                
          }
        
        
       } ); 
       

}
    
    
       
    
    
    
    
function getTaskThree() {
        
    
    
    fetch_task_url = "<?php echo $_SESSION['url_placeholder'];  ?>get_task_with_number";
      
       $.ajax( {
        
          url: fetch_task_url,
          type: "POST",
           timeout: 15000,
          async: true,
          data: {
              
             "fetchold": 1,
             "post_id": top_post_id,
              "type": 3
              
              
          },
          success: function( data ) {
           

           // alert(data)
            
            
                                                              
 
                
               var jsonOldTaskThree = JSON.parse( data );
                
               var jsonOldLengthTaskThree = jsonOldTaskThree.old_posts.length;
              
                  append_task_old_Three = '';
               for ( var for_oldtaskThree = 0; for_oldtaskThree < jsonOldLengthTaskThree; for_oldtaskThree++ ) {
                   
                   
                  var resultOldTaskThree = jsonOldTaskThree.old_posts[ for_oldtaskThree ];
                   
                
                   
                   
            
                if (resultOldTaskThree.type == "task") {
                    
                 //   how_many_tasks(resultOldPost.id);
                    
                    
                    
                    
          
        
        append_task_old_Three += '<div id=\"new_single_task_3_'+ resultOldTaskThree.id +'\" class=\"to-do-box\">';
                            
        append_task_old_Three += '<p class=\"to-do-task\">'+ '<a style=\"cursor: auto;\">' + resultOldTaskThree.username + ' | </a>' + resultOldTaskThree.body +'<br>';
            
        if (resultOldTaskThree.owner == "<?php echo $user_info['id']; ?>") {
                            
        append_task_old_Three += '<div id=\"new_task_option_todo_'+ resultOldTaskThree.id +'\" ><span class=\"to-do-link\"><a onclick=\"toggleDeleteTask('+ resultOldTaskThree.id  +')\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
            
        } else {
            
            append_task_old_Three += '<div id=\"new_task_option_todo_'+ resultOldTaskThree.id +'\" ><span class=\"to-do-link\"><a onclick=\"toggleDeleteTask('+ resultOldTaskThree.id  +')\"    style=\"display: none;\">delete</a> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
            

            
        }
          
            append_task_old_Three += '<p style=\"display: none;\" class=\"to-do-link delete-link-1-'+ resultOldTaskThree.id +'\"><a>delete? </a> <a onclick=\"deleteTask('+ resultOldTaskThree.id  + ')\">Yes </a>//<a onclick=\"toggleDeleteTask('+ resultOldTaskThree.id  +')\"> No </a></p>';
            
        append_task_old_Three += '<textarea  id=\"new_task_comment_'+ resultOldTaskThree.id +'\" class=\"input-task-1 new_task_comment_'+ resultOldTaskThree.id +'\"  maxlength=\"100\" name=\"keywords\"  style=\"display: none;\"  placeholder=\"add new comment\" ></textarea>';
        
        append_task_old_Three += '<a class=\"task-link-2 new_task_comment_'+ resultOldTaskThree.id +'\"  style=\"display: none;\" onclick=\"appendNewComment('+ resultOldTaskThree.id +')\" >submit</a>';
            
        append_task_old_Three += '<div id=\"append_task_comment_'+ resultOldTaskThree.id +'\"></div>';
            
        append_task_old_Three += '';
        
        append_task_old_Three += '</div>';
        
                    
                    

                     
                 }
                 
             }
                
             $( '#segment_done_' + top_post_id ).append( append_task_old_Three );                            
                                                              
        
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                
                
                
          }
        
        
       } ); 
       

}
        
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    
function getCommentOne(post_id) {
        
    
    
    fetch_Comment_url = "<?php echo $_SESSION['url_placeholder'];  ?>get_comment_with_number";
      
       $.ajax( {
        
          url: fetch_Comment_url,
          type: "POST",
           timeout: 15000,
          async: true,
          data: {
              
             "fetchold": 1,
             "post_id": post_id,
              "type": 1
              
              
          },
          success: function( data ) {
           

           // alert(data)
            
        
                                                              
 
                
               var jsonOldCommentOne = JSON.parse( data );
                
               var jsonOldLengthCommentOne = jsonOldCommentOne.old_posts.length;
              
                  append_comment_old = '';
               for ( var for_oldCommentOne = 0; for_oldCommentOne < jsonOldLengthCommentOne; for_oldCommentOne++ ) {
                   
                   
                  var resultOldCommentOne = jsonOldCommentOne.old_posts[ for_oldCommentOne ];
                   
                
                   
                   
            
                if (resultOldCommentOne.type == "comment") {
                    
                 //   how_many_Comments(resultOldPost.id);
                    
                    
        
            
        append_comment_old += '<div id=\"newcomment_id_'+ resultOldCommentOne.id  +'\">';
            
        append_comment_old += '<p  class=\"to-do-comment\">'+ '<a style=\"cursor: auto;\">' + resultOldCommentOne.username + ' | </a>' + resultOldCommentOne.body +'<br>';
                    
                    
                    if (resultOldCommentOne.owner == "<?php echo $user_info['id']; ?>")  {
                    
        
        append_comment_old += '<div id=\"new_comment_option_'+ resultOldCommentOne.id +'\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ resultOldCommentOne.id  +')\">delete </a>     <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                            
                    } else {
                        
                             append_comment_old += '<div id=\"new_comment_option_'+ resultOldCommentOne.id +'\"><span class=\"to-do-link\"> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';  
                        
                    }
            
        append_comment_old += '<p class=\"to-do-link delete-link-2-'+ resultOldCommentOne.id +'\" style=\"display: none;\"><a >delete? </a> <a onclick=\"deleteComment('+ resultOldCommentOne.id  + ')\">Yes </a>//<a onclick=\"toggleDeleteComment('+ resultOldCommentOne.id  +')\"> No </a></p>';
       
        append_comment_old += '</div>';  
                    
          
                    $(".delete-link-2-" + resultOldCommentOne.id).hide();
        

                     
                 }
                 
             }
                
             $( '#append_task_comment_' + post_id ).append( append_comment_old );                            
                                                              
        
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                
                
                
          }
        
        
       } ); 
       

}
       
    
    
    
    
function getCommentTwo(post_id) {
        
    
    
    fetch_Comment_url = "<?php echo $_SESSION['url_placeholder'];  ?>get_comment_with_number";
      
       $.ajax( {
        
          url: fetch_Comment_url,
          type: "POST",
           timeout: 15000,
          async: true,
          data: {
              
             "fetchold": 1,
             "post_id": post_id,
              "type": 2
              
              
          },
          success: function( data ) {
           

           // alert(data)
            
        
                                                              
 
                
               var jsonOldCommentTwo = JSON.parse( data );
                
               var jsonOldLengthCommentTwo = jsonOldCommentTwo.old_posts.length;
              
                  append_comment_old_two = '';
               for ( var for_oldCommentTwo = 0; for_oldCommentTwo < jsonOldLengthCommentTwo; for_oldCommentTwo++ ) {
                   
                   
                  var resultOldCommentTwo = jsonOldCommentTwo.old_posts[ for_oldCommentTwo ];
                   
                
                   
                   
            
                if (resultOldCommentTwo.type == "comment") {
                    
                 //   how_many_Comments(resultOldPost.id);
                    
                    
        
            
        append_comment_old_two += '<div id=\"newcomment_id_'+ resultOldCommentTwo.id  +'\">';
            
        append_comment_old_two += '<p  class=\"to-do-comment\">'+ '<a style=\"cursor: auto;\">' + resultOldCommentTwo.username + ' | </a>' + resultOldCommentTwo.body +'<br>';
                    
                    
                    if (resultOldCommentTwo.owner == "<?php echo $user_info['id']; ?>")  {
                        
                                append_comment_old_two += '<div id=\"new_comment_option_'+ resultOldCommentTwo.id +'\"><span class=\"to-do-link\"><a onclick=\"toggleDeleteComment('+ resultOldCommentTwo.id  +')\">delete </a>     <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                        
                    } else {
                        
                                append_comment_old_two += '<div id=\"new_comment_option_'+ resultOldCommentTwo.id +'\"><span class=\"to-do-link\"> <a><img class=\" size-check \" src=\"  ' +  '<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/checked.svg' + '\" /></a></span></p></div>';
                        
                    }
        

                            
            
        append_comment_old_two += '<p class=\"to-do-link delete-link-2-'+ resultOldCommentTwo.id +'\" style=\"display: none;\"><a >delete? </a> <a onclick=\"deleteComment('+ resultOldCommentTwo.id  + ')\">Yes </a>//<a onclick=\"toggleDeleteComment('+ resultOldCommentTwo.id  +')\"> No </a></p>';
       
        append_comment_old_two += '</div>';  
                    
          
                    $(".delete-link-2-" + resultOldCommentTwo.id).hide();
        

                     
                 }
                 
             }
                
             $( '#append_task_comment_2_' + post_id ).append( append_comment_old_two );                            
                                                              
        
             
             
          },
        
            error: function( xhr, textStatus, errorThrown ) {
               
             
                
             },
                    
            complete: function( ) {
                  
                
                
                
          }
        
        
       } ); 
       

}
       
    
    
    
</script>   