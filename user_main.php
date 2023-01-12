<?php
require "config.php";
if(!empty($_SESSION["id"])){
    $ids = $_SESSION["id"];
    $results = mysqli_query($conn, "SELECT * FROM tb_users WHERE id = $ids");
    $rows = mysqli_fetch_assoc($results);
}

else {
  header("location: login.php");
}
?>


<?php
$servername= "localhost";
$username = "root";
$password = "";
$database = "db_log";

// create connection for the database
$connection = new mysqli($servername, $username, $password, $database);

$fullname = "";
$dateOfBirth = "";
$PlacefBirth = "";
$fathername = "";
$mothername = "";
$homeaddress = "";
$StateOfOrigin = "";
$postal = "";
$email = "";
$phone = "";
$gender = "";

$errorMessage ="";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST["fullname"];
    $dateOfBirth =  $_POST["dob"];
    $PlacefBirth =  $_POST["pob"];
    $fathername =  $_POST["fathername"];
    $mothername =  $_POST["mothername"];
    $homeaddress =  $_POST["homeaddress"];
    $StateOfOrigin =  $_POST["soo"];
    $postal = $_POST["postal"];
    $email =  $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];

    do {
        if ( empty($fullname) || empty($dateOfBirth) || empty($PlacefBirth) || empty($fathername) || empty($mothername) || empty($homeaddress) || empty($StateOfOrigin) || empty($postal) || empty($email) || empty($phone) || empty($gender) ) {
            $errorMessage = "All the fields are required.";
            break;
        }

        // add new user to database

        $sql = "INSERT INTO userinfos (fullname, dob, pob, fathername, mothername, homeaddress, soo, postal, email, phone, gender) " .
               "VALUES ('$fullname', '$dateOfBirth', '$PlacefBirth', '$fathername',  '$mothername',  '$homeaddress', '$StateOfOrigin', '$postal', '$email', '$phone', '$gender')";
        $result = $connection->query($sql);

        if (!$result) {
            # code...
            $errorMessage = "Invalid query" . $connection->error;
            break;
        }

        $fullname = "";
        $dateOfBirth = "";
        $PlacefBirth = "";
        $fathername = "";
        $mothername = "";
        $homeaddress = "";
        $StateOfOrigin = "";
        $postal = "";
        $email = "";
        $phone = "";
        $gender = "";

        $successMessage = "User added Correctly.";
        header("location: user_main.php");
        exit;

    } while (false);
}

 ?>



<!DOCTYPE html>
<html>
<title>Birth Registration System</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="background-color_themes.css">
<style>
html,
body,
h1,
h2,
h3,
h4,
h5 {
    font-family: "Raleway", sans-serif
}
</style>

<body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;</button>
        <span class="w3-bar-item w3-right">Online Birth Registration System</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="avatar1.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome, <?php echo $rows["fullname"];?></span><br>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="signout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding tablink w3-aqua" onclick="openCity(event,'home')"><i
                    class="fa fa-users fa-fw"></i>&nbsp;
                Home</a>
            <a href="#" class="w3-bar-item w3-button w3-padding tablink" onclick="openCity(event,'add')"><i
                    class="fa fa-globe fa-fw"></i>&nbsp; Add Details</a>
            <a href="#" class="w3-bar-item w3-button w3-padding tablink" onclick="openCity(event,'manage')"><i
                    class="fa fa-database fa-fw"></i>&nbsp; Manage
                Details</a>
            <a href="signout.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-power-off fa-fw"></i>&nbsp;
                Logout</a>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="w3-container w3-panel w3-aqua" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div id="home" class="w3-container city">
          <div class="w3-display-container">
            <img src="bg3.jpg" alt="family" style="width: 100%;">
            <div class=" w3-display-middle w3-xxlarge w3-white w3-text-black"><strong>
              Happy Home,Happy Family.<hr>
            </strong></div>
          </div>
         </div>


        <div id="add" class="w3-container city" style="display: none;">
          <div class="container">
            <?php
            if ( !empty($errorMessage) ) {
              echo "
              <div class='w3-panel w3-red w3-round-large'>
              <p><b>Warning!</b></p>
              <strong>$errorMessage</strong
              </div>
              ";
            }
            ?>
          </div>

            <form method="post" class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin">
                <h2 class="w3-center">Birth Registration Form</h2>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-user"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="fullname" type="text" placeholder="Full Name"
                            value="<?php echo $fullname; ?>">
                    </div>
                </div>


                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-calendar"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="dob" type="date" placeholder="Date of Birth"
                            value="<?php echo $dateOfBirth; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-institution"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="pob" type="text" placeholder="Place of Birth"
                            value="<?php echo $PlacefBirth; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-male"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="fathername" type="text" placeholder="Father's Name"
                            value="<?php echo $fathername; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-female"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="mothername" type="text" placeholder="Mother's Name"
                            value="<?php echo $mothername; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-address-card"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="homeaddress" type="text" placeholder="Home Address"
                            value="<?php echo $homeaddress; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-globe"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="soo" type="text" placeholder="State Of Origin"
                            value="<?php echo $StateOfOrigin; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-compass"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="postal" type="text" placeholder="Postal Code"
                            value="<?php echo $postal; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-envelope-o"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="email" type="text" placeholder="Email"
                            value="<?php echo $email; ?>">
                    </div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-phone"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone"
                            value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="w3-row-padding">
                  <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-users"></i></div>
                  <div class="w3-rest">
                 <div class="w3-third">
                   <input class="w3-radio" type="radio" name="gender" value="male" checked>
                    <label for="Male">Male</label>

                    <input class="w3-radio" type="radio" name="gender" value="female">
                     <label for="Femle">Famle</label>

                      <input class="w3-radio" type="radio" name="gender" value="other (Disable)">
                       <label for="Other">Other (Disable)</label>
                     </div>
                 </div>
                </div>
                <div class="container">
                <?php
                if ( !empty($sucessMessage) ) {
                  echo "
                  <div class='w3-panel w3-pale-green w3-round-large'>
                  <p><b>Successfull!</b></p>
                  <strong>$sucessMessage</strong
                  </div>
                  ";
                }
                ?>
                </div>

                <input class="w3-button w3-block w3-section w3-round-xlarge w3-aqua w3-ripple w3-padding"
                    type="submit">
            </form>

        </div>

        <div id="manage" class="w3-container city" style="display: none;">
            <div class="w3-container">
                <div class="w3-responsive">
                    <table class="w3-table-all">
                        <thead>
                            <tr class="w3-pale-green">
                                <td>ID</td>
                                <th>Full Name</th>
                                <th>Date of Birth</th>
                                <th>Place of Birth</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Home Address</th>
                                <th>State of Origin</th>
                                <th>Postal Code</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Submited at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername= "localhost";
                            $username = "root";
                            $password = "";
                            $database = "db_log";

                            // create connection for tge database
                            $connection = new mysqli($servername, $username, $password, $database);

                            // check for connection
                            if ($connection ->connect_error) {
                                die("Connection Failed " . $connection ->connect_error);
                            }

                            // read all roll from database table
                            $sql = "SELECT * FROM userinfos";
                            $result = $connection->query($sql);

                            if (!$result) {
                                die("Invalid query: " . $connection->error);
                            }

                            // read data of each row
                            while($row = $result->fetch_assoc()) {
                                echo
                                 "
                                 <tr>
                                 <td>$row[id]</td>
                                 <td>$row[fullname]</td>
                                 <td>$row[dob]</td>
                                 <td>$row[pob]</td>
                                 <td>$row[fathername]</td>
                                 <td>$row[mothername]</td>
                                 <td>$row[homeaddress]</td>
                                 <td>$row[soo]</td>
                                 <td>$row[postal]</td>
                                 <td>$row[email]</td>
                                 <td>$row[phone]</td>
                                 <td>$row[gender]</td>
                                 <td>$row[submitted_at]</td>

                                 <td>
                                     <a class='w3-btn w3-bar-block w3-aqua w3-round-large' href='edit.php?id=$row[id]' style='margin:5px;'>Edit</a>
                                     <a class='w3-btn w3-bar-block w3-red w3-round-large' href='delete.php?id=$row[id]'>Delete</a>
                                 </td>
                             </tr>
                                ";
                            }

                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- Footer -->
        <footer class="w3-container w3-padding-16 w3-panel w3-dark-gray">

            <div class="w3-left w3-padding-large">
                Designed by <a href="#" target="_blank" style="color: yellow;"> HackHarik</a>
            </div>
            <div class="w3-right w3-padding-large">
                Copyright; 2022 <a href="#" target="_blank" style="color: yellow;"> BRCC.</a> All Right Reserved
            </div>
        </footer>

        <!-- End page content -->
    </div>


    <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
    </script>

    <script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-aqua", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " w3-aqua";
    }
    </script>



</body>


</html>
