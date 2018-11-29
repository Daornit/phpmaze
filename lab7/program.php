<?php
  header('Content-type: application/json');
  include_once "dbConf.php";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $return_arr = Array();
  $sql = "SELECT programID FROM program";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($return_arr,$row);
    }
}
  echo json_encode($return_arr);
?>
