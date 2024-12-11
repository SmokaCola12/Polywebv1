<?php
// Database connection settings
$servername = "localhost"; // or your server name
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "register"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the score from the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['score'])) {
    $score = $_POST['score'];

    // Simulate saving the score to the database
    // Assuming you already have the user ID (for example, fetched from session or login)
    $user_id = 1; // Replace with the actual user_id from the session

    $sql = "INSERT INTO user_dataAC (user_id, score) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $score);

    if ($stmt->execute()) {
        $message = "Score submitted successfully! Your score: $score.";
    } else {
        $message = "Failed to submit score. Please try again.";
    }

    $stmt->close();
} else {
    $message = "No score data received.";
}

// Close the database connection
$conn->close();

// Display the message with black and cyan theme
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Score Submission Result</title>
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
    <div class='message-container'>
        <h1>$message</h1>
        <a href='arranging.html' class='back-button'>Back to Game</a>
    </div>
</body>
</html>
";
?>
