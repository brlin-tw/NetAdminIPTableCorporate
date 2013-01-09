<?php
	include_once ("functions.php");
	include ("header.php");
	extract($_GET);
	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
		die("cannot link database");
	if(!(mysql_select_db(MYSQL_DATABASE, $link)))
		die("cannot open db");
		mysql_set_charset("utf8", $link);
		$result = mysql_query("select * from feedback");
				if(!($result))
				{print("無法執行資料庫查詢，請聯絡開發人員。".PHP_EOL);}
				while($e=mysql_fetch_row($result)){
					if($e[1] == $ID && $e[4] == $time){
						$result = mysql_query("delete from feedback where reply_ID = '$ID' and reply_time = '$time'");
					}
				}
	$result = mysql_query("delete from messager where ID = '$ID' and time = '$time'");
	if($result == FALSE)
		{print("操作失敗，請聯絡開發人員。<br />".PHP_EOL);}
	else
		{print("success<br />");}
?>
<a href='javascript:history.back(1)'>回上一頁</a>
<?php include ("footer.php"); ?>
	