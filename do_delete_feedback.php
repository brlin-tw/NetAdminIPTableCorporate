<?php
	include_once ("functions.php");
	include ("header.php");
	$d = "test";
	extract($_GET);
	echo $nam."<br />".PHP_EOL.
				$ins."<br />".PHP_EOL;
	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
		die("cannot link database");

	if(!(mysql_select_db($d, $link)))
		die("cannot open db");
	$result = mysql_query("delete from feedback where ID = '$ID' and time = '$time' and reply_time = '$re_time'");
	if($result == FALSE)
		{print("can't execute");}
	else
		{print("success<br />");}
?>
<a href='javascript:history.back(1)'>回上一頁</a>
<?php include ("footer.php"); ?>
	