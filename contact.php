<?php
    // Create connection
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "db.php";
        // Check connection
        if (!$c) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve form data
        $name = $_POST['name'];
        $class = $_POST['class'];
        $email = $_POST['email'];
        $problem = $_POST['problem'];

        // Prepare and bind SQL statement
        $stmt = mysqli_prepare($c, "INSERT INTO feedback (name, classs, email, problem) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $name, $class, $email, $problem);

        // Execute the SQL statement
        if (mysqli_stmt_execute($stmt)) {
           header("Location:submitted.html");
        } else {
            echo "Error: " . mysqli_error($c);
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($c);
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <h3>TAF</h3>
            <p>Think about future</p>
        </div>
        <ul class="nav-menu">
            <li class="nav-items"><a href="index.html" class="nav-links">Home</a></li>
            <li class="nav-items"><a href="jobsindex.html" class="nav-links">jobs</a></li>
            <li class="nav-items"><a href="about.html" class="nav-links">About</a></li>
            <li class="nav-items"><a href="contact.html" class="nav-links">Contact</a></li>
            <li class="nav-items"><button>Sign Up</button></li>
        </ul>
    </div>

    <div class="container2">
        <img src="pngegg.png" alt="">
        <form action="" method="POST">
            <h3>Feedback</h3>
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="class" placeholder="Enter your class">
            <input type="email" name="email" placeholder="Enter your email">
            <textarea placeholder="Enter your problem" name="problem"></textarea>
            <input type="submit" id="butt">
        </form>

    </div>
   

    <div class="footer">
        <div class="first">
            <h2>Community</h2>
            <p>Our Community Guidelines ensure a safe and respectful environment for all users.
                We promote kindness, inclusivity, and constructive communication.
                Respect privacy, avoid hate speech, and comply with laws.</p>
        </div>
        <div class="second">
            <ul class="nav-menu">
                <li class="nav-items"><a href="#" class="nav-links">Home</a></li>
                <li class="nav-items"><a href="#" class="nav-links">Jobs</li>
                <li class="nav-items"><a href="#" class="nav-links">About</a></li>
                <li class="nav-items"><a href="#" class="nav-links">Contact</a></li>
            </ul>
        </div>
        <div class="third">
            <button>Sign Up</button>
        </div>
    </div>
</body>

</html>