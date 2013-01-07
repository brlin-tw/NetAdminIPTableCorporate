<?php
	include_once ("functions.php");
	include ("header.php");
	extract($_POST);
	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
		die("cannot link database");

	if(!(mysql_select_db(MYSQL_DATABASE, $link)))
		die("cannot open db");
	$dt=date("Y-m-d h:i:s");
	if(!$ins)
	$result = mysql_query("insert into messager (ID,time) values('$nam','$dt')");
	else
	$result = mysql_query("insert into messager (ID,message,time) values('$nam','$ins','$dt')");
	if($result == FALSE)
		{print("can't execute");}
	else
		{print("success<br />");}
?>
<a href='javascript:history.back(1)'>回上一頁</a>
<?php include ("footer.php"); ?>
	