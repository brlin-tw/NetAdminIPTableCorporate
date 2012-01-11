<?php
  include_once ("functions.php");

  if(isUser())
  {
    setFlash("您已經登入了", "info");
    echo '<script type="text/javascript">';
    echo " window.location='index.php';";
    echo "</script>";
    exit;
  }

  $title = "登入";
  $page = "login";
  include ("header.php");
?>

<div class='container'>
<div class='row'>
<div class='span4'>
<h1>登入</h1>
</div>
<div class='span12'>
<form action='check.php' method='post'>
  <fieldset>
    <div class="clearfix">
      <label for="account_name">帳號名稱</label>
      <div class="input">
        <input type='text' id='account_name' name='account_name' size='30' maxlength='20' />
      </div>
    </div>
    <div class="clearfix">
      <label for="account_password">帳號密碼</label>
      <div class="input">
        <input type='password' id='account_password' name='account_password' size='30' maxlength='30' />
      </div>
    </div>
    <div class='actions'>
      <input class="primary btn" type='submit' value='登入' />
      <input class="btn" type='reset' value='清空重填' />
    </div>
  </fieldset>
</form>
</div>
</div>
</div>
<?php include ("footer.php"); ?>
