<?php

session_start();

include("db.php"); 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        
        $stmt = $con->prepare("INSERT INTO form (name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $username, $password);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Registration Failed')</script>";
        }

        $stmt->close();
    } else {
        echo "<script type='text/javascript'> alert('Access Denied')</script>";
    }
}
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PolyWeb </title> 
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .signup {
            background-color: #222;
            border-radius: 10px;
            padding: 40px;
            width: 320px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #00bcd4;
            margin-bottom: 20px;
            text-align: center;
        }

        form label {
            color: #b2ebf2;
            font-size: 14px;
            display: block;
            margin: 10px 0 5px;
        }

        form input[type="name"],
        form input[type="email"],
        form input[type="Create username"],
        form input[type="Create password"],
        form input[type="submit"] {
    width: 100%;
    padding: 12px; /* Same padding as the submit button */
    border: none;
    border-radius: 5px;
    background-color: #333;
    color: #e0f7fa;
    box-sizing: border-box; /* Ensures padding doesn’t affect width */
}

        form input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #00bcd4;
            border: none;
            border-radius: 5px;
            color: #121212;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        form input[type="submit"]:hover {
            background-color: #0097a7;
        }

        h3 {
            color: #b2ebf2;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        h3 a {
            color: #00bcd4;
            text-decoration: none;
        }

        h3 a:hover {
            text-decoration: underline;
        }

        .background-clip{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;

}

@media (min-aspect-ratio:1/9) {
    .background-clip{
        width: 100%;
        height: auto;
    }
}

@media (max-aspect-ratio:16/9) {
    .background-clip{
        width:auto;
        height: 100%;
    }
}
    </style>
  </head>

<body>
<video autoplay loop muted plays-inline class="background-clip">
        <source src="Untitled design.mp4" type="video/mp4">
       </video>
  <div class="signup">
    <h2>Sign Up</h2>
    <form method="POST">
      <label>Name</label>
      <input type="name" name="name" required>
      <label>email</label>
      <input type="email" name="email" required>
      <label>username</label>
      <input type="Create username" name="username" required>
      <label>password</label>
      <input type="Create password" name="password" required>
      <input type="submit" name="" value="Register">

    </form>
    <h3>Already have an account? <a href="LOGIN%20PAGE.php">Login now</a></h3>
  </div>
</body>
</html>