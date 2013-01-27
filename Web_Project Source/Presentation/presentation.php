<?php
include_once '../Auth/common.php';
require_once '../Auth/Config.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <title>pecha kucha</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      
      <link rel="stylesheet" type="text/css" href="../pechakucha.css" />
      <link rel="stylesheet" type="text/css" href="./Presentation.css" />
      
      <link href="../images/pabicon.ico" rel="shortcut icon"><!--파비콘삽입-->
      
      <script src="../data/jquery.js" type="text/javascript"></script>
      <script type="text/javascript" src="../data/menu_tab.js"></script>



</head>

<body>
<div id="wrap">
            <?php include("../elements/top.php"); ?>
            
            <div id="center">
                  <div id="left_center">
                         <div id="header">
                              <a href="../index.php"><img src="../images/logo.png" alt="logo" /></a> 
                        </div>
                        <div id="content">
                        <div id="titles">PowerPoint Templates</div>
                        <?php
                        
                        $query = "select * from Pecha_Templates";
                        $result = mysql_query($query);
                       
                        ?>
 
 
 
 
 
 <div id="Pechakucha_Presentations">
             <?php 
             while($row = mysql_fetch_array($result)){
                              
                                    
                ?>              
                    <div class="img_temp"> <a href="../images/templates/<?php echo $row[2]; ?>.pot">
		<img src="../images/templates/<?php echo $row[0]; ?>.jpg" alt="pecha" class="img_showing"><br/><? echo $row[2]; ?></a></div>
                     
                 
           
                 <?php } ?>    
                     
                         </div>
 
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