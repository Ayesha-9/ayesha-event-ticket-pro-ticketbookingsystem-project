<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

        form {
            width: 300px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
        }

        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #bdc3c7;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background: #3498db;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2980b9;
        }
    </style>
</head>

<body>
    <form action="admin_login.php" method="post">
        <h2>Admin Login</h2>
        <input type="text" name="uname" id="" placeholder="Enter username" required><br><br>
    <input type="password" name="pwd" id="" placeholder="Password" required minlength="6"><br><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>

</html>
