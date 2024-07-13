<?php
include "db_conn.php";
session_start();




// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $course_img = $_POST["course-img"];
    $course_title = $_POST["course-title"];
    $course_description = $_POST["course-description"];
    $course_price = $_POST["course-price"];
    $course_start = $_POST["start-date"];
    $course_end = $_POST["end-date"];
    $course_category = $_POST["category"];
    $course_owner = $_SESSION['TP_ID'];
  


    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO course (Course_Img, Course_Title, Course_Description, Course_Price, Course_Start, Course_End, Course_Category, TP_ID) VALUES ('$course_img', '$course_title', '$course_description', '$course_price', '$course_start' , '$course_end' , '$course_category' , '$course_owner')";
    if ($conn->query($sql) === TRUE) {
        $course_id = $conn->insert_id;

        // Retrieve the selected instructors from the form
        $selected_instructors = $_POST["instructors"];

        // Insert records into the course_instructor table for each selected instructor
        foreach ($selected_instructors as $instructor_id) {
            $sql = "INSERT INTO course_instructor (Course_ID, Instructor_ID) VALUES ('$course_id', '$instructor_id')";
            $conn->query($sql);
        }
        header("Location: tp_dashboard.php");
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>