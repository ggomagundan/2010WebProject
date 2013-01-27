<?php
      include_once 'common.php';
      include_once 'Config.php';
      
      $page=0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
      <head>
            <title>pecha kucha</title>
            
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            
            <link rel="stylesheet" type="text/css" href="../pechakucha.css" />
            <link rel="stylesheet" type="text/css" href="./Login.css" />
            
            <script src="./del_member.js" type="text/javascript"></script>
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
                              if($_SESSION['level']!='1'){
                                    echo '접근금지';
                              }else{
                            
                              $per_page = 5;
                              if(isset($_GET["page"]))
                                    $page = (int)$_GET['page'];
                                    
                              if(!$page && $page <=0) 
                                    $page =1;
            
                              $query = "select count(*) from Pecha_Member";
                              $result = mysql_query($query);
            
                              if($result){
                                    $row = mysql_fetch_array($result);
                                    $num_articles = $row[0];
                              }
                        
                              $last_page = ceil($num_articles/$per_page);
                        
                              $query = "select * from Pecha_Member order by user_id limit " .(($page-1)*$per_page) . ", " . $per_page;
                        
                              $result = mysql_query($query);
                        
                        ?>
                        
                        <table border="1" id="lists">
                              <tr>
                                    <th class="head">ID</th>                              
                                    <th class="head">이름</th>
                                    <th class="head">레벨</th>
                                    <th class="head">최근 로그인 시간</th>
                                    <th class="head">최근 로그인 IP</th>
                                    <th class="head">삭제</th>
                              </tr>
                        
                        <?php 
                        
                        
                              while($row = mysql_fetch_array($result)){ ?>
                              <tr>
                                    <td class="list"><a href="./member_info.php?id=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a></td>
                                    <td class="list"><?php echo $row[4]; ?></td>
                                    <td class="list"><?php echo $row[17]; ?></td>
                                    <td class="list"><?php echo $row[20]; ?></td>
                                    <td class="list"><?php echo $row[21]; ?></td>
                                    <td class="list"><a href="./del_member.php?id=<?php echo $row[0];?>"  >삭제하기</a></td>
                        
                              </tr>
                                  
                    <?php    }?>
                        
                    </table>
                            
                                    <?php
                  if($last_page >1){
                        ?>
                        <div id="pagination">
                              <a href="Admin.php?page=1" class="direction"> &laquo;  처음</a>
                        <?php
                              if($page >1 )
                                    echo("<a href='Admin.php?page=".($page-1).".'class='direction'> &lsaquo; 이전</a>\n");
                        
                              if($page <=3){
                                    $first = 1;
                                    $last = $first +6;
                              }else if($last_page - $page <3){
                                    $first = $last_page - 6;
                                    $last = $last_page;
                              }else{
                                    $first = $page-3;
                                    $last = $first+6;
                              }
                              if($first <1) $first = 1;
                              if($last >$last_page) $last = $last_page;
                              
                              for($i = $first;$i <= $last;$i++){
                                    if($page ==$i)
                                          echo ("<strong>{$i}</strong>\n");
                              else
                                    echo ("<a href ='Admin.php?page={$i}' class='direction'>{$i}</a>\n");
                              }
                              if($page <$last_page){
                                    echo ("<a href='Admin.php?page=".($page+1)."'class='direction'>다음 &rsaquo;</a>\n");
                              }
                              ?>
                              <a href="Admin.php?page=<?php echo $last_page; ?>" class="direction">마지막&raquo;</a>
                        </div>
                            <?php        
                        }
                        ?>
                        <div class="info">
                              Total : <?php echo $num_articles; ?> Members
                        </div>
                          
                          
                                    
                          <?php } ?>          
                        
                        
                        
                        
                        
                        
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