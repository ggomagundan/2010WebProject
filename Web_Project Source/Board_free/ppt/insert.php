<?
/*
//db 연결 부분입니다.
mysql_connect("localhost", "phpbbs", "phpbbs") or die (mysql_error()); //hostname,id,password
mysql_select_db("itmembers"); //db이름

//입력폼(write.php)에서 전송된 내용을 변수에 담습니다.
$name = addslashes($name);
$password = addslashes($password);
$homepage = addslashes($homepage);
$subject = addslashes($subject);
$memo = addslashes($memo);


//디폴트 값이 필요한 변수에는 디폴트 값을 넣습니다.
$writetime = time();
$ip = getenv("REMOTE_ADDR");
$count = 0;
*/

################파일 업로드를 위해 추가된 부분 : 시작 ######################### 

// 업로드한 파일이 저장될 디렉토리 정의
 $target_dir = "up";  // 서버에 up 이라는 디렉토리가 있어야 한다.
 
// if(strcmp($upfile,"none")) {   // 파일이 업로드되었을 경우
 if($upfile != '') {   // 파일이 업로드되었을 경우
 
// 업로드 금지 파일 식별 부분
    $filename = explode(".", $upfile_name);
    $extension = $filename[sizeof($filename)-1];
 	
    if(!strcmp($extension,"html") || 
       !strcmp($extension,"htm") ||
       !strcmp($extension,"php") ||      
       !strcmp($extension,"inc"))
    {
       $msg = "업로드가 금지된 파일입니다.";
    }
 
// 동일한 파일이 있는지 확인하는 부분
    $target = $target_dir . "/" . $upfile_name;
    if(file_exists($target)) {
	   $msg = "동일한 파일이 있습니다.";
    }
 
// 지정된 디렉토리에 파일 저장하는 부분
    if(!copy($upfile,$target)) {   // false일 경우
       $msg = "파일 저장 실패";
    }
 
// 임시 파일을 삭제하는 부분
    if(!unlink($upfile)) { // false일 경우
       $msg = "임시 파일 삭제 실패";
    }

}

################파일 업로드를 위해 추가된 부분 : 끝 ######################### 

//SQL 명령을 이용해 입력받은 내용과 디폴트값 등을 MySQL에 입력(insert)합니다.

$query = "insert into Pecha_Freeboard 
		values('$title', '$content','$writer','$target','$upfile_name')";
// $target : 첨부파일 이름(디렉토리 포함), $upfile_name 첨부파일 이름만.

//글 입력이 완료되면 목록 보기 페이지로 자동 이동하도록 합니다 
 
if ($msg=='') {
	$msg = "성공적으로 등록되었습니다"; 
	 echo " <html><head> 
                 <script name=javascript> 
                  if('$msg' != '') { 
                         self.window.alert('$msg'); 
                 } 
                 location.href='board.php?'; 
                 </script> 
                 </head> 
                 </html> "; 
	mysql_query($sql) or die (mysql_error());
} else {
	 echo " <html><head> 
                 <script name=javascript> 
                 if('$msg' != '') { 
                         self.window.alert('$msg'); 
                 } 
                 history.go(-1);
                 </script> 
                 </head> 
                 </html> "; 
}

?>