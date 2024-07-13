<?php
session_start();
include 'db_conn.php';
require_once('../tcpdf/tcpdf.php'); // Change the path to the TCPDF library as per your server setup

$courseID = $_GET['id'];


if (isset($_GET['generate_certificate'])) {
    // Function to generate the PDF certificate
    function generateCertificate($fullName, $courseTitle, $courseDescription, $courseStart, $courseEnd)
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Organization');
        $pdf->SetTitle('Certificate');

        $pdf->AddPage();

        // Certificate content
        $content = "
            <h1 style='font-size: 100px;'>Certificate of Completion</h1>
            <p>Thank you for participating in our course and congratulations on your completion!</p>
            <p>We appreciate your dedication and hard work throughout the course. You have successfully demonstrated your knowledge and skills in the subject matter.</p>
            <p>We hope that this course has been valuable to you and that you will apply what you have learned in your future endeavors.</p>
            <p>This is to certify that <strong>$fullName</strong></p>
            <p>has successfully completed the course:</p>
            <h2>$courseTitle</h2>
            <p>Description: $courseDescription</p>
            <p>Date: $courseStart - $courseEnd</p>
            <h2> TPMS Team</h2>
        ";

        $pdf->writeHTML($content, true, false, true, false, '');
        $pdf->Output('certificate.pdf', 'D'); // 'D' will force download the PDF file
    }

    $sql = "SELECT * FROM course WHERE Course_ID ='" . $courseID . "'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $courseTitle = $row["Course_Title"];
        $courseDescription = $row["Course_Description"];
        $courseStart = $row["Course_Start"];
        $courseEnd = $row["Course_End"];

        // Get the User_Name from the session (you need to have the User_Name in the session when the user logs in)
        $fullName = $_SESSION['Full_Name'];

        generateCertificate($fullName, $courseTitle, $courseDescription, $courseStart, $courseEnd);
    } else {
        $_SESSION['error'] = "No courses found.";
    }
}
?>
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

    <title>Registered Course</title>
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
    
    $sql = "SELECT * FROM course WHERE Course_ID ='" . $courseID . "'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        ?>
            <div id="pictitle">
            <img src="<?php echo $row["Course_Img"] ?>" alt="" width="150px">
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



?>
        </div>
       
 
    <?php  }
  } else {
      echo "No courses found.";
  }
    ?>


    <?php 
    echo '<a href="course_registered.php?id=' . $courseID . '&generate_certificate=1">Generate certificate</a>';
    $conn->close(); 
    ?>
    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
