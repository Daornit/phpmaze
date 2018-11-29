<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cat test Mysql</title>
  </head>
  <body>
<?php
require_once './database.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database)
  or die("Unable to select Database: " . mysql_error());



$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 6)";
$result = mysql_query($query);
if(!$result) die("Database access failed: " . mysql_error());
echo "Inserted column ID is " . mysql_insert_id();

// $rows = mysql_num_rows($result);
//
// echo "<table><tr> <th>Id</th> <th>Family</th><th>Name</th><th>Age</th></tr>";
//
// for($j=0;$j<$rows;$j++){
//   $row = mysql_fetch_row($result);
//   echo '<tr>';
//   for($k=0;$k<4;$k++)
//     echo "<td>$row[$k]</td>";
//   echo "</tr>";
// }
//
// echo '</table>';

// remove element from table
// $query = "DELETE FROM cats WHERE name='Growler'";

// update element
// $query = "UPDATE cats SET name='Leopard' WHERE name='Leo'";
// $result = mysql_query($query);
// if(!$result) die("Database access failed: " . mysql_error());

// insert query ene in NULL ugsun in auto tooloh gej anhnaasaa zohioson uchraas
//$query = "INSERT INTO cats VALUES(NULL, 'Cheetah', 'Charly', 3)";

// Describe command ashiglan husnegtiiin medeelel harah baiguulaltiinhan tuhai
// $query = "DESCRIBE cats";
// $result = mysql_query($query);
//
// if(!$result) die("Database access failed: " . mysql_error());
//
// $rows = mysql_num_rows($result);
// echo '<table><tr><th>Column</th><th>Type</th><th>NULL</th><th>Key</th></tr>';
// for($j = 0; $j<$rows; $j++){
//   $row = mysql_fetch_row($result);
//   echo '<tr>';
//   for($k=0;$k<4;$k++)
//     echo "<td>$row[$k]</td>";
//   echo '</tr>';
// }
// echo '</table>';

// Drop table
// $query = "DROP TABLE cats";


// table uusgeh query
// $query = " CREATE TABLE cats (
//   id SMALLINT NOT NULL AUTO_INCREMENT,
//   family VARCHAR(32) NOT NULL,
//   name VARCHAR(32) NOT NULL,
//   age TINYINT NOT NULL,
//   PRIMARY KEY (id)
// )";


?>
  </body>
</html>
