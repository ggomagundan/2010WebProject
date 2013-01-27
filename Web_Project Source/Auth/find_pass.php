<?php
include_once 'common.php';
include_once 'Config.php';
include_once 'make_passwd.php';

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['mail'])){
      $id= $_POST['id'];      
      $name= $_POST['name'];
      $mail = $_POST['mail'];
      $query = "select user_password from Pecha_Member where  user_name='$name' and user_email='$mail'";
      
      $result = mysql_query($query);
      $row= mysql_fetch_array($result);
       $result = mysql_query($query);
      $row= mysql_fetch_array($result);
      if($row[0] == null  ) $find_pass_suc = 'n';
      else{
            $your_pass = $row[0];
            $find_pass_suc = 'y';
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
                         if($find_pass_suc == 'y'){
                                     
                          
?>
                          <div id="show_id"> 
                          
                          <?php
                        
                              $temp_passwd = random_string(6); 
                              //임시 패스워드 생성      
                   
                          $message = "Your Password Is $temp_passwd";
                          
                          $temp_passwd = crypt($temp_passwd);
                          
                          $query ="update Pecha_Member set user_password='$temp_passwd' where user_id='$id'";
                          mysql_query($query);

                              
                              $message = wordwrap($message, 70);


                        
                        
                        mail($mail, 'PechaKucha Your Password', $message);

               
                    ?>      
                          당신의 임시 PassWord를 가입메일로 보내었습니다.
                           <br/>
                          <p><a href="./Login.php">로그인 하기</a></p></div>    
                        <?php }else if($find_pass_suc == 'n'){
                             
                            

                             
                             
                             
                              ?>
                              <div id="show_id">일치하는 회원정보가 없습니다.</div>
                              
                            <?php } else{    ?>
                               <div id="find_id_pass">
                              <div id="title">PassWord 찾기</div>
                              <div>
                               <form action="find_pass.php" method="POST">
                                    <table>
                                          <tr>
                                                <td>ID :</td>
                                                <td> <input type="text" name="id" size="10"></td>
                                          </tr>
                                          <tr>
                                                <td>이름 :</td>
                                                <td> <input type="text" name="name" size="10"></td>
                                          </tr>
                                          <tr>
                                                <td>메일 주소 :</td>
                                                <td><input type="text" name="mail" size="20"></td>
                                          </tr>
                                          <tr>
                                          <td colspan="2"><input type="submit" value="PassWord 찾기"></td></tr>
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