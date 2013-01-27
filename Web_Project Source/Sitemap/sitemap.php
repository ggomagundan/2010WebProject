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
	  <link rel="stylesheet" type="text/css" href="sitemap.css" />
      
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
									<a href="../index.php"><img src="../images/logo.png" class="logo_menu" alt="logo" /></a> 
							</div>
						  <div id="content">
						  <h1>사이트맵</h1>
							<div class="sitemap_div">
								<p><img src="../images/Check.png" /> PechaKucha</p>
								<ul>
									<a href='../PechaKucha/pechakucha.php'><li>  PechaKucha?</li></a>
									<a href='../PechaKucha/Android.php'><li>  Android Application</li></a>
									<a href=''><li>  PechaKucha Homepage</li></a>
								</ul>
							</div>
							
							<div class="sitemap_div">
								<p><img src="../images/Check.png" /> Presentaion</p>
								<ul>
									<a href='../Presentation/presentation.php'><li>  표지자랑</li></a>
									<a href='../Presentation/atPecha.php'><li>  페차쿠차꺼보기</li></a>
								</ul>
							</div>
							
							<div class="sitemap_div">
								<p><img src="../images/Check.png" /> board</p>
								<ul>
									<a href='../Board_notice/board.php'><li>  공지사항</li></a>
									<a href='../Board_free/board.php'><li>  자유게시판</li></a>
									<a href='../Presentation_share/board.php'><li>  PPT공유게시판</li></a>
									<a href='../Board_QA/board.php'><li>  Q&#38;A</li></a>
									
								</ul>
							</div>
							
							<div class="sitemap_div">
								<p><img src="../images/Check.png" /> Event</p>
								<ul>
									<a href='../Events/events.php'><li>  페차쿠차이벤트</li></a>
								</ul>
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