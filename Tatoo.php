<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('http://localhost/Hpgimages/tattoo3.jpg');
            background-size: cover;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #step1, #step2, #step3 {
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
        }

        h1, h2, h3 {
            color: #3498db;
        }

        h2 {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        label {
            color: white;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #c0392b;
        }

        #step2, #step3 {
            display: none;
        }
    </style>
</head>
<body>

<div id="step1">
    <h1>Artist: Aish Tattoo Artist</h1>
    <h3>Designs can be selected on spot</h3>
    <h2>Enter Size of Tattoo (In inches):</h2>
    <input type="number" id="ticketCount" min="1" max="8" />
    <button id="ticketBtn">Enter</button>
</div>

<div id="step2">
    <h2>Total Amount</h2>
    <p id="totalAmount"></p>
    <button id="continueBtn">Continue</button>
</div>

<div id="step3">
    <h2>User Details</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" />
    <br>
    <br>
    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" />
    <br>
    <br>
    <label for="date">Select Date:</label>
    <input type="date" id="date">
    <br>
    <label for="location">Enter Location (Bangalore only):</label>
    <input type="text" id="location" placeholder="Type location">
    <br>
    <select id="payment" name="payment" required>
        <option value="debitCard">Debit Card</option>
        <option value="upi">UPI Apps (Phonepay/Gpay/Paytm)</option>
        <option value="credit card">Credit Card</option>
    </select>
    <br><br><br><br>

    <br>
    <button id="submitBtn">Book Now</button>
</div>

<script>
    $(document).ready(function() {
        var eventPrice = 550;
        var totalTickets = 0;

        $("#ticketBtn").click(function() {
            totalTickets = $("#ticketCount").val();
            var totalAmount = totalTickets * eventPrice;
            $("#totalAmount").text("₹" + totalAmount);
            $("#step1").hide();
            $("#step2").show();
        });

        $("#continueBtn").click(function() {
            $("#step2").hide();
            $("#step3").show();
        });

        $("#submitBtn").click(function() {
            var name = $("#name").val();
            var phone = $("#phone").val();
            var date = $("#date").val();
            var location = $("#location").val();
            var artistName = $("h1").text().split(':')[1].trim();

            $.ajax({
                type: "POST",
                url: "tatoo_db_connection.php",
                data: {
                    name: name,
                    phone: phone,
                    date: date,
                    location: location,
                    totalTickets: totalTickets,
                    totalAmount: totalTickets * eventPrice,
                    artistName: artistName
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
