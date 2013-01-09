<?php
  include_once ("functions.php");

  $title = "修改留言";
  $page = "home";
  include ("header.php");
  extract($_GET);
?>
    
	</div>
		<h1 id="heading"><?php echo $title; ?></h1>
		<hr />
		<div id='a'>
			<form method="POST" action="do_test.php">
				<table>
					<?php if($_SESSION['loginOK'] == true){?>
						<tr>
							<td><input type = "hidden" id="nam" name='nam' value='<?PHP echo $_SESSION['userName']; ?>' /></td>
						</tr>
						<tr>
							<td><input type = "hidden" id="time" name = 'time' value = '$time'/></td>
						</tr>
						<tr>
							<td>留言：<input type = "text" id="ins" name='ins' size = "100" maxlength = "100" /></td>
							<td><input type = "submit" value='送出' /></td>
						</tr>
					<?php }else{?>
					<tr>
						<td><input type = "hidden" id="nam" name='nam' size = "20" maxlength = "20" value ='<?PHP echo $ID; ?>'/></td>
					</tr>
					<tr>
						<td><input type = "hidden" id="time" name = 'time' value = '<?PHP echo $time; ?>'/></td>
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