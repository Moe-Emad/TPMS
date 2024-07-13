<?php
session_start();
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected course ID and availability status from the form
    $courseID = $_POST['Course_ID'];
    $availability = $_POST['Availability'];

    // Retrieve the Instructor_ID based on the instructor's email
    $instructorEmail = $_SESSION['Instructor_email']; // Assuming you have stored the instructor's email in the session
    $getInstructorIDQuery = "SELECT Instructor_ID FROM instructor WHERE Instructor_email = ?";
    $getInstructorIDStatement = $conn->prepare($getInstructorIDQuery);
    $getInstructorIDStatement->bind_param('s', $instructorEmail);
    $getInstructorIDStatement->execute();
    $result = $getInstructorIDStatement->get_result();

    // Check if the Instructor_ID is valid
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $instructorID = $row['Instructor_ID'];

        // Check if availability record already exists for the selected course
        $checkAvailabilityQuery = "SELECT Availability_ID FROM instructor_availability WHERE Instructor_ID = ? AND Course_ID = ?";
        $checkAvailabilityStatement = $conn->prepare($checkAvailabilityQuery);
        $checkAvailabilityStatement->bind_param('ii', $instructorID, $courseID);
        $checkAvailabilityStatement->execute();
        $availabilityResult = $checkAvailabilityStatement->get_result();

        if ($availabilityResult->num_rows === 0) {
            // No availability record found, insert a new record
            $insertAvailabilityQuery = "INSERT INTO instructor_availability (Instructor_ID, Course_ID, IsAvailable) VALUES (?, ?, ?)";
            $insertAvailabilityStatement = $conn->prepare($insertAvailabilityQuery);
            $insertAvailabilityStatement->bind_param('iis', $instructorID, $courseID, $availability);

            if ($insertAvailabilityStatement->execute()) {
                // Availability added successfully
                echo "Availability added for the instructor!";
                header("Location:instructor.php");
            } else {
                // Error occurred while adding availability
                echo "Error adding availability. Please try again.";
                header("Location:instructor.php");
            }

            $insertAvailabilityStatement->close();
        } else {
            // Availability record already exists, update the existing record
            $updateAvailabilityQuery = "UPDATE instructor_availability SET IsAvailable = ? WHERE Instructor_ID = ? AND Course_ID = ?";
            $updateAvailabilityStatement = $conn->prepare($updateAvailabilityQuery);
            $updateAvailabilityStatement->bind_param('sii', $availability, $instructorID, $courseID);

            if ($updateAvailabilityStatement->execute()) {
                // Availability updated successfully
                echo "Availability updated for the instructor!";
                header("Location:instructor.php");
            } else {
                // Error occurred while updating availability
                echo "Error updating availability. Please try again.";
                header("Location:instructor.php");
            }

            $updateAvailabilityStatement->close();
        }

        $checkAvailabilityStatement->close();
    } else {
        // Error retrieving Instructor_ID
        echo "Error retrieving Instructor_ID. Please try again.";
    }

    $getInstructorIDStatement->close();
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: Add_Availability.php");
}

$conn->close();
?>
