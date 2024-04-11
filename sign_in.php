<?php
$err=$Eerr = "";
$in = 1;
if (isset($_POST['classs'])) {
    require 'db.php';
    $q = "SELECT username,email FROM studentsof10th";

    // Execute the query
    $result = $c->query($q);
    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row["username"] == $_POST['username']) {
                $err = "Username Already exists";
                $in = 0;
            }
            if ($row["email"] == $_POST['email']) {
                $Eerr = "Email Already exists";
                $in = 0;
            }
        }
    }
    if ($in) {
        if ($_POST['classs'] == '10') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $district = $_POST['district'];
            $classs = $_POST['classs'];
            $password = $_POST['password'];

            // Prepare SQL query with proper variable concatenation
            $q = "INSERT INTO studentsof10th (username, namee,email, phone, district, classs, pswd) 
            VALUES ('$username', '$name', '$email', '$phone', '$district', '$classs', '$password')";
            if (!mysqli_query($c, $q)) {
                $err = "failed";
            }
            else{
                header("Location:signup_success.html");
            }
            // Close connection
            $c->close();
        }
        else{
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $district = $_POST['district'];
            $classs = $_POST['classs'];
            $password = $_POST['password'];
            $stream=$_POST['stream'];
            $additional=$_POST['additional_subject'];

            // Prepare SQL query with proper variable concatenation
            $q = "INSERT INTO studentsof12th (username, namee, email, phone, district, classs, stream, additional, pswd) 
            VALUES ('$username', '$name', '$email', '$phone', '$district', '$classs','$stream','$additional', '$password')";
            if (!mysqli_query($c, $q)) {
                $err = "failed";
            }
            else{
                header("Location:signup_success.html");
            }
            // Close connection
            $c->close();

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }

        .class-selection {
            display: flex;
            justify-content: space-between;
        }

        #stream-div {
            display: none;
        }

        #ad {
            display: none;
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
        <h2>Student Sign Up</h2>
        <form id="signup-form" method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="username">Username:</label>
            <span id="username-error" class="error">
                <?php echo $err; ?>
            </span>
            <input type="text" id="username" name="username" required>

            
            <label for="email">Email:</label>
            <span id="username-error" class="error">
                <?php echo $Eerr; ?>
            </span>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="India" readonly>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="Jammu and Kashmir" readonly>

            <label for="district">District:</label>
            <select id="district" name="district" required>
                <option value="">Select District</option>
                <!-- Add all districts of Jammu and Kashmir -->
                <option value="anantnag">Anantnag</option>
                <option value="bandipora">Bandipora</option>
                <option value="baramulla">Baramulla</option>
                <option value="budgam">Budgam</option>
                <option value="doda">Doda</option>
                <option value="ganderbal">Ganderbal</option>
                <option value="jammu">Jammu</option>
                <option value="kathua">Kathua</option>
                <option value="kishtwar">Kishtwar</option>
                <option value="kulgam">Kulgam</option>
                <option value="kupwara">Kupwara</option>
                <option value="rajouri">Rajouri</option>
                <option value="ramban">Ramban</option>
                <option value="reasi">Reasi</option>
                <option value="samba">Samba</option>
                <option value="shopian">Shopian</option>
                <option value="srinagar">Srinagar</option>
                <option value="udhampur">Udhampur</option>
                <!-- Add more options as needed -->
            </select>

            <div class="class-selection">
                <label for="class">Class:</label>
                <input type="radio" id="class10" name="classs" value="10" checked>
                <label for="class10">10th</label>
                <input type="radio" id="class12" name="classs" value="12">
                <label for="class12">12th</label>
            </div>

            <div id="stream-div">
                <label for="stream">Stream:</label>
                <select id="stream" name="stream">
                    <option value="">Select Stream</option>
                    <option value="commerce">Commerce</option>
                    <option value="medical">Medical</option>
                    <option value="non-medical">Non-Medical</option>
                    <option value="arts">Arts</option>
                </select>
            </div>
            <div id="ad">
                <label for="additional_subject">Additional Subject:</label>
                <input type="text" id="additional_subject" name="additional_subject">
            </div>


            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <div id="password-error" class="error"></div>

            <button type="submit" class="btn">Sign Up</button>
            <div class="switch-text">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>

        </form>
    </div>

    <script>
        document.getElementById('class12').addEventListener('change', function () {
            var streamDiv = document.getElementById('stream-div');
            streamDiv.style.display = this.checked ? 'block' : 'none';
            var ad = document.getElementById('ad');
            ad.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('class10').addEventListener('change', function () {
            var streamDiv = document.getElementById('stream-div');
            streamDiv.style.display = this.checked ? 'none' : 'block';
            var ad = document.getElementById('ad');
            ad.style.display = this.checked ? 'none' : 'block';
        });

        document.getElementById('signup-form').addEventListener('submit', function (event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                document.getElementById('password-error').textContent = "Passwords do not match";
                event.preventDefault();
            }
        });
    </script>
</body>

</html>