<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php
                
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
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body class="dashboard-body" style="min-height: 110%;">
    
    
    
    
   <nav class="nav-head">
    
    <div class="row nav-main-row">
        
        
        <div class="col-xs-6">
            
            <a class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">
                
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_name = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_name['name'];
                        
                    }
                
                ?>
                
               </span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6">
            
            
            <input maxlength="100" name="keywords" class="search-main" placeholder="Search this group" />
                
            
            
            
            <a href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
            <button class="btn new-group-1">   
                
            <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/pencil.png" width="20" height="20" class="new-group-2"  />
                    
            Create new group</button>
            
            </a>
            
            
            
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/a.jpg" width="35" height="35" class="current-user-img"  />
            
                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                <img src="
                              
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_img = $get_find_group_by_id_result->fetch_assoc()) {
                        
                        echo $group_img['img_path'];
                        
                    }
                
                ?>   " width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    <div class="row post-editor">
                        
                    
                         <div class="row membership-main">
                             
                             
                             
                             
                             
                             
                                       
                             <?php
                             
                             
                             
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
            <?php     }
                   
             }
    
          }

                             ?>
                             
                             
                             
                             
                             
                             
                             
                        
                             
                             
                             
                             
                             <?php
                             
                             
                             
         $is_admin = $member->get_admin($_SESSION['admin_id'], $_GET['members']); 
          
          $is_admin_result = $is_admin->get_result();
          
          if ($is_admin_result->num_rows == 1) {
              
              
              
             while($admin_or_super_row = $is_admin_result->fetch_assoc()) {
            
                 
                 if ( ($admin_or_super_row['admin'] == "superadmin") ||  ($admin_or_super_row['admin'] == "admin") ){ ?>
                    
                    
                                                  <div class="new-member-1">
                                 
                                 <p class="membership-subtitle">You can add new members below</p>
                                 
                                 <input id="newmember" maxlength="100" name="keywords" class="search-main" style="" placeholder="New member username" />
                                 
                                 <button id="add" class="btn new-group-1" style="">Add</button> <a id="membererror" style="display: none;"></a>
                                 
                             </div>
                             
                      
                     
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
                    
                    
                    
                    
                    
                <?php
                
                $get_find_group_by_id = $group->find_group_by_id($_GET['members']);

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
                    
$get_all_groups_of_user = $member->all_users_groups_except($_SESSION['admin_id'], $_GET['members']);

$get_all_groups_of_user_result = $get_all_groups_of_user->get_result();

$numRows = $get_all_groups_of_user_result->num_rows;

      
               if ($numRows > 0) {
                   
                   
                    while($row = $get_all_groups_of_user_result->fetch_assoc()) {
                        
                    
                        
                        
                        
                         $get_find_group_by_id = $group->find_group_by_id($row['group_id']);

                $get_find_group_by_id_result = $get_find_group_by_id->get_result();

             
                    while($group_list_other = $get_find_group_by_id_result->fetch_assoc()) {  ?>
                        
                        
                        
                        
                        
               
                        
                        
                        
                        
                        <div class="row group-list-row" onclick="window.location='<?php echo $_SESSION['url_placeholder'] . "members/" . $group_list_other['id'];   ?>';">
                        
                        
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
    
    
    
    
    
    
    
    
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

</script>