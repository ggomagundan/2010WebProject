<?php 
      require_once('./Config.php');
      require_once('./common.php');
      include_once('./KnowIP.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
      <title>pecha kucha</title>
      
      <link rel="stylesheet" type="text/css" href="../pechakucha.css" />
      <link rel="stylesheet" type="text/css" href="./Join.css" />
      
      <script src="../data/jquery.js" type="text/javascript"></script>
      <script type="text/javascript" src="../data/menu_tab.js"></script> 
      <script type="text/javascript" src="Join.js"></script>
      <script type="text/javascript" src="./Join_Check.js"></script>
      <script type="text/javascript" src="./validation.js"></script>

   


      
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






$msg="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
      $id = $passwd = $passwd_ques = $passwd_ans = $name = $nickname 
      = $sex = $age = $birthday = $mail = $addr = $phone = $homepy = $mailing = $sms
      = $recommend = $intro = "";
       
                                                                       
      if(isset($_POST['user_id']))                        $id = escape_str($_POST['user_id']);
      if(isset($_POST['passwd']))                        $passwd = escape_str($_POST['passwd']);
      if(isset($_POST['passwd_question']))           $passwd_ques = escape_str($_POST['passwd_question']);
      if(isset($_POST['passwd_answer']))             $passwd_ans = escape_str($_POST['passwd_answer']);
      if(isset($_POST['user_name']))                    $name = escape_str($_POST['user_name']);
      if(isset($_POST['user_nickname']))               $nickname = escape_str($_POST['user_nickname']);
      if(isset($_POST['user_sex']))                       $sex = escape_str($_POST['user_sex']);  
      if(isset($_POST['user_age']))                       $age = escape_str($_POST['user_age']);
      if(isset($_POST['user_birthday']))                  $birthday = escape_str($_POST['user_birthday']);
      if(isset($_POST['mail_address']))                  $mail = escape_str($_POST['mail_address']);
      if(isset($_POST['address']))                         $addr = escape_str($_POST['address']);
      if(isset($_POST['user_phonenum']))              $phone = escape_str($_POST['user_phonenum']);
      if(isset($_POST['homepage']))                      $homepy = escape_str($_POST['homepage']);
      if(isset($_POST['mailing']))                           $mailing = escape_str($_POST['mailing']);
      if(isset($_POST['sms']))                              $sms = escape_str($_POST['sms']);
      if(isset($_POST['recommend']))                    $recommend = escape_str($_POST['recommend']);
      if(isset($_POST['intro']))                              $intro = escape_str($_POST['intro']);
      
      $user_ip = knowip();
      $passwd = crypt($passwd);
      
      if($sex == 'male'){
            $sex = 'M';
      }else{
            $sex = 'F';
      }
       if($mailing == 'yes'){
            $mailing = 'Y';
      }else{
            $mailing = 'N';
      }
       if($sms == 'yes'){
            $sms = 'Y';
      }else{
            $sms = 'N';
      }
     
      
      $query= "select count(*) from Pecha_Member where user_id='"  .$id ."'" ;
       
      $result=mysql_query($query);
     
      $row= mysql_fetch_array($result);
      if($row[0]==0 && $msg==""){
                  
          
            
            
            $query = "insert into Pecha_Member(user_id, user_password, user_password_q, user_password_a, user_name, user_nickname, user_sex, user_age, user_birthday, user_email, user_address, user_phonenum, user_homepage, user_mailing, user_sms, user_recommend,user_profile, user_ip 
) " . "values('$id', '$passwd', '$passwd_ques', '$passwd_ans','$name','$nickname','$sex','$age','$birthday','$mail','$addr','$phone','$homepy','$mailing','$sms','$recommend','$intro','$user_ip')";
         
            ?>
            가입이 완료되었습니다. <br>
            <a href="./Login.php">로그인 하기</a>
            
          
         <?php   
            
            
            if(!mysql_query($query)){
                  echo "<div class='error'> insert failed : " . mysql_error() . "</div>";
            }
            else{
                  $msg = "comple";
            }
            echo $msg;
      }
      else{
            if($msg=="")
            $msg= "ID 중복입니다.<br>";
            sleep(10);
                  
            
      }
             
}
      
 if($msg != "comple"){
?>
<span id="msg">
      <?php if($msg != "comple") echo $msg; ?> <br>
</span>

<?php
if($loggedin){
                              ?>
                                    <div id="join_notice" >
                                    <p><?php echo $current_user; ?> 님은 가입이 된 상태입니다.</p>
                                    <p>새로 가입을 원하시면 가입을 하셔도 됩니다.</p>
                                    </div>
                                   
                              <?php
                              }
            ?>



<?php

      if(!isset($id)){

?>
<div id="notice">

           
         
            <span class="must_input">*</span> 는 필수사항입니다.
           
</div>
 <?php
      }
?>


<form id="Join_Form" method="post" action="Join.php"> 
  <table >
    <tr>
    <td class="table_title"> 
        <label for="user_id"><span class="must_input">*</span>ID</label></td> 
      <td class="table_cont"><input id="user_id" name="user_id" type="text"/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="passwd"><span class="must_input">*</span>암호</label> </td>
      <td class="table_cont"><input id="passwd" name="passwd" type="password" /></td> 
    </tr> 
    
    <tr> 
      <td class="table_title"><label for="confirm_passwd"><span class="must_input">*</span>암호확인</label></td> 
      <td class="table_cont"><input id="confirm_passwd" name="confirm_passwd" type="password" /></td> 
    </tr>
    
    <tr> 
      <td class="table_title"><label for="passwd_question"><span class="must_input">*</span>Question</label></td> 
      <td class="table_cont"><input id="passwd_question" name="passwd_question" type="text" /></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="passwd_answer"><span class="must_input">*</span>Answer</label></td> 
      <td class="table_cont"><input id="passwd_answer" name="passwd_answer" type="text" /></td> 
    </tr>
    <tr> 
      <td class="table_title"><label for="user_name"><span class="must_input">*</span>Name</label></td> 
      <td class="table_cont"><input id="user_name" name="user_name" type="text" /></td> 
    </tr>
    <tr> 
      <td class="table_title"><label for="user_nickname">Nickname</label></td> 
      <td class="table_cont"><input id="user_nickname" name="user_nickname" type="text" /></td> 
    </tr>
    <p> 
           <td class="table_title"> <label for="user_nickname">Sex </label></td> 
     <td class="table_cont"><input type ="radio" name="user_sex" value="male" checked>Male
      <input type ="radio" name="user_sex" value="female">Female</td>
    </tr>
     <tr> 
      <td class="table_title"><label for="user_age">Age</label></td> 
      <td class="table_cont"><input type="text" name="user_age" onKeyPress="return numbersonly(event, false)" style="ime-mode:disabled;" /></td>
    </tr>
     <tr> 
      <td class="table_title"><label for="user_birthday">BirthDay</label></td> 
      <td class="table_cont"><input id="user_birthday" name="user_birthday" type="text"/></td> 
    </tr> 
     <tr> 
      <td class="table_title"><label for="mail_address"><span class="must_input">*</span>Email</label></td> 
      <td class="table_cont"><input id="mail_address" name="mail_address" type="text"/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="address">Address</label></td> 
      <td class="table_cont"><input id="address" name="address" type="text"/> </td>
    </tr> 
    <tr> 
      <td class="table_title"><label for="user_phonenum">Phone</label></td> 
      <td class="table_cont"><input id="user_phonenum" name="user_phonenum" type="text"/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="homepage">HomePage</label></td> 
      <td class="table_cont"><input id="homepage" name="homepage" type="text"/> </td>
    </tr> 
    <tr> 
      <td class="table_title"><label for="mailing">Mailing</label></td> 
      <td class="table_cont"><input type="radio" name="mailing" value="yes" checked> Yes 
      <input type="radio" name="mailing" value="no"> No</td>
    </tr> 
    <tr> 
      <td class="table_title"><label for="sms">SMS Service</label> </td>
      <td class="table_cont"><input type="radio" name="sms" value="yes" checked> Yes 
      <input type="radio" name="sms" value="no"> No</td>
    </tr> 
    
    <tr> 
      <td class="table_title"><label for="recommend">recommend</label></td> 
     <td class="table_cont"><input type="text" id="recommend" name="recommend" /></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="intro">Introduce</label></td> 
      <td class="table_cont"><textarea  name="intro" cols="30" rows="3"></textarea></td>
    </tr>
      
        
    <tr> 
    <td colspan="2"><input  class="submit" type="submit" id="submit_btn" value="Join Members"></td> 
      
    </tr> 
  </table> 
</form>



   
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
 