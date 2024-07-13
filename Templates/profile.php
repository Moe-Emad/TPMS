<?php
session_start();
include "db_conn.php";

if (!isset($_SESSION['email'])) {
    header("Location: login_page.php");
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $fullName = $row['Full_Name'];
    $userID = $row['User_ID'];
    $email = $row['email'];
    $DOB = $row['DOB'];
    $gender = $row['Gender'];
    $country = $row['Country'];
} else {
    // Handle the case when user data is not found in the database
    // Redirect or show an error message
    header("Location: login_page.php");
    exit();
}

$conn->close();
?>

