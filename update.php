<?php
require_once './popup/database.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) due("Error on connection of server: " . mysql_error());
mysql_select_db($db_database) or due("Error occured on Database select: " . mysql_error());

$condition = get('sisi');

if(isset($_POST['sisi'])){
  $fName = get_post('fName');
  $lName = get_post('lName');
  $sisi = get_post('sisi');
  $gender = get_post('gender');
  $birth = get_post('birth');
  $programID = get_post('programID');
  $query = "UPDATE student
            SET fName = '$fName', lName = '$lName', sisi = '$sisi', gender = '$gender', birth = '$birth', programID = '$programID'
            WHERE sisi = '$condition'
  ";
  mysql_query($query);
  mysql_close($db_server);
  header('Location: /listli.php');
}

$query = "SELECT * FROM student WHERE sisi='$condition'";
$result = mysql_query($query);
$row = mysql_fetch_row($result);
echo <<< _END
<pre>
<form action="./update.php?sisi=$condition" method="post">
  First Name: <input type="text" name="fName" value="$row[0]">
   Last Name: <input type="text" name="lName" value="$row[1]">
        SISI: <input type="text" name="sisi" value="$row[2]">
      Gender: <input type="text" name="gender" value="$row[3]">
     Program: <input type="text" name="programID" value="$row[4]">
   Birth Day: <input type="text" name="birth" value="$row[5]">
              <input type="submit" value="Update">
</form>
</pre>
_END;
mysql_close($db_server);
function get($var){
  return mysql_real_escape_string($_GET[$var]);
}

function get_post($var){
  return mysql_real_escape_string($_POST[$var]);
}
?>
