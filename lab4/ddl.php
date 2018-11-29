<?php
  require_once 'dbConf.php';
  $conn = mysqli_connect($hostname,$username,$password,$database);
  if(!$conn) due("Connection failed: " . mysqli_connect_error());

  // $sql = "CREATE TABLE users (
  //   username varchar(30) NOT NULL,
  //   password varchar(30) NOT NULL,
  //   FOREIGN KEY (username) REFERENCES students(sisi),
  //   FOREIGN KEY (username) REFERENCES staffs(fname)
  // )";
  // $result = $conn -> query($sql);

  // $sql = "CREATE TABLE students (
  //   fName varchar(30) NOT NULL,
  //   lName varchar(30) NOT NULL,
  //   sisi varchar(12) NOT NULL,
  //   gender varchar(6) NOT NULL,
  //   programID varchar(25) NOT NULL,
  //   password varchar(32) NOT NULL,
  //   birth date,
  //   PRIMARY KEY (sisi)
  // )";
  // $result = $conn -> query($sql);
  // $sql = "CREATE TABLE staffs (
  //   fName varchar(30) NOT NULL,
  //   lName varchar(30) NOT NULL,
  //   position varchar(12) NOT NULL,
  //   dateOf date NOT NULL,
  //   PRIMARY KEY (fName)
  // )";
  // $result = $conn -> query($sql);

  // ALTER VIEW users AS 
  // select sisi as sisi, password AS password, active as active from students
  // UNION
  // SELECT sisi as sisi, password AS password, active as active from staffs ;

?>
