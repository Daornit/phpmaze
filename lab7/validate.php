<?php
  header('Content-type: application/json');
  include_once "dbConf.php";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    echo '{"success" : false }';
  }
  $data = json_decode(file_get_contents('php://input'),true);
  $sql = "SELECT * FROM selectedLessons WHERE sisi='$data[sisi]'";
  $result = $conn->query($sql);
  $arr = Array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($arr,$row['lessinId']);
    }
    //delete data
    $rst = array_diff($arr,$data['lessons']);
    forEach($rst as $lesson){
      $sql = "DELETE FROM selectedLessons WHERE lessinId = '$lesson' and sisi = '$data[sisi]'";
      $conn->query($sql);

      $sql = "UPDATE lesson SET correntChair = correntChair - 1 WHERE lessinId = '$lesson' ";
      $conn->query($sql);

      $sql = "UPDATE students SET credits = credits - 3 WHERE sisi = '$data[sisi]' ";
      $conn->query($sql);
    }
    //insert data
    $rst = array_diff($data['lessons'],$arr);
    forEach($rst as $lesson){
      $sql = "INSERT INTO selectedLessons (lessinId, sisi) VALUES ('$lesson', '$data[sisi]')";
      $conn->query($sql);
      $sql = "UPDATE students SET credits = credits + 3 WHERE sisi = '$data[sisi]' ";
      $conn->query($sql);
      $sql = "UPDATE lesson SET correntChair = correntChair + 1 WHERE lessinId = '$lesson' ";
      $conn->query($sql);
    }
    echo '{"success" : true }';
  } else {
    forEach($data['lessons'] as $lesson){
      $sql = "INSERT INTO selectedLessons (lessinId, sisi) VALUES ('$lesson', '$data[sisi]')";
      $conn->query($sql);
    }

    $sql="UPDATE lesson l INNER JOIN (SELECT lessinId,COUNT(lessinId) as ids FROM `selectedLessons` GROUP BY lessinId) ls on l.lessinId = ls.lessinId SET l.correntChair = ls.ids";
    $conn->query($sql);
    $sql="UPDATE students s INNER JOIN (SELECT sisi,COUNT(sisi) as ids FROM `selectedLessons` GROUP BY sisi) ls on s.sisi = ls.sisi SET s.credits = ls.ids * 3";
    $conn->query($sql);
    echo '{"success" : true }';
  }
  // UPDATE students SET credits = 0
  // UPDATE lesson SET correntChair = 0
  // DELETE FROM selectedLessons
?>
