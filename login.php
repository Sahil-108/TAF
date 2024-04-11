<?php
session_start();
$not = $in = 1;

$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = 1;
    include "db.php";
    $q = 'SELECT email,pswd FROM studentsof10th';
    $r = mysqli_query($c, $q);
    if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_assoc($r)) {
            if ($_POST['email'] == $row["email"] && $_POST['password'] == $row["pswd"]) {
                $_SESSION['email'] = $row["email"];
                $_SESSION['password'] = $row["pswd"];
                $in = $not = 0;
                mysqli_close($c);
                header("Location:10th.html");
            }
        }
    }
    else{
        $err = "Invalid Id, Password.";
    }
    if ($in) {
        $q = 'SELECT email,pswd FROM studentsof12th';
        $r = mysqli_query($c, $q);
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                if ($_POST['email'] == $row["email"] && $_POST['password'] == $row["pswd"]) {
                    $_SESSION['email'] = $row["email"];
                    $_SESSION['password'] = $row["pswd"];
                    $not = 0;
                    mysqli_close($c);
                    header("Location:math.html");
                }
            }
        }
        else{
            $err = "Invalid Id, Password.";
        }
    }
    if ($not) {
        $err = "Invalid Id, Password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .switch-text {
            text-align: center;
            margin-top: 20px;
        }

        .switch-text a {
            color: #007bff;
            text-decoration: none;
        }

        .switch-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <span style="color:Red">
            <?php echo $err; ?>
        </span>
        <form id="login-form" action="" method="POST">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" required>

            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <div class="switch-text">
            <p>Don't have an account? <a href="sign_in.php">Sign Up</a></p>
        </div>
    </div>
</body>

</html>