<?php  include_once('../../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in($_SESSION['url_placeholder'] . 'login'); ?>


<?php


$get_all_groups_of_user = $member->all_users_groups($_SESSION['admin_id']);

$get_all_groups_of_user_result = $get_all_groups_of_user->get_result();

$numRows = $get_all_groups_of_user_result->num_rows;

      
               if ($numRows > 0) {
                   
                   
                    while($row = $get_all_groups_of_user_result->fetch_assoc()) {
                        
                        redirect_to($_SESSION['url_placeholder'] . 'dashboard/' . $row['group_id']);
                        
                    }
                   
                   

               } else {
                   
                   
                   
               }







?>




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
    
    <div class="row nav-main-row" >
        
        
        <div class="col-xs-6">
            
            <a class="logo-heading-1">friday camp <span class="logo-heading-2">//</span> <span class="logo-heading-3">no groups</span></a>
                            
        </div>
        
        
        
        
        <div class="col-xs-6" >
                
            
            <div style="float: right;">
            
                        
            <a class="btn-link-1" href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
            <button class="btn new-group-1">   
                    
            Create group</button>
            
            </a>
            
            
            
            
            <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="35" height="35" class="current-user-img"  />
            
            
            
            </div>
            

                    
        </div>
        
        
        
       </div>
    
    </nav>

                    
    
    
    
    
            <div class="row main-body-div">
                
                
                
                <div class="col-xs-9">
                
                
                <div>
                    
                
                <div class="col-xs-1" style="">
                    
                    
                <div>
                    
                     
                    <img src="<?php echo $_SESSION['url_placeholder'];  ?><?php echo $user_info['img_path'];  ?>" width="70" height="70" class="writer-profile-img"  />
                    
                   
                    
                </div>    
                
                
                </div>
                
                
                
                
                <div class="col-xs-11">
                    
                    
                    <div class="row post-nogroups">
                        
                        
                        
                        <div style="width: 350px; display: table; margin: 0 auto;">
                        
                        <p class="nogroups-text">You are currently part of no groups.</p>
                        
                        <p class="nogroups-text">Create a new group to talk to your family, friends, work, etc.</p>
                                
                        <p class="nogroups-text">Or ask people you know to add you to their groups. Your username is <b><?php echo $user_info['username'];  ?></b></p>  
                            
                            
                        <a  class="btn-link-1" href="<?php echo $_SESSION['url_placeholder'];  ?>newgroup">
                
                        <button class="btn new-group-1">   
                    
                        Create group</button>
            
                        </a><br><br>
                            
                            
                            
                        
                            
                        </div>
                        
                    
                        
                        
                        
                    
                    </div>
                    
                    
                    
                    
                
                    
                    
                </div>
                    
                    
                    
                    

                    
                    

                    </div>
                   

 
                
                </div>
                
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-xs-3 group-list-div">
                    
                    
                    
                    
                    
                  
                    
                              
                  <div class="row" style="width: 200px;">
                        
                        
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/chatting.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/typography.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                      
                      
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/camera.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    <div class="row" style="width: 200px; margin-top: 20px;">
                        
                        
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/video-camera.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/hands.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                      
                      
                      
                        <div class="col-xs-4">
                            
                           <img src="<?php echo $_SESSION['url_placeholder'];  ?>frontend/html/pages/assets/controls.svg" width="40" height="40" style="group-list-profile-img"  />
                        
                        </div>
                        
                        
                    </div>
                        
                    
                    
                    
                    
                    
                    
               
                
                </div>
                
            </div>
    
    
    
</body>
    
 
    
</html>


<script type="text/javascript" src="jquery-3.2.1.min.js"></script>