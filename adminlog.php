<?php
require 'adminconfig.php';
if (!empty($_SESSION["id"])){
    header("location:admin_main.php");
}
if(isset($_POST["submit"])){
    $AdminNameEmail = $_POST["AdminNameEmail"];
    $password = $_POST["password"];
    $result = mysqli_query($config, "SELECT * FROM tb_admins WHERE fullname = '$AdminNameEmail' OR email = '$AdminNameEmail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: admin_main.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
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
    <title>Admin Login Panel</title>
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
    width: 420px;
    height: 560px;
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
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);

}

h1 {
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 20px;

}

h5 {
    margin: 2px;
    padding: 15px;
    text-align: center;
    font-size: 10px;

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
input[type="password"] {
    border: none;
    border-bottom: 1px solid white;
    background: transparent;
    height: 40px;
    font-size: 16px;
    color: whitesmoke;
}


.signupbox input[type="submit"] {
    margin-top: 10px;
    padding: 10px;
    border: none;
    outline: none;
    height: 50px;
    width: 358px;
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
        <h1> <strong> Input You Details to Login</strong></h1>
        <h5><strong>Login to admin panel</strong></h5>
        <form action="" method="POST">
            <p>Full Name or Email</p>
            <input class="w3-input" type="text" name="AdminNameEmail" id="AdminNameEmail"
                placeholder="Enter Full Name or Email " required>
            <p>Password</p>
            <input class="w3-input" type="password" name="password" id="password" placeholder="Enter Password"><br>
            <input type="submit" name="submit" value="Submit">
            <p> <a href="forget.php" style="color:dodgerblue">Forget Password</a>.</p><br>
            <p>Don't have an account with us? <a href="adminreg.php" style="color:dodgerblue">Register Here</a>.</p><br>
            <p>Redirect back to <a href="index.php" style="color:dodgerblue">Home Page</a>.</p><br>



        </form>
    </div>
</body>

</html>
