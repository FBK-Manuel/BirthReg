<?php
require "adminconfig.php";
if(!empty($_SESSION["id"])){
    $ids = $_SESSION["id"];
    $results = mysqli_query($config, "SELECT * FROM tb_admins WHERE id = $ids");
    $rows = mysqli_fetch_assoc($results);
}

else {
  header("location: adminlog.php");
}
?>

<!DOCTYPE html>
<html>
<title>Birth Registration System(Admin Panel)</title>

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
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="signout_ad.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
                <a href="admin_main.php" class="w3-bar-item w3-button w3-padding tablink" onclick="openCity(event,'')"><i
                        class="fa fa-search fa-fw"></i>&nbsp; Home
            <a href="#" class="w3-bar-item w3-button w3-padding tablink w3-aqua" onclick="openCity(event,'search')"><i
                    class="fa fa-search fa-fw"></i>&nbsp;
                Search Details</a>


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

        <div id="search" class="w3-container city" style="display: block;">
          <div class="w3-container w3-card-2 w3-white">
            <form class="" action="" method="post">
            <h4 class="w3-padding w3-center" style="font-family: sanif;">Search For a Specific Name, Date of Birth or Phone Number.</h4>
            <input class=" w3-center w3-padding w3-margin w3-border-bottom w3-border-0 w3-border-left w3-border-aqua " type="text" name="value_search" placeholder="Filter or searching for data..." style="width: 90%;">
            <button type="submit" name="filter_btn" class="w3-btn w3-round-large w3-black w3-hover-aqua"><i class="fa fa-search"></i></button>
            <hr>


          </div>
  </form>

        <div class="w3-container w3-padding-16">
            <div class="w3-responsive">
                <table class="w3-table-all">
                    <thead>
                        <tr class="w3-pale-blue">
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
                        // create connection for the database
                        $connect = mysqli_connect('localhost', 'root', '', 'db_log');

                        if (isset($_POST['filter_btn'])) {
                          // code...
                          $search = $_POST['value_search'];
                          $queriz = "SELECT * FROM userinfos WHERE CONCAT(fullname,dob,phone) LIKE '%$search%' ";
                          $query_run = mysqli_query($connect,$queriz);

                          if (mysqli_num_rows($query_run) > 0) {
                            // code...
                            while ($rowl = mysqli_fetch_array($query_run)) {
                              // code...

                              ?>
                              <tr>
                                  <td><?php echo $rowl["id"]; ?></td>
                                   <td><?php echo $rowl["fullname"]; ?></td>
                                   <td><?php echo $rowl["dob"]; ?></td>
                                   <td><?php echo $rowl["pob"]; ?></td>
                                   <td><?php echo $rowl["fathername"]; ?></td>
                                   <td><?php echo $rowl["mothername"]; ?></td>
                                   <td><?php echo $rowl["homeaddress"]; ?></td>
                                   <td><?php echo $rowl["soo"]; ?></td>
                                   <td><?php echo $rowl["postal"]; ?></td>
                                   <td><?php echo $rowl["email"]; ?></td>
                                   <td><?php echo $rowl["phone"];?></td>
                                  <td><?php echo $rowl["gender"]; ?></td>
                                  <td><?php echo $rowl["submitted_at"]; ?></td>
                               </tr>

                              <?php
                            }
                          }

                          else {
                            ?>
                            <tr>
                              <td colspan="14">No Record Was Found</td>
                            </tr>

                            <?php
                          }
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
