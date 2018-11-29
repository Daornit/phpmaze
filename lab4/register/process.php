<?php
require_once '../dbConf.php';
$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn) due("Connection failed: " . mysqli_connect_error());
$clean = array();

if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["password2"])) {
    $password = $_POST["password"];
    $cpassword = $_POST["password2"];
    if (strlen($_POST["password"]) <= '6') {
        $passwordErr = "Your Password Must Contain At Least 6 Characters!";
        echo $passwordErr;
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
        $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
    }

    if(preg_match('/\w/',$_POST['username'])){
      if(preg_match('/[\W]+/',$_POST['username'])){
        header("Location: ../lab4/register?error=user name or password wrong");
      }else{
        $clean['username'] = $_POST['username'];
        $clean['username'] = mysql_real_escape_string($clean['username']);
        if((int)$clean['username']){

          if(!isset($_POST['fname'])) header("Location: ../register");
          if(!isset($_POST['lname'])) header("Location: ../register");
          if(!isset($_POST['programID'])) header("Location: ../register");
          if(!isset($_POST['birth'])) header("Location: ../register");

          $fname = get_post('fname');
          $lname = get_post('lname');
          $programID = get_post('programID');
          $birth = get_post('birth');
          $sisi = get_post('username');
          $gender = get_post('gender');
          $password = get_post('password');

          $pass = "its hash string";
          $pass = $password . $pass;
          $pass = hash('md5', $pass);

          $sql = "INSERT INTO students values ('$fname','$lname','$sisi','$gender','$programID','$birth','$pass')";
          $result = $conn -> query($sql);
          if(!$result) die("error occured process of database");

          echo "register is successfull goto <a href='../login'>login form</a>";
          }else{
            header("Location: ../lab4/register");
          }
      }

    }else{
      header("Location: ../lab4/register?error=user name or password wrong");
    }
}

function get_post($var){
  return mysql_real_escape_string($_POST[$var]);
}
?>
