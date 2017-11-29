<?php


class Session {
    

    
  public function __construct() {
      
  // server should keep session data for AT LEAST 1 hour
//return ini_set('session.gc_maxlifetime', 36000000);

// each client should remember their session id for EXACTLY 1 hour
// session_set_cookie_params(36000000);
// session_set_cookie_params(36000000000,"/");

  return session_start();
    
  }
    
    
   
    
    
  public function if_not_logged_in($url) {
    
  if (!isset($_SESSION['admin_id'])) {
        
  redirect_to($url);
    
      exit();
  }
  
  }
    
    
 
}



$session = new Session();


?>