<?php 
session_start();
include "db_conn.php";

if(isset($_POST['Email']) && isset($_POST['Password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
}

$email = validate($_POST['Email']);
$password = validate($_POST['Password']);

if(empty($email)){
    header ("Location: tp_login_page.php?error=Email is required");
    exit();
}elseif(empty($password)){
    header ("Location: tp_login_page.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM training_providor WHERE TP_Email ='$email' AND TP_Password = '$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['TP_Email'] === $email && $row['TP_Password'] === $password){
        echo "logged in";
        $_SESSION['TP_Email'] = $row['TP_Email'];
        $_SESSION['TP_Name'] = $row['TP_Name'];
        $_SESSION['TP_ID'] = $row['TP_ID'];
        header("Location: tp_dashboard.php");
        exit();
    }else {
        header("Location: tp_login_page.php?error=Incorrect Email or Password" );
    }
}else {
    header("Location: login_page.php?error=Incorrect Email or Password" );
    exit();
}