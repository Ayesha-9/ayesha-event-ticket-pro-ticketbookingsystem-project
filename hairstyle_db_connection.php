<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hair_stylist";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $totalAmount = $_POST['totalAmount'];
    $HairstyleOption = $_POST['HairstyleOption'];
    $HairstylistName= $_POST['HairstylistName'];

    $sql = "INSERT INTO hairstyle(name, phone, date, location, totalAmount, HairstyleOption, HairstylistName) VALUES ('$name', '$phone', '$date', '$location',  '$totalAmount', '$HairstyleOption', '$HairstylistName')";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>