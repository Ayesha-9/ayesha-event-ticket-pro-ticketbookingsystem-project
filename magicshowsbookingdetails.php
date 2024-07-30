<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Magic Show Booking Details</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-image: url(http://localhost/fifthsempro/Hpgimages/m1sa.avif);
    background-size: cover;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
}

h1 {
    text-align: center;
}

.booking-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;

}

.booking {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        width:calc(20% - 20px);
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        text-align: left;
        color: #333;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

p {
    margin: 10px 0;
    font-family: Integral;
    color: rgb(17, 17, 17);
    font-size:18px;
}

h2 {
    color: #3498db;
}

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
        }

p {
    margin-bottom: 10px;
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
$dbname = "magic_show";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 // Assuming you have a unique identifier for each booking, adjust this accordingly

 $sql = "SELECT * FROM bookings";
 $result = $conn->query($sql);

 
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $name = $row['name'];
         $email = $row['email'];
         $phone = $row['phone'];
         $totalTickets = $row['total_tickets'];
         $totalAmount = $row['total_amount'];
         $showName = $row['show_name'];
         $showDate = $row['show_date'];
         $showTime = $row['show_time'];
         $showLocation = $row['show_location'];
         
         // Display the retrieved data on the page
         echo "<div class='booking'>";
         echo "<h2>Booking Details</h2>";
         echo "<p>Name: $name</p>";
         echo "<p>Email: $email</p>";
         echo "<p>Phone: $phone</p>";
         echo "<p>Total Tickets: $totalTickets</p>";
         echo "<p>Total Amount: ₹$totalAmount</p>";
         echo "<p>Show Name: $showName</p>";
         echo "<p>Show Date: $showDate</p>";
         echo "<p>Show Time: $showTime</p>";
         echo "<p>Show Location: $showLocation</p>";
         echo "</div>";
     }
 } else {
     echo "No bookings done yet!";
 }
 
 $conn->close();

?>



</body>
</html>
