<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Instructor Landing Page</title>
</head>
<body>
    <nav>
        <a href="#">
            <h2>TPMS</h2>
        </a>
        <div>
            <ul class="nav-links">
                <li><a href="instructor_view_course.php">My courses</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
               
                <li><a href="instructor_logout.php">Logout</a></li>
                <li><a href="Update_Availability_page.php">Update Availability</a></li>
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
      <div class="space"></div>
      <h1 id="headline">Instructor Main Page</h1>

        <?php 


        include "db_conn.php";
        session_start();

  if(isset($_SESSION['Instructor_ID']) && isset($_SESSION['Instructor_Name'])){
?>
    <h1>Hello, <?php echo $_SESSION['Instructor_Name']; ?></h1>
    
    <?php 

  }else{
    header("Location: instructor_login_page.php");
    exit();
  }
    ?>
 <div class="scroll-container" data-simplebar>
        <h3 id="pop-cor-headline">Trainer Provider Courses</h3>
        <div class="courses-wrapper" >
    <?php 
    $sql = "SELECT ci.Course_ID, c.Course_Img, c.Course_Title, c.Course_Price FROM course_instructor ci
    INNER JOIN course c ON ci.Course_ID = c.Course_ID
    WHERE ci.Instructor_ID = '".$_SESSION["Instructor_ID"]."'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        ?>
          <a href="instructor_course.php?id=<?php echo $row['Course_ID']; ?>">
          <div class="course">
          <img src="<?php echo $row["Course_Img"]?>" alt="" width="150px">
            <h5 class="course-name"><?php echo $row["Course_Title"] ?></h5> 
            <h5 class="course-price">RM <?php echo $row["Course_Price"] ?></h5>

        </div>
      </a>
    <?php  }
  } else {
      echo "No courses found.";
  }
    ?>

        
    </main>

</div>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>

