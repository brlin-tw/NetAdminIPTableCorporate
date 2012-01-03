<?php 
    session_start();
    unset($_SESSION['loginOK']);
    unset($_SESSION['userName']);
    session_destroy();
    echo "<script language='javascript'>";
    echo "window.location='index.php';";
    echo "</script>";
?>