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
		<link rel="stylesheet" type="text/css" href="board.css" />
      
      <link href="../images/pabicon.ico" rel="shortcut icon"><!--파비콘삽입-->
      
      <script src="../data/jquery.js" type="text/javascript"></script>
      <script type="text/javascript" src="../data/menu_tab.js"></script> 

</head>
<form name='myForm' method='post' ENCTYPE='multipart/form-data'>
<body>
	<div id="wrap">
		<!-- top -->
       <?php include("../elements/top.php"); ?>
	   <!-- 중앙내용 center -->
       <div id="center">
			<div id="left_center">
             <div id="header">
					 <a href="../index.php"><img src="../images/logo.png" alt="logo" /></a> 
				</div>
				<div id="content">
					<h1>자유게시판</h1>
					<div id="write_article">
						<?php 
							if(!$loggedin){
						 ?>
						 <div id="loginplz">
							<p>로그인을 해주십시요</p>
							<a href="../Auth/Login.php">로그인 하기</a>
						  </div>   
						  </div>                           
						 <?php
							}else{
								if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
								   $title = escape_str($_POST['title']);
								   $content = escape_str($_POST['content']);
								   $writer= $current_user;
					 
								if(strcmp($_POST['upfile'],"none")) { 
								 if($upfile != '') {  
								 
								 // 업로드할 디렉토리
								 $target_dir = "up";
								 
								// 업로드 금지 파일 식별
									$filename = explode(".", $upfile_name);
									$extension = $filename[sizeof($filename)-1];
									
									if(!strcmp($extension,"html") || 
									   !strcmp($extension,"htm") ||
									   !strcmp($extension,"php") ||      
									   !strcmp($extension,"inc"))
									{
									   $msg = "업로드가 금지된 파일입니다.";
									}
								 
								// 동일한 파일이 있는지 확인
									$target = $target_dir . "/" . $upfile_name;
									if(file_exists($target)) {
									  echo("동일한 파일이 있습니다.");
									}
								 
								// 파일 저장
									if(!copy($upfile,$target)) {  
									   echo("파일 저장 실패");
									}
								 
								// 임시 파일을 삭제
									if(!unlink($upfile)) {
									   $msg = "임시 파일 삭제 실패";
									}

								}
								}
								
							   $query = "insert into Pecha_Freeboard(article_title, article_content, article_writer, file_name1, s_file_name1, article_reply_no, article_reply_st) 
													values('$title', '$content','$writer', '$target', '$upfile_name', '', 'AAAAA')";
							   $result = mysql_query($query);
							   if(!$result) die("Unable to inser to MySQL : " . mysql_error());
								
								//현재 입력된 글 번호 찾기
							    $sql = "select article_no from Pecha_Freeboard where article_writer='$writer' ORDER BY article_no DESC limit 0, 1";
								$result = mysql_query($sql);
								if(!$result) die("Unable to select to MySQL : " . mysql_error());
								
								$row = mysql_fetch_array($result);
								$no = $row[0];
								
								$sql = "update Pecha_Freeboard set article_reply_no = '$no' where article_no = '$no'";
								$result = mysql_query($sql);
								if(!$result) die("Unable to inser to MySQL : " . mysql_error());
							?>
							<!-- 글쓰기 성공시 나올 페이지 -->
								<div id="message_box">
								  <p> 글이 등록되었습니다!</p>
								  <p><a href="board.php">돌아가기</a></p>
								</div>
								</div>
							<?php
								}else{
                            ?>
						   <form method="post" ENCTYPE="multipart/from-data">
							   <table>
							   <tr>
									<td class="write_col">제목 </td>
									<td class="write_col"><input type='text' name='title' id='title' size='65'></td>
									<td class="write_col">비공개<input type="checkbox" name="secret" id="secret" class="blanks"></td>    
								</tr>
								<tr> 
									<td colspan="3" class="write_col"><textarea cols="80" rows="20" name="content"></textarea></td>
							   </tr>
							   <tr>
									<td class="write_col">파일 첨부</td>
									<td align='center'  colspan="2"><input type="file" name="upfile" size="40"></td>
							   </tr>
							   
							   </table>
							   <input type="submit" name="sumit" value="글쓰기"><input  type='button'  name='cencle' value='취소')>
						   </form>
                  </div>
                  <?php
								}
							}
                  ?>
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