<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Оюутаны жагсаалт</title>
  </head>
  <body>
    <?php
    require_once './popup/database.php';
    $connection = new mysqli("localhost",$db_username, $db_password, $db_database);
    if($connection -> connect_error) die($connection->connection_error);

    $query = "SELECT * FROM student";
    $result = $connection -> query($query);
    if(!$result) due($connection->error);

    $rows=$result->num_rows;
    echo "<pre><table><tr> <th>First Name</th> <th>Last Name</th><th>SISI</th><th>Gender</th><th>Birth</th><th>Хөтөлбөр</th><th>Delete OR Update</th></tr>";

    for($j=0;$j<$rows;$j++){
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo '<tr>';
        echo "<td>$row[fName]</td>";
        echo "<td>$row[lName]</td>";
        echo "<td>$row[sisi]</td>";
        echo "<td>$row[gender]</td>";
        echo "<td>$row[birth]</td>";
        echo "<td>$row[programID]</td>";
      echo <<< _END
      <td><a href="./delete.php?sisi=$row[sisi]">Delete</a> | <a href="./update.php?sisi=$row[sisi]">Update</td>
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
         Program: <input type="text" name="programID" value="">
                  <input type="submit" value="Insert">
    </form>
    </pre>
_END;
    $result->close();
    $connection->close();
    ?>
  </body>
</html>
