 <?php
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$content = escape_str($_POST['comment']);
					
					$query = "insert into Pecha_Freeboard_comment(comment_parent, comment_content, comment_writer) 
										values('$no', '$content', '$current_user')";
					$result = mysql_query($query);
					 if(!$result)	die(mysql_error());
				}
				
				//commnet 내역불러오기
				$query = "select * from Pecha_Freeboard_comment where comment_parent='$no'";
				$result = mysql_query($query);
				 if(!$result)	die(mysql_error());
			
				while($row=mysql_fetch_array($result)){
				
					$writer = $row[2];
					$content = $row[3];
					$time = $row[4];
				
?>		   
		   <div id="comment">
				<table  class="comment_veiw" border='1'>
					<tr>
						<th class="comment_writer"><?php echo $writer; ?></td>
						<td></td>
						<td class="comment_content"><?php echo $content; ?></td>
						<td class="comment_time"><?php echo $time; ?></td>
					</tr>
				</table>
				
				<?php }	?>
				
				<form method='post'  action='board_inside.php'> 
					<table  id="comment_form">
						<tr>
							<th>Comment</th>
							<th></th>
							<th class="comment_content"><textarea cols='55' rows='2' name='comment'></textarea></th>
							<th><?php if(!$loggedin){ 
												echo '로그인해주세요';
											}else{
									?>
								<input type="submit" name="sumit" value="코멘트 달기" size='20px'><?php } ?>
							</th>
						</tr>
					</table>
				</form>
			</div>