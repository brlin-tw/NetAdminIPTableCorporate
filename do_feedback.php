<?php
	include_once ("functions.php");
	include ("header.php");
	extract($_POST);

	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
	die("cannot link database");
	if(!(mysql_select_db(MYSQL_DATABASE, $link)))
	die("cannot open db");
	mysql_set_charset("utf8", $link);
	$dt=date("Y-m-d h:i:s");
	if(!$ins)
	$result = mysql_query("insert into feedback (ID,reply_id,time,reply_time) values('$nam','$re_nam','$dt','$re_time')");
	else
	$result = mysql_query("insert into feedback (ID,reply_id,message,time,reply_time) values('$nam','$re_nam','$ins','$dt','$re_time')");
	if(!($result))
	print("can't execute<br />");
	else
	print("success<br />");
?>
<a href='javascript:history.back(1)'>回上一頁</a>
<?php include ("footer.php"); ?>