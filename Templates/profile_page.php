<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="stylesheet" href="../Styles/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title> Profile Page</title>
</head>

<?php include "profile.php"; ?>

<body>
    <nav>
        <a href="#">
            <h2>TPMS</h2>
        </a>

        <div>
            <ul class="nav-links">
                <li><a href="logout.php">Logout</a></li>
                <li><a href="user_view_course.php">My courses</a></li>
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
        <h1 id="headline">Profile Information</h1>
<div class="profile-container">

  <div class="profile-field">
    <label for="name">Name:</label>
    <div class="profile-data"><?php echo $fullName; ?></div>
  </div>
  <div class="profile-field">
    <label for="email">Email:</label>
    <div class="profile-data"><?php echo $email; ?></div>
  </div>
  <div class="profile-field">
    <label for="dob">Date of Birth:</label>
    <div class="profile-data"><?php echo $DOB; ?></div>
  </div>
  <div class="profile-field">
    <label for="gender">Gender:</label>
    <div class="profile-data"><?php echo $gender; ?></div>
  </div>
  <div class="profile-field">
    <label for="country">Country:</label>
    <div class="profile-data"><?php echo $country; ?></div>
  </div>
  <button class="profile-button" type="submit"><a href="landing.php">Back</a></button>
</div>


    
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>