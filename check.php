
<?php 
    session_start();

    if(count($_POST)<0){
        echo "<script language='javascript'>";
        echo 'alert("登入錯誤")';
        echo "</script>";
        echo "<script language='javascript'>";
        echo " location='index.php';";
        echo "</script>";
    }
    
    $userName = $_POST["account_name"];
    $userPasswd = $_POST["account_password"];

    $link = mysql_connect("localhost","iper","ipDBuse") or die("無法與MySQL建立連線");
    mysql_select_db("iptable");
    
    $query = 'SELECT passwd FROM users WHERE name="'.$userName.'"';
    $result = mysql_query($query);
    if($result){
        $row = mysql_fetch_row( $result );
        if($userPasswd === $row[0]){
            $_SESSION['loginOK'] = true;
            $_SESSION['userName'] = $userName;
        }else{
            $_SESSION['loginOK'] = false;
            echo "<script language='javascript'>";
            echo 'window.alert("登入錯誤")';
            echo "</script>";
        }
    }else{
        $_SESSION['loginOK'] = false;
        echo "<script language='javascript'>";
        echo 'window.alert("No result !!")';
        echo "</script>";
    }
    
    echo "<script language='javascript'>";
    echo "window.location='index.php';";
    echo "</script>";
?>