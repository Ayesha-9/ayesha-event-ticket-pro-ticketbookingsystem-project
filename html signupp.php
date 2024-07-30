<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Event login</title>
 <style>
 body {
    font-family: 'Arial', sans-serif;
    background: #f5f5f5;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.signupp {
    width: 400px;
    margin: 0 auto;
    background: #3498db;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
    text-align: center;
}

h2 {
    color: #ddf0f5;
}

.form-group {
    margin: 15px 0;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin-bottom: 15px;
    border: 2px solid #bdc3c7;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    background: #2ecc71;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease;
}

button:hover {
    background: #25ae60;
}
</style>

</head>
<body>
<div class="signupp">

<h2>Signup</h2>
<form action="signupp.php" method="post">
      <input type="text" name="username" id="" placeholder="Enter user name" required><br><br>
      <input type="email" name="email" id="" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
      <input type="password" name="password" id="" placeholder="Password" required minlength="6"><br><br>
      <input type="number" name="Phone_Number" id="" placeholder="Phone_Number" required><br><br>
      <button type="submit" name="submit">Sign Up</button>

</form>


</body>
</html>

