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
	die("cannot link database");
	if(!(mysql_select_db(MYSQL_DATABASE, $link)))
	die("cannot open db");
	print('$nam');print('$time');
	$result = mysql_query("UPDATE messager SET message='$ins' WHERE ID='$nam' and time='$time'");
	if($result == FALSE)
		{print("can't execute");}
	else
		{print("success<br />");}
?>	

