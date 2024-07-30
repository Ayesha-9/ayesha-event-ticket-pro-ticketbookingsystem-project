<!DOCTYPE html>
<html lang="en">
<head>
    <title>Makeup Artist Booking Process</title>
    <style>
        body {
            background-image: url('http://localhost/Hpgimages/Makeup2.jpg');
            background-size: cover;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #ccc;
        }

        h1, h2 {
            color: #fff;
        }

        #step1, #step2, #step3 {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 400px;
            text-align: center;
        }

        input, select, button {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #ff4081;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #d81b60;
        }

        #step2, #step3 {
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div id="step1">
    <h1>Artist: Zara Makeup Artist</h1>
    <label for="makeupOption">Select Makeup Option:</label>
    <select id="makeupOption" required>
        <option style="font-size: 20px; font-family: 'Arial', bold, sans-serif;"value="Regular">Regular Makeup</option>
        <option style="font-size: 20px; font-family: 'Arial', bold, sans-serif;"value="Party">Party Makeup</option>
        <option style="font-size: 20px; font-family: 'Arial', bold, sans-serif;"value="Bridal">Bridal Makeup</option>
    </select>
    <br>
    <button id="continueBtn">Continue</button>
</div>

<div id="step2">
    <h2>Total Amount</h2>
    <p id="totalAmount"></p>
    <button id="continueBtn2">Continue</button>
</div>

<div id="step3">
    <h2>User Details</h2>
    <label>Name:</label>
    <input type="text" id="name" />
    <br>
    <label>Phone Number:</label>
    <input type="tel" id="phone" />
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
    <br><br>
    <button id="submitBtn">Book Now</button>
</div>


<script>
    $(document).ready(function () {
        $("#continueBtn").click(function () {
            var selectedOption = $("#makeupOption").val();
            var totalAmount = getMakeupPrice(selectedOption);

            if (!totalAmount) {
                console.error("Invalid makeup option selected");
                return;
            }

            $("#totalAmount").text("₹" + totalAmount);
            $("#step1").hide();
            $("#step2").show();
        });

        $("#continueBtn2").click(function () {
            $("#step2").hide();
            $("#step3").show();
        });

        $("#submitBtn").click(function () {
            var name = $("#name").val();
            var phone = $("#phone").val();
            var date = $("#date").val();
            var location = $("#location").val();
            var totalAmount = $("#totalAmount").text().replace('₹', ''); // Extract the amount without ₹
            var makeupOption = $("#makeupOption").val();
            var artistName = $("h1").text().split(':')[1].trim();

            $.ajax({
                type: "POST",
                url: "makeup_db_connection.php",
                data: {
                    name: name,
                    phone: phone,
                    date: date,
                    location: location,
                    totalAmount: totalAmount, // Use totalAmount directly
                    makeupOption: makeupOption,
                    artistName: artistName
                },
                success: function (response) {
                    alert("Congratulations, your booking is confirmed.");
                    location.reload();
                }
            });
        });

        function getMakeupPrice(option) {
            var makeupPrices = {
                Regular: 2000,
                Party: 4000,
                Bridal: 6000
            };

            return makeupPrices[option];
        }
    });
</script>


</body>
</html>
