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
					 <a href="../index.php"><img src="../images/logo.png" alt="logo" /></a>
					</div>
					<div id="content">
					<h1>자유게시판</h1>
						<div id="write_article">
							<?php
								$query = "select * from Pecha_Freeboard where article_no='".($_GET['select_no'])."'";
								$result = mysql_query($query);
								if(!$result){ 
									die(mysql_error()); 
								}else{
									$row=mysql_fetch_array($result);									
									$writer = $row[3];
								}

								if($_SESSION['user'] ==  $writer || $_SESSION['user'] == 'admin'){
									$query = "delete from Pecha_Freeboard where article_no='".($_GET['select_no'])."'";
									$result = mysql_query($query);
									if(!$result) die(mysql_error());
									
									$count=0;
									$query = "select * from Pecha_Freeboard order by article_no desc";
									$result = mysql_query($query);
									while($row=mysql_fetch_array($result)){
										$row[0] = $count+1;
									}
								?>
								<div id="message_box">
									 <p> 글이 삭제되었습니다!</p>
									 <p><a href="board.php">돌아가기</a></p>
								</div>
							<?php
								}else{
									echo("<p>권한이 없습니다<p>
                                                      <p><a href='board.php'>돌아가기</a></p>");
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
