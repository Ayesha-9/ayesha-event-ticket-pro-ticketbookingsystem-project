<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "magic_show";

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

    $sql = "INSERT INTO bookings (name, email, phone, total_tickets, total_amount, show_name, show_date, show_time, show_location) VALUES ('$name', '$email', '$phone', '$totalTickets', '$totalAmount', 'Enchanted Dreams.Mystical Delights', '2023-12-23', '08:00', '#402, 6th Cross Road, Silicon Town, Electronic City Phase 2, Bangalore - 560100 (Near Shuttle Court)')";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>