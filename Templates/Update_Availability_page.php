<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/add_availability.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>Update Instructor Availability</title>
</head>
<body>
    <h1>Update Instructor Availability</h1>

    <nav>
        <a href="instructor.php">
            <h2>TPMS</h2>
        </a>
        <div>
            <ul class="nav-links">
                <li><a href="AboutUs.php">About us</a></li>
                <li><a href="instructor_logout.php">logout</a></li>
            </ul>
        </div>
        
        
        <div class="burger">
            <div class="l1"></div>
            <div class="l2"></div>
            <div class="l3"></div>
            
        </div>
    </nav>

    <form method="POST" action="Update_Availability.php">
        <label for="Course_ID">Select a Course:</label>
        <select name="Course_ID" id="Course_ID">
            <!-- Populate the course options dynamically from the database -->
            <?php
            session_start(); // Start the session
            
            include "db_conn.php"; 

            // Get the instructor ID from the session
            $instructorID = $_SESSION["Instructor_ID"];

            // Retrieve the courses assigned to the instructor from course_instructor table
            $getCoursesQuery = "SELECT ci.Course_ID, c.Course_Title FROM course_instructor ci
                                INNER JOIN course c ON ci.Course_ID = c.Course_ID
                                WHERE ci.Instructor_ID = '$instructorID'";
            $getCoursesResult = $conn->query($getCoursesQuery);

            if ($getCoursesResult->num_rows > 0) {
                while ($row = $getCoursesResult->fetch_assoc()) {
                    $courseID = $row['Course_ID'];
                    $courseName = $row['Course_Title'];
                    echo "<option value='$courseID'>$courseName</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <label for="Availability">Availability:</label>
        <select name="Availability" id="Availability">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br><br>
        <input type="submit" value="Update Availability">
    </form>

</body>
</html>
