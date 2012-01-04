<?php 
    session_start();
    unset($_SESSION['loginOK']);
    unset($_SESSION['userName']);
    session_destroy();
    echo '<script type="text/javascript">';
    echo "window.location='index.php';";
    echo "</script>";
?>
