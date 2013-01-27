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
			<h1>공지사항</h1>
			<?php
				if(isset($_GET['select_no'])) $no = $_GET['select_no'];
				
					$query = "select * from Pecha_Notice where article_no='".($no)."'";
					$result = mysql_query($query);
					 if(!$result)	die(mysql_error());
				
					$row=mysql_fetch_array($result);
					$no = $row[0];
					$title = $row[1];
					$content = $row[2];
					$writer = $row[3];
					$time = $row[4];
					$count = $row[5];
					
					$file_size = round(filesize($file)/1024,2); 
						
					//백슬래쉬 제거
					$content = stripslashes($content);	
					//html
					$content = htmlspecialchars($content);
					//개행처리
					$content = nl2br($content);
					
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
							<?php $query = "update Pecha_Notice set article_count=$count where article_no=$select_no";
							
												  mysql_query($query); ?>
					 </tr>
					 <tr><td colspan="4"  id="article_content"><?php echo $content."  "; ?></td></tr> 
				</table>
			<!--메뉴-->
			<a href="board.php" >목록</a>
			<a href="write.php"  class="article_menu">글쓰기</a>
			<?php echo("<a class='article_menu' href='delete.php?select_no=".($no)."'>삭제</a>"); ?>
		   <?php echo("<a class='article_menu' href='modify.php?select_no=".($no)."'>수정</a>"); ?>
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
