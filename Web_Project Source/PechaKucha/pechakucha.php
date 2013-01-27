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
								<div id="question" class="section">
									<h1><b>페차쿠차란?</b></h1>
									<div>
									<p><b>Pecha Kucha</b>는 일본말로 대화를 나누는 소리를 의미한다. 
									2003년 도쿄에서 처음으로 시작하여 지금은 서울을 포함해서
									전 세계 80여개의 도시에서 개최되고 있는 일종의 발표 컨테스트라 할 수 있다.</p>
									</div>
									<div>
									<img alt="pechakucha" src="../images/intro1.png">
									<img alt="pechakucha" src="../images/intro2.png">
									</div>
							  </div>
							  <div id="exclamation" class="section">
									<h1><b>페차쿠차의 목적</b></h1>
									<div>
									<p>발표할 PPT는 한 장당 20초가 주어지고 총 20 장을 갖는다. 
									발표자가 말을 하고 있더라도 20초가 지나면 다음 페이지로 넘어가게 된다. 
									총 20장이 모두 흐르면 발표는 끝이 난다. 이는 발표가 루즈해 지거나 필요이상으로 
									시간을 끄는 행위를 원천적으로 차단하게 되어 프레젠테이션이 핵심만을 간결하게 
									전달해야 한다는 것을 강조하기 위해 전 세계적으로 펼치는 사회적 운동이다.</p>
									</div>
									<div class="poster">
									<img alt="Poster" src="../images/poster.png">
									</div>
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