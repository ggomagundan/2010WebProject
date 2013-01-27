<?php
include_once 'Auth/common.php';
include_once 'Auth/Config.php';
 
 
 $xmlDoc = new DOMDocument();
$xmlDoc->load("http://pecha-kucha.org/daily/feed/");

//print $xmlDoc->saveXML();



$result = array();


$node =$xmlDoc->getElementsByTagName('item');

foreach($node as $item){
      $article = array();
      $article['title'] = $item->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
      $article['link'] = $item->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
      $article['date']=$item->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
      $article['description']=$item->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
      $result[] = $article;
      
}
$titles = $result[0]['title'];
$links = $result[0]['link'];
$day=substr($result[0]['date'],0,16);
$desc = substr($result[0]['description'],0,250);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <title>pecha kucha</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      
      <link rel="stylesheet" type="text/css" href="pechakucha.css" />
      <link rel="stylesheet" type="text/css" href="./data/index_tab.css" />
      <link rel="stylesheet" type="text/css" href="./index.css" />
      
      <link href="./images/pabicon.ico" rel="shortcut icon"><!--파비콘 삽입-->
      
      <script src="./data/jquery.js" type="text/javascript"></script><!--올라감-->
      <script src="./data/easing.js" type="text/javascript"></script><!--내려감-->
      <script src="./data/countdown.js" type="text/javascript"></script><!--시간-->
      <script src="./data/main.js" type="text/javascript"></script>
      <script type="text/javascript" src="./data/index_tab.js"></script>
      <script type="text/javascript" src="./data/menu_tab.js"></script>
      



</head>

<body>

<div id="wrap">
            <div id="top">
            <?php
                        
                        if(isset($message))
                              if($message=='Logout'){ 
                                    
                                    
                                    ?>
                                    
                                    <div id="login_suc">
                                          Logout 완료
                                  
                                    </div>
                                    <script type="text/javascript">
                                          setTimeout("$('#login_suc').slideUp('slow')",5000);
                                    </script>
                                    
                              <?php
                              }
                              if($loggedin){
                              ?>
                                    <div id="login_suc">
                                    <?php echo $current_user; ?> 님 반갑습니다.
                                  
                                    </div>
                                    <script type="text/javascript">
                                          setTimeout("$('#login_suc').slideUp('slow')",3000);
                                    </script>
                              <?php
                              }
            ?>
                  
                  
                
           <div id="current_notice">
            </div>
                  
                  <img src="images/notice_end.png" alt="" />
<div id="user_icon">
                        <div><a href="http://twitter.com/pechakucha" target="_blank"><img src="images/twitter2.png" alt="twitter" /> twitter</a></div>
                        <?php
                              
                              
                              if(!$loggedin){
                              ?>
                                    <div><a href="./Auth/Login.php" target="_self"><img src="images/login.png" alt="login" />login</a></div>
                                    <div><a href="./Auth/Join_Check.php" target="_self"><img src="images/join.png" alt="join" />join</a></div>
                              <?php 
                              }else{
                                   if($_SESSION['level']=='1'){
                                         ?>
                                         <div><a href="./Auth/Admin.php">관리</a></div>
                                         <div><a href="./Auth/Logout.php" target="_self"><img src="images/logout.png" alt="join" />logout</a></div>
                                         <?php
                                    } else{?>
                                          <div><a href="./Auth/Modify.php?id=<?php echo $current_user; ?>">정보수정</a></div>
                                         <div><a href="./Auth/Logout.php" target="_self"><img src="images/logout.png" alt="join" />logout</a></div>
                                         <?php
                                    }
                              ?>
                              
                              <?php
                              }
                              ?>
                  </div>
                   </div>
            
            <div id="center">
                  <div id="left_center">
                        <div id="header">
                              <a href="index.php">
                                    <img src="images/logo.png" alt="logo" />
                              </a>
                        </div>
                        <div id="content">
                        <?php
                              $query = "select * from Pecha_Notice order by article_write_time desc limit 4";
                              $result = mysql_query($query);
                                         
                        ?>      
                        
                               <div class="Maintab">
                                  <ul>
                                        <li><a class="title" href="#"><span>Notice</span></a>
                                              <div>
                                                    <ul>
                                                    <?php
                                                      while($row=mysql_fetch_array($result)){
                                                      ?>
                                                      <li>
                                                            <a href="http://pechakucha.hosting.paran.com/Board_notice/board_inside.php?select_no=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a>
                                                      </li>
                                    
                                                        
                                                      <?php
                                                      }
                                                      ?>
                                                    </ul>
                                              </div>
                                        </li>
                                        <li><a class="title" href="#"><span>News</span></a>
                                              <div>
                                                    <ul>
                                                          <li style="list-style:none">
                                                           
                                                          <b><a href="<?php echo $links; ?>" target="_blank"><? echo $titles; ?></a></b>
                                                                                  
                                                                                    <span class="gray"><? echo $day; ?></span>
                                                                                  
                                                                                    <p>
                                                                                    <?php echo $desc . '...';  ?>
                                                                                    </p>
                                                          
                                                          </li>
                                                    </ul>
                                              </div>
                                        </li>
                                        
                                  </ul>
                            </div>
                        
                        
                        
                      
                              <div id="pe_Time">
                              <div id="coming">Coming Up</div>
                  <div class="clearfix vcalendar" id="countdown-holder">
                        
                        <?php
                       
                        $now = time();
                        
                        $query = "select * from Pecha_Event where remain_Time > $now order by remain_Time limit 9 ";
                       
                        $result = mysql_query($query);
                                                
                        while($row=mysql_fetch_array($result)){
                              
                              $sel_day="select date_format('".$row[3]."', '%m,%d,%Y')";
                              $result_day= mysql_query($sel_day);
                              $Day = mysql_fetch_array($result_day);
                              $str = explode(",", $Day[0]);
                              
                              
                       $sel_day="select time_format('".$row[4]."', '%H:%i')";
                       $result_day= mysql_query($sel_day);
                       $Day = mysql_fetch_array($result_day);
                       
                       
                       $Stime = $Day[0];
                       $start = explode(":", $Stime);
                      
                       $Remain =  date('U',mktime(0,$start[1],$start[0],$str[0],$str[1],$str[2]))+60*60*$row[10];
                       
                       $sel_day="select time_format('".$row[5]."', '%H:%i')";
                       $sresult_day= mysql_query($sel_day);
                       $Day = mysql_fetch_array($result_day);
                       $Etime = $Day[0];
                        ?>
                        <script type="text/javascript">
                             var Day = new Date(<?php "'".$Day[0] . " " .$row[4] ."'" ?>).getTime()/1000; 
                         
                           
                        </script>
                            
                          <div class="city-block timeto-<?php echo $Remain; ?>  vevent" id="event-3334">
                              <a href= "http://pecha-kucha.org/night/<?php echo $row[0]; ?>" class="url">
                                                  <div class="city-image">
                                                         <img alt="<?php echo $row[0]; ?>" src="./images/<?php echo $row[0];?>.jpg">
                                                  </div>
                                                  <div class="city-meta">
                                                            <span class="city-name summary"><?php echo $row[0] ." #".$row[2];  ?></span>
                                                            <span class="city-timeto">00:00:00</span>
                                                            <span class="city-date"><?php echo $row[3]; ?></span>
                                                            <span class="city-start">
                                                                    <abbr title="2010-11-03T18:30:00" class="dtstart"><?php echo $Stime; ?></abbr>
                                                                     - <abbr title="2010-11-03T21:30:00" class="dtend"><?php echo $Etime; ?></abbr>
                                                            </span>
                                                            <?php if($row[6] != 0){
                                                                    ?>
                                                                     <span class="city-door"><?php echo 'Price : '.$row[6].$row[8];?></span>
                                                            <?php }else{ ?>
                                                            <span class="city-door">Door: Free</span>
                                                            <?php } ?>
                                                            <span class="city-place location"><?php echo $row[1]; ?></span>
                                                  </div>
                              </a>
                        </div>
                        <?php 
                         }
                        ?>
        
        </div>                
                      
     
                              
                        </div>
                  </div>
                  </div>
            
                  <div id="right_center">
                        <img src="images/pechakucha.png" alt="Pechakucha?" />
                        <?php include("elements/menubar.php"); ?> 
                  </div>
            
            </div>
            
            <?php include("elements/footer.php"); ?>    
</div>



</body>
</html>
