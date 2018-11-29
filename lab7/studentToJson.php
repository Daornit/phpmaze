<?php
session_start();
header('Content-type: application/json');
include_once "dbConf.php";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$return_arr = Array();
$sql = "SELECT * FROM students WHERE sisi = '$_GET[sisi]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      array_push($return_arr,$row);
  }
}
$lessons = Array();
$sql = "SELECT lessinId FROM selectedLessons WHERE sisi = '$_GET[sisi]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      array_push($lessons,$row['lessinId']);
  }
}
echo "{";
echo json_encode("sisi") . ":" . json_encode($return_arr[0]['sisi']) . ",\n";
echo json_encode("fname") . ":" . json_encode($return_arr[0]['fName']) . ",\n";
echo json_encode("lname") . ":" . json_encode($return_arr[0]['lName']) . ",\n";
echo json_encode("program") . ":" . json_encode($return_arr[0]['programID']) . ",\n";
echo json_encode("credits") . ":" . json_encode($return_arr[0]['credits']) . ",\n";
echo json_encode("lessons") . ":" . json_encode($lessons) . "\n";
echo "}";
?>
