<?php
  /*include settings.php*/
  include_once("settings.php");

  include_once ("functions.php");

  if(!isUser()) {
    setFlash("請登入", "error");
    echo '<script type="text/javascript">';
    echo " window.location='index.php';";
    echo "</script>";
    exit;
  }

  $title = "修改IP";
  $page = "edit";
  include ("header.php");
?>

<div class='container'>
<div class='row'>
<div class='span4'>
<h1>修改IP</h1>
</div>
<div class='span12'>
<form action='update.php' method='post'>
  <fieldset>
    <div class="clearfix">
      <label for="IP_last_4_digits">IP位址</label>
      <div class="input">
      <select name='IP_last_4_digits'>
        <?php
        /* 產生使用中的 IP */
        $link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or exit("無法與MySQL建立連線");
        mysql_select_db("MYSQL_DATABASE");
        $result = mysql_query("select * from ips");

        for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter++)
        {
          $ipaddr = $row[0];
          $used = $row[1];
  	  $owner = $row[4];
  	  if($used && ($owner==$_SESSION['userName'] || isSuperUser())) {
  	  	print('<option value="'.htmlspecialchars($ipaddr).'">'.htmlspecialchars($ipaddr).'</option>');
  	  }
        }
        mysql_close($link);
        ?>
      </select>
      </div>
    </div>
    <div class="clearfix">
      <label for="machine_feature">機器功能</label>
      <div class="input">
      <input type='text' id='machine_feature' name='machine_feature' size='20' maxlength='50' value="web server"/>
      </div>
    </div>
    <div class="clearfix">
      <label for="machine_ports">使用的連接埠</label>
      <div class="input">
      <input type='text' id='machine_ports' name='machine_ports' size='20' maxlength='50' value="80"/>
      </div>
    </div>
    <div class="clearfix">
      <label for="machine_owner">負責人</label>
      <div class="input">
      <?php if(isSuperUser()): ?>
      <select id='machine_owner' name='machine_owner'>
        <?php
        /* 產生使用者清單 */
        $link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or exit("<option></option></select>"."您瀏覽的網頁因為「Web伺服器無法與MySQL資料庫伺服器建立連線」原因無法正常顯示，請您稍候再嘗試瀏覽，如果仍沒有恢復正常請連繫網站管理員<a href='mailto:pika1021@gmail.com' >pika1021@gmail.com</a>處理。造成您的不便非常抱歉。"."</div></div></fieldset></form></div></div></div></body></html>");
        mysql_select_db("iptable");
        if($result = mysql_query("select name from users") == FALSE){
          exit("<br />發生錯誤：mysql_query()查詢失敗。<br />");
        }
        
        for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter++)
        {
          $userName = $row[0];//ip
          if ($userName == $_SESSION['userName']) {
            print('<option value="'.htmlspecialchars($userName).'" selected="selected">'.htmlspecialchars($userName).'</option>');
          }
          else
          {
            print('<option value="'.$userName.'">'.$userName.'</option>');
          }
        }
        mysql_close($link);
        ?>
      </select>
      <?php else: ?>
      <select name='machine_owner' disabled="disabled">
        <option value="<?php print($_SESSION['userName'])?>"><?php print($_SESSION['userName'])?></option>
      </select>
      <?php endif;?>
      </div>
    </div>
    <div class="clearfix">
      <label for="machine_location">機器所在位置</label>
      <div class="input">
      <input type='text' id='machine_location' name='machine_location' size='20' maxlength='50' value="no idea"/>
      </div>
    </div>
    <div class="actions">
      <input class="primary btn" type='submit' name='submit' value='修改機器' />
      <input class="danger btn" type='submit' name='submit' value='清除機器' />
      <input class="btn" type='reset' value='清除重填' />
    </div>
  </fieldset>
</form>
</div>
</div>
</div>
<?php include ("footer.php"); ?>
