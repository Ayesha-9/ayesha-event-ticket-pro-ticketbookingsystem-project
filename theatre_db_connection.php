<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "theatre_night";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $totalTickets = $_POST['totalTickets'];
    $totalAmount = $_POST['totalAmount'];
    $showName = $_POST['showName'];
    $showDate = $_POST['showDate'];
    $showTime = $_POST['showTime'];
    $showLocation = $_POST['showLocation'];

    $sql = "INSERT INTO theatre (name, email, phone, total_tickets, total_amount, show_name, show_date, show_time, show_location) VALUES ('$name', '$email', '$phone', '$totalTickets', '$totalAmount', 'Movie Night- Under The Sky', '2023-12-25', '09:00', 'Grand mercure,Gopalan Mall:Bengaluru, Karnataka 560093, India')";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>