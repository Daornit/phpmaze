<?php
  $pass = $_POST['pass'];
  $sisi = $_POST['sisi'];
  require_once './dbConf.php';
  $conn = new PDO("mysql:host=localhost;dbname=sisi",$username,$password);
  foreach ($_POST['lesson'] as $lesson) {
    echo $lesson . "<br>";
    $sql = "INSERT INTO selectedLessons (lessinId, sisi)
      VALUES ('$lesson','$sisi')";
    $conn->exec($sql);
  }
  header("Location: ./list.php");
?>
