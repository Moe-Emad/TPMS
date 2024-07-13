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
    header ("Location: login_page.php?error=Email is required");
    exit();
}elseif(empty($password)){
    header ("Location: login_page.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM user WHERE email ='$email' AND Password = '$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['email'] === $email && $row['Password'] === $password){
        echo "logged in";
        $_SESSION['email'] = $row['email'];
        $_SESSION['Full_Name'] = $row['Full_Name'];
        $_SESSION['User_ID'] = $row['User_ID'];
        $_SESSION['DOB'] = $row['DOB'];
        header("Location: landing.php");
        exit();
    }else {
        header("Location: login_page.php?error=Incorrect Email or Password" );
    }
}else {
    header("Location: login_page.php?error=Incorrect Email or Password" );
    exit();
}