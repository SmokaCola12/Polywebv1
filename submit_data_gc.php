<?php
session_start();
include("db.php"); // Make sure this file contains your database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("Error: User not logged in.");
    }

    $user_id = $_SESSION['user_id'];
    $score = isset($_POST['score']) ? intval($_POST['score']) : 0;
    $game_mode = isset($_POST['game_mode']) ? $_POST['game_mode'] : '';

    // Validate the data
    if (empty($user_id) || $score < 0 || empty($game_mode)) {
        die("Error: Invalid data submitted.");
    }

    // Insert the score into the database
    $query = "INSERT INTO user_dataGC (user_id, score, game_mode) VALUES (?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("iis", $user_id, $score, $game_mode);

    if ($stmt->execute()) {
        $message = "Score submitted successfully! Your score: $score in $game_mode mode.";
    } else {
        $message = "Error submitting score: " . $con->error;
    }

    $stmt->close();
} else {
    $message = "Error: Form not submitted.";
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Submission Result</title>
    <style>
        /* Color variables for black and cyan theme */
        :root {
            --primary-color: #00ffff; /* Cyan */
            --secondary-color: #00bcd4; /* Slightly darker cyan */
            --background-color: #000000; /* Black */
            --text-color: #00ffff; /* Cyan text */
            --border-color: #00ffff; /* Cyan borders */
            --card-background: #111111; /* Darker background for card */
            --button-hover: #00bcd4; /* Slightly darker cyan on hover */
        }

        body {
            font-family: 'Raleway', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .result-container {
            background-color: var(--card-background);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            border: 2px solid var(--border-color);
        }

        h1 {
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .back-button {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: var(--background-color);
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: var(--button-hover);
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Score Submission Result</h1>
        <p><?php echo $message; ?></p>
        <a href="guess the code.html" class="back-button">Back to Game</a>
    </div>
</body>
</html>
