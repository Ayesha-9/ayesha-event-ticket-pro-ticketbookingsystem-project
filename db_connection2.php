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

    $sql = "INSERT INTO bookings2(name, email, phone, total_tickets, total_amount, show_name, show_date, show_time, show_location) VALUES ('$name', '$email', '$phone', '$totalTickets', '$totalAmount', 'Whimsical Conjurers.Mesmerizing Magic', '2023-12-15', '07:30', 'Karnataka Chitrakala Parishath,Art Complex,Kumara Krupa Road,Kumara Park East,Seshadripuram,Bangalore,Karnataka 560001,Bangalore')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>