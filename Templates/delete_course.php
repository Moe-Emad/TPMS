<?php
include 'db_conn.php';

$confirmed = isset($_GET['confirm']) && $_GET['confirm'] === 'true';

if ($confirmed) {
    // Retrieve the course ID from the URL
    $courseId = $_GET['id'];

    // Delete related records from course_instructor table
    $sqlDeleteCourseInstructor = "DELETE FROM course_instructor WHERE Course_ID = $courseId";
    $resultDeleteCourseInstructor = mysqli_query($conn, $sqlDeleteCourseInstructor);

    // Now, delete the course from the database
    $sqlDeleteCourse = "DELETE FROM course WHERE Course_ID = $courseId";
    $resultDeleteCourse = mysqli_query($conn, $sqlDeleteCourse);

    if ($resultDeleteCourse && $resultDeleteCourseInstructor) {
        // Course and related records deleted successfully
        header("Location: view_course_delete_page.php");
        exit();
    } else {
        // Failed to delete the course
        echo "Error deleting course: " . mysqli_error($conn);
    }
} else {
    // User did not confirm the deletion, redirect back to the course listing page
    header("Location: view_course_delete_page.php");
    exit();
}

// Close the database connection
mysqli_close($conn);

?>