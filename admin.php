<?php
  include_once ("functions.php");

  if(!isSuperUser()) {
    setFlash("請使用管理者帳號登入後才能使用本功能", "error");
    echo '<script type="text/javascript">';
    echo " window.location='index.php';";
    echo "</script>";
    exit;
  }

  $title = "新增／刪除帳號";
  $page = "admin";
  include ("header.php");
?>

<div class="container">
<div class='row'>
<div class='span4'>
<h1><?php echo $title ?></h1>
<p>請先輸入您的管理者帳號以確認身份。</p>
</div>
<div class='span12'>
<form action='update.php' method='post'>
  <fieldset>
    <legend>再次輸入您的管理員帳號</legend>
    <div class="clearfix">
      <label for="account_name">帳號</label>
      <div class="input">
        <input type='text' name='account_name' size='30' maxlength='20' />
      </div>
    </div>
    <div class="clearfix">
      <label for="account_password">密碼</label>
      <div class="input">
        <input type='password' name='account_password' size='30' maxlength='30' />
      </div>
    </div>
  </fieldset>
  <fieldset>
    <legend>新增/刪除管理員</legend>
    <div class="clearfix">
      <label for="new_account_name">帳號</label>
      <div class="input">
        <input type='text' name='new_account_name' size='30' maxlength='20' />
      </div>
    </div>
    <div class="clearfix">
      <label for="new_account_display_name">帳號顯示名稱</label>
      <div class="input">
        <input type='text' name='new_account_display_name' size='30' maxlength='20' />
      </div>
    </div>    
    <div class="clearfix">
      <label for="new_account_password">密碼</label>
      <div class="input">
        <input type='password' name='new_account_password' size='30' maxlength='30' />
      </div>
    </div>
    <div class="clearfix">
      <label for="new_account_password_check">密碼 (確認)</label>
      <div class="input">
        <input type='password' name='new_account_password_check' size='30' maxlength='30' />
      </div>
    </div>
    <div class="clearfix">
      <label>電子郵件信箱</label>
      <div class="input">
        <input type='text' name='new_account_mail' size='30' maxlength='30' />
      </div>
    </div>
    <div class="clearfix">
      <label>電話號碼</label>
      <div class="input">
        <input type='text' name='new_account_phone' size='30' maxlength='30' />
      </div>
    </div>
    <div class="actions">
      <input class="btn primary" type='submit' name='submit' value='新增管理員' />
      <input class="btn danger" type='submit' name='submit' value='刪除管理員' />
      <input class="btn" type="reset" value="清空重填" />
    </div>
  </fieldset>
</form>
</div>
</div>
</div>
<?php include ("footer.php"); ?>
