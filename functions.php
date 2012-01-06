<?php 
session_start();

/* include constants */
include_once ("settings.php");

function isUser() {
return isset($_SESSION['loginOK']) && $_SESSION['loginOK'];
}

function isSuperUser() {
return ($_SESSION['userName'] == "infate" || $_SESSION['userName'] == "medicalwei");
}

?>
