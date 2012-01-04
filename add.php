<?php
  session_start();
  print ("<?xml version=\"1.0\" encoding=\"utf-8\"?>");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--（此標籤包住的內容為註解）以上為XML和DTD(Document Type
    Definition)的宣告-->
<!--
新增管理員帳號 |
適用於網路管理者的IP位址表
IP Table Suitable for Networking Administrator(s)
    本網頁使用的智慧財產授權：
      請連繫pika1021@gmail.com詢問，謝謝！
    詳細資料註明於下方meta元素。
已知問題：

待辦事項：

變更紀錄：

-->
<!--html標籤：html主要內容
    XHTML規範需要／選用的屬性：xmlns, xml:lang
-->
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="zh_TW"
      lang="zh_TW">
  <!--head標籤：包含一些metadata（中介資料）-->
  <head>
    <!--title標籤：顯示於標題列(title bar)的文字-->
    <title>新增管理員帳號 | 適用於網路管理者的IP位址表</title>
    <!--meta標籤：一些非此標籤所能表示的一些其他的metadata（中介資料）
          name屬性：metadata的名稱
            author：網頁的創作者名稱。
            description：網頁的內容描述。
            generator：產生這份網頁的軟體名稱。
            keyword：這個網頁的關鍵字。
            robots：要求搜索引擎的索引軟體對這個網頁採取的行動。
          content屬性：這個metadata名稱之內容
          http-equiv屬性：用來變更伺服器跟user-agent的行為，使用content屬性定義這個屬性的值。
            content-type：
              text/html：原本要用application/xhtml+xml的MIME（Multipurpose Internet Mail Extensions，多用途網際網路郵件檔案類型），不過為了增加HTML 4相容性故使用text/html
              charset：網頁內容使用的字元集合(charset)
          參考網址：https://developer.mozilla.org/en/HTML/Element/meta
    -->
    <!--網頁版本-->
    <meta name="webpage-version" content="0.00(0)" />
    <!--XHTML範本版本-->
    <meta name="template-version" content="1.09(13)201112081845" />
    <meta name="author" content="國立海洋大學資訊工程學系　B97570146楊力維 09957010林博仁" />
    <meta name="description" content="適用於網路管理者的IP位址表" />
    <meta name="generator" content="Kate純文字編輯器" />
    <meta name="keywords" content="IP位址表" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!--
    <style type='text/css'></style>
    <link href='' rel='stylesheet' type='text/css' />
    <script src='' type='text/javascript'></script>
    -->
    <link href='style.css' rel='stylesheet' type='text/css'/>
	<?php
	    if(!$_SESSION['loginOK'])
	    {
	        echo '<script type="text/javascript">';
	        echo " window.location='index.php';";
     	        echo "</script>";
	    }
	?>
  </head>
  <!--body標籤：包含網頁的內容(content)
        XHTML規範需要／選用的屬性：
          xml:lang：用來宣告XML使用的語言
        參考網址：https://developer.mozilla.org/en/HTML/Element/body
    -->
  <body xml:lang="zh-TW" lang="zh-TW" class='generic_body'>
    <!--header-->
    <!--版本：1.01(1)201112021727-->

    <span id='div_header'>
      <span id='div_header_left'>
        <a href='index.php' target='_self'>至外層頁面</a>
      </span>
      <span id='div_header_center'>
        <!--<a href='javascript:window.history.back();' target='_self'>回上一頁</a>-->
      </span>
      <span id='div_header_right'>
        <?php
            if($_SESSION['loginOK'])
            {
                print("<a href='new.php' target='_self'>新增IP設定</a> | ");
                print("<a href='editor.php' target='_self'>修改IP設定</a> | ");
                print("<a href='add.php' target='_self'>新增管理員帳號</a> | ");
                print("<a href='logout.php' target='_self'>登出".$_SESSION['userName']."帳號</a>");
            }
            else
                print("<a href='login.php' target='_self'>管理員登入</a>");
        ?>
        
      </span>
    </span>

    <div id='div_content'>
      <table id='generic_table'>
        <form action='update.php' method='post'>
          <caption>新增管理員帳號</caption>
          <tfoot>
            <tr id='row_action'>
              <td colspan='2'>
                <input type='submit' name='submit' value='新增管理員' />
		<input type='submit' name='submit' value='刪除管理員' />
                <input type='reset' value='清空重填' />
              </td>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <label>
                <td>管理員帳號名稱：</td>
                <td><input type='text' name='account_name' size='30' maxlength='20' /></td>
              </label>
            </tr>
            <tr>
              <label>
                <td>管理員帳號密碼：</td>
                <td><input type='password' name='account_password' size='30' maxlength='30' /></td>
              </label>
            </tr>
            <tr>
              <label>
                <td>新增管理員帳號名稱：</td>
                <td><input type='text' name='new_account_name' size='30' maxlength='20' /></td>
              </label>
            </tr>
            <tr>
              <label>
                <td>新增管理員帳號密碼：</td>
                <td><input type='password' name='new_account_password' size='30' maxlength='30' /></td>
              </label>
            </tr>
            <tr>
              <label>
                <td>新增管理員帳號密碼（二次確認）：</td>
                <td><input type='password' name='new_account_password_check' size='30' maxlength='30' /></td>
              </label>
            </tr>
              <label>
                <td>新增管理員電子郵件信箱：</td>
                <td><input type='text' name='new_account_mail' size='30' maxlength='30' /></td>
              </label>
            <tr>
              <label>
                <td>新增管理員電話號碼：</td>
                <td><input type='text' name='new_account_phone' size='30' maxlength='30' /></td>
              </label>
            </tr>
          </tbody>
        </form>
      </table>
      

	<table id='generic_table'>
	<form action='update.php' method='post'>
        <caption>新增機器</caption>
         <thead>
            <tr>
              <th>IP位址</th>
              <th>機器功能</th>
              <th>使用的連接埠</th>
              <th>負責人</th>
              <th>機器所在位置</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan='5'>
		<input type='submit' name = 'submit' value='root修改機器' />
		<input type='submit' name = 'submit' value='root清除機器' />
		<input type='reset' value='清除重填' />
	      </th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td> 
                  <select name='IP_last_4_digits'>
                    <!--產生0~255-->

			  <?PHP
			    $link = mysql_connect("localhost","iper","ipDBuse") or die("無法與MySQL建立連線");
			    mysql_select_db("iptable");
			    $result = mysql_query("select * from ips");
			    
			    for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter++)
			    {
				$ipaddr = $row[0];//ip
				$used = $row[1];//used
				if($used)
				  print('<option value="'.$ipaddr.'">'.$ipaddr.'</option>');

			    }
			    mysql_close($link);
			?>

                    <!--<option value="1">1</option>-->
                  </select>
              </td>
              <td><input type='text' name='machine_feature' size='20' maxlength='50' value="web server"/></td>
              <td><input type='text' name='machine_ports' size='20' maxlength='50' value="80"/></td>
              <td>
		<select name='machine_owner'>
                    <!--產生0~255-->

			  <?PHP
			    $link = mysql_connect("localhost","iper","ipDBuse") or die("無法與MySQL建立連線");
			    mysql_select_db("iptable");
			    $result = mysql_query("select name from users");
			    
			    for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter++)
			    {
				$userName = $row[0];//ip
				print('<option value="'.$userName.'">'.$userName.'</option>');

			    }
			    mysql_close($link);
			?>

                    <!--<option value="1">1</option>-->
                  </select>
	      </td>
              <td><input type='text' name='machine_location' size='20' maxlength='50' value="no idea"/></td>
            </tr>
          </tbody>
	</form>
      </table>


    </div>
    <!--footer-->
    <!--版本：1.00(0)201112012220-->
    <div class='div_footer'>
      <hr />
      <div id='div_footer_copyright'>
        智慧財產權歸屬：國立海洋大學資訊工程學系　B97570146楊力維 09957010林博仁<br />
        如有授權需求歡迎來信洽詢：<a href='mailto:pika1021@gmail.com'>pika1021＠gmail.com</a><br />
        Project說明簡報：<a href='Resources/Manual/Project_manual.odp'>Open Document格式</a> | <a href='Resources/Manual/Project_manual.pdf'>PDF格式</a>
      </div>
      <hr />
      <!--W3C HTML Markup Validator通過之後可以放上此圖片-->
      <a href="http://validator.w3.org/check?uri=referer" target='_blank'>
        <img src="http://www.w3.org/Icons/valid-xhtml10"
             alt="W3C HTML Markup Validation Service驗證(XHTML 1.0)通過圖示 | W3C HTML Markup Validater Service Verification Passed Icon"
             height="31" width="88" />
      </a><br />
      這個圖示代表了這個網頁的開發者致力於讓這個網頁的內容能盡量符合W3C的規範，讓不同的網頁瀏覽器能更加正確的顯示這個網頁而不會出現相容性問題。您可以點擊這個圖示讓W3C的Markup Validation Service再次對這個網頁進行檢查。
      <hr />
      <!--W3C CSS Validator通過之後可以放上此圖片-->
      <a href="http://jigsaw.w3.org/css-validator/check/referer" target='_blank'>
        <img style="border:0;width:88px;height:31px"
             src="http://jigsaw.w3.org/css-validator/images/vcss"
             alt="W3C CSS Validation Service驗證通過圖示 | W3C CSS Validater Service Verification Passed Icon" />
      </a><br />
      這個圖示代表了這個網頁的開發者致力於讓這個網頁使用的CSS（Cascading Style Sheets，層疊樣式表）的內容能盡量符合W3C的規範，讓不同的網頁瀏覽器能更加正確的顯示這個網頁而不會出現相容性問題。您可以點擊這個圖示讓W3C的CSS Validation Service再次對這個網頁進行檢查。
    </div>
  </body>
</html>
