<?php
include_once 'common.php';
include_once 'Config.php';

if(isset($_POST['name']) && isset($_POST['mail'])){
            
      $name= $_POST['name'];
      $mail = $_POST['mail'];
      $query = "select user_id from Pecha_Member where  user_name='$name' and user_email='$mail'";
      
      $result = mysql_query($query);
      $row= mysql_fetch_array($result);
      if($row[0] == null  ) $find_id_suc = 'n';
      else{
            $your_id = $row[0];
            $find_id_suc = 'y';
      }      
      
      
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
                       
                        if($find_id_suc == 'y'){
                              ?>
                          <div id="show_id"> 당신의 ID는 <? echo  $row[0]; ?> 입니다.
                          <br/>
                          <p><a href="./Login.php">로그인 하기</a></p></div>    
                        <?php }else if($find_id_suc == 'n'){
                              ?>
                              <div id="show_id">일치하는 회원정보가 없습니다.</div>
                              
                            <?php } else{    ?>
                              <div id="find_id_pass">
                              <div id="title">ID 찾기</div>
                              <div>
                               <form action="find_id.php" method="POST">
                                    <table>
                                          <tr>
                                                <td>이름 :</td>
                                                <td> <input type="text" name="name" size="10"></td>
                                          </tr>
                                          <tr>
                                                <td>메일 주소 :</td>
                                                <td><input type="text" name="mail" size="20"></td>
                                          </tr>
                                          <tr>
                                          <td colspan="2"><input type="submit" value="ID찾기"></td></tr>
                                    </table>
                                     
                               </form>
                              </div>
                               <?php 
                               }
?>
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