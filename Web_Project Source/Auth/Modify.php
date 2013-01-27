<?php
      require_once('./Config.php');
      require_once('./common.php');
     







$msg="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
      $passwd = $change_passwd = $passwd_ques = $passwd_ans = $name = $nickname 
      = $sex = $age = $birthday = $mail = $addr = $phone = $homepy = $mailing = $sms
      = $recommend = $intro = "";
       
                                                                       
     
      if(isset($_POST['passwd']))                        $passwd = escape_str($_POST['passwd']);
      if(isset($_POST['change_passwd']))             $change_passwd = escape_str($_POST['change_passwd']);
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
      
      $query = "select * from Pecha_Member where user_id='$current_user'";
       
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      
      
      if( crypt($passwd,$row[1])==$row[1]){
            if(isset($change_passwd) && $change_passwd != ''){
                  $change_passwd=crypt($change_passwd);
                  $query = "update Pecha_Member set user_password='$change_passwd', user_password_q='$passwd_ques', user_password_a='$passwd_ans', user_nickname='$nickname',
                   user_sex='$sex',user_age='$age',user_birthday='$birthday', user_email='$mail',user_address='$addr', user_phonenum='$phone',user_homepage='$homepy',
                    user_mailing='$mailing',user_sms='$sms', user_profile='$intro' where user_id='$current_user'";
                    
                    $result = mysql_query($query);
            }else{
              $query = "update Pecha_Member set user_password_q='$passwd_ques', user_password_a='$passwd_ans', user_nickname='$nickname',
                   user_sex='$sex',user_age='$age',user_birthday='$birthday', user_email='$mail',user_address='$addr', user_phonenum='$phone',user_homepage='$homepy',
                    user_mailing='$mailing',user_sms='$sms', user_profile='$intro' where user_id='$current_user'";
                  
                    $result = mysql_query($query);
                  
            } 
            header("Location:../index.php");
      }else{
           $msg = "passwd";
      }
      
      
     
      
      
             
}
      
  

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
                    





<div id="notice">

           <?php
                  if($msg=='passwd'){
                        echo "패스워드가 틀렸습니다.<br>";
                  }
         ?>
            <span class="must_input">*</span> 는 필수사항입니다.
           
</div>

<?php 
  
     
             $query = "select * from Pecha_Member where user_id='$current_user'";
            
             $result = mysql_query($query);
             $row = mysql_fetch_array($result);
      
     
?>



<form id="Join_Form" method="post" action="Modify.php"> 
  <table >
    <tr>
    <td class="table_title"> 
        <label for="user_id"><span class="must_input">*</span>ID</label></td> 
      <td class="table_cont"><input id="user_id" name="user_id" type="text" value="<?php echo $row[0]; ?>" disabled/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="passwd"><span class="must_input">*</span>암호</label> </td>
      <td class="table_cont"><input id="passwd" name="passwd" type="password" /></td> 
    </tr> 
    
    <tr> 
      <td class="table_title"><label for="change_passwd">바꿀 암호</label></td> 
      <td class="table_cont"><input id="change_passwd" name="change_passwd" type="password" /></td> 
    </tr>
    
    <tr> 
      <td class="table_title"><label for="passwd_question"><span class="must_input">*</span>Question</label></td> 
      <td class="table_cont"><input id="passwd_question" name="passwd_question" type="text" value="<?php echo $row[2]; ?>"/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="passwd_answer"><span class="must_input">*</span>Answer</label></td> 
      <td class="table_cont"><input id="passwd_answer" name="passwd_answer" type="text" value="<?php echo $row[3]; ?>"/></td> 
    </tr>
    <tr> 
      <td class="table_title"><label for="user_name"><span class="must_input">*</span>Name</label></td> 
      <td class="table_cont"><input id="user_name" name="user_name" type="text" value="<?php echo $row[4]; ?>" disabled/></td> 
    </tr>
    <tr> 
      <td class="table_title"><label for="user_nickname">Nickname</label></td> 
      <td class="table_cont"><input id="user_nickname" name="user_nickname" type="text" value="<?php echo $row[5]; ?>"/></td> 
    </tr>
    <p> 
           <td class="table_title"> <label for="user_nickname">Sex </label></td> 
     <td class="table_cont">
     <?php if($row[6] == 'M'){ ?>
     <input type="radio" name="user_sex" value="male" checked>Male
      <input type="radio" name="user_sex" value="female">Female
      <?php }else{  ?>
      <input type="radio" name="user_sex" value="male" >Male
      <input type="radio" name="user_sex" value="female"checked>Female
      <?php } ?>
      </td>
    </tr>
     <tr> 
      <td class="table_title"><label for="user_age">Age</label></td> 
      <td class="table_cont"><input type="text" name="user_age" onKeyPress="return numbersonly(event, false)" style="ime-mode:disabled;" value="<?php echo $row[7]; ?>"/></td>
    </tr>
     <tr> 
      <td class="table_title"><label for="user_birthday">BirthDay</label></td> 
      <td class="table_cont"><input id="user_birthday" name="user_birthday" type="text" value="<?php echo $row[8]; ?>"/></td> 
    </tr> 
     <tr> 
      <td class="table_title"><label for="mail_address"><span class="must_input">*</span>Email</label></td> 
      <td class="table_cont"><input id="mail_address" name="mail_address" type="text"value="<?php echo $row[9]; ?>"/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="address">Address</label></td> 
      <td class="table_cont"><input id="address" name="address" type="text"value="<?php echo $row[10]; ?>"/> </td>
    </tr> 
    <tr> 
      <td class="table_title"><label for="user_phonenum">Phone</label></td> 
      <td class="table_cont"><input id="user_phonenum" name="user_phonenum" type="text" size="20" value="<?php echo $row[11]; ?>"/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="homepage">HomePage</label></td> 
      <td class="table_cont"><input id="homepage" name="homepage" type="text" value="<?php echo $row[12]; ?>"/> </td>
    </tr> 
    <tr> 
      <td class="table_title"><label for="mailing">Mailing</label></td> 
      <td class="table_cont">
      <?php if($row[13] == 'Y'){ ?>
      <input type="radio" name="mailing" value="yes" checked> Yes 
      <input type="radio" name="mailing" value="no"> No
      <?php }else{ ?>
      <input type="radio" name="mailing" value="yes"> Yes 
      <input type="radio" name="mailing" value="no" checked> No
     <?php  } ?>
      </td>
    </tr> 
    <tr> 
      <td class="table_title"><label for="sms">SMS Service</label> </td>
      <td class="table_cont">
      <?php if($row[14] == 'Y'){ ?>
      <input type="radio" name="sms" value="yes" checked> Yes 
      <input type="radio" name="sms" value="no"> No</td>
      <?php }else{ ?>
           <input type="radio" name="sms" value="yes" > Yes 
      <input type="radio" name="sms" value="no"checked> No</td> 
            
            
     <?php  } ?>
    </tr> 
    
    <tr> 
      <td class="table_title"><label for="recommend">recommend</label></td> 
     <td class="table_cont"><input type="text" id="recommend" name="recommend" value="<?php echo $row[16]; ?>" disabled/></td> 
    </tr> 
    <tr> 
      <td class="table_title"><label for="intro">Introduce</label></td> 
      <td class="table_cont"><textarea  name="intro" cols="30" rows="3"><?php echo $row[15]; ?></textarea></td>
    </tr>
      
        
    <tr> 
    <td colspan="2"><input  class="submit" type="submit" id="submit_btn" value="수정하기">
    <a href="out_mem.php"><input  type="button" id="out_mem" value="탈퇴하기"></a>
    </td> 
    
      
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
 