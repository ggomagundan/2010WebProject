<?php
require_once '../Auth/common.php';
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
                              <a href="../index.php"><img src="../images/logo.png" class="logo_menu" alt="logo" /></a> 
                        </div>
                        <div id="content">
                              <div>
                                 <h1><b><span style="color:red; font-size:20px;">upcoming Events</b></span></h1>
                                    <div>
          <a href="http://pecha-kucha.org/events/reshapepk3">
          <img alt="REshape UnConference X PechaKucha" src="../images/upcoming1.png"></a>
          <a href="http://pecha-kucha.org/events/ecepkn">
          <img alt="ECE x PechaKucha" src="../images/upcoming2.png"></a>
         
                                    </div>
                              </div>
                              <div>
         
                                    <h1><b><span style="color:red; font-size:20px;">past Events</b></span></h1>
                                        <div>
          <table border="1">
          <tr>
           <td><a href="http://pecha-kucha.org/events/nissan-design-europe-x-pechakucha">
           <img alt="Nissan Design Europe X PechaKucha" src="../images/past1.png"></a></td>
           <td><a href="http://pecha-kucha.org/events/big-bold-visionary-x-pechakucha">
           <img alt="Big bold visionary x PechaKucha" src="../images/past2.png"></a></td>
           <td><a href="http://pecha-kucha.org/events/Global+Eco+Forum">
           <img alt="Global Eco Forum X PechaKucha" src="../images/past3.png"></a></td>
           <td><a href="http://pecha-kucha.org/events/Baltimore">
           <img alt="Baltimore x PechaKucha" src="../images/past4.png"></a></td>
          </tr>
          <tr>
           <td><a href="http://pecha-kucha.org/events/swedish-style-x-pechakucha">
           <img alt="SWedish style X PechaKucha" src="../images/past5.png"></a></td>
           <td><a href="http://pecha-kucha.org/events/haas">
           <img alt="Hass school of business x PechaKucha" src="../images/past6.png"></a></td>
           <td><a href="http://pecha-kucha.org/events/webdirectionseast">
           <img alt="Web Direction East Tokyo 2.0 X PechaKucha" src="../images/past7.png"></a></td>
           <td><a href="http://pecha-kucha.org/events/osakacreativestream">
           <img alt="Creative Stream Osaka x PechaKucha" src="../images/past8.png"></a></td>
      </tr>
</table>

</div>

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
