<?php
session_start();

/* include constants */
include_once ("settings.php");

function isUser() {
    return isset($_SESSION['loginOK']) && $_SESSION['loginOK'];
}

function isSuperUser($username = null) {
    if($username == null) {
        if(isUser()) {
            $username = $_SESSION['userName'];
        } else {
            return false;
        }
    }

    return ($username == "infate" ||
            $username == "medicalwei" || 
            $username == "Vdragon");
}

function user_account_check($username, $password, $haveLink = null){
    /* create a link if there's no one */
    if ($haveLink == null) {
			$link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or die("您瀏覽的網頁因為「網頁伺服器無法與MySQL伺服器建立連線」原因無法正常運作，請稍候再試，如果仍無法正常運作請聯絡網站管理人員處理。");
			mysql_set_charset("utf8", $link);
		} else {
        $link = $haveLink;
    }

    $username_escaped = mysql_real_escape_string($username);
    $query = "SELECT passwd FROM users WHERE name=\"$username_escaped\"";

    mysql_select_db(MYSQL_DATABASE);
    $result = mysql_query($query);

    $ret = false;
    if (mysql_num_rows($result) == 1 && $password_hashed = mysql_result($result, 0)){
			if (crypt($password, $password_hashed) == $password_hashed){
							$ret = $username;
			}
    }

    if ($haveLink == null) {
        mysql_close($link);
    }

    return $ret;
}

function setFlash($message, $type = "warning") {
    $_SESSION['flash'] = array(
        "message" => $message,
        "type" => $type
    );
}

function hasFlash() {
    return isset($_SESSION['flash']);
}

function getFlash($drop = true) {
    $flashMessage = $_SESSION['flash'];
    if ($drop) {
        unset($_SESSION['flash']);
    }
    return $flashMessage;
}

