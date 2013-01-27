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
                <a href="../index.php"><img src="../images/logo.png" class="logo_menu" alt="logo" /></a> 
					Board
				</div>
				<div id="content">
					<div id="write_article">
						<?php 
							if($_SESSION['level']!= '1'){
						 ?>
						 <div id="loginplz">
							<p>Admin이 아니면 글을 쓸 수 없습니다.</p>
							<p><a href="../Auth/Login.php">Login 하기</a></p>
						  </div>        
						  </div>                      
						 <?php
							}else{
								if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
								   $title = escape_str($_POST['title']);
								   $content = escape_str($_POST['content']);
								   $writer= $current_user;
								
							   $query = "insert into Pecha_Notice(article_title, article_content, article_writer) 
													values('$title', '$content','$writer')";
							   $result = mysql_query($query);
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