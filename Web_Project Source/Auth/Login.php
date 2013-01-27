<?php
include_once 'common.php';
include_once 'Config.php';
include_once 'KnowIP.php';
if($loggedin)
{
      header("Location: ../index.php?message=".urlencode("Error: 로그인상태"));
      die();
}

if(isset($_POST['user_id'])){
       $query = "select * from Pecha_Member where user_id='" . $_POST['user_id'] . "'";
       
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      
     
      
      
      if($row[0] && (crypt($_POST['user_password'],$row[1]))==$row[1]){
            
            $_SESSION['user'] = $_POST['user_id'];
            $_SESSION['level'] = $row[17];
             $login_time = date("Y-m-d H:i:s",time());
           
             $ip = knowip();
             
            $user =$_SESSION['user']; 
            $query=  "update Pecha_Member set user_login_time='$login_time', user_login_ip='$ip' where user_id='$user'";
            $result = mysql_query($query);
      
           
         
           
            header("Location: ../index.php");
            die();
      }
      else{
            $message= "ID나 Password가 틀렸습니다.";
           
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
                               <div id="Login">
                                    <form action="Login.php" method="post">
                                          <table id="login_table" cellpadding="10px" >
                                                <tr>
                                                      <td class="table_size" >
                                                            ID : 
                                                      </td>
                                                      <td  class="table_size"  > 
                                                            <input class="inputbox" name="user_id" type="text" size="15" maxlength="15">
                                                      </td>
                                                </tr>
                                                <tr>
                                                      <td  class="table_size" >
                                                            PassWord : 
                                                      </td>
                                                      <td class="table_size">
                                                            <input class="inputbox" name="user_password"  type="password" size="15" maxlength="15">
                                                      </td>
                                                </tr>
                                                <tr>
                                                      <td colspan="2">
                                                            <input id="submit_btn" type="submit" value="로그인">
                                                      </td>
                                                      <?php
                                                            if(isset($message)){
                                                                  ?>
                                                <tr>
                                                      <td class="login_error"  colspan="2"><?php print_message(); ?></td>
                                                    
                                                </tr>
                                                                  
                                                                  
                                                           <?php } ?>
                                          </table>
                                          
                                    </form>
                                     
                              </div> 
                              <div id="find_info">
                              <p>아이디 혹은 비밀 번호를 잊어버리셨나요?</p>
                                    <a href="./find_id.php">아이디 찾기</a> |  
                                    <a href="./find_pass.php">비밀번호 찾기</a>
                                    
                              
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