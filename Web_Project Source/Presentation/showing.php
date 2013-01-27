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
                              <a href="../index.php">
                                   <img src="../images/logo.png" class="logo_menu" alt="logo" />
                              </a> 
                              Presentation
                             
                              
                        </div>
                        <div id="content">
                        
                   
                  <?php
                         
                    if(isset($_GET['id'])) $m_id = $_GET['id'];
           
                       
                       
                        ?>
 
 
 
 
 
 <div id="Pechakucha_Presentations">
             <?php 
             $query = "select titles from Pecha_Presentation where id='$m_id'";
             $re = mysql_query($query);
            $row = mysql_fetch_array($re);
              ?>     
               <div id="show_movie">            
               <div id="titles">  <?php echo $row[0]; ?> </div>                   
                   
                   
                  <!-- so flash -->
                  
                 
                  <object width="600" height="400">
              <param value="http://www.pecha-kucha.org/swf/player.swf?id=<?php echo $m_id;?>" name="movie">
              <param value="true" name="allowFullScreen">
              <param value="always" name="allowscriptaccess">
              <param value="#000000" name="bgcolor">
              <embed width="600" height="400" bgcolor="#000000" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.pecha-kucha.org/swf/player.swf?id=<?php echo $m_id;?>">
            </object>
            <!-- eo flash -->
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