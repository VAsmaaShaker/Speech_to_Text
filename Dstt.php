<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "speech_text"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get text from POST request
$text = $_POST['text'];

// Prepare and execute SQL statement to insert text into database
$sql = "INSERT INTO stext (text) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $text);

if ($stmt->execute()) {
    echo "Text saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
