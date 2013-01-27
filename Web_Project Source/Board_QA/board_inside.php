<?php
include_once '../Auth/common.php';
require_once '../Auth/Config.php';
 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$content = escape_str($_POST['comment']);
	$no = $_POST['no'];
	
	$query = "insert into Pecha_QA_comment(comment_parent, comment_content, comment_writer) 
						values('$no', '$content', '$current_user')";
	$result = mysql_query($query);
	 if(!$result)	die(mysql_error());
}
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

<body>
	<div id="wrap">
    <?php include("../elements/top.php"); ?>
            
    <div id="center">
        <div id="left_center">
            <div id="header">
                <a href="../index.php">
                <img src="../images/logo.png" class="logo_menu" alt="logo" /></a> 
            </div>
			<div id="content">
			<h1>Q&#38;A 게시판</h1>
			<?php
				if(isset($_GET['select_no'])) $no = $_GET['select_no'];
				
					// 코멘트입력시 post로 받은 no값으로, 글목록 선택시 get으로 받은 no값으로
					$query = "select * from Pecha_QA where article_no='".($no)."'";
					$result = mysql_query($query);
					 if(!$result)	die(mysql_error());
				
					$row=mysql_fetch_array($result);
					$no = $row[0];
					$title = $row[1];
					$content = $row[2];
					$writer = $row[3];
					$time = $row[4];
					$count = $row[5];
					$file = $row[6];
					$file_name = $row[7];
					$reply = $row[8];
					
					
					$file_size = round(filesize($file)/1024,2); 
						
					//백슬래쉬 제거
					$content = stripslashes($content);	
					//html
					$content = htmlspecialchars($content);
					//개행처리
					$content = nl2br($content);
					if(!$loggedin){?>
					             <p>회원이 아니면 이용 하실 수 없습니다.</p>
                                          <p><a href="../Auth/Login.php">Login 하기</a></p>
<?php                                      
					}else{
		   ?>
			   <table>
					 <tr>
						<th>no.<?php echo $no. "  "; ?></td>
						<th id="article_title" colspan="2" class="article_inside_title"><?php echo $title." "; ?></th>
						<th><?php echo $writer. "  "; ?></th>
					</tr>
					 <tr>
							<td></td>
							<td></td>
							<td class="article_time"><?php echo $time. "  "; ?></td>
							<td >조회수:<?php $count= $count+1; echo $count."  "; ?></td>
							<?php $query = "update Pecha_QA set article_count=$count where article_no=$select_no";
							
												  mysql_query($query); ?>
					 </tr>
					 <tr><td colspan="4"  id="article_content"><?php echo $content. "  "; ?></td></tr> 
					 <?
						//첨부파일
						if(strcmp($file,'none')){ 
							echo "
							<tr>
							  <td class='write_col'>첨부file</td>
							  <td colspan=3><a href={$file}>{$file_name}</a>({$file_size}KB)</td>
							</tr>";
						}
					?>
				</table>
			    
		   <div id="comment">
				<?php	
					//commnet 내역불러오기
					$query = "select * from Pecha_QA_comment where comment_parent='$no'";
					$result = mysql_query($query);
					 if(!$result)	die(mysql_error());
				
					while($row=mysql_fetch_array($result)){
					
						$writer = $row[2];
						$content = $row[3];
						$time = $row[4];
				?>		
				<table  class="comment_veiw">
					<tr>
						<th class="comment_writer"><?php echo $writer; ?></td>
						<td class="comment_content"><?php echo $content; ?></td>
						<td class="comment_time"><?php echo $time; ?></td>
					</tr>
				</table>
				
				<?php	}	?>
				
				<form method='post'  action='board_inside.php'> 
					<input type="hidden" name="no" value='<?php echo $no ?>' />
					<table  id="comment_form">
						<tr>
							<th>Comment</th>
							<th></th>
							<th class="comment_content">
								<?php if(!$loggedin){ 
										echo '로그인해주세요';
									}else{ ?>
									<textarea cols='55' rows='2' name='comment'></textarea></th>
							<th><input type="submit" name="sumit" value="comment"><?php } ?></th>
						</tr>
					</table>
				</form>
			</div>
			<!--메뉴-->
			<a href="board.php" >목록</a>
			<?php echo("<a class='article_menu' href='reply.php?select_no=".($no)."'>답글</a>"); ?>
			<a href="write.php"  class="article_menu">글쓰기</a>
			<?php echo("<a class='article_menu' href='delete.php?select_no=".($no)."'>삭제</a>"); ?>
		   <?php echo("<a class='article_menu' href='modify.php?select_no=".($no)."'>수정</a>"); ?>
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
