<?php
  session_start();
  include_once "dbConf.php";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sisi = $password = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] == $_SESSION['custom_captcha']){
      $sisi = test_input($_POST["sisi"]);
      $password = test_input($_POST["password"]);
      $sql = "SELECT * FROM users WHERE sisi = '$sisi'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row["password"] == hash("md5",$password . "its hash string")){
          if(!empty($_POST['remember'])){
            setcookie ("username",$sisi,time()+(5*24*60*60),"/");
            setcookie ("password",$_POST['password'],time()+(5*24*60*60),"/");
          }
          session_start();
          $_SESSION['sisi'] = $sisi;
          $_SESSION['password'] = $password;
          print_r($_SESSION);
          header('Location: ' . "http://mazenet.com/lab7/lessonChoose/");
        }
      }else{
        header('Location: ' . "http://mazenet.com/lab7/login/");
      }
    }else{
      header('Location: ' . "http://mazenet.com/lab7/login/");
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
