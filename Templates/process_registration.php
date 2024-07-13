<?php
include "db_conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $full_name = $_POST["Full-name"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $date = $_POST["date"];
    $gender = $_POST["gender"];
    $country =$_POST["country"];

    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO user (full_name, email, password, DOB, gender, Country) VALUES ('$full_name', '$email', '$password', '$date', '$gender','$country')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login_page.php");
        exit; // Terminate the current script
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
