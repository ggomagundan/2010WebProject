<?
/*
//db 연결 부분입니다. 
mysql_connect("localhost", "phpbbs", "phpbbs") or die (mysql_error()); //host,id,passwd 
mysql_select_db("itmembers"); //db이름 

//수정폼(modify.php)에서 전송된 내용을 변수에 담습니다. 
$name = addslashes($name); 
$password = addslashes($password); 
$email = addslashes($email); 
$homepage = addslashes($homepage); 
$subject = addslashes($subject); 
$memo = addslashes($memo);


//디폴트 값이 필요한 변수에는 디폴트 값을 넣습니다. 
$tablename="Pechakucha_Table"; //테이블 이름
$writetime = time(); 
//$ip = getenv("REMOTE_ADDR"); 

//비밀번호가 맞는지 확인합니다.
$sql = "select number from $tablename where number=$number and password='$password'";
$result = mysql_query($sql) or die (mysql_error());

if(mysql_num_rows($result)) {  //반환된 열이 있으면...
*/


################파일 업로드를 위해 추가된 부분 : 시작 ######################### 

// 업로드한 파일이 저장될 디렉토리 정의
 $target_dir = "up";  // 서버에 up 이라는 디렉토리가 있어야 한다.
 
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

	//수정한 내용을 UPDATE합니다.
	$query = "insert into Pecha_Freeboard 
		values('$title', '$content','$writer','$target','$upfile_name')"; 
	mysql_query($sql) or die (mysql_error()); 
	if($upfile != '') {  // 첨부한 파일이 있을 경우에만 첨부파일 이름 필드 수정
		mysql_query("update $tablename set file_name1='$target',s_file_name1='$upfile_name' where number=$number");
	}

	if ($msg == '') {
		$msg = "수정을 하였습니다.";
		echo " <html><head>
		<script name=javascript>
		if('$msg' != '') {
			self.window.alert('$msg');
		}
		location.href='list.php?page=$page';
		</script>
		</head>
		</html> ";
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


} else {
	$msg = "비밀번호가 틀립니다.";
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