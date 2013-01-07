<?php
	include_once ("functions.php");
	include ("header.php");
	extract($_GET);
	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
		die("cannot link database");

	if(!(mysql_select_db(MYSQL_DATABASE, $link)))
		die("cannot open db");
		mysql_set_charset("utf8", $link);
	$result = mysql_query("delete from feedback where ID = '$ID' and time = '$time' and reply_time = '$re_time'");
	if($result == FALSE)
		{print("can't execute");}
	else
		{print("success<br />");}
?>
<a href='javascript:history.back(1)'>回上一頁</a>
<?php include ("footer.php"); ?>
	