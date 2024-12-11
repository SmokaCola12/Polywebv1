<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$submissionMessage = "";

if (isset($_SESSION['user_id']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['score'])) {
        $score = $_POST['score'];

        $stmt = $conn->prepare("INSERT INTO user_dataCM (user_id, score) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $score);

        if ($stmt->execute()) {
            $submissionMessage = "Score submitted successfully!";
        } else {
            $submissionMessage = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $submissionMessage = "Score not set in the request.";
    }
} else {
    $submissionMessage = "Please log in to submit data.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Submission</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: black;
            color: cyan;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
        }
        .container {
            max-width: 400px;
        }
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: cyan;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #00ffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $submissionMessage; ?></h1>
        <button class="btn" onclick="window.location.href='code match.html'">Back to Code Match</button>
    </div>
</body>
</html>
