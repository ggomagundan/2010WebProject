<?php
include_once 'common.php';
include_once 'Config.php';

if(isset($_GET['id']))
      $user_id = $_GET['id'];
      

$query = "delete from Pecha_Member where user_id = '$user_id'";

$result=mysql_query($query);

header("Location:./Admin.php");
?>

