<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "Niru @ 17";
$dbname = "sensor_db";

if(isset($_POST['id'])){
// Retrieve the fingerprint ID from the NodeMCU
$id = $_POST["id"];  
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the fingerprint ID into the database
$sql = "INSERT INTO sensor_data (id) VALUES ('$id')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else{
    echo "Wait";
}




?>
