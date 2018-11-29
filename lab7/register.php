<?php
  session_start();
  $sisi = $fname = $lname = $pass = $genther = $programID = $birthDay ="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] == $_SESSION['custom_captcha']){
      $sisi = test_input($_POST["sisi"]);
      $fname = test_input($_POST["fname"]);
      $lname = test_input($_POST["lname"]);
      $pass = test_input($_POST["pass"]);
      $genther = test_input($_POST["genther"]);
      $programID = test_input($_POST["programID"]);
      $birthDay = test_input($_POST["birthDay"]);
      $davs = "its hash string";
      $pass = $pass . $davs;
      $pass = hash('md5',$pass);
      print_r($_POST);
      include_once "dbConf.php";
      $conn = new mysqli($servername, $username, $password, $database);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "INSERT INTO `students`(`fName`, `lName`, `sisi`, `gender`, `programID`, `birth`, `password`, `active`, `credits`) VALUES('$fname','$lname','$sisi','$genther','$programID','$birthDay','$pass',1,0)";
      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      header('Location: ' . "http://mazenet.com/lab7/login/");
    }else{
      echo "Error garsan zurgan deerh kod oo goy oruulchildaa";
    }

  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
