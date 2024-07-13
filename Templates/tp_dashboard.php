<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="stylesheet" href="../Styles/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Dashboard</title>
</head>
<body>
    <nav>
    <a href="tp_dashboard.php">
            <h2>TPMS</h2>
        </a>
        <div>
            <ul class="nav-links">
                <li><a href="tp_view_course_page.php">My courses</a></li>
                <li><a href="tp_logout.php">Logout</a></li>
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
    include 'db_conn.php';
    session_start();
    if(isset($_SESSION['TP_ID']) && isset($_SESSION['TP_Name'])){
        ?>
            <h1>Hello, <?php echo $_SESSION['TP_Name']; ?></h1>
    <?php }  ?>
        <div id="overview">
        <?php
        $current_TP_ID = $_SESSION['TP_ID']; 
        $sql = "SELECT COUNT(*) AS course_count FROM course WHERE TP_ID = $current_TP_ID";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $courseCount = $row['course_count'];
        ?>
            <h2 id="overview-header">Overview</h2>
            <div id="overview-main">
            <div class="overview-section">
                <h3>Number of courses</h3>
                <h4 class="overview-values"><?php echo $courseCount; ?></h4>
            </div>
            </div>
        </div>
        <div id="Course-Management">
            <h2 id="cm-header">Course Management</h2>
            <div id="buttons-layout">
            <a href="create_course_page.php"><button id="add-course" class="course-btn">Add Course</button></a>
            <a href="view_course_delete_page.php"><button id="delete-course" class="course-btn">Delete Course</button></a>
            <a href="view_course_edit_page.php"><button id="edit-course" class="course-btn">Edit Course</button></a>
</div>
        </div>
        
    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
