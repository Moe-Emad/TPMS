<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/view_course.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    
    
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>
<title>View Courses</title>
</head>
<body>
    <?php
    include 'db_conn.php';
    session_start();
    ?>
    <!-- Your navigation and other content here ... -->

    <div class="all-content">
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
        <main>
            <div id="courses-container">
                <?php
                $userID = $_SESSION['User_ID'];
                $sql = "SELECT c.* 
                        FROM course c 
                        INNER JOIN user_course uc ON c.Course_ID = uc.Course_ID 
                        WHERE uc.User_ID = '$userID'";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="course_registered.php?id=<?php echo $row['Course_ID']; ?>">
                            <div class="course">
                                <img src="<?php echo $row["Course_Img"] ?>" alt="" width="150px">
                                <h5 class="course-name"><?php echo $row["Course_Title"] ?></h5>
                            </div>
                        </a>
                        <?php
                    }
                } else {
                    echo "No courses found.";
                }
                ?>
            </div>
        </main>
        <footer>
            <!-- Your footer content ... -->
        </footer>
    </div>

    <!-- Your script tags ... -->
</body>
</html>