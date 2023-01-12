<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="background-color_themes.css">
    <title>Contact Page</title>
</head>

<style>
body,
h1 {
    font-family: "Raleway", sans-serif
}

body,
html {
    height: 100%
}

.bgimg {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(bg2.jpg);
    min-height: 100%;
    background-position: center;
    background-size: cover;
}

.signupbox {
    width: 420px;
    height: 600px;
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
    <!-- navbar on smallscreens -->
    <div class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-block" onclick="w3_close()"><b
                style="color: whitesmoke;">Close</b>
            &times;</button>
        <a href="index.php" class="w3-item-bar w3-button w3-bar-block w3-hover-none w3-text-white w3-hover-text-yellow">
            <i class="fa fa-home"></i> Home</a>
        <div class=" w3-dropdown-hover">
            <button class="w3-bar-item w3-button w3-hover-none w3-text-white w3-hover-text-yellow"><i
                    class="fa fa-caret-down"></i> Login</button>
            <div class="w3-dropdown-content w3-bar-block">
                <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-users"></i> User Login</a>
                <a href="adminlog.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Admin Login</a>
            </div>
        </div>
        <a href="about.php"
            class="w3-item-bar w3-button w3-bar-block w3-hover-none w3-text-white w3-hover-text-yellow"><i
                class="fa fa-envelope"></i> About Us</a>

    </div>

    <!-- navbar on full screen!!!! -->

    <div id="main" class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <!-- logo -->
        <div class="w3-large">
            <button id="openNav" class="w3-button w3-right w3-hide-medium w3-hide-large w3-large"
                onclick="w3_open()">&#9776;</button>
            <a href="#"
                class="w3-bar-item w3-button w3-hide-small w3-hover-none w3-border-white w3-hover-border-grey w3-hover-text-grey">
                <b>BRCC</b>
            </a>
            <a href="contact.php"
                class="w3-bar-item w3-button w3-right w3-hover-none w3-text-yellow w3-hover-text-white"><i
                    class="fa fa-bell"></i> Contact</a>
            <a href="about.php"
                class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-none w3-text-yellow w3-hover-text-white"><i
                    class="fa fa-envelope"></i> About Us</a>
            <div class="w3-dropdown-hover w3-hide-small w3-right">
                <button class="w3-bar-item w3-button w3-hover-none w3-text-yellow w3-hover-text-white"><i
                        class="fa fa-sign-in"></i> Login</button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-users"></i> User Login</a>
                    <a href="adminlog.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Admin Login</a>
                </div>
            </div>
            <a href="index.php" class="w3-bar-item w3-button w3-right w3-hover-text-white "><i class="fa fa-home"></i>
                Home</a>
        </div>
        <!-- for the write ups in the home page -->

        <div class="signupbox">
            <img src="avatar1.png" class="avatar">
            <h1> <strong> Contact Us</strong></h1>
            <form action="" method="POST">
                <p>Full Name</p>
                <input class="w3-input" type="text" name="name" id="name" placeholder="Enter Full Name " required>
                <p>Email</p>
                <input class="w3-input" type="text" name="email" id="email" placeholder="Enter Email" required><br>
                <p>Phone</p>
                <input class="w3-input" type="text" name="number" id="number" placeholder="Enter Phone Number"
                    required><br>
                <p>Message</p>
                <input class="w3-input" type="text" name="message" id="message" placeholder="Enter Your Message"
                    required><br>
                <input type="submit" name="submit" value="Submit">

            </form>
        </div>
    </div>




</body>

</html>


<script>
// Used to toggle the menu on smaller screens when clicking on the menu button
function w3_open() {
    document.getElementById("main").style.marginLeft = "50%";
    document.getElementById("mySidebar").style.width = "50%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
}

function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}
</script>