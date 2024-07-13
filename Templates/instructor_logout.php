<?php 
    session_start();

    session_unset();
    session_destroy();
    header("Location: instructor_login_page.php");
?>