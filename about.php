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
    <title>About Page</title>
</head>

<style>
body,
h1,
h4,
p {
    font-family: sans-serif;
    font-size: 20px;
}

body,
html {
    height: 100%
}

.bgimg {
    background-color: white;
    min-height: 100%;
    background-position: center;
    background-size: cover;
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

    <div id="main" class="bgimg w3-display-container w3-animate-opacity w3-text-black">
        <!-- logo -->
        <div class="w3-large">
            <button id="openNav" class="w3-button w3-right w3-text-black w3-hide-medium w3-hide-large w3-large"
                onclick="w3_open()">&#9776;</button>
            <a href="#"
                class="w3-bar-item w3-button w3-hide-small w3-hover-none w3-border-white w3-hover-border-grey w3-hover-text-gray">
                <b>BRCC</b>
            </a>
            <a href="contact.php"
                class="w3-bar-item w3-button w3-right w3-hover-none w3-text-black w3-hover-text-gray"><i
                    class="fa fa-bell"></i> Contact</a>
            <a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-none w3-text-black w3-hover-text-gray><i
                    class=" fa fa-envelope"></i> About Us</a>
            <div class="w3-dropdown-hover w3-hide-small w3-right">
                <button class="w3-bar-item w3-button w3-hover-none w3-text-black w3-hover-text-gray"><i
                        class="fa fa-sign-in"></i> Login</button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-users"></i> User Login</a>
                    <a href="adminlog.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Admin Login</a>
                </div>
            </div>
            <a href="index.php" class="w3-bar-item w3-button w3-right w3-hover-text-white "><i class="fa fa-home"></i>
                Home</a>
        </div>
        <!-- for the about me home page -->
        <div class="w3-row-padding w3-padding-16" id="about">
            <div class="w3-col m6">
                <img src="bg1.jpg" alt="BRCC" style="width:100%">
            </div>
            <div class="w3-col m6">
                <img src="bg3.jpg" alt="BRCC" style="width:100%">
            </div>
        </div>

        <div class="w3-container w3-padding-large" style="margin-bottom:32px">
            <h4 style="color: black;"><b>About BRCC</b></h4>
            <p style="color: black;">Just me, myself and I, exploring the universe of unknownment. I have a heart of
                love and an interest of
                lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus
                ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                congue gravida diam non fringilla.</p>
            <hr>

            <h4>Gender statistics</h4>
            <!-- Progress bars / Gender -->
            <p>Male</p>
            <div class="w3-grey">
                <div class="w3-container w3-black w3-padding w3-center" style="width:85%">85%</div>
            </div>
            <p>Female</p>
            <div class="w3-grey">
                <div class="w3-container w3-black w3-padding w3-center" style="width:75%">75%</div>
            </div>
            <p>Others (Disable)</p>
            <div class="w3-grey">
                <div class="w3-container w3-black w3-padding w3-center" style="width:35%">35%</div>
            </div>
            <hr>
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