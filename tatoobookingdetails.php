<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tattoo Event Booking Details</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-image: url(http://localhost/fifthsempro/Hpgimages/tattoo3.jpg);
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
        flex-wrap: wrap; /* Allow containers to wrap to the next line */
        justify-content: space-around;
        margin-top: 20px;
    }

    .booking {
        box-sizing: border-box;
        margin: 10px;
        padding: 20px;
        border: 1px solid #ddd;
        width: calc(20% - 20px); /* Adjusted to take 50% of the container width */
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        text-align: left;
        color: #080808;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        
    }

    p {
        margin: 10px 0;
        font-family: Nortune;
        color: #080808;
        font-size:21px;
    }

    h2 {
        color: rgb(18, 1, 44);
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
$dbname = "tattoo_artist";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 // Assuming you have a unique identifier for each booking, adjust this accordingly

 $sql = "SELECT * FROM tattoo";
 $result = $conn->query($sql);

 
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $name = $row['name'];
         $phone = $row['phone'];
         $date = $row['date'];
         $location= $row['location'];
         $totalTickets = $row['total_tickets'];
         $totalAmount = $row['total_amount'];
         $artistName = $row['artistName'];
         // Display the retrieved data on the page
         echo "<div class='booking'>";
         echo "<h2>Booking Details</h2>";
         echo "<p>Name: $name</p>";
         echo "<p>Phone: $phone</p>";
         echo "<p>Date: $date</p>";
         echo "<p>Location: $location</p>";
         echo "<p>Total Tickets: $totalTickets</p>";
         echo "<p>Total Amount: ₹$totalAmount</p>";
         echo "<p>artistName: $artistName</p>";
         echo "</div>";
     }
 } else {
    echo "<div class='booking'>";
    echo "<h2>No bookings done yet!</h2>";
    echo "</div>";
 }
 
 $conn->close();

?>



</body>
</html>
