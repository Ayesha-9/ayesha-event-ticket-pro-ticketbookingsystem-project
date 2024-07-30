<!DOCTYPE html>
<html>
<head>
    <title>Booking Process</title>
    <style>
        body {
            background-image: url(http://localhost/Hpgimages/movie.avif);
            background-size: cover;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
            padding: 20px; /* Add padding to create space between content and edges */
            display: flex;
            justify-content: flex-start; /* Align content to the left */
            align-items: center; /* Center content vertically */
            min-height: 100vh; /* Ensure the page takes at least the full height of the viewport */
        }

        #step1, #step2, #step3, #step4 {
            max-width: 600px; /* Set a maximum width for better readability */
            margin-right: 20px; /* Add margin between steps */
            background-color: rgba(0, 0, 0, 0.8); /* Add a semi-transparent white background */
            padding: 20px; /* Add padding for better spacing */
            border-radius: 10px; /* Add rounded corners to the boxes */
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        h1, h2, h3 {
            color: #3498db;
            text-align: center; /* Center text */
        }

        p{
            text-align: center; 
        }


        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            margin: 0 auto; /* Center button */
        }

        button:hover {
            background-color: #2980b9;
        }

        input, select {
            margin-bottom: 10px; /* Add margin to separate input fields */
            padding: 8px; /* Add padding to input fields */
            width: 100%;
            box-sizing: border-box;
        }

        #totalAmount {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        #step2, #step3, #step4 {
            display: none;
        }
        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div id="step1">
    <h1>Movie Night - Under The Sky</h1>
    <p>Date: 2023-12-25</p> 
    <p>Time: 09:00</p> 
    <p>Location: Grand mercure, Gopalan Mall: Bengaluru, Karnataka 560093, India</p>
    <button id="bookBtn">Continue</button>
</div>

<div id="step2">
    <h2>Enter Number of Tickets</h2>
    <input type="number" id="ticketCount" min="1" max="10" />
    <button id="ticketBtn">Enter</button>
</div>

<div id="step3">
    <h2>Total Amount</h2>
    <p id="totalAmount"></p>
    <button id="continueBtn">Continue</button>
</div>

<div id="step4">
    <h2>User Details</h2>
    <label>Name:</label>
    <input type="text" id="name" />
    </br>
    <label>Email:</label>
    <input type="email" id="email" />
    </br>
    <label>Phone Number:</label>
    <input type="tel" id="phone" />
    </br>
    <select id="payment" name="payment" required>
        <option value="debitCard">Debit Card</option>
        <option value="upi">UPI Apps (Phonepay/Gpay/Paytm)</option>
        <option value="credit card">Credit Card</option>
    </select> </br></br>
    <button id="submitBtn">Book Now</button>
</div>

<script>
    $(document).ready(function() {
        var ticketPrice = 380;
        var totalTickets = 0;

        $("#bookBtn").click(function() {
            $("#step1").hide();
            $("#step2").show();
        });

        $("#ticketBtn").click(function() {
            totalTickets = $("#ticketCount").val();
            var totalAmount = totalTickets * ticketPrice;
            $("#totalAmount").text("₹" + totalAmount);
            $("#step2").hide();
            $("#step3").show();
        });

        $("#continueBtn").click(function() {
            $("#step3").hide();
            $("#step4").show();
        });

        $("#submitBtn").click(function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();

            $.ajax({
                type: "POST",
                url: "theatre_db_connection.php",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    totalTickets: totalTickets,
                    totalAmount: totalTickets * ticketPrice,
                },
                success: function(response) {
                    alert("Congratulations, your booking is confirmed.");
                    location.reload();
                }
            });
        });
    });
</script>

</body>
</html>
