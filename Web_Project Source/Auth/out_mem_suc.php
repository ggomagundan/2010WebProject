<?php
      require_once('./Config.php');
      require_once('./common.php');
      
            
      $query = "delete from Pecha_Member where user_id='$current_user'";
      $result = mysql_query($query);
?>



 