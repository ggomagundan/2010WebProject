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
      <?php include("../elements/top.php"); ?>
      <div id="center">
		  <div id="left_center">
				 <div id="header">
					<a href="../index.php"><img src="../images/logo.png" alt="logo" /></a>
				</div>
				<div id="content">
				<h1>PPT 공유게시판</h1>
					<div id="write_article">
						<?php
						$query = "select * from Pecha_Presentation_share where article_no='".($_GET['select_no'])."'";
						$result = mysql_query($query);
							if(!$result){ 
								die(mysql_error()); 
							}else{
								$row=mysql_fetch_array($result);
								
								$no = $row[0];
								$title = $row[1];
								$content = $row[2];
								$writer = $row[3];
								$count = $row[4];
								$time = $row[5];
								$file = $row[6];
								$file_name = $row[7];

							}
							
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$title = escape_str($_POST['title']);
								$content = escape_str($_POST['content']);
			 
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
									
									$query = "UPDATE Pecha_Presentation_share  SET 
														article_title='{$title}', article_content='{$content}',  file_name1='{$target}', s_file_name1='{$upfile_name}' 
															WHERE article_no='{$no}'"; 
								}else{
							   
									$query = "UPDATE Pecha_Presentation_share  SET article_title='{$title}', article_content='".($content)."' 
												WHERE article_no='".($no)."'";
								}
							   
							   $result = mysql_query($query);
							   if(!$result) die("Unable to inser to MySQL : " . mysql_error());
							 ?>
								<div id="message_box">
								  <p> 글이 수정되었습니다!</p>
								  <p><a href="board.php">돌아가기</a></p>
								</div>
							 <?php  
							}else{
								if($_SESSION['user'] ==  $writer || $_SESSION['level'] == '1'){
									echo("<form id='write' ENCTYPE='multipart/from-data' method='post' action='modify_ok.php'>");
							?>
								   <table>
								   <tr>
										<td class="write_col">제목</td>
										<td class="write_col"><input type='text' name='title' id='title' size='65' value='<?php echo $title; ?>'></td>
										<td class="write_col">비공개<input type="checkbox" name="secret" id="secret" class="blanks"></td>    
									</tr>
									<tr> 
										<td colspan="3" class="write_col">
											<textarea cols="80" rows="20" name="content"><?php echo $content; ?></textarea>
										</td>
								   </tr>
								   <tr>
										<td class="write_col">첨부file</td>
										<td align='center'  colspan="2"><input type="file" name="upfile" size="40"><br />
											<? if ($file != '') {
												echo "<b>{$file_name}</b> 파일이 등록되어 있습니다. "; 
												}
											?>
										</td>
								   </tr>
									</table>
								   <input type='submit' name='sumit' value='수정하기'>
								   <a href="./board_inside.php?select_no=<?php echo $no; ?>"><input  type='button'  name='cencle' value='취소')></a>
								   </form>
								   
					<?php }else{
									echo("<p>권한이 없습니다<p>
									<p><a href='board.php'>돌아가기</a></p>");
									
								}
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
