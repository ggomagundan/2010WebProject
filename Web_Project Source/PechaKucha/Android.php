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
   
                        <p>
                              <a href="http://hiiq.egloos.com/1927837" target="_blank"><img src="../images/presentations.png" alt="presentation"></a><img src="../images/qrcode.png" alt="presentation">Presentation App(하이큐)
                              
                        </p>
                        <p>
                              <a href="http://twitter.com/ilikehyeongkyu" target="blank"><img src="../images/device.png" alt="trainig"></a><img src="../images/chart.png" alt="presentation">PechaKucha Training
                        </p>
                        
                        
                        

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