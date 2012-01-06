<?php 
    include_once("functions.php");

    if(!isUser()){
        echo '<script type="text/javascript">';
        echo 'window.alert("錯誤!")';
        echo "</script>";
        echo '<script type="text/javascript">';
        echo " window.location='index.php';";
        echo "</script>";
        exit;
    }

    $link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or die("無法與MySQL建立連線");
    mysql_select_db(MYSQL_DATABASE); 


    if ($_POST["submit"]=='修改機器' || $_POST["submit"]=='加入機器') {
        $ip = mysql_real_escape_string($_POST["IP_last_4_digits"]);
        $feature = mysql_real_escape_string($_POST["machine_feature"]);
        $ports = mysql_real_escape_string($_POST["machine_ports"]);
        $owner = mysql_real_escape_string($_POST["machine_owner"]);
        $location = mysql_real_escape_string($_POST["machine_location"]);

        $query = 'UPDATE ips SET used=1,func="'.$feature.'",ports="'.$ports.'",owner="'.$owner.'",place="'.$location.'" WHERE ip="'.$ip.'"';
    }

    if($_POST["submit"]=='清除機器')
    {
        $ip = mysql_real_escape_string($_POST["IP_last_4_digits"]);
	$query = 'UPDATE ips SET used=0 WHERE ip="'.$ip.'"';
    }

    if($_POST["submit"]=='新增管理員')
    {
        if(check())
	{
		$newName = mysql_real_escape_string($_POST["new_account_name"]);
		$newPasswd = mysql_real_escape_string($_POST["new_account_password"]);
		$newPasswdAgain = mysql_real_escape_string($_POST["new_account_password_check"]);
		$newMail = mysql_real_escape_string($_POST["new_account_mail"]);
    		$newPhone = mysql_real_escape_string($_POST["new_account_Phone"]);
		if($newPasswd == $newPasswdAgain)
		    $query = 'INSERT INTO users VALUES ("'.$newName.'","'.$newPasswd.'","'.$newMail.'","'.$newPhone.'")';
	}
    }

    if($_POST["submit"]=='刪除管理員')
    {
        if(check())
	{
		$newName = mysql_real_escape_string($_POST["new_account_name"]);
		$query = 'DELETE FROM users WHERE name="'.$newName.'"';
	}
    }

    if($_POST["submit"]=='清除機器')
    {
        $ip = mysql_real_escape_string($_POST["IP_last_4_digits"]);
	$query = 'UPDATE ips SET used=0 WHERE ip="'.$ip.'"';
    }

    $result = mysql_query($query);
    mysql_close($link);
    //echo $query;
    echo "<script type='text/javascript'>";
    echo " window.location='index.php';";
    echo "</script>";


/**********************************************************/
function check(){
    if (!isSuperUser()) return false;

    $userName = mysql_real_escape_string($_POST["account_name"]);
    $userPasswd = mysql_real_escape_string($_POST["account_password"]);
    
    $query = 'SELECT passwd FROM users WHERE name="'.$userName.'"';
    $result = mysql_query($query);
    if($result){
        $row = mysql_fetch_row( $result );
        if($userPasswd == $row[0]){
	    return true;
        }
    }

    return false;
}
/**********************************************************/

?>
