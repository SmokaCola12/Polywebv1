<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "SELECT * FROM form WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] == $password) {
                    // Set the user ID in the session
                    $_SESSION['user_id'] = $user_data['id']; // Assuming 'id' is the primary key in your 'form' table
                    header("location: index.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'>alert('Access Denied, check username & password');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Access Denied, check username & password');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLYWEB Login</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
        }
        .container {
            display: flex;
            height: 100%;
        }
        .left-side {
            flex: 1;
            background-color: #1e1e1e;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #e0e0e0;
        }
        .right-side {
            flex: 1;
            position: relative;
            overflow: hidden;
        }
        .right-side video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }
        h1 {
            color: whitesmoke;
            margin-bottom: 20px;
            font-size: 2em;
        }
        h1 .web {
            color: #00ffff;
        }
        .tagline {
            font-size: 1.1rem;
            color: #e0e0e0;
        }
        form {
            width: 100%;
            max-width: 300px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: #333;
            color: #e0e0e0;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #00ffff;
            color: #1e1e1e;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            box-sizing: border-box;
        }
        button:hover {
            background-color: #00b3b3;
        }
        .signup-link {
            margin-top: 20px;
            text-align: center;
        }
        .signup-link a {
            color: #00ffff;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .right-side {
                height: 50vh;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <h1>POLY<span class="web">WEB</span></h1>
            <div class="tagline">"Educational Game-Based Learning Platform"</div>
            <form id="loginForm" method="POST"> <br> <br>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log in</button>
            </form>
            <div class="signup-link">
                Don't have an account? <a href="Sign up page.php">Sign up</a>
            </div>
        </div>
        <div class="right-side" style="position: relative; left: 0px;">
    <video autoplay muted loop playsinline>
        <source src="matrix.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

    </div>
</body>
</html>
