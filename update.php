<?php 
    include_once("functions.php");

	//if(count($_POST)>0){ foreach($_POST as $k=>$v){ echo $k."=".$v; } }

    if(isUser()){
        echo '<script type="text/javascript">';
        echo 'window.alert("錯誤!")';
        echo "</script>";
        echo '<script type="text/javascript">';
        echo " window.location='index.php';";
        echo "</script>";
        exit;
    }

    $link = mysql_connect("localhost","iper","ipDBuse") or die("無法與MySQL建立連線");
    mysql_select_db("iptable"); 


    if ($_POST["submit"]=='修改機器' || $_POST["submit"]=='加入機器') {
        $ip = $_POST["IP_last_4_digits"];
        $feature = $_POST["machine_feature"];
        $ports = $_POST["machine_ports"];
        $owner = $_POST["machine_owner"];
        $location = $_POST["machine_location"];

        $query = 'UPDATE ips SET used=1,func="'.$feature.'",ports="'.$ports.'",owner="'.$owner.'",place="'.$location.'" WHERE ip="'.$ip.'"';
    }

    if($_POST["submit"]=='清除機器')
    {
        $ip = $_POST["IP_last_4_digits"];
	$query = 'UPDATE ips SET used=0 WHERE ip="'.$ip.'"';
    }

    if($_POST["submit"]=='新增管理員')
    {
        if(check())
	{
		$newName = $_POST["new_account_name"];
		$newPasswd = $_POST["new_account_password"];
		$newPasswdAgain = $_POST["new_account_password_check"];
		$newMail = $_POST["new_account_mail"];
    		$newPhone = $_POST["new_account_Phone"];
		if($newPasswd == $newPasswdAgain)
		    $query = 'INSERT INTO users VALUES ("'.$newName.'","'.$newPasswd.'","'.$newMail.'","'.$newPhone.'")';
	}
    }

    if($_POST["submit"]=='刪除管理員')
    {
        if(check())
	{
		$newName = $_POST["new_account_name"];
		$query = 'DELETE FROM users WHERE name="'.$newName.'"';
	}
    }

    if($_POST["submit"]=='清除機器')
    {
        $ip = $_POST["IP_last_4_digits"];
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

    $userName = $_POST["account_name"];
    $userPasswd = $_POST["account_password"];
    
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
