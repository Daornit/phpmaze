<?php
session_start();
header('Content-type: application/json');
include_once "dbConf.php";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$return_arr = Array();
$sql = "SELECT * FROM lesson";
$result = $conn->query($sql);
$k=0;
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      array_push($return_arr,$row);
      $k++;
  }
}

echo "[\n";
for($i=0;$i<$k-1;$i++){
  echo "{\n";
  echo json_encode("index") . ':' . json_encode($return_arr[$i]['lessinId']) . ",\n";
  echo json_encode("name") . ':' . json_encode($return_arr[$i]['lessonName']) . ",\n";
  echo json_encode("credit") . ':' . $return_arr[$i]['credit'] . ",\n";
  echo json_encode("suudal") . ':' . $return_arr[$i]['maxChairs'] . ",\n";
  echo json_encode("correntChair") . ':' . json_encode($return_arr[$i]['correntChair']) . "\n";
  echo "},\n";
}
  echo "{\n";
  echo json_encode("index") . ':' . json_encode($return_arr[$i]['lessinId']) . ",\n";
  echo json_encode("name") . ':' . json_encode($return_arr[$i]['lessonName']) . ",\n";
  echo json_encode("credit") . ':' . $return_arr[$i]['credit'] . ",\n";
  echo json_encode("suudal") . ':' . $return_arr[$i]['maxChairs'] . ",\n";
  echo json_encode("correntChair") . ':' . json_encode($return_arr[$i]['correntChair']) . "\n";
  echo "}\n";
echo "]";
?>
