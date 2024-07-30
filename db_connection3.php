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

    $sql = "INSERT INTO bookings3 (name, email, phone, total_tickets, total_amount, show_name, show_date, show_time, show_location) VALUES ('$name', '$email', '$phone', '$totalTickets', '$totalAmount', 'Mystical Marvels.Spellbinding Sorcery', '2023-12-18', '05:30', 'Mico layout,Banerghatta road ,Bangalore 560076')";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>