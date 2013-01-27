<?php
session_start();
$login_time=time();

if(isset($_SESSION['user'])){
      $current_user = $_SESSION['user'];
      $loggedin = true;   
}else{
      $loggedin = false;
}
if(isset($_GET['message'])){
      $message = $_GET['message'];
}
function print_message(){
      global $message;
      
      if(isset($message)){
            echo ("<div class='msg'> {$message}</div>");
            
      }
            
}

function reset_all_session(){
      $_SESSION = array();
      
      if(ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(session_name(), '',time()-42000,$params["path"],$params["domain"],
            $params["secure"],$params["httponly"]);
      }
      
      session_destroy();
      
      session_start();
}

