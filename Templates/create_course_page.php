<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="stylesheet" href="../Styles/create_course.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Create Course</title>
</head>
<body>
    <?php 
    include 'db_conn.php';
    $sql = "SELECT * FROM instructor";
    $result = $conn->query($sql);
?>
    <nav>
    <a href="tp_dashboard.php">
            <h2>TPMS</h2>
        </a>
        
        <div>
            <ul class="nav-links">
                <li><a href="tp_view_course_page.php">My courses</a></li>
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

        <div id="create-course-form">
            <h2 id="create_course_headline">Create Course</h2>
        <form action="create_course.php" method="POST">
                <input type="text" class="input" id="course-img" name="course-img" placeholder="course url">
                <input type="text" class="input" id="course-title" name="course-title" placeholder="course title" required>
                <input type="number" class="input" id="course-price" name="course-price" placeholder="course price" required>
                <textarea class="input" id="course-description" name="course-description" rows="10" cols="50" placeholder="Description"></textarea>
                <div>
                <label for="course-img" class="date-label">Start Date</label>
                <input type="date" class="input" id="start-date" name="start-date" required>
                </div>
                <div>
                <label for="course-img" class="date-label">End Date</label>
                <input type="date" class="input" id="end-date" name="end-date" required>
                </div>
                <select class ="input" name="category" id="category">
                    <option disabled selected>Category</option>
                    <option value="Computer Science">Computer Science</option> 
                    <option value="Finance">Finance</option> 
                    <option value="E-Sport">E-Sport</option> 
                </select>
                <select class="input inst" name="instructors[]" id="instructors" multiple>
                    <option disabled selected>Instructor</option>
                    <?php
                        // Retrieve the list of instructors from the database
                        
                        // Display the instructor options in the dropdown menu
                        while ($row = $result->fetch_assoc()) {
                            $instructor_id = $row['Instructor_ID'];
                            $instructor_name = $row['Instructor_Name'];
                            echo "<option value='$instructor_id'>$instructor_name</option>";
                        }
                        ?>
                </select>
                <input type="submit"  value="Submit" id="submit" />
                
               
            </form>
           
        </div>
        
    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
