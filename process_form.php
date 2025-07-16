<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "application_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO applications (lastname, firstname, level, age, index_number, telephone, why_join) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssisss", $lastname, $firstname, $level, $age, $index_number, $telephone, $why_join);

// Set parameters
$lastname = $_POST['lastname'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$level = $_POST['level'] ?? '';
$age = $_POST['age'] ?? 0;
$index_number = $_POST['index_number'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$why_join = $_POST['why'] ?? '';

// Execute
if ($stmt->execute()) {
    header("Location: thank_you.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
