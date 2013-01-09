<?php
	include_once ("functions.php");
	include ("header.php");
	extract($_POST);
?>
<?php		
	mb_internal_encoding ('utf8');
	mysql_query ("SET CHARACTER SET 'utf8'");
	mysql_query ("SET NAMES 'utf8'");	
	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
	die("無法連線至資料庫伺服器<br />".PHP_EOL);
	if(!(mysql_select_db(MYSQL_DATABASE, $link)))
	die("無法開啟資料庫<br />".PHP_EOL);
	$result = mysql_query("UPDATE messager SET message='$ins' WHERE ID='$nam' and time='$time'");
	if($result == FALSE)
		{print("執行 MySQL 查詢失敗，請聯絡開發人員。<br />".PHP_EOL);}
	else
		{print("修改留言成功<br />".PHP_EOL);}
		
?>	
<a href='messenger.php'>回留言板</a>	
<?php
	include ("footer.php");
?>