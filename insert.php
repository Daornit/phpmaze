<?php
require_once './popup/database.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) due("Error on connection of server: " . mysql_error());
mysql_select_db($db_database) or due("Error occured on Database select: " . mysql_error());

if(isset($_POST['sisi'])){
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $sisi = $_POST['sisi'];
  $gender = $_POST['gender'];
  $birth = $_POST['birth'];
  $programID = $_POST['programID'];
  $query = 'PREPARE statement FROM "INSERT INTO student VALUES(?,?,?,?,?,?)"';
  mysql_query($query);
  $query = "SET @fName = \"$fName\",
           @lName      = \"$lName\",
           @sisi       = \"$sisi\",
           @gender     = \"$gender\",
           @programID  = \"$programID\",
           @birth      = \"$birth\" ";
  mysql_query($query);
  $query = 'EXECUTE statement USING @fName,@lName,@sisi,@gender,@programID,@birth';
  mysql_query($query);
  $query = 'DEALLOCATE PREPARE statement';
  mysql_query($query);
  mysql_close($db_server);
  header('Location: /listli.php');
}

?>
