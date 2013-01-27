<?php
include_once '../Auth/common.php';
require_once '../Auth/Config.php';
 
 $per_page = 20;
	
	if(isset($_GET["page"])){ $page = (int)$_GET["page"]; }
	if(!$page && $page <= 0){ $page = 1; }
	
	$query = "SELECT COUNT(*) FROM Pecha_Freeboard";
	$result = mysql_query($query); 
	
	if($result){
		$row = mysql_fetch_array($result);
		$num_articles = $row[0];
	}
	
	$last_page = ceil($num_articles / $per_page);

	$query = "SELECT * FROM Pecha_Freeboard ORDER BY article_reply_no DESC, article_reply_st ASC LIMIT ". (($page-1)*$per_page) .", ".($per_page);
	$result = mysql_query($query); 
	
	if(!$result){
		die("Database access failed: " .mysql_error());
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


<div id="wrap">
	<?php include("../elements/top.php"); ?>
	
	<div id="center">
		  <div id="left_center">
				 <div id="header">
					<a href="../index.php"><img src="../images/logo.png" alt="logo" /></a> 
				</div>
				<div id="content">
				<h1>자유게시판</h1>
					<table>
						<tr>
							<th class="article_first">번호</th>
							<th>제목</th>
							<th>글쓴이</th>
							<th>시간</th>
							<th>조회</th>
						</tr>
						<?php
							while($row=mysql_fetch_array($result)){
							$comment_query = "SELECT COUNT(*) FROM Pecha_Freeboard_comment where comment_parent = ".$row['article_no'];
							$comment_result = mysql_query($comment_query);
							
							if(!$comment_result) die("Unable to select to MySQL : " . mysql_error());
							$comment_row = mysql_fetch_array($comment_result);
							$comment_count = $comment_row[0];


						 ?>
						 <tr>
						   <td id="article_no">
								<?php echo ("<a href='board_inside.php?select_no=".($row['article_no'])."'>".($row['article_no'])."</a>"); ?></td>
						   <td class="article_list_title">
								<?php echo ("<a href='board_inside.php?select_no=".($row['article_no'])."'>".($row['article_title'])."</a>");
											if($comment_count > 0){
												echo "    <b>".($comment_count)."</b>";
											}
								?>
								
							</td>
						   <td><?php echo $row['article_writer']. "  "; ?></td>
						   <td><?php echo $row['article_write_time']. "  "; ?></td>
						   <td><?php echo $row['article_count']. "  "; ?></td>
					   <?php
							}
						?>
						</tr>                        
					</table>
					<a href="./write.php" class="article_menu">글쓰기</a>
					<?php
				if($last_page > 0){
				?>
				<div id="pagination">
				<a href="board.php?page=1" class="direction">&laquo; 처음</a>
				<?php					
						if($page <= 3){
							$first = 1;
							$last = $first + 6;
						}else if($last_page - $page < 3){
							$first = $last_page - 6;
							$last = $last_page;
						}else{
							$first = $page - 3;
							$last = $first + 6;
						}
						
						if($first < 1) $first = 1;
						if($last > $last_page) $last = $last_page;
						
						for($i = $first; $i<=$last; $i++){
							if($page == $i){
								echo("<strong>{$i}</strong>\n");
							}else{
								echo("<a href='board.php?page={$i}' class='direction'>{$i}</a>\n");
							}
						}
					?>
					<a href="board.php?page=<?php echo($last_page) ?>" class="direction">마지막  &rsaquo;</a>
				</div>
				<?php
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
