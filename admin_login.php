<?php

$conn=mysqli_connect("localhost","root","","admin_event");

if(!$conn){
    echo "No connection" . mysqli_connect_error(); 
}

if(isset($_POST["submit"])){
     
    $uname=$_POST["uname"];
    $pwd=$_POST["pwd"];

    if (strlen($pwd) < 6) {
        echo "<script>alert('Password should be at least 6 characters long');</script>";
        exit();
    }

    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

    // Hash the password before storing it
    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

    $query="INSERT INTO admin(uname,pwd) VALUES ('$uname','$pwd')";
    $result=mysqli_query($conn,$query);

    if($result){
        echo"Successfull";
    }
    else
    {
        echo"UnSuccessfull";
    }
    header("Location:Adminpage.html");
exit();
}