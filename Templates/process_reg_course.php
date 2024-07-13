<?php
session_start();
include 'db_conn.php';

$courseID = $_GET['id'];
$userID = $_SESSION['User_ID'];

// Check if the user has already registered for the course
$sqlCheckDuplicate = "SELECT * FROM user_course WHERE User_ID = '$userID' AND Course_ID = '$courseID'";
$resultCheckDuplicate = mysqli_query($conn, $sqlCheckDuplicate);

if ($resultCheckDuplicate->num_rows > 0) {
    // Redirect back to the course page with an error message
    $_SESSION['error'] = "You have already registered for this course.";
    header("Location: user_course.php?id=$courseID");
    exit();
} else {
    // Insert the new record into the user_course table
    $sqlInsertCourse = "INSERT INTO user_course (User_ID, Course_ID) VALUES ('$userID', '$courseID')";
    if (mysqli_query($conn, $sqlInsertCourse)) {
        // Redirect to the landing page upon successful registration
        header("Location: landing.php");
        exit();
    } else {
        // Redirect back to the course page with an error message
        $_SESSION['error'] = "Error registering for the course.";
        header("Location: user_course.php?id=$courseID");
        exit();
    }
}
?>