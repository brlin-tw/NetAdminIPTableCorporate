<?php 
    include_once ("functions.php");

    if (isUser()) {
        echo '<script type="text/javascript">';
        echo 'window.alert("已登入!")';
        echo "window.location='index.php';";
        echo "</script>";
    }
    
    $link = mysql_connect("localhost","iper","ipDBuse") or die("無法與MySQL建立連線");
    mysql_select_db("iptable");

    $userName = mysql_real_escape_string($_POST["account_name"]);
    $userPasswd = mysql_real_escape_string($_POST["account_password"]);
    
    $query = "SELECT * FROM users WHERE name=\"$userName\" AND passwd=\"$userPasswd\"";
    $result = mysql_query($query);

    if ($result && mysql_num_rows($result) > 0) {
        $_SESSION['loginOK'] = true;
        $_SESSION['userName'] = $userName;
    } else {
        unset($_SESSION['loginOK']);
        echo '<script type="text/javascript">';
        echo 'window.alert("登入錯誤");';
        echo "</script>";
    }

    mysql_close($link);
    echo '<script type="text/javascript">';
    echo " window.location='index.php';";
    echo "</script>";
?>
