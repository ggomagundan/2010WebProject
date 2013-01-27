<?php
include_once 'common.php';
include_once 'Config.php';
                  
      if(isset($_GET['id'])) $id=$_GET['id']; 
      else if(isset($_POST['id'])) $id = $_POST['id'];
                  
if(isset($_POST['level'])) {
            
      $le=$_POST['level'];
      $query = "update Pecha_Member set user_level = '$le' where user_id='$id'";
      mysql_query($query);




}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <title>pecha kucha</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" type="text/css" href="../pechakucha.css" />
      <link rel="stylesheet" type="text/css" href="./Login.css" />
      
      <script src="../data/jquery.js" type="text/javascript"></script>
       <script src="./chk_level.js" type="text/javascript"></script>
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
                 
                  
                  
                  
                  $query = "select * from Pecha_Member where user_Id='$id'";
                  
                  $result = mysql_query($query);
                  $row=mysql_fetch_array($result);
                  
                  ?>
                  <form method="post" action="member_info.php">
                  <table border="1" id="lists">
                              <tr>
                                    <th class="head">ID</th>                              
                                    <td><?php echo $row[0];?></td>
                                    <input type="hidden" name="id" id="id" value="<?php echo $row[0];?>">
                              </tr>
                              <tr>
                                    <th class="head">비번</th>                              
                                    <td><?php echo $row[1];?></td>
                              </tr>
                              <tr>
                                    <th class="head">질문</th>                              
                                    <td><?php echo $row[2];?></td>
                              </tr>
                              <tr>
                                    <th class="head">답변</th>                              
                                    <td><?php echo $row[3];?></td>
                              </tr>
                              <tr>
                                    <th class="head">이름</th>                              
                                    <td><?php echo $row[4];?></td>
                              </tr>
                              <tr>
                                    <th class="head">별명</th>                              
                                    <td><?php echo $row[5];?></td>
                              </tr>
                              <tr>
                                    <th class="head">성별</th>                              
                                    <td><?php echo $row[6];?></td>
                              </tr>
                              <tr>
                                    <th class="head">나이</th>                              
                                    <td><?php echo $row[7];?></td>
                              </tr>
                              <tr>
                                    <th class="head">생일</th>                              
                                    <td><?php echo $row[8];?></td>
                              </tr>
                              <tr>
                                    <th class="head">메일</th>                              
                                    <td><?php echo $row[9];?></td>
                              </tr>
                              <tr>
                                    <th class="head">주소</th>                              
                                    <td><?php echo $row[10];?></td>
                              </tr>
                              <tr>
                                    <th class="head">폰</th>                              
                                    <td><?php echo $row[11];?></td>
                              </tr>
                              <tr>
                                    <th class="head">홈피</th>                              
                                    <td><?php echo $row[12];?></td>
                              </tr>
                              <tr>
                                    <th class="head">메일링</th>                              
                                    <td><?php echo $row[13];?></td>
                              </tr>
                              <tr>
                                    <th class="head">문자서비스</th>                              
                                    <td><?php echo $row[14];?></td>
                              </tr>
                               <tr>
                                    <th class="head">소개</th>                              
                                    <td><?php echo $row[15];?></td>
                              </tr>
                               <tr>
                                    <th class="head">추천인</th>                              
                                    <td><?php echo $row[16];?></td>
                              </tr>
                               <tr>
                                    <th class="head">레벨</th>                              
                                    <td>
                                          <select name="level" id="level">
                                                <?php 
                                                      for($i=1;$i <=3;$i++){
                                                            if($i == $row[17]){?>
                                                                  <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                                                            <?php }else{ ?>
                                                                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                            <?php }
                                                      }?>
                                          </select>
                                          
                                          
                                          <input type="submit" value="바꾸기" id="chk_levels">
                                         
                                    </td>
                              </tr>
                               <tr>
                                    <th class="head">최근로그인시간</th>                              
                                    <td><?php echo $row[18];?></td>
                              </tr>
                               <tr>
                                    <th class="head">최근로그인아이피</th>                              
                                    <td><?php echo $row[19];?></td>
                              </tr>
                               <tr>
                                    <th class="head">가입시간</th>                              
                                    <td><?php echo $row[20];?></td>
                              </tr>
                               <tr>
                                    <th class="head">가입아이피</th>                              
                                    <td><?php echo $row[21];?></td>
                              </tr>
                              
                
            
              </table>
            </form>
                  
                          
                        
                        
                        
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