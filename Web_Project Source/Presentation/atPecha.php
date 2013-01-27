<?php
include_once '../Auth/common.php';
 require_once '../Auth/Config.php';
 
 
 $xmlDoc = new DOMDocument();
$xmlDoc->load("http://www.pecha-kucha.org/presentations/feed/recent");

//print $xmlDoc->saveXML();
           
           



$result = array();


$node =$xmlDoc->getElementsByTagName('item');

foreach($node as $item){
      $article = array();
      $article['title'] = $item->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
      $article['link'] = $item->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
      $article['date']=$item->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
      $result[] = $article;
      
}
 
 
 
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
                        <div id="titles">At PechaKucha Presentations</div>
                    
 
 
 
 
 
 <div id="Pechakucha_Presentations">
             <?php 
           for($i = 0;$i <12;$i++){
                           $item= $result[$i];      
                      $num = substr($item['link'],-3,3);      

                  $title = $item['title'];
                  $query  = "select count(*) from Pecha_Presentation where id='$num'";
                  mysql_query($query);
                  if($row[0] != 0){
                        $query = "insert into Pecha_Presentation(id, titles) values('$num', $title')";
                        
                     
                  }
                   ?>              
                    <div class="imgs"> 
                        <a href="./showing.php?id=<?php echo $num;?>">
                              <img src="<?php echo $item['link'];?>/feed-thumb.jpg" width="140" height="100" alt="pecha" class="img_show">
                              <br/>
                              <?php echo   substr($item['title'],0,22);if(strlen($item['title'])>22) echo '...';?>
                        </a>
                  </div>
                    
              
           
                 <?php 
                 


} ?>     
                     
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