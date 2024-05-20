<?php
session_start();

// Include database connection
include("dbconnect.php");

// Function to handle registration and login
function registerAndLogin($conn, $username, $password, $email) {
    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    
    if (mysqli_num_rows($checkUsernameResult) > 0) {
        return "Username already exists";
    }

    // Check if the email already exists
  else 

    // Insert user into database
    $insertQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $insertResult = mysqli_query($conn, $insertQuery);
    
    if ($insertResult) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        return "Registration successful and logged in";
    } else {
        return "Registration failed";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['register'])) {
        // Registration form submitted
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Call registerAndLogin function
        $message = registerAndLogin($conn, $username, $password, $email);
        if ($message === "Registration successful and logged in") {
            echo "<script>alert('$message');</script>";
        }
    } elseif(isset($_POST['login'])) {
        // Login form submitted
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if user exists in database
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];

            // Redirect to dashboard
            header("location: /dashboard/");
            exit(); // Ensure script execution stops after redirect
        } else {
            echo "Invalid username or password";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css" />
    <title>Sign in</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <?php if(isset($message) && !empty($message)): ?>
                <div class="notification"><?php echo $message; ?></div>
            <?php endif; ?>
            <form action="" class="sign-in-form" method="POST">
                <h2 class="title">Sign in</h2>
                <input type="hidden" name="login" value="1">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" />
                </div>
                <input type="submit" value="Login" class="btn solid" />
            </form>
            <form action="" class="sign-up-form" method="POST">
                <h2 class="title">Sign up</h2>
                <input type="hidden" name="register" value="1">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" />
                </div>
                <input type="submit" class="btn" value="Sign up" />
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>Ready to ship with ease? Sign up now and experience seamless freight management!</p>
                <button class="btn transparent" id="sign-up-btn">Sign up</button>
            </div>
            <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>Welcome aboard the kargada freight services! Join us and experience seamless shipping like never before.</p>
                <button class="btn transparent" id="sign-in-btn">Sign in</button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>
<script src="index.js"></script>
 <?php include("dbconnect.php"); ?>
</body>
</html>
