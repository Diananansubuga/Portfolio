<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "portfolio"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    
    
    if ($stmt->execute()) {
        echo "Form data stored successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    
    $stmt->close();
}


$conn->close();
?>
