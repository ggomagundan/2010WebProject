<?
/*
//db ���� �κ��Դϴ�.
mysql_connect("localhost", "phpbbs", "phpbbs") or die (mysql_error()); //hostname,id,password
mysql_select_db("itmembers"); //db�̸�

//�Է���(write.php)���� ���۵� ������ ������ ����ϴ�.
$name = addslashes($name);
$password = addslashes($password);
$homepage = addslashes($homepage);
$subject = addslashes($subject);
$memo = addslashes($memo);


//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�.
$writetime = time();
$ip = getenv("REMOTE_ADDR");
$count = 0;
*/

################���� ���ε带 ���� �߰��� �κ� : ���� ######################### 

// ���ε��� ������ ����� ���丮 ����
 $target_dir = "up";  // ������ up �̶�� ���丮�� �־�� �Ѵ�.
 
// if(strcmp($upfile,"none")) {   // ������ ���ε�Ǿ��� ���
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

//SQL ����� �̿��� �Է¹��� ����� ����Ʈ�� ���� MySQL�� �Է�(insert)�մϴ�.

$query = "insert into Pecha_Freeboard 
		values('$title', '$content','$writer','$target','$upfile_name')";
// $target : ÷������ �̸�(���丮 ����), $upfile_name ÷������ �̸���.

//�� �Է��� �Ϸ�Ǹ� ��� ���� �������� �ڵ� �̵��ϵ��� �մϴ� 
 
if ($msg=='') {
	$msg = "���������� ��ϵǾ����ϴ�"; 
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