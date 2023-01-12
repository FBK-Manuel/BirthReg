<?php
require 'config.php';
if (!empty($_SESSION["id"])){
    header("location:user_main.php");
}
if(isset($_POST['submit'])){
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password_1"];
    $comfirmPassword = $_POST["password_2"];
    $duplicate= mysqli_query($conn, "SELECT * FROM tb_users WHERE fullname='$name' OR email='$email'");
    if (mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Fullname or Email Address is taken already');</script>";
    }
    else {
        if($password == $comfirmPassword){
            $query = "INSERT INTO tb_users VALUES('', '$name', '$email', '$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successfull! Now Login.');</script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match');</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Registration Form</title>
</head>

<style>
* {
    margin: 0;
    padding: 0;
}

html,
body {
    height: 100%
}

body {
    /* background-color: whitesmoke; */
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
    min-height: 100%;
    background-position: center;
    background-size: cover;

}

.signupbox {
    width: 520px;
    height: 700px;
    background: rgb(26, 25, 25);
    color: white;
    top: 49%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 70px 30px;
    margin: 10px;
}

.avatar {
    margin-bottom: 10px;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    position: absolute;
    top: -30px;
    left: calc(50% - 50px);

}

h1 {
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 20px;

}

p {
    margin: auto;
    padding: 0;
    font-family: serif;
    font-size: 15px;
}


.signupbox p {
    margin: 0;
    padding: 0;
    font-weight: bold;
}


.signupbox input {
    width: 100%;
    margin-bottom: 20px;
}

.signupbox input[type="text"],
input[type="password"],
input[type="email"] {
    border: none;
    border-bottom: 1px solid white;
    background: transparent;
    height: 40px;
    font-size: 16px;
    color: whitesmoke;
}


.signupbox input[type="submit"] {
    margin-top: 5px;
    padding: 2px;
    border: none;
    outline: none;
    height: 45px;
    width: 458px;
    background: white;
    font-size: 15px;
    border-radius: 20px;
    color: black;
}

.signupbox input[type="submit"]:hover {
    cursor: pointer;
    background: grey;
    color: white;
}
</style>

<body>
    <div class="signupbox">
        <img src="avatar1.png" class="avatar">
        <h1> <strong> Input You Details to Register</strong></h1>
        <form action="" method="POST">
            <p>Full Name</p>
            <input class="w3-input" type="text" name="fullname" id="fullname" placeholder="Enter Full Name " required>
            <p>Email</p>
            <input class="w3-input" type="email" name="email" id="email" placeholder="Enter Email Address " required>
            <p>Password</p>
            <input class="w3-input" type="password" name="password_1" id="password" placeholder="Enter Password"><br>
            <p>Confirm Password</p>
            <input class="w3-input" type="password" name="password_2" id="comfirm Password"
                placeholder="Repeat Password"><br>
            <input type="submit" name="submit" value="Submit">
            <p>Login to your account <a href="login.php" style="color:dodgerblue">Login</a>.</p><br>
            <p>Redirect back to <a href="index.php" style="color:dodgerblue">Home Page</a>.</p><br>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        </form>
    </div>
</body>

</html>
