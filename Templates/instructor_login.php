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
    header ("Location: instructor_login_page.php?error=Email is required");
    exit();
}elseif(empty($password)){
    header ("Location: instructor_login_page.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM instructor WHERE Instructor_email ='$email' AND Instructor_Password = '$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['Instructor_email'] === $email && $row['Instructor_Password'] === $password){
        echo "logged in";
        $_SESSION['Instructor_email'] = $row['Instructor_email'];
        $_SESSION['Instructor_Name'] = $row['Instructor_Name'];
        $_SESSION['Instructor_ID'] = $row['Instructor_ID'];
        $_SESSION['Instructor_DOB'] = $row['Instructor_DOB'];
        $_SESSION['Instructor_Gender'] = $row['Instructor_Gender'];
        header("Location: instructor.php");
        exit();
    }else {
        header("Location: instructor_login_page.php?error=Incorrect Email or Password" );
    }
}else {
    header("Location: login_page.php?error=Incorrect Email or Password" );
    exit();
}