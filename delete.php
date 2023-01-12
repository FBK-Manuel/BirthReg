<?php
if (isset($_GET["id"]) ) {
  // code...
  $id = $_GET["id"];

  $servername= "localhost";
  $username = "root";
  $password = "";
  $database = "db_log";

  // create connection for the database
  $connection = new mysqli($servername, $username, $password, $database);

  $sql = "DELETE FROM userinfos WHERE id=$id";
  $connection->query($sql);
}

header("location: user_main.php");
exit;
 ?>
