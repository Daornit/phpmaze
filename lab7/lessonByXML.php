<?php

$xml = new SimpleXMLElement('<root/>');
include_once "dbConf.php";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM lesson";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $lesson = $xml->addChild('lesson');
    $lesson->addChild('lessonID', $row["lessinId"]);
    $lesson->addChild('name', $row["lessonName"]);
    $lesson->addChild('credit', $row["credit"]);
    $lesson->addChild('program', $row["programID"]);
    $lesson->addChild('chairs', $row["maxChairs"]);
    $lesson->addChild('choosedChairs', $row["correntChair"]);
  }
}

header('Content-type: application/xml');
print($xml->asXML());
?>
