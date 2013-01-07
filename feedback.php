<?php
  include_once ("functions.php");

  $title = "首頁";
  $page = "home";
  include ("header.php");
  extract($_GET);
  print($ID);
  print($time);
?>
<h1 id="dheading" class='a'>回覆的留言</h1>
	<div class="container">
    <table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Message</th>
					<th>time</th>
				</tr>
			</thead>
			<?php
				if(!($link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD)))
				die("cannot link database");
				//mysql_select_db($d, $link);
				if(!(mysql_select_db(MYSQL_DATABASE)))
				die("cannot open db");
				
				$result = mysql_query("select * from feedback");
				if(!($result))
				{print("can't execute");}
				while($e=mysql_fetch_row($result)){
					if($e[1] == $ID && $e[4] == $time){
						print("<tr><td>$e[0]</td>");
						print("<td>$e[2]</td>");
						print("<td>$e[3]</td></tr>");
					}
				}
			?>
		</table>
	</div>
		<h1 id="heading">~~~開始留言~~~</h1>
		<p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
		<div id='a'>
			<form method="POST" action="do_feedback.php">
				<table>
					<?php if($_SESSION['loginOK'] == true){?>
						<tr>
							<td><input type = "hidden" id="re_nam" name='re_nam' VALUE = '<?PHP print("$ID"); ?>' /></td>
							<td><input type = "hidden" id="re_time" name='re_time' VALUE = '<?PHP print("$time"); ?>'/></td>
						</tr>
						<tr>
							<td><input type = "hidden" id="nam" name='nam' VALUE = '<?PHP print("$username"); ?>' /></td>
						</tr>
						<tr>
							<td>留言:<input type = "text" id="ins" name='ins' size = "100" maxlength = "100" /></td>
							<td><input type = "submit" value='送出' /></td>
						</tr>

					<?php }else{?>
						<tr>
							<td><input type = "hidden" id="re_nam" name='re_nam' VALUE = '<?PHP print("$ID"); ?>' /></td>
							<td><input type = "hidden" id="re_time" name='re_time' VALUE = '<?PHP print("$time"); ?>'/></td>
						</tr>
						<tr>
							<td>名字:<input type = "text" id="nam" name='nam' size = "20" maxlength = "20" /></td>
						</tr>
						<tr>
							<td>留言:<input type = "text" id="ins" name='ins' size = "100" maxlength = "100" /></td>
							<td><input type = "submit" value='送出' /></td>
						</tr>
					<?php }?>
				</table>
			</form>
		</div>
<?php include ("footer.php"); ?>