<?
/*
//db ���� �κ��Դϴ�. 
mysql_connect("localhost", "phpbbs", "phpbbs") or die (mysql_error()); //host,id,passwd 
mysql_select_db("itmembers"); //db�̸� 

//������(modify.php)���� ���۵� ������ ������ ����ϴ�. 
$name = addslashes($name); 
$password = addslashes($password); 
$email = addslashes($email); 
$homepage = addslashes($homepage); 
$subject = addslashes($subject); 
$memo = addslashes($memo);


//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�. 
$tablename="Pechakucha_Table"; //���̺� �̸�
$writetime = time(); 
//$ip = getenv("REMOTE_ADDR"); 

//��й�ȣ�� �´��� Ȯ���մϴ�.
$sql = "select number from $tablename where number=$number and password='$password'";
$result = mysql_query($sql) or die (mysql_error());

if(mysql_num_rows($result)) {  //��ȯ�� ���� ������...
*/


################���� ���ε带 ���� �߰��� �κ� : ���� ######################### 

// ���ε��� ������ ����� ���丮 ����
 $target_dir = "up";  // ������ up �̶�� ���丮�� �־�� �Ѵ�.
 
 if($upfile != '') {   // ������ ���ε�Ǿ��� ���
 
// ���ε� ���� ���� �ĺ� �κ�
    $filename = explode(".", $upfile_name);
    $extension = $filename[sizeof($filename)-1];
 	
    if(!strcmp($extension,"html") || 
       !strcmp($extension,"htm") ||
       !strcmp($extension,"php") ||      
       !strcmp($extension,"inc"))
    {
       $msg = "���ε尡 ������ �����Դϴ�.";
    }
 
// ������ ������ �ִ��� Ȯ���ϴ� �κ�
    $target = $target_dir . "/" . $upfile_name;
    if(file_exists($target)) {
	   $msg = "������ ������ �ֽ��ϴ�.";
    }
 
// ������ ���丮�� ���� �����ϴ� �κ�
    if(!copy($upfile,$target)) {   // false�� ���
       $msg = "���� ���� ����";
    }
 
// �ӽ� ������ �����ϴ� �κ�
    if(!unlink($upfile)) { // false�� ���
       $msg = "�ӽ� ���� ���� ����";
    }
 }
################���� ���ε带 ���� �߰��� �κ� : �� ######################### 

	//������ ������ UPDATE�մϴ�.
	$query = "insert into Pecha_Freeboard 
		values('$title', '$content','$writer','$target','$upfile_name')"; 
	mysql_query($sql) or die (mysql_error()); 
	if($upfile != '') {  // ÷���� ������ ���� ��쿡�� ÷������ �̸� �ʵ� ����
		mysql_query("update $tablename set file_name1='$target',s_file_name1='$upfile_name' where number=$number");
	}

	if ($msg == '') {
		$msg = "������ �Ͽ����ϴ�.";
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
	$msg = "��й�ȣ�� Ʋ���ϴ�.";
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