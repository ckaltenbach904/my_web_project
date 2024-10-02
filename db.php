<?php
// db.php: handles the form data submission to the database

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servant_leader_institute";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$address = $_POST['address'];
$phone = $_POST['phone'] ?? null;
$preferredCourse = $_POST['preferred_course'];
$pmiCertification = $_POST['pmi_certification'] ?? null;

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO registrations (first_name, last_name, address, phone, preferred_course, pmi_certification) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstName, $lastName, $address, $phone, $preferredCourse, $pmiCertification);

// Execute the query
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
