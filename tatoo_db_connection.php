<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tattoo_artist";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $totalTickets = $_POST['totalTickets'];
    $totalAmount = $_POST['totalAmount'];
    $artistName = $_POST['artistName'];

    $sql = "INSERT INTO tattoo (name, phone, date, location, total_tickets, total_amount, artistName) VALUES ('$name', '$phone', '$date', '$location', '$totalTickets', '$totalAmount', 'Aish Tattoo Artist')";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>