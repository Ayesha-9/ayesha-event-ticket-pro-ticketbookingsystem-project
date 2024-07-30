<?php

$conn_signup = mysqli_connect("localhost", "root", "", "event_ticket_booking");

if (!$conn_signup) {
    echo "No connection" . mysqli_connect_error();
}

if (isset($_POST["submit"])) {

    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $Phone_Number = $_POST["Phone_Number"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
        exit();
    }

    // Check if the email is already registered
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmtCheckEmail = mysqli_prepare($conn_signup, $checkEmailQuery);
    mysqli_stmt_bind_param($stmtCheckEmail, "s", $email);
    mysqli_stmt_execute($stmtCheckEmail);
    $checkEmailResult = mysqli_stmt_get_result($stmtCheckEmail);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        echo "<script>alert('Email already registered');</script>";
        exit();
    }

    // Validate phone number format
    if (!preg_match("/^[0-9]{10}$/", $Phone_Number)) {
        echo "<script>alert('Invalid phone number format');</script>";
        exit();
    }

    // Validate password (add more conditions as needed)
    if (strlen($password) < 6) {
        echo "<script>alert('Password should be at least 6 characters long');</script>";
        exit();
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO users ( username, email, password, Phone_Number) VALUES ( ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn_signup, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss",  $username, $email, $hashedPassword, $Phone_Number);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('Signup Successful');</script>";
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Signup Unsuccessful');</script>";
    }

    header("Location: html login.php");
    exit();
    mysqli_close($conn_signup);
}

?>
