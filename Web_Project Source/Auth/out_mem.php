<?php
      require_once('./Config.php');
      require_once('./common.php');
  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
      <title>pecha kucha</title>
      
      <link rel="stylesheet" type="text/css" href="../pechakucha.css" />
      <link rel="stylesheet" type="text/css" href="./Join.css" />
      
      <script src="../data/jquery.js" type="text/javascript"></script>
      <script type="text/javascript" src="../data/menu_tab.js"></script> 

      

   


      
</head>

<body>
<div id="wrap">
            <?php include("../elements/top.php"); ?>
            
            <div id="center">
                  <div id="left_center">
                        <div id="header">
                              <a href="../index.php">
                                    <img src="../images/logo.png" alt="logo"/>
                              </a>
                        </div>
                        <div id="content">
                    






<?php 
  
     
             $query = "select * from Pecha_Member where user_id='$current_user'";
            
             $result = mysql_query($query);
             $row = mysql_fetch_array($result);
             ?>
            
            <div id="out_member">
                  <?php echo $current_user; ?>님 탈퇴하시겠습니까?
            </div>
      
      <a href="out_mem_suc.php">탈퇴하기</a>




   


                        
                        </div>
                  </div>
            
                  <div id="right_center">
                        <img src="../images/pechakucha.png" alt="Pechakucha?" />
                       <?php include("../elements/menubar.php"); ?> 
                  </div>
            
            </div>
            
            <?php include("../elements/footer.php"); ?>    
</div>
</body>

</html>
 