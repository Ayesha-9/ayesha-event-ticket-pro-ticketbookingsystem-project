<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makeup_artists";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$location = $_POST['location'];
$totalAmount = $_POST['totalAmount']; // Corrected field name
$makeupOption = $_POST['makeupOption'];
$artistName = $_POST['artistName'];

$sql = "INSERT INTO makeup (name, phone, date, location, totalAmount, makeupOption, artistName) VALUES ('$name', '$phone', '$date', '$location', '$totalAmount', '$makeupOption', '$artistName')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
