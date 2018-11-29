<?php
require_once 'dbConf.php';
$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn) due("Connection failed: " . mysqli_connect_error());
  $clean = array();
  // Nemelt secure hiine
  $password = "its hash string";
  $password = $_POST['password'] . $password;
  $password = hash('md5',$password);
  $clean['username'] = $_POST['username'];
  $clean['username'] = mysql_real_escape_string($clean['username']);
  // A-Z range deh buh uguul baival unen a-z bas unen _ bas unen
  if(isset($_POST['username'])){
    if(preg_match('/\w/',$_POST['username'])){
      if(preg_match('/[\W]+/',$_POST['username'])){
        header("Location: ../lab4/login?error=user name or password wrong");
      }else{

        if((int)$clean['username']){
          $sql = "SELECT * FROM students WHERE sisi = '$clean[username]' AND password = '$password' AND active = 1";
          $result = $conn -> query($sql);
          if($result->num_rows){
            if(!empty($_POST['remember'])){
              setcookie ("username",$clean['username'],time()+(5*24*60*60),"/");
              setcookie ("password",$_POST['password'],time()+(5*24*60*60),"/");
            }
            session_start();
            $_SESSION['sisi'] = $clean['username'];
            $_SESSION['password'] = $password;
            header("Location: ./list.php");
          }else{
            session_start();
            $_SESSION['error'] = "Ta idvehtee baigaa eshee shalganuu OR <a href=\"../register\">register</a>";
            header("Location: ../lab4/login");
          }
        }else{
          // bagsh yumuu VarnishAdmin
          $sql = "SELECT * FROM staffs WHERE sisi='$clean[username]' and password='$password'";
          $result = $conn -> query($sql);
          if($result->num_rows){
            session_start();
            $_SESSION['sisi'] = $clean['username'];
            $_SESSION['password'] = $password;
            header("Location: ../lab4/users.php");
          }

          else header("Location: ../lab4/login?error=user name or password wrong");
        }
    }
  }else{
      header("Location: ../lab4/login?error=user name or password wrong");
    }
  }else{
      header("Location: ../lab4/login?error=user name or password wrong");
  }
  $conn->close();
?>
