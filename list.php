<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Оюутаны жагсаалт</title>
  </head>
  <body>
    <?php
    require_once './popup/database.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if(!$db_server) due("Error on connection of server: " . mysql_error());
    mysql_select_db($db_database) or due("Error occured on Database select: " . mysql_error());

    $query = "SELECT * FROM student";
    $result = mysql_query($query);
    if(!$result) die("Database access failed: " . mysql_error());
    $rows = mysql_num_rows($result);

    echo "<pre><table><tr> <th>First Name</th> <th>Last Name</th><th>SISI</th><th>Gender</th><th>Birth</th><th>Delete OR Update</th></tr>";

    for($j=0;$j<$rows;$j++){
      $row = mysql_fetch_row($result);
      echo '<tr>';
      for($k=0;$k<5;$k++)
        echo "<td>$row[$k]</td>";
      echo <<< _END
      <td><a href="./delete.php?sisi=$row[2]">Delete</a> | <a href="./update.php?sisi=$row[2]">Update</td>
_END;
      echo "</tr>";
    }

    echo '</table></pre>';

    echo <<< _END
    <pre>
    <form action="./insert.php" method="post">
      First Name: <input type="text" name="fName" value="">
       Last Name: <input type="text" name="lName" value="">
            SISI: <input type="text" name="sisi" value="">
          Gender: <input type="text" name="gender" value="">
       Birth Day: <input type="text" name="birth" value="">
                  <input type="submit" value="Insert">
    </form>
    </pre>
_END;
    ?>
  </body>
</html>
