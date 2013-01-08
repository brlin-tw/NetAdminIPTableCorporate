<?php
  include_once ("functions.php");

  $title = "留言板";
  $page = "home";
  include ("header.php");
?>
	<div class="container">
		<h1 id="dheading" class='a'><?php echo $title ?></h1>
		
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
			if(!(mysql_select_db(MYSQL_DATABASE)))
			die("cannot open db");
			mysql_set_charset("utf8", $link);
			$result = mysql_query("select * from messager");
			if(!($result))
			{print("can't execute");}
			
			while($e=mysql_fetch_row($result))
			{
				print("<tr><td><a href='feedback.php?ID=$e[0]&time=$e[2]'>$e[0]</a></td>");
				print("<td>$e[1]</td>");
				print("<td>$e[2]</td>");
				print("<td><a href='fix.php?ID=$e[0]&message=$e[1]&time=$e[2]'>修改</a></td>");
				print("<td><a href='do_delete.php?ID=$e[0]&message=$e[1]&time=$e[2]'>刪除</a></td></tr>");
			}
		?>
		</table>

		<h1 id="heading">開始留言吧</h1>
		<div id='a'>
			<form method="POST" action="do_messenger.php">
				<table>
					<?php if($_SESSION['loginOK'] == true){?>
						<tr>
							<td><input type = "hidden" id="nam" name='nam' value='<?PHP echo $_SESSION['userName']; ?>' /></td>
						</tr>
						<tr>
							<td>留言：<input type = "text" id="ins" name='ins' size = "100" maxlength = "100" /></td>
							<td><input type = "submit" value='送出' /></td>
						</tr>
					<?php }else{?>
					<tr>
						<td>姓名：<input type = "text" id="nam" name='nam' size = "20" maxlength = "20" value = "x"/></td>
					</tr>
					<tr>
						<td>留言：<input type = "text" id="ins" name='ins' size = "100" maxlength = "100" /></td>
						<td><input type = "submit" value='送出' /></td>
					</tr>
					<?php } ?>
				</table>
			</form>
		</div>
	</div>		
<?php include ("footer.php"); ?>