<?php
include_once 'common.php';

if($loggedin){
      $message = "Logout";
      reset_all_session();
      
      
}
header("Location: ../index.php?message=".urlencode($message));
?>