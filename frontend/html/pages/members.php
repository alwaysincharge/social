<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


$is_mem = $member->this_user_this_group_alive($_SESSION['admin_id'], $_GET['members']);

$is_mem_r = $is_mem->get_result();

$is_num = $is_mem_r->num_rows;



if ($is_num != 1) {
    
    redirect_to($_SESSION['url_placeholder'] . 'nogroups');
    
}






$user_details = $user->find_one_user($_SESSION['admin_id']);

$user_details_result = $user_details->get_result();

$user_info = $user_details_result->fetch_assoc();






                
$all_the_members = $member->all_the_members($_GET['members']);

$all_the_members_result = $all_the_members->get_result();

$num_members = $all_the_members_result->fetch_assoc();






 $is_admin = $member->get_admin($_SESSION['admin_id'], $_GET['members']); 
          
 $is_admin_result = $is_admin->get_result();
          
 if ($is_admin_result->num_rows == 1) {
                      
    $admin_or_super_row = $is_admin_result->fetch_assoc();
     
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
            
               <a href="<?php  echo $_SESSION['url_placeholder'];  ?>nogroups" class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_name = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        if (strlen($group_name['name']) <= 16)  {
                            
                            echo "<span class='newn1'>" . substr($group_name['name'], 0, 16);
                            
                        } else if (strlen($group_name['name']) > 16) {
                            
                            echo "<span class='newn2' style='font-size: 18px;'>" . substr($group_name['name'], 0, 16). "...</span>";
                            
                        }
                        
                        
                        
                    }
                
                ?>
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-8">
            
            
            
            <div style="float: right;">
            
                        
            <a class="btn-link-1" href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
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
                    
                     
                <img id="my_image" src="<?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_img = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_img['img_path'];
                        
                    }
                
                ?>" width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    <div class="row post-editor">
                        
                    
                         <div class="row membership-main">
                             
                             
                             
                             
                             
                             
                             
                             
                             
                                  
                             
                             
                             
                             
                             <?php
                             
                             
                                 $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                                 $get_find_group_by_id_result = $get_find_group_by_id->get_result();

                                 $group_name = $get_find_group_by_id_result->fetch_assoc();
                             
                             
                             
         $is_admin = $member->get_admin($_SESSION['admin_id'], $_GET['members']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
            
                 
                 if ( ($admin_or_super_row['admin'] == "superadmin") ||  ($admin_or_super_row['admin'] == "admin") ){ ?>
                    
                    
                            <div class="new-member-1">
                                 
                                 <p class="membership-subtitle">You can add new members below</p>
                                 
                                 <input id="newmember" maxlength="100" name="keywords" class="search-main" style="" placeholder="New member username" />
                                 
                                 <button id="add" class="btn new-group-1" style="">Add</button> <a id="membererror" style="display: none;"></a>
                                 <br>
                                                      
                                                      
                             </div>
                             
                      
                     
                             
            <?php     }
                 

                   
             }
    
          }
    ?>
                             
           
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                                       
                             <?php
                             
                             
                             
                             
                                 $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                                 $get_find_group_by_id_result = $get_find_group_by_id->get_result();

                                 $group_name = $get_find_group_by_id_result->fetch_assoc();
                             
                             
                             
                             
                             
         $is_admin = $member->get_admin($_SESSION['admin_id'], $_GET['members']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
            
                 
                 if  ($admin_or_super_row['admin'] == "superadmin") { ?>
                    
                            
                             
                             <button onclick="toggle_delete()" class="btn new-group-1" style="margin-left: 0px;">delete group</button> 
                             
                             
                                <div class="show_delete" style="font-family: Work Sans; display: none;"><br>
                                 
                                 <a>are you sure you want to delete the group?</a>
                                 
                                 <a onclick="delete_group()">yes</a> 
                                     
                                 <a onclick="toggle_delete()"> // no</a>
                                     
                                     
                                 </div>
                                 <br><br><br>  
                             
                             
                             
                             
                             
                             
                             
                            <div class="new-member-1">
                                
                                
                                 
                                  <p class="membership-subtitle">Edit group name</p>
                                 
                                                          
                                  <textarea id="newtitle" maxlength="140" name="keywords" class="search-main" style="height: 50px; resize: none;" placeholder="New group name"><?php  echo $group_name['name'];  ?></textarea>  <br> 
                                 
                                  <button id="edit1" class="btn new-group-1" style="margin-left: 0px;">Edit</button> <a id="membererroredit1" style="display: none;"></a>
                                 <br>
                                                      
                                                      
                             </div>
                             
                             
                             
                               
                                   
                            <div class="new-member-1">
                                 
                                 <p class="membership-subtitle">Edit group description</p>
                                 
                                                          
                                <textarea id="newdesc" maxlength="140" name="keywords" class="search-main" style="height: 50px; resize: none;" placeholder="New member username"><?php  echo $group_name['description'];  ?></textarea>   <br>
                                 
                                 <button id="edit2" class="btn new-group-1" style="margin-left: 0px;">Edit</button> <a id="membererroredit2" style="display: none;"></a>
                                 <br>
                                                      
                                                      
                             </div>
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             <p class="membership-subtitle">Change profile picture.</p>
            
                        <!--     <button id="edit" class="btn new-group-1" style="margin-left: 0px;">Upload picture</button>  -->
                             
                             
                             <label id="file1label" for="groupimg" class="btn" style="background: #ddd; font-family: Work Sans; ">Upload group image</label>
                            
                             <input type="file" id="groupimg" class="btn" style="display: none;"/> <br><br>
                             
                             
                             <a id="groupnotif" style="display: none;"></a><br><br>
                             
                             <a id="img_name_notif" style="font-family: Work Sans; display: none;"></a><br><br>
                             
                             <a id="abort" style="text-decoration: underline; display: none; font-family: Work Sans;  
    max-width: 190px;">cancel upload</a>
                             
                             
                                                      
                                   
                                                
                             
                             
                             
                             
            <?php     }
                   
             }
    
          }

                             ?>
                             
                             
                             
                             
                             
                             
                             
                                     
                             
                        
                             
                             
                            
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             

                             

                             
                             <p class="membership-subtitle">List of group members (<?php echo $num_members['count'];  ?>)</p>
                 
                             
                             
                             
                             
                             
                             
                                           
                             
                             
                <?php
                             
                             
                             $is_admin = $member->get_admin($_SESSION['admin_id'], $_GET['members']); 
          
 $is_admin_result = $is_admin->get_result();
          
 if ($is_admin_result->num_rows == 1) {
                      
    $admin_or_super_row = $is_admin_result->fetch_assoc();
     
 }

                             
                             
                
                $all_members = $member->current_user_members_of_group($_GET['members']);

                $all_members_result = $all_members->get_result();

             
                    while($member_info = $all_members_result->fetch_assoc()) { ?>
                        
                      
                                    
                             <div class="row member-list member-list<?php echo $member_info['member_id'];  ?>">
                             
                             <div class="col-xs-2" style="">
                                 
                <img src="<?php echo $_SESSION['url_placeholder'] . $member_info['image'];  ?>" width="55" height="55" class="writer-profile-img"  />
                             
                                 
                             </div>
                             
                             
                             <div class="col-xs-10">
                                 <p class="member-list-member"><?php echo $member_info['username'];  ?></p>
                                 <a class="member-list-state  member-list-state<?php echo $member_info['member_id']; ?>"><?php echo $member_info['admin'];  ?></a>
                                 
                                
                                 
                    <?php

                    if ($admin_or_super_row['admin'] != "superadmin")  { ?>
                                 
                                 
                    <a> |  </a>
                                 
                    <a onclick="toggle_leave(<?php echo $member_info['member_id']; ?>)" class="member-list-item">leave group</a><br> 
                    
                                 
                                 <div class="show_leave<?php echo $member_info['member_id']; ?>" style="font-family: Work Sans; display: none;">
                                 
                                 <a>Are you sure you want to leave?</a>
                                 
                                 <a onclick="leave_group(<?php echo $member_info['member_id']; ?>)">yes</a> 
                                     
                                 <a onclick="toggle_leave(<?php echo $member_info['member_id']; ?>)"> // no</a>
                                     
                                     
                                 </div>
                                 
                      
                     
                    <?php    } ?>
                         
                                 

                                 
                                 
                                 
                             </div>
                                 
                                 

                             
                             </div>
                             
                                                                       
                                                                              
                        
                  <?php }?> 
                             
                          
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                <?php
                             
                             $is_admin = $member->get_admin($_SESSION['admin_id'], $_GET['members']); 
          
 $is_admin_result = $is_admin->get_result();
          
 if ($is_admin_result->num_rows == 1) {
                      
    $admin_or_super_row = $is_admin_result->fetch_assoc();
     
 }

                             
                             
                
                $all_members = $member->non_current_user_members_of_group($_GET['members']);

                $all_members_result = $all_members->get_result();

             
                    while($member_info = $all_members_result->fetch_assoc()) { ?>
                        
                      
                                    
                             <div class="row member-list member-list<?php echo $member_info['member_id'];  ?>">
                             
                             <div class="col-xs-2" style="">
                                 
                <img src="<?php echo $_SESSION['url_placeholder'] . $member_info['image'];  ?>" width="55" height="55" class="writer-profile-img"  />
                             
                                 
                             </div>
                             
                             
                             <div class="col-xs-10">
                                 <p class="member-list-member"><?php echo $member_info['username'];  ?></p>
                                 <a class="member-list-state  member-list-state<?php echo $member_info['member_id']; ?>"><?php echo $member_info['admin'];  ?></a>
                                 
                                 
                                 
                                 
                                 
                                 
                    <?php

                    if ($admin_or_super_row['admin'] == "superadmin")  { ?>
                                 
                                 
                    <a> |  </a>
                                 
                    <a onclick="toggle_remove(<?php echo $member_info['member_id']; ?>)" class="member-list-item">remove</a>
                    
                    <a> | </a>
                                 
                    <a  onclick="toggle_admin(<?php echo $member_info['member_id']; ?>)"  class="member-list-item">make admin</a>
                                 
                                 
                                 
                                    <div class="show_remove<?php echo $member_info['member_id']; ?>" style="font-family: Work Sans; display: none;">
                                 
                                 <a>are you sure?</a>
                                 
                                 <a onclick="remove_member(<?php echo $member_info['member_id']; ?>)">yes</a> 
                                     
                                 <a onclick="toggle_remove(<?php echo $member_info['member_id']; ?>)"> // no</a>
                                     
                                     
                                 </div>
                                 
                                 
                                         
                       
                                  <div class="show_admin<?php echo $member_info['member_id']; ?>" style="font-family: Work Sans; display: none;">
                                 
                                 <a>are you sure?</a>
                                 
                                 <a onclick="make_admin(<?php echo $member_info['member_id']; ?>)">yes</a> 
                                     
                                 <a onclick="toggle_admin(<?php echo $member_info['member_id']; ?>)"> // no</a>
                                     
                                     
                                 </div>
                                 
                                 
                     
                    <?php    } ?>
                                 
                                 
                                 

                                 
                                 
                                 
                             </div>
                                 
                                 

                             
                             </div>
                             
                                                                       
                                                                              
                        
                  <?php }?> 
                             
                             
                             
                             
                             
                             
                             

                             
                    
                        
            </div>

            <br><br><br>
            </div>
                    
                    
                    
                    
                    
            </div>
                    
                    
                    
                    

                    
                    

                    </div>
                   

 
                    

                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    
                    <p id="name1" style="font-family: Work Sans; font-size: 20px; margin-left: 20px; word-wrap: break-word; width: 300px;">
                    <?php
                    
                    
                    
                    
                                 $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                                 $get_find_group_by_id_result = $get_find_group_by_id->get_result();

                                 $group_name = $get_find_group_by_id_result->fetch_assoc();
                             
                             
                    
                            echo    $group_name['name'];
                    
                    
                    
                    
                    
                    
                        ?></p>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <p id="desc1" style="font-family: Work Sans; font-size: 17px; margin-left: 20px; word-wrap: break-word; width: 300px;">
                    <?php
                    
                    
                    
                    
                                 $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                                 $get_find_group_by_id_result = $get_find_group_by_id->get_result();

                                 $group_name = $get_find_group_by_id_result->fetch_assoc();
                             
                             
                    
                            echo    $group_name['description'];
                    
                    
                    
                    
                    
                    
                        ?></p>
                    
                    
                    
                    
                    <p style="font-family: Work Sans; font-size: 15px; margin-left: 20px;">If you want to be able to add new members to this group, ask the creator to make you an admin.</p>
                    
                                
                    
                    
                    
                    
                  
                    
                    

                    
                    

                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    
    
</body>
    
 
    
</html>


<script type="text/javascript" src="../../javascript/jquery-3.2.1.min.js"></script>
    


<script>
    
page_group_id = "<?php echo $_GET['members'];  ?>";
    
var url_placeholder = "<?php echo $_SESSION['url_placeholder']; ?>";
    
    
    
    
    
    
    function toggle_leave(person)  {
        
        
        $(".show_leave" + person).toggle(300);
        
        
    }
    
    
    
    
    
    
    
      function toggle_admin(person)  {
        
        
        $(".show_admin" + person).toggle(300);
        
        
    }
    
    
    
    
      function toggle_remove(person)  {
        
        
        $(".show_remove" + person).toggle(300);
        
        
    }
    
    
    
    
     function toggle_delete()  {
        
        
        $(".show_delete").toggle(300);
        
        
    }
    
    
    
    
    

$("#add").on('click', function() {
    
  
     newmember = $("#newmember").val();

    
    
    if (newmember.trim().length != 0) {
        
        var member_filled = true;
        
    } else {
        
        $("#membererror").hide(0);    
        
        $("#membererror").show(300);
        
        $("#membererror").html("Don't leave the space blank.");
        
    }
    
    
    
    
    if (member_filled) {

        if (newmember.trim().length > 16) {
        
            
        $("#membererror").hide(0);    
             
        $("#membererror").show(300);
        
        $("#membererror").html("Username cannot exceed 16 characters.");
            
        
        } else {
            
            var member_length_check = true;
            
        }
    
    }
    
    
    
    if (member_length_check) {
        
        
        group_id = "<?php  echo $_GET['members']; ?>";
        
        add_new_user(newmember.trim(), group_id);
        
    }
    
    
});


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$("#edit1").on('click', function() {
    
  
     newtitle = $("#newtitle").val();

    
    
    if (newtitle.trim().length != 0) {
        
        var title_filled = true;
        
    } else {
        
        $("#membererroredit1").hide(0);    
        
        $("#membererroredit1").show(300);
        
        $("#membererroredit1").html("Don't leave the space blank.");
        
    }
    
    
    
    
    if (title_filled) {

        if (newtitle.trim().length > 140) {
        
            
        $("#membererroredit1").hide(0);    
             
        $("#membererroredit1").show(300);
        
        $("#membererroredit1").html("Title cannot exceed 140 characters.");
            
        
        } else {
            
            var title_length_check = true;
            
        }
    
    }
    
    
    
    if (title_length_check) {
        
        
        group_id = "<?php  echo $_GET['members']; ?>";
        
        edit_title(1, newtitle, group_id);
        
    }
    
    
});



 
    
    
    
    
    
    
$("#edit2").on('click', function() {
    
  
     newdesc = $("#newdesc").val();

    
    
    if (newdesc.trim().length != 0) {
        
        var desc_filled = true;
        
    } else {
        
        $("#membererroredit2").hide(0);    
        
        $("#membererroredit2").show(300);
        
        $("#membererroredit2").html("Don't leave the space blank.");
        
    }
    
    
    
    
    if (desc_filled) {

        if (newdesc.trim().length > 140) {
        
            
        $("#membererroredit2").hide(0);    
             
        $("#membererroredit2").show(300);
        
        $("#membererroredit2").html("Title cannot exceed 140 characters.");
            
        
        } else {
            
            var desc_length_check = true;
            
        }
    
    }
    
    
    
    if (desc_length_check) {
        
        
        group_id = "<?php  echo $_GET['members']; ?>";
        
        edit_desc(2, newdesc, group_id);
        
    }
    
    
});

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       
function edit_title(index, text, group_id) {
   
    $.ajax({
        
       data: {"newtitle": index, "data": text, "group_id": group_id},
       dataType: 'text',
       url: url_placeholder + 'backend/edit_title.php',
       type: "POST"
        
    }).done(function(data) {
        
    console.log(data)
        
           if (data == 100) {
                
                    $("#membererroredit1").hide(0);    
             
                    $("#membererroredit1").show(300);
        
                    $("#membererroredit1").html("Change successful.");
               
               
                    $("#name1").html(text);
               
               
               if (text.length > 16) {
                   
                   
                   $(".newn1").hide(text);
               
                   $(".newn2").show().html(text.substr(0, 16) + "...");
                   
                   
               } else if (text.length <= 16) {
                   
                   
                   $(".newn1").hide(text);
               
                   $(".newn2").show().html(text);
                   
                   
               }
               
                    
                
                
            } else {
                
                    $("#membererroredit1").hide(0);    
             
                    $("#membererroredit1").show(300);
        
                    $("#membererroredit1").html("Poor connection. Try again.");
                
                
            } 
        
        
        
    
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#membererroredit1").hide(0);    
             
                       $("#membererroredit1").show(300);
        
                       $("#membererroredit1").html("Poor connection. Try gain later.");
        
    });
    
    
}
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function edit_desc(index, text, group_id) {
   
    $.ajax({
        
       data: {"newtitle": index, "data": text, "group_id": group_id},
       dataType: 'text',
       url: url_placeholder + 'backend/edit_title.php',
       type: "POST"
        
    }).done(function(data) {
        
    console.log(data)
        
           if (data == 100) {
                
                    $("#membererroredit2").hide(0);    
             
                    $("#membererroredit2").show(300);
        
                    $("#membererroredit2").html("Change successful.");
               
               
                    $("#desc1").html(text);
                
                
            } else {
                
                    $("#membererroredit2").hide(0);    
             
                    $("#membererroredit2").show(300);
        
                    $("#membererroredit2").html("Poor connection. Try again.");
                
                
            } 
        
        
        
    
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#membererroredit2").hide(0);    
             
                       $("#membererroredit2").show(300);
        
                       $("#membererroredit2").html("Poor connection. Try gain later.");
        
    });
    
    
}
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
        
function add_new_user(newmember, group_id) {
   
    $.ajax({
        
       data: {"newuser": 1, "username": newmember, "group": group_id},
       dataType: 'text',
       url: url_placeholder + 'backend/request_member.php',
       type: "POST"
        
    }).done(function(data) {
        
    console.log(data)
        
           if (data == 1) {
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("The user already has a request pending.");
                
                
            } else if (data == 2) {
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("That user doesn't exist. Try again.");
                
                
            } else if (data == 3) {
                
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("User is already a member of the group.");
                
                
            }  else if (data == 4) {
                
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("Success. Request sent.");
                
                
            }    else  {
                
                
                    $("#membererror").hide(0);    
             
                    $("#membererror").show(300);
        
                    $("#membererror").html("Poor connection. Try again later.");

                
            }
        
        
        
        
        
        
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
                       $("#membererror").hide(0);    
             
                       $("#membererror").show(300);
        
                       $("#membererror").html("Poor connection. Try gain later.");
        
    });
    
    
}
    
    
    
    
    

   function make_admin(person) {
       
       
       
       admin_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "make_admin";
       
       $.ajax( {
             url: admin_url,
             type: "POST",
             async: true,
             data: {
                "admin": 1,
                "person": person,
                 "group": page_group_id
             },
             success: function( data ) {
                 
                 
                 
                if (data == 100)  {
                    
                   $(".member-list-state" + person).html("admin"); 
                    
                }
                 
                 
                 if (data == 200)  {
                     
                    $(".member-list-state" + person).html("member");
                     
                 }
                 
                 
                 $(".show_admin" + person).hide(300);
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   }     
    

    
    
    
    
   
   function remove_member(person) {
       
       
       
       admin_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "remove_member";
       
       $.ajax( {
             url: admin_url,
             type: "POST",
             async: true,
             data: {
                "admin": 1,
                "person": person,
                 "group": page_group_id
             },
             success: function( data ) {
                 
                 console.log(data)
                 
                if (data == 100)  {
                    
                   $(".member-list" + person).hide(300); 
                    
                }
                 
                 
               
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   }     
    
 
    
    
    
    
    
    
    
      
   
   function leave_group(person) {
       
       
       
       admin_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "leave_group";
       
       $.ajax( {
             url: admin_url,
             type: "POST",
             async: true,
             data: {
                "admin": 1,
                 "group": page_group_id
             },
             success: function( data ) {
                 
                 console.log(data)
                 
                if (data == 100)  {
                    
                   $(".member-list" + person).hide(300); 
                    
                }
                 
                 
               
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   }     
    
    
    
    
    
    
    
    
    
    function delete_group(person) {
       
       
       
       admin_url = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "delete_group";
       
       $.ajax( {
             url: admin_url,
             type: "POST",
             async: true,
             data: {
                "admin": 1,
                 "group": page_group_id
             },
             success: function( data ) {
                 
                 console.log(data)
                 
                if (data == 100)  {
                    
                   window.location.href = "<?php  echo $_SESSION['url_placeholder'];  ?>" + "nogroups";
                    
                }
                 
                 
               
                 
             },
           
             error: function( xhr, textStatus, errorThrown ) {
             
                 
                 
             }
          } );
       
       
   }     
    
    

    
    
    
    
     $( document ).ready( function() {
             
             

         count_important();
         
         count_request();
         
         count_replypage();
         

         
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
     
     if (file.name.length > 30) {
         
         temp_name = file.name.substr(0, 29) + "...";
         
     } else if (file.name.length <= 30) {
         
         temp_name = file.name;
         
     } else {}
     
     
   
         if ( file.size <= 1000000 ) {
                 file_size_validation = true;
         } else {
                 file_size_validation = false;
                 $( "#groupnotif" )
                         .show().html( temp_name + " is bigger than 1MB. Try again." );
         }
         if ( file_size_validation ) {
                 if ( ( file.type == "image/jpeg" ) || ( file.type == "image/jpg" ) || ( file.type == "image/png" ) || ( file.type == "image/gif" ) ) {
                         file_type_validation = true;
                 } else {
                         file_type_validation = false;
                         $( "#groupnotif" )
                                 .show().html( "Your file has to be an image of type jpeg, jpg, png or gif." );
                 }
         }
         if ( file_type_validation && file_size_validation ) {
                 send_image();
         }

         function send_image() {
                 var formdata = new FormData();
                 formdata.append( 'groupimg', file );
             
                 formdata.append("group_id", page_group_id);
                  ajax1 = new XMLHttpRequest();
                 ajax1.upload.addEventListener( "progress", progressHandler, false );
                 ajax1.addEventListener( "load", completeHandler, false );
                 ajax1.addEventListener( "abort", abortHandler, false );
                 ajax1.open( "POST", url_placeholder + 'backend/edit_grouppic.php' );
                 ajax1.send( formdata );
         }

         function progressHandler( event ) {
                 var percent = ( event.loaded / event.total ) * 100;
             
                 $( "#groupnotif" )
                         .show().html( "Uploading  your image (" + Math.round( percent ) + "%)" );
             
             
                 $( "#img_name_notif" )
                         .show().html( temp_name );
             
             if (percent == 100) {
                 
                 $( "#groupnotif" )
                         .show().html( "Completing..." );
                 
             }
             
                          $( "#abort" )
                         .show();
         }

         function completeHandler( event ) {
             
             
             result = event.target.responseText;
             
             console.log(result)
             
             $( "#groupnotif" )
                         .show().html( "Upload succesful." );
             
             
             imageJson = JSON.parse(result);
             
             
             
             image_status = imageJson[0];
             
             
             
             image_new_path = imageJson[1];
             
             
           //  alert(image_new_path)
             
         //    jjj = "<?php echo $_SESSION['url_placeholder']; ?>";
             
           //  alert(jjj)
             
             
             $('#my_image').attr('src', image_new_path);
             
             $( "#img_name_notif" )
                         .hide();
             
             
             
             $( "#abort" )
                         .hide();
             
               
         }

         function errorHandler( event ) {
             
             send_image();
            
         }

         function abortHandler( event ) {
             
            
             
                 $( "#groupnotif" )
                         .html( "Upload cancelled. Please try again." );
             
             
        
         }
 }
    
    
    
    
    $("#abort").on('click', function() {
    
    
   ajax1.abort(); 
    
      $("#groupimg").val("");  
        
        
        $( "#img_name_notif" )
                         .hide();
             
             
             
             $( "#abort" )
                         .hide();
    
    });
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    

</script>