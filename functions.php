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
            $username == "medicalwei");
}

function user_account_check($username, $password){
    $link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or die("無法與MySQL建立連線");

    $username_escaped = mysql_real_escape_string($username);
    $password_escaped = mysql_real_escape_string($password);
    $query = "SELECT passwd FROM users WHERE name=\"$username_escaped\" AND passwd=\"$password_escaped\"";

    mysql_select_db(MYSQL_DATABASE); 
    $result = mysql_query($query);

    if ($result && mysql_num_rows($result) > 0) {
        $r = $username;
    } else {
        $r = false;
    }

    mysql_close($link);

    return $r;
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

?>
