<?php 
    session_start();

    session_unset();
    session_destroy();
    header("Location: tp_login_page.php");
?>