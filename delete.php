<?php
require_once './popup/database.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) due("Error on connection of server: " . mysql_error());
mysql_select_db($db_database) or due("Error occured on Database select: " . mysql_error());

$condition = get('sisi');
echo $condition;
$query = "DELETE FROM student WHERE sisi = '$condition'";
mysql_query($query);
mysql_close($db_server);

header('Location: /listli.php');
function get($var){
  return mysql_real_escape_string($_GET[$var]);
}
?>
