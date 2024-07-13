
<?php
// Assuming you have established a database connection
include 'db_conn.php';
// Retrieve the course ID from the URL or another source
$courseID = $_GET['id'];

// Retrieve the course data from the database
$sql = "SELECT * FROM course WHERE Course_ID = '" . $courseID . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated values from the submitted form
    $updatedFields = [];

    if (!empty($_POST['course-img'])) {
        $updatedFields[] = "Course_Img = '" . $_POST['course-img'] . "'";
    }
    if (!empty($_POST['course-title'])) {
        $updatedFields[] = "Course_Title = '" . $_POST['course-title'] . "'";
    }

    if (!empty($_POST['course-price'])) {
        $updatedFields[] = "Course_Price = '" . $_POST['course-price'] . "'";
    }
    if (!empty($_POST['course-description'])) {
        $updatedFields[] = "Course_Description = '" . $_POST['course-description'] . "'";
    }
    if (!empty($_POST['start-date'])) {
        $updatedFields[] = "Course_Start = '" . $_POST['start-date'] . "'";
    }
    if (!empty($_POST['end-date'])) {
        $updatedFields[] = "Course_End = '" . $_POST['end-date'] . "'";
    }
    if (!empty($_POST['category'])) {
        $updatedFields[] = "Course_Category = '" . $_POST['category'] . "'";
    }
    

    $updateSql = "UPDATE course SET " . implode(", ", $updatedFields) . " WHERE Course_ID = '" . $courseID . "'";
    $updateResult = mysqli_query($conn, $updateSql);

    // Check if the update was successful
    if ($updateResult) {
        // Redirect to the course listing page or display success message
        header("Location: course.php?id=" . $row['Course_ID']);
        exit();
    } else {
        // Handle the update error
        $errorMessage = "Failed to update the course.";
    }
}

// Close the database connection
mysqli_close($conn);
?>