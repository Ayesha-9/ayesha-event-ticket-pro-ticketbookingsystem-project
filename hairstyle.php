<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('http://localhost/Hpgimages/Hairstylist2.jpg');
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
        }

        h1, h2, h3 {
            color: #3498db;
        }

        h2 {
            font-size: 1.5rem;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div id="step1">
    <h1>Hair Stylist: Sonya Stylist</h1>
    <label for="HairstyleOption">Select Hairstyle packages:</label>
    <select id="HairstyleOption" required>
        <option style="font-size: 20px; font-family: 'Times New Roman', bold, serif;"value="Haircut">Haircut </br> [package includes Haircut + Blowdry + Wash]</option>
        <option style="font-size: 20px; font-family: 'Times New Roman', bold, serif;"value="Hair_Colouring">Hair Colouring </br> [package includes Highlights + Wax]</option>
        <option style="font-size: 20px; font-family: 'Times New Roman', bold, serif;"value="Hair_Treatments">Hair Treatments </br> [package includes Smoothening + Keratin Treatment]</option>
        <option style="font-size: 20px; font-family: 'Times New Roman', bold, serif;"value="Hair_Spa">Hair Spa </br> [package includes Hair Oil Massage + Wash]</option>
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
    <input type="text" id="name" required/>
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
            var selectedOption = $("#HairstyleOption").val();
            var totalAmount = getHairstylePrice(selectedOption);

            if (!totalAmount) {
                console.error("Invalid hairstyle option selected");
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
            var HairstyleOption = $("#HairstyleOption").val();
            var HairstylistName = $("h1").text().split(':')[1].trim();

            $.ajax({
                type: "POST",
                url: "hairstyle_db_connection.php",
                data: {
                    name: name,
                    phone: phone,
                    date: date,
                    location: location,
                    totalAmount: totalAmount, // Use totalAmount directly
                    HairstyleOption: HairstyleOption,
                    HairstylistName: HairstylistName
                },
                success: function (response) {
                    alert("Congratulations, your booking is confirmed.");
                    location.reload();
                }
            });
        });

        function getHairstylePrice(option) {
            var HairstylePrices = {
                Haircut: 500,
                Hair_Colouring: 2350,
                Hair_Treatments: 3999,
                Hair_Spa:500
            };

            return HairstylePrices[option];
        }
    });
</script>


</body>
</html>
