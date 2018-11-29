<?php
session_start();
header('Content-type: application/json');
include_once "dbConf.php";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students WHERE sisi <> '16b1seas0807'";
$rst = $conn->query($sql);
echo "[";
if ($rst->num_rows > 0) {
  while($rw = $rst->fetch_assoc()) {
    $lessons = Array();
    $sql = "SELECT lessinId FROM selectedLessons WHERE sisi = '$rw[sisi]'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          array_push($lessons,$row['lessinId']);
      }
    }
    echo "{";
    echo json_encode("sisi") . ":" . json_encode($rw['sisi']) . ",\n";
    echo json_encode("fname") . ":" . json_encode($rw['fName']) . ",\n";
    echo json_encode("lname") . ":" . json_encode($rw['lName']) . ",\n";
    echo json_encode("program") . ":" . json_encode($rw['programID']) . ",\n";
    echo json_encode("credits") . ":" . $rw['credits'] . ",\n";
    echo json_encode("lessons") . ":" . json_encode($lessons) . "\n";
    echo "},";
  }
}
$return_arr = Array();
$sql = "SELECT * FROM students WHERE sisi = '16b1seas0807'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      array_push($return_arr,$row);
  }
}
$lessons = Array();
$sql = "SELECT lessinId FROM selectedLessons WHERE sisi = '16b1seas0807'";
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
echo json_encode("credits") . ":" . $return_arr[0]['credits'] . ",\n";
echo json_encode("lessons") . ":" . json_encode($lessons) . "\n";
echo "}";

echo "]";
?>
