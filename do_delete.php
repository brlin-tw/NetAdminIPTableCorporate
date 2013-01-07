<?php
	include_once ("functions.php");
	include ("header.php");
	$d = "test";
	extract($_GET);
	if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
		die("cannot link database");
	if(!(mysql_select_db($d, $link)))
		die("cannot open db");
		$result = mysql_query("select * from feedback");
				if(!($result))
				{print("can't execute");}
				while($e=mysql_fetch_row($result)){
					if($e[1] == $ID && $e[4] == $time){
						$result = mysql_query("delete from feedback where reply_ID = '$ID' and reply_time = '$time'");
					}
				}
	$result = mysql_query("delete from messager where ID = '$ID' and time = '$time'");
	if($result == FALSE)
		{print("can't execute");}
	else
		{print("success<br />");}
?>
<a href='javascript:history.back(1)'>回上一頁</a>
<?php include ("footer.php"); ?>
	