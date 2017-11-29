

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
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
    
</head>
    
    
    
    
    
<body class="dashboard-body">
    
    
    

    
    
   <nav class="nav-head ">
    
    <div class="row nav-main-row div-scale">
        
        
        <div class="col-xs-4">
            
            <a href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
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
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-8">
            
            
            <div style="float: right;">
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group chat" />
                
            
            
            
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
                    
                    
                    
                        
                        
                        
                        
                           
                    <div class="row post-editor">
                        
                    
                        
                        
                    <div class="col-xs-2" id="chatboxicon" style="cursor: pointer;">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/chatbox.svg" class="input-style-1"  />
                        
                        <p class="input-style-2">Chat</p>
                        
                    </div>
                        
                        
                        
                        
                      
                  
                        
                        
                        
                        
                    <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/camera.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Photo/Album</p>
                        
                    </div>
                        
                        
                        
                        
                        
                    <a href="<?php echo $_SESSION['url_placeholder'] . "todo/" . $_GET['group'];  ?>"><div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/list.svg" class="input-style-1" />
                        
                         <p class="input-style-2">To-do list</p>
                        
                        </div></a>
                        
                        
                        
                        
                        
                        
                    <div class="col-xs-2" id="pollicon" style="cursor: pointer;">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/hands.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Polls</p>
                        
                    </div>
                        
                        
                       
                       <a href="<?php echo $_SESSION['url_placeholder'] . "members/" . $_GET['group'];  ?>">
                        <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/network.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Members</p>
                        
                        </div> </a> 
                        
                        
                        
                        
                        
                          
                       <a href="<?php echo $_SESSION['url_placeholder'] . "likes" ?>">
                        <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/save.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Likes</p>
                        
                        </div> </a> 
                    
                    </div>
                    
                    
                        
                        
                        
                        
                        
                        
                        
                        
                       <div style="margin-top: 20px; display: none;" id="typing">
                        
                      <p style="font-family: Work Sans; font-size: 16px;">Someone is typing...</p>
                      
                    
                        
                    </div>
                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    
                    
                   <div id="chatbox" style="display: none; margin-bottom: -40px;">
                    
                        <textarea id="text" type="text" class="search-main" maxlength="200" placeholder="write something" style="margin-bottom: 10px; width: 100%; height: 70px; resize: none; outline: none;"></textarea>
                       
                       
                       
                       <div id="replybox" style="width: 350px; background: white; padding: 7px; border-radius: 3px; display: none;">
                           
                       <input id="replyid" type="hidden" value="" />
                           
                           
                       <input id="replytextvalue" type="hidden" value="" />
                           
                           
                       <input id="replyusernamevalue" type="hidden" value="" />
                           
                       
                       
                       <p style="font-family: Work Sans; font-size: 19px;">Reply to:</p>
                       <p style="font-family: Work Sans; font-size: 15px; word-wrap: break-word;" id="replytext"></p>
                       
                       <a id="closereply">X</a>
                       </div>
                       
                       
                       <!-- <input type="button" value="Upload file" onclick="uploadFile()" /><br> -->
                       
                       <progress value="0" max="100" id="progressBar" style="height: 5px; width: 250px; display: none;"></progress> 
                       
                       <a id="status" style="display: inline; font-family: Work Sans;
   font-size: 16px; margin-left: 20px;"></a>
                       
                       
                       <a id="progressMessage" style="font-family: Work Sans;
   font-size: 15px;
   "></a><br>
                       
                       
                       
                       
                       
                       
                       
                       
                       
                                              
                       <label id="file1label" for="file1" class="custom-file-upload" style="background: #ddd; padding: 3px; border-radius: 4px; font-family: Josefin Slab;
   font-size: 16px; cursor: pointer; margin-left: 0px; margin-top: 10px;
   font-weight: bold;">
    select file
</label>
                       <input type="file" id="file1" class="btn" style="display: none;"/><br>
                       
                     
                    
                      <!--  <a id="chatboxfile"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/attachment.svg" style="width: 13px; cursor: pointer;"  /></a> -->
                    
                        <a id="chatboxclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 0px; cursor: pointer;"  /></a> 
                       
                       
                         <a id="abort" style="text-decoration: underline; display: none; font-family: Work Sans;  
    max-width: 190px;">cancel upload</a>
                       
                       <a id="check1" style="margin-left: 30px; font-family: Work Sans;"><label><input id="important1" type="checkbox" value=""> Important?</label></a> 

               <br><br>
        
                   </div> 
                    
                
                    
                    
                    <div id="pollbox" style="display: none; ">
                        
                        <p style="font-family: Work Sans; cursor: pointer;">Create a poll | <span><a onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "poll/" . $_GET['group'];   ?>';">View all polls in this group.</a></span></p>
                        
                        
                    <textarea id="poll-q" type="text" class="poll-q-style" maxlength="140" placeholder="write a poll question."></textarea>  
                        
                    <textarea id="poll-a1" type="text" class="poll-a-style" maxlength="140" placeholder="answer 1"></textarea>
                        
                    <textarea id="poll-a2" type="text" class="poll-a-style" maxlength="140" placeholder="answer 2"></textarea>
                        
                    <textarea id="poll-a3" type="text" class="poll-opt-show" maxlength="140" placeholder="answer 3 (optional)"></textarea>
                        
                    <textarea id="poll-a4" type="text" class="poll-opt" maxlength="140" placeholder="answer 4 (optional)"></textarea>
                        
                    <textarea id="poll-a5" type="text" class="poll-opt" maxlength="140" placeholder="answer 5 (optional)"></textarea>
                        
                    <textarea id="poll-a6" type="text" class="poll-opt" maxlength="140" placeholder="answer 6 (optional)"></textarea>
                        
                        
                    <textarea id="poll-a7" type="text" class="poll-opt" maxlength="140" placeholder="answer 7 (optional)"></textarea>
                        
                    <textarea id="poll-a8" type="text" class="poll-opt" maxlength="140" placeholder="answer 8 (optional)"></textarea>
                        
                    <textarea id="poll-a9" type="text" class="poll-opt" maxlength="140" placeholder="answer 9 (optional)"></textarea>
                        
                    <textarea id="poll-a10" type="text" class="poll-opt" maxlength="140" placeholder="answer 10 (optional)"></textarea>
                        
                        
                    <br>
                        
                        <p id="pollerror"></p>
                        
                    <a id="submitpoll">
                
                    <button class="btn poll-1">   
                    
                    Submit</button>
            
                    </a> 
                        
                        
                        
                    <a id="pollboxclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 10px; cursor: pointer;"  /></a> 
                      
                        
                    <a id="check1" style="margin-left: 30px; font-family: Work Sans;"><label><input id="important2" type="checkbox" value=""> Important?</label></a> 

                        
                        <br>
                    </div>
                 
                        
                        
                 
                    
                    
<div id="postsdiv" style="margin-top: 40px;">
                        

                            
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                        
                        
                        
                        
                        
                        
                        <div style="display: table; margin: 0 auto;">
                        
                                                <p id="start" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        Be the first to make a post. 
                        </p>
                        
                        
                        
                        <p id="continue" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        Be the first to make a post. 
                        </p>
                        
                        
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
                    
                    
                   
                    
                    
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);
                $get_find_group_by_id_result = $get_find_group_by_id->get_result();
             
                    while($group_list_this = $get_find_group_by_id_result->fetch_assoc()) { ?>
                        
                       
                    
                 <div class="row group-list-row">
                        
                        
                        <div class="col-xs-2">
                            
                           <img src="<?php echo $group_list_this['img_path']; ?>" width="40" height="40" class="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php
                                                                                           
                                                                                           
                                                             if (strlen($group_list_this['name']) <= 16)  {
                            
                            echo $group_list_this['name'];
                            
                        } else if (strlen($group_list_this['name']) > 16) {
                            
                            echo substr($group_list_this['name'], 0, 16). "...";
                            
                        }                                  
                                                                                           
                                                                                           
                                                                                           
                                                                                            ?></a><br>                            
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
                            
                           <img src="<?php  echo $group_list_other['img_path'];   ?>" width="40" height="40" class="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php  
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                        if (strlen($group_list_other['name']) <= 16)  {
                            
                            echo $group_list_other['name'];
                            
                        } else if (strlen($group_list_other['name']) > 16) {
                            
                            echo substr($group_list_other['name'], 0, 16). "...";
                            
                        }                                                        
                                                                                            
                                                                                            
                                                    
                                
                                
                                
                                ?></a><br>                            
                            <a class="group-list-membercount">         <?php
                                                                                            
                                              
$all_members_of_this_group = $member->all_members_of_this_group($group_list_other['id']);
$all_members_of_this_group_result = $all_members_of_this_group->get_result();                                                                  
                                                                                            
                         while($members_other = $all_members_of_this_group_result->fetch_assoc()) { echo $members_other['count'];  }                                                                   
                                                                                            
                                                                                            
                       ?> members</a>
                        
                        </div>
                        
                        
                        
                        <div class="col-xs-3 group-list-notif-1">
                            
                          <!--  <a class="group-list-notifs">76+</a> -->
                            
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















$last_details = $posts->last_seen($_GET['group']);

$last_details_result = $last_details->get_result();

$last_info = $last_details_result->fetch_assoc();






$is_seen = $group->is_seen($_GET['group']);

$is_seen_r = $is_seen->get_result();

$is_num_seen = $is_seen_r->num_rows;



if ($is_num_seen == 1) {
    
    $group->update_seen($_GET['group'], $last_info['id']);
    
}



if ($is_num_seen == 0) {
    
    $group->insert_seen($_GET['group'], $last_info['id']);
    
}




?>



<html lang="en">
    
    
    
    
<head>
    
    
    
    <title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create a group, add as many people as you like, and have a chat with them. Oh, you can also share files.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
   
</head>
    
    
    
    
    
<body class="dashboard-body">
  
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '146671652626617',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    



    
    
   <nav class="nav-head ">
       
       
    
    <div class="row nav-main-row div-scale">
        
        
        <div class="col-xs-4">
            
            <a href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
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
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-8">
            
            
            <div style="float: right;">
            
            
            <input id="myTextBox"  maxlength="100" name="keywords" class="search-main" placeholder="Search group chat" />
                
            
            
            
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
                    
                    
                    
                        
                        
                        
                        
                           
                    <div class="row post-editor">
                        
                    
                        
                        
                    <div class="col-xs-2" id="chatboxicon" style="cursor: pointer;">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/chatbox.svg" class="input-style-1"  />
                        
                        <p class="input-style-2">Chat/Upload</p>
                        
                    </div>
                        
                        
                        
                        
                      
                  
                        
                        
                        
                        
                    <a href="<?php echo $_SESSION['url_placeholder'] . "file/" . $_GET['group'];  ?>"><div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/camera.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Files List</p>
                        
                        </div></a>
                        
                        
                        
                        
                        
                    <a href="<?php echo $_SESSION['url_placeholder'] . "todo/" . $_GET['group'];  ?>"><div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/list.svg" class="input-style-1" />
                        
                         <p class="input-style-2">To-do list</p>
                        
                        </div></a>
                        
                        
                        
                        
                        
                        
                    <div class="col-xs-2" id="pollicon" style="cursor: pointer;">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/hands.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Polls</p>
                        
                    </div>
                        
                        
                       
                       <a href="<?php echo $_SESSION['url_placeholder'] . "members/" . $_GET['group'];  ?>">
                        <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/network.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Members</p>
                        
                        </div> </a> 
                        
                        
                        
                        
                        
                          
                       <a href="<?php echo $_SESSION['url_placeholder'] . "likes" ?>">
                        <div class="col-xs-2">
                        
                        <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/save.svg" class="input-style-1"  />
                        
                         <p class="input-style-2">Likes</p>
                        
                        </div> </a> 
                    
                    </div>
                    
                    
                        
                        
                        
                        
                        
                        
                        
                        

                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    
                    
                   <div id="chatbox" style="display: none; margin-bottom: -40px;">
                    
                        <textarea id="text" type="text" class="search-main" maxlength="600" placeholder="write something" style="margin-bottom: 10px; width: 100%; max-width: 600px; height: 70px; resize: none; outline: none;     word-break: break-all;
    word-wrap: break-word;"></textarea>
                       
                       
                       
                       <div id="replybox" style="width: 350px; background: white; padding: 7px; border-radius: 3px; display: none;">
                           
                       <input id="replyid" type="hidden" value="" />
                           
                           
                       <input id="replytextvalue" type="hidden" value="" />
                           
                           
                       <input id="replyusernamevalue" type="hidden" value="" />
                           
                       
                       
                       <p style="font-family: Work Sans; font-size: 19px;">Reply to:</p>
                       <p style="font-family: Work Sans; font-size: 15px; word-wrap: break-word;" id="replytext"></p>
                       
                       <a id="closereply">X</a>
                       </div>
                       
                       
                       <!-- <input type="button" value="Upload file" onclick="uploadFile()" /><br> -->
                       
                       <progress value="0" max="100" id="progressBar" style="height: 5px; width: 250px; display: none;"></progress> 
                       
                       <a id="status" style="display: inline; font-family: Work Sans;
   font-size: 16px; margin-left: 20px;"></a>
                       
                       
                       <a id="progressMessage" style="font-family: Work Sans;
   font-size: 15px;
   "></a><br>
                       
                       
                       
                       
                       
                       
                       
                       
                       
                                              
                       <label id="file1label" for="file1" class="custom-file-upload" style="background: #ddd; padding: 3px; border-radius: 4px; font-family: Josefin Slab;
   font-size: 16px; cursor: pointer; margin-left: 0px; margin-top: 10px;
   font-weight: bold;">
    select file
</label>
                       <input type="file" id="file1" class="btn" style="display: none;"/><br>
                       
                     
                    
                      <!--  <a id="chatboxfile"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/attachment.svg" style="width: 13px; cursor: pointer;"  /></a> -->
                    
                        <a id="chatboxclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 0px; cursor: pointer;"  /></a> 
                       
                       
                         <a id="abort" style="text-decoration: underline; display: none; font-family: Work Sans;  
    max-width: 190px;">cancel upload</a>
                       
                       <a id="check1" data-toggle="tooltip" data-placement="left" title="When you check this box, all members of this group will be notified about the post you send immediately after." style="margin-left: 30px; font-family: Work Sans;"><label><input id="important1" type="checkbox" value=""> Important?</label></a> 

               <br><br>
        
                   </div> 
                    
                
                    
                    
                    <div id="pollbox" style="display: none; ">
                        
                        <p style="font-family: Work Sans; cursor: pointer;">Create a poll | <span><a onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "poll/" . $_GET['group'];   ?>';">View all polls in this group.</a></span></p>
                        
                        
                    <textarea id="poll-q" type="text" class="poll-q-style" maxlength="140" placeholder="write a poll question."></textarea>  
                        
                    <textarea id="poll-a1" type="text" class="poll-a-style" maxlength="140" placeholder="answer 1"></textarea>
                        
                    <textarea id="poll-a2" type="text" class="poll-a-style" maxlength="140" placeholder="answer 2"></textarea>
                        
                    <textarea id="poll-a3" type="text" class="poll-opt-show" maxlength="140" placeholder="answer 3 (optional)"></textarea>
                        
                        
                        <p>Additonal boxes will appear when all the top ones are filled.</p>
                        
                    <textarea id="poll-a4" type="text" class="poll-opt" maxlength="140" placeholder="answer 4 (optional)"></textarea>
                        
                    <textarea id="poll-a5" type="text" class="poll-opt" maxlength="140" placeholder="answer 5 (optional)"></textarea>
                        
                    <textarea id="poll-a6" type="text" class="poll-opt" maxlength="140" placeholder="answer 6 (optional)"></textarea>
                        
                        
                    <textarea id="poll-a7" type="text" class="poll-opt" maxlength="140" placeholder="answer 7 (optional)"></textarea>
                        
                    <textarea id="poll-a8" type="text" class="poll-opt" maxlength="140" placeholder="answer 8 (optional)"></textarea>
                        
                    <textarea id="poll-a9" type="text" class="poll-opt" maxlength="140" placeholder="answer 9 (optional)"></textarea>
                        
                    <textarea id="poll-a10" type="text" class="poll-opt" maxlength="140" placeholder="answer 10 (optional)"></textarea>
                        
                        
                    <br>
                        
                        <p id="pollerror"></p>
                        
                    <a id="submitpoll">
                
                    <button class="btn poll-1">   
                    
                    Submit</button>
            
                    </a> 
                        
                        
                        
                    <a id="pollboxclose"><img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/cancel.svg" style="width: 13px; margin-left: 10px; cursor: pointer;"  /></a> 
                      
                        
                    <a id="check1" data-placement="left" title="When you check this box, all members of this group will be notified about the post you send immediately after." style="margin-left: 30px; font-family: Work Sans;"><label><input id="important2" type="checkbox" value=""> Important?</label></a> 

                        
                        <br>
                    </div>
                 
                        
                        
                 
                                           <div style="margin-top: 20px; margin-bottom: -20px; height: 25px;" >
                        
                      <p id="typing" style="font-family: Work Sans; font-size: 16px; display: none;">Someone is typing...</p>
                      
                    
                        
                    </div>
                    
<div id="postsdiv" style="margin-top: 40px;">
                        

                            
                        <!-- Posts go here. -->                        
            
                        
                    </div>
                        
                        
                        
                        
                        
                        
                        <div style="display: table; margin: 0 auto;">
                        
                                                <p id="start" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        Be the first to make a post. 
                        </p>
                        
                        
                        
                        <p id="continue" style="display: none; margin-bottom: 30px; font-size: 20px; font-family: Eczar;">
                        
                        Be the first to make a post. 
                        </p>
                        
                        
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
  
                    <div style="margin-left: 20px; margin-bottom: 10px;" class="fb-share-button" data-href="https://fridaycamp.com/login" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"></a></div>
                    
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['group']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_this = $get_find_group_by_id_result->fetch_assoc()) { ?>
                        
                       
                    
                 <div class="row group-list-row">
                        
                        
                        <div class="col-xs-2">
                            
                           <img src="<?php echo $group_list_this['img_path']; ?>" width="40" height="40" class="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a class="group-list-name"><?php
                                                                                           
                                                                                           
                                                             if (strlen($group_list_this['name']) <= 16)  {
                            
                            echo $group_list_this['name'];
                            
                        } else if (strlen($group_list_this['name']) > 16) {
                            
                            echo substr($group_list_this['name'], 0, 16). "...";
                            
                        }                                  
                                                                                           
                                                                                           
                                                                                           
                                                                                            ?></a><br>                            
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
                        
                        
                        
                        
                        
               
                        
                        
                        <a href="<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>">
                        
                        <div class="row group-list-row">
                        
                        
                        <div class="col-xs-2">
                            
                            <a href="<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>"><img src="<?php  echo $group_list_other['img_path'];   ?>" width="40" height="40" class="group-list-profile-img"  /></a>
                        
                        </div>
                        
                      
                        
                        <div class="col-xs-7 group-list-body">
                            
                            <a href="<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>" class="group-list-name"><?php  
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                        if (strlen($group_list_other['name']) <= 16)  {
                            
                            echo $group_list_other['name'];
                            
                        } else if (strlen($group_list_other['name']) > 16) {
                            
                            echo substr($group_list_other['name'], 0, 16). "...";
                            
                        }                                                        
                                                                                            
                                                                                            
                                                    
                                
                                
                                
                                ?></a><br>                            
                            <a href="<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>" class="group-list-membercount">         <?php
                                                                                            
                                              
$all_members_of_this_group = $member->all_members_of_this_group($group_list_other['id']);

$all_members_of_this_group_result = $all_members_of_this_group->get_result();                                                                  
                                                                                            
                         while($members_other = $all_members_of_this_group_result->fetch_assoc()) { echo $members_other['count'];  }                                                                   
                                                                                            
                                                                                            
                       ?> membs</a>
                            
                            
                            <a href="<?php echo $_SESSION['url_placeholder'] . "dashboard/" . $group_list_other['id'];   ?>" class="new_mess_<?php echo $group_list_other['id']; ?>"></a>
                            
                            <script>
                                
                                
                                
                                
       
    function get_seen_messages(group_num) {

    
           
       like_old_seen = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "not_seen";
       
       $.ajax( {
             url: like_old_seen,
             type: "POST",
             async: true,
             timeout: 15000,
             data: {
                "seen": 1,
                 "group_id": group_num
             },
             success: function( data ) {
                 
               console.log(data.trim());
                 
                 
                 if (data.trim() == 1) {
                    
                     $(".new_mess_" + group_num).html(" | <img height='30' src='<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/envelope.svg'/>");
                 }
                 
                 
                   if (data.trim() == 0) {
                    
                     $(".new_mess_" + group_num).html("");
                 }
                 
                 
                 
                 setTimeout(get_seen_messages, 5000, group_num);
          
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 setTimeout(get_seen_messages, 5000, group_num);
                 
             }
          } ); 
           
           
           
     } 
    
    
    
                                
                                
                                get_seen_messages(<?php echo $group_list_other['id']; ?>)
                            
                            
                            
                            
                            </script>
                        
                        </div>
                        
                        
                        
                        <div class="col-xs-3 group-list-notif-1">
                        <div class="col-xs-3 group-list-notif-1">
                            
                          
                            
                        </div>
                        
                        
                           </div> 
                        
                        
                       
                        
                        
                        
                        
                  <?php  }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    }
                   
                   

               } else {
                   
                   
                   
               } ?>
                    
                    
                    
                    

                    
                    
                    
                    
               
                
                </div>
                    </a>
            </div>
    
    </div>


</body>
    
 
    
</html>
