<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Event Booking Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url(http://localhost/fifthsempro/Hpgimages/Makeup2.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

h1 {
    text-align: center;
    margin-top: -90px;
}

.booking-container {
    display: flex;
    flex-direction: column; /* Adjusted to column layout */
    align-items: center;
    margin-top: 20px;
}

.booking {
    box-sizing: border-box;
    margin: 10px;
    padding: 20px;
    border: 1px solid #ddd;
    width: 30%; /* Adjusted to take 80% of the container width */
    background-color: rgba(255, 255, 255, 0.2); /* Slightly transparent white background */
    border-radius: 10px;
    text-align: left;
    color: #333;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


        p {
            margin: 10px 0;
            color:rgb(10, 0, 0);
        }

        h2 {
            color: #3498db;
        }
    </style>
</head>
<body>
    

    <div class="booking-container" id="bookingDetails"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "makeup_artists";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM makeup";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $phone = $row['phone'];
            $date = $row['date'];
            $location = $row['location'];
            $totalAmount = $row['totalAmount'];
            $makeupOption = $row['makeupOption'];
            $artistName = $row['artistName'];

            echo "<div class='booking'>";
            echo "<h2>Booking Details</h2>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<p><strong>Date:</strong> $date</p>";
            echo "<p><strong>Location:</strong> $location</p>";
            echo "<p><strong>Total Amount:</strong> ₹$totalAmount</p>";
            echo "<p><strong>Makeup Option:</strong> $makeupOption</p>";
            echo "<p><strong>Artist Name:</strong> $artistName</p>";
            echo "</div>";
        }
    } else {
        echo "<div class='booking'>";
        echo "<h2>No bookings done yet</h2>";
        echo "</div>";
    }

    $conn->close();
    ?>
</body>
</html>
