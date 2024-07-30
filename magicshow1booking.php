<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/8c98abcd02.js" crossorigin="anonymous"></script>
    <title>Booking Process</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
        text-align: center;
        color: #333;
    }
    header {
        background-color: #d3d1d1;
        color: black;
        text-align: center;
        padding: 1em 0;
    }
    footer {
        background-color: #d3d1d1;
        color: black;
        text-align: center;
        padding: 1em 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        height:16%;
    }


    h1, h2 {
        color: #673AB7;
    }

    .step {
        background-color: #fff;
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none;
    }

    button {
        background-color: #673AB7;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #512DA8;
    }

    input, select {
        width: 30%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 5px;
    }

    #totalAmount {
        font-size: 20px;
        font-weight: bold;
        color: #E91E63;
    }
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <h5 style="color: red;font-family: 'Rubik One'; font-size:21px;"><b><i class="fa-solid fa-c fa-beat-fade"></i> | CONTRABAND</h5>
    </header>

<div id="step1">
    <h1>Show Name: Enchanted Dreams.Mystical Delights</h1>
    <p>Date: 2023-12-23</P> 
    <p>Time: 08:00</p> 
    <p>Location:  #402, 6th Cross Road, Silicon Town, Electronic City Phase 2, Bangalore - 560100 (Near Shuttle Court)</p>
    <button id="bookBtn">Continue</button>
</div>
<div id="step2" style="display: none;">
    <h2>Enter Number of Tickets</h2>
    <input type="number" id="ticketCount" min="1" max="10" />
    <button id="ticketBtn">Enter</button>
</div>

<div id="step3" style="display: none;">
    <h2>Total Amount</h2>
    <p id="totalAmount"></p>
    <button id="continueBtn">Continue</button>
</div>

<div id="step4" style="display: none;">
    <h2>User Details</h2>
    <label>Name:</label>
    <input type="text" id="name" />
    <br>
    <label>Email:</label>
    <input type="email" id="email" />
    <br>
    <label>Phone Number:</label>
    <input type="tel" id="phone" />
    <br>
    <br>
    <select id="payment" name="payment" required>
        <option value="debitCard">Debit Card</option>
        <option value="upi">UPI Apps(Phonepay/Gpay/Paytm)</option>
        <option value="credit card">Credit Card</option>
    </select> <br><br><br><br>

    <br>
    <button id="submitBtn">Book Now</button>
</div>


<script>
    $(document).ready(function() {
        var ticketPrice = 350; // Change this value as per the actual ticket price
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
            var showName = $("#showName").val();
            var showDate = $("#showDate").val();
            var showTime = $("#showTime").val();
            var showLocation = $("#showLocation").val();
        


            $.ajax({
                type: "POST",
                url: "db_connection.php",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    totalTickets: totalTickets,
                    totalAmount: totalTickets * ticketPrice,
                    showName: showName,
                    showDate: showDate,
                    showTime: showTime,
                    showLocation: showLocation
                },
                success: function(response) {
                    alert("Congratulations, your booking is confirmed.");
                    location.reload();
                }
            });
        });
    });
</script>
    <footer>
        <p style="color: red;font-family: 'Rubik One';font-size:18px;"><b>CONTACT US<b></p>
        <p>India: +91 8912340844</P>
        <p>Request a Call Back</P>
        <p>Event Enquiries</P>
    </footer>
</body>
</html>
