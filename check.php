<?php 
include_once ("functions.php");

if (isUser()) {
    setFlash("您已經登入了", "info");
} else {
    $loginUser = user_account_check($_POST["account_name"], $_POST["account_password"]);
    if ($loginUser) {
        $_SESSION['loginOK'] = true;
        $_SESSION['userName'] = $loginUser;
        setFlash(htmlspecialchars($loginUser)." 您好！", "success");
    } else {
        setFlash("<strong>登入失敗</strong> — 請檢查您的帳號密碼", "error");
    }
}

echo '<script type="text/javascript">';
echo " window.location='index.php';";
echo "</script>";
?>
