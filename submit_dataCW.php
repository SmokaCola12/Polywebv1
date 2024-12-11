<?php
session_start();

// Check if the score is received via the query parameter
if (isset($_GET['score'])) {
    $score = $_GET['score'];
    $userId = $_SESSION['user_id']; // Ensure the user is logged in

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'register');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the score into the database
    $sql = "INSERT INTO user_dataCW (user_id, score) VALUES ('$userId', '$score')";

    if ($conn->query($sql) === TRUE) {
        $message = "Score saved successfully!";
    } else {
        $message = "Error saving score: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    $message = "No score data received.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Score</title>
    <style>
        /* Black and cyan theme */
        :root {
            --primary-color: #00ffff; /* Cyan */
            --secondary-color: #00bcd4; /* Slightly darker cyan */
            --background-color: #000000; /* Black */
            --text-color: #00ffff; /* Cyan text */
            --border-color: #00ffff; /* Cyan borders */
            --card-background: #111111; /* Darker background for card */
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Raleway', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .message-container {
            background-color: var(--card-background);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            border: 2px solid var(--border-color);
            color: var(--text-color);
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
            background-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h1><?php echo $message; ?></h1>
        <a href="crossword.html" class="back-button">Back to Game</a>
    </div>
</body>
</html>
