<?php
require "adminconfig.php";
if(!empty($_SESSION["id"])){
    $ids = $_SESSION["id"];
    $results = mysqli_query($config, "SELECT * FROM tb_admins WHERE id = $ids");
    $rows = mysqli_fetch_assoc($results);
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

$errorMessage ="";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
  // GET method: show the data of the userinfos
   if ( !isset($_GET["id"]) ) {
     // code...
     header("location: user_main.php");
     exit;
   }
   $id = $_GET["id"];

   // this read the row of the selected user from the database mysql_list_tables
   $sql = "SELECT * FROM userinfos WHERE id=$id";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   if (!$row) {
     // code...
     header("location: user_main.php");
     exit;
   }

   $fullname = $row["fullname"];
   $dateOfBirth = $row["dob"];
   $PlacefBirth = $row["pob"];
   $fathername = $row["fathername"];
   $mothername = $row["mothername"];
   $homeaddress = $row["homeaddress"];
   $StateOfOrigin = $row["soo"];
   $postal = $row["postal"];
   $email = $row["email"];
   $phone = $row["phone"];
}
else {
  // POST method: Update the data of the userinfos
  $id = $_POST["id"];
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

  do {
    // code...
     if ( empty($id) || empty($fullname) || empty($dateOfBirth) || empty($PlacefBirth) || empty($fathername) || empty($mothername) || empty($homeaddress) || empty($StateOfOrigin) || empty($postal) || empty($email) || empty($phone) ) {
        $errorMessage = "All the fields are required.";
        break;
    }

    $sql = "UPDATE userinfos " .
           "SET Fullname = '$fullname', dob = '$dateOfBirth', pob = '$PlacefBirth', fathername = '$fathername', mothername =  '$mothername', homeaddress =  '$homeaddress', soo = '$StateOfOrigin', postal = '$postal', email = '$email', phone = '$phone' " .
            "WHERE id = $id";

    $result = $connection->query($sql);

    if ( !$result) {
      // code...
      $errorMessage = "Invalid query: " . $connection->error;
      break;
    }

    $sucessMessage = "User updated Correctly";

    header("location: user_main.php");

  } while (false);
}
 ?>

<!DOCTYPE html>
<html>
<title>User View System</title>

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
        <span class="w3-bar-item w3-right">Online Birth Registration System(Admin Panel)</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="avatar6.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome, <?php echo $rows["fullname"];?></span><br>
                <a href="admin_main.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; X</a>
            <a href="#" class="w3-bar-item w3-button w3-padding tablink w3-aqua" onclick="openCity(event,'add')"><i
                    class="fa fa-users fa-fw"></i>&nbsp;
                View Details</a>
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

        <div id="add" class="w3-container city">
                <div class="w3-row w3-section">
                  <label for="fullname">fullname</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-user"></i></div>
                    <div class="w3-rest">
                          <p class="w3-border w3-input">
                            <?php echo $fullname; ?></p>
                    </div>
                </div>


                <div class="w3-row w3-section">
                  <label for="dob">Date of Birth</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-calendar"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $dateOfBirth; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="pob">Place of Birth</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-institution"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $PlacefBirth; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="fathername">Father's Name</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-male"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $fathername; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="mothername">Mother's Name</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-female"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $mothername; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="homeaddress">Home Address</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-address-card"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $homeaddress; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="soo">State of Origin</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-globe"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $StateOfOrigin; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="postal">Postal Code</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-compass"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $postal; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="email">Email Address</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-envelope-o"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $email; ?></p>
                    </div>
                </div>

                <div class="w3-row w3-section">
                  <label for="phone">Phone Number</label>
                    <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-phone"></i></div>
                    <div class="w3-rest">
                      <p class="w3-border w3-input">
                        <?php echo $phone; ?></p>
                    </div>
                </div>
                <!-- <div class="w3-row-padding">
                  <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-users"></i></div>
                  <div class="w3-rest">
                 <div class="w3-third">
                   <input class="w3-radio" type="radio" name="male" value="" checked>
                    <label>Male</label>

                    <input class="w3-radio" type="radio" name="female" value="">
                     <label>Female</label>

                      <input class="w3-radio" type="radio" name="other" value="">
                       <label>Other (Disabled)</label>
                     </div>
                 </div>
                </div> -->
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
