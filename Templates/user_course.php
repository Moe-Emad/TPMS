<?php
session_start();
include 'db_conn.php';

$courseID = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/course_style.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Course Page</title>
</head>
<body>
    <nav>
        <a href="landing.php">
            <h2>TPMS</h2>
        </a>
        
        <div>
            <ul class="nav-links">
                <li><a href="user_view_course.php">My courses</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            
        </div>
        
        <div class="burger">
            <div class="l1"></div>
            <div class="l2"></div>
            <div class="l3"></div>
            
        </div>
    </nav>
    <div class="all-content">
    <main>
        
        <?php

         if (isset($_SESSION['error'])) {
            echo "<p style='color: red';>Error: " . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
    
    $sql = "SELECT * FROM course WHERE Course_ID ='" . $courseID . "'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        ?>
            <div id="pictitle">
            <img src="<?php echo $row["Course_Img"]?>" alt="" width="150px">
            <h2><?php echo $row["Course_Title"]  ?></h2>
        </div>
        <div id="additional">
            <div class="description">
                <h3>Description: </h3>
                <p><?php echo $row["Course_Description"] ?></p>
            </div>
            <div class="category">
                <h3>Category: </h3>
                <p><?php echo $row["Course_Category"] ?></p>
            </div>
            <div class="date">
                <h3 id="date-headline">Date</h3>
                <p><?php echo $row["Course_Start"] ?> - <?php echo $row["Course_End"] ?> </p>
            </div>

        </div>
        <div id="instruct">
            <h3>Instructors</h3>
            <?php
$sql = "SELECT i.Instructor_Name, ia.IsAvailable
        FROM instructor i
        INNER JOIN instructor_availability ia ON ia.Instructor_ID = i.Instructor_ID
        WHERE ia.Course_ID = $courseID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $instructorName = $row["Instructor_Name"];
        $availability = $row["IsAvailable"];

        echo "<p>$instructorName - Availability: $availability</p>";
    }
} else {
    echo "No instructors found for the given course ID.";
}

// Close the connection

?>
        </div>
       
 
    <?php  }
  } else {
      echo "No courses found.";
  }
    ?>

    <a href="process_reg_course.php?id=<?php echo $courseID;?>">register</a>

    <?php $conn->close(); ?>
    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
