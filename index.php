<?php
	include_once ("functions.php");

	$title = "首頁";
	$page = "home";
	include ("header.php");
?>


<div class="container">
	<div id='ip_table'>
		<div class="page-header">
		<h1>140.121.80.0/24 <small>IP 配置狀態</small></h1>
		</div>
<?php
	$link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or  die("無法與MySQL建立連線");
	mysql_set_charset("utf8", $link);
	mysql_select_db(MYSQL_DATABASE);
	$result = mysql_query("fselect * from ips");
	if($result == false){
		echo "資料庫查詢失敗，請聯絡系統管理人員處理。".PHP_EOL;
	}else{
?>
		<table>
			<thead>
				<tr>
					<th>IP地址</th>
					<th>有無被使用</th>
					<th>機器用途</th>
					<th>使用的連接埠</th>
					<th>負責人</th>
					<th>機器所在位置</th>
				</tr>
			</thead>
			<tbody>
<?php 
	for ( $i = 0; $row = mysql_fetch_row( $result ); $i++){
	
		$ipaddr = htmlspecialchars($row[0]);//ip
		$used = htmlspecialchars($row[1]);//used
		$func = htmlspecialchars($row[2]);//func
		$ports = htmlspecialchars($row[3]);//ports
		$owner = htmlspecialchars($row[4]);//owner
		$place = htmlspecialchars($row[5]);//place
		
		if($used == 0){
			continue;
		}
		
?>
				<tr>
					<td><?php echo $ipaddr ?></td>
					<td>已被使用</td>
<?php
	if(is_null($func)){
?>
					<td>無資料</td>
<?php
	}else{
?>
					<td><?php echo $func ?></td>
<?php
	}
?>
<?php
	if(is_null($ports)){
?>
					<td>無資料</td>
<?php
	}else{
?>
					<td><?php echo $ports?></td>
<?php
	}
?>
<?php
	if(is_null($owner)){
?>
					<td>無資料</td>
<?php
	}else{
?>
					<td><?php echo $owner?></td>
<?php
	}
?>
<?php
	if(is_null($place)){
?>	
					<td>無資料</td>"
<?php
	}else{
?>
					<td><?php echo $place?></td>
<?php
	}
?>
				</tr>
<?php
	}
	}
	mysql_close($link);
?>
			</tbody>
		</table>
	</div>
</div>

<?php include ("footer.php"); ?>
