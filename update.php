<?php 
include_once("functions.php");

if(!isUser()){
    setFlash("請登入", "error");
} else {
    $link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or die("無法與MySQL建立連線");
    mysql_select_db(MYSQL_DATABASE); 
        
    switch ($_POST["submit"]){
    case '修改機器': case '加入機器':
        $ip = mysql_real_escape_string($_POST["IP_last_4_digits"]);
        $feature = mysql_real_escape_string($_POST["machine_feature"]);
        $ports = mysql_real_escape_string($_POST["machine_ports"]);
        $owner = isSuperUser() ? mysql_real_escape_string($_POST["machine_owner"]):$_SESSION['userName'];
        $location = mysql_real_escape_string($_POST["machine_location"]);
        $query = 'UPDATE ips SET used=1,func="'.$feature.'",ports="'.$ports.'",owner="'.$owner.'",place="'.$location.'" WHERE ip="'.$ip.'"';
        if (!isSuperUser()) {
            $query .= " AND (used=0 OR owner=\"$owner\")";
        }
        setFlash (htmlspecialchars($ip)." 已經修改", "success");
        break;
    
    case '新增管理員':
        if (validateUser($link)) {
            $username = mysql_real_escape_string($_POST["new_account_name"]);
            $_POST["new_account_password"];
            $password_again = mysql_real_escape_string($_POST["new_account_password_check"]);
            $email = mysql_real_escape_string($_POST["new_account_mail"]);
            $phone = mysql_real_escape_string($_POST["new_account_phone"]);
            if($_POST["new_account_password"] == $_POST["new_account_password"]) {
		$password = sha1(SALT.$_POST["new_account_password"]);
                $query = "INSERT INTO users VALUES (\"$username\",\"$password\",\"$email\",\"$phone\")";
                setFlash(htmlspecialchars($username)." 已經新增", "success");
            } else {
                setFlash ("兩個密碼不合", "error");
            }
        } else {
            setFlash ("驗證帳號密碼失敗", "error");
        }
        break;
    
    case '刪除管理員':
        if (validateUser($link)){
            $username = mysql_real_escape_string($_POST["new_account_name"]);
            $query = "DELETE FROM users WHERE name=\"$username\"";
            setFlash(htmlspecialchars($username)." 已經刪除", "success");
        } else {
            setFlash ("驗證帳號密碼失敗", "error");
        }
        break;
    
    case '清除機器':
        $ip = mysql_real_escape_string($_POST["IP_last_4_digits"]);
        $query = 'UPDATE ips SET used=0 WHERE ip="'.$ip.'"';
        setFlash(htmlspecialchars($ip)." 已經清除", "success");
        break;
    
    default:
        setFlash("操作錯誤", "error");
        break;
    }
    
    if(isset($query)) {
        $result = mysql_query($query);
        if(!$result) {
            setFlash("<strong>資料庫操作失敗</strong> — 這種錯誤不應該發生，請聯絡管理員", "error");
        }
    }
    mysql_close($link);
}

echo "<script type='text/javascript'>";
echo "window.location='index.php';";
echo "</script>";

function validateUser($link) {
    return isSuperUser() && user_account_check($_POST["account_name"], $_POST["account_password"], $link) == $_SESSION['userName'];
}
?>
