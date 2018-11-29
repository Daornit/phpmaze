<?php
session_start();

require_once './dbConf.php';
$connection = new mysqli($hostname,$username, $password, $database);
if($connection -> connect_error) die($connection->connection_error);

if(isset($_SESSION['sisi'])){
  $sisi = get('sisi');
  $pass = get('password');
  $query = "SELECT * FROM students WHERE sisi = '$sisi'";
  $result = $connection -> query($query);
  if(!$result) echo 'Err';

  $row = $result->fetch_assoc();
  if(!$result) due($connection->error);

  if($row['password']==$_SESSION['password']){
      echo <<< _END
      <pre>
      Таний нэр: $row[fName] <br>
           Овог: $row[lName] <br>
         SISIID: $row[sisi] <br><br><br>
_END;
      $query = "SELECT lesson.* FROM lesson INNER JOIN selectedLessons ON lesson.lessinId = selectedLessons.lessinId WHERE selectedLessons.sisi = '$row[sisi]'";
      $result = $connection -> query($query);
      $rows=$result->num_rows;
      echo "<form action=\"./addlesson.php\" method=\"post\">";
      echo "<table><tr> <th>Lesson Name</th><th>Lesson id</th><th>Gredit</th><th>Program</th><th>Choose</th></tr>";
      for($j=0;$j<$rows;$j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<tr>';
          echo "<td style=\"background-color:green\">$row[lessonName]</td>";
          echo "<td>$row[lessinId]</td>";
          echo "<td>$row[credit]</td>";
          echo "<td>$row[programID]</td>";
          echo "</tr>";
      }

      $query = "SELECT * FROM lesson LEFT JOIN selectedLessons ON lesson.lessinId = selectedLessons.lessinId WHERE lesson.lessinId IS NOT NULL AND sisi <> '$sisi'";
      $result = $connection -> query($query);
      $rows=$result->num_rows;
      for($j=0;$j<$rows;$j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<tr>';
          echo "<td>$row[lessonName]</td>";
          echo "<td>$row[lessinId]</td>";
          echo "<td>$row[credit]</td>";
          echo "<td>$row[programID]</td>";
          echo "<td><input type=\"checkbox\" name=\"lesson[$j]\" value=\"$row[lessinId]\"></td>";
          echo "</tr>";
      }
      echo "</table></pre>";
      echo "<input type=\"hidden\" name='sisi' value='$sisi'>";
      echo "<input type=\"hidden\" name='pass' value='$pass'>";
      echo "<input type=\"submit\" value='Save'>";
      echo "</form><a href='./logout.php'>   logout</a>";

  }
  else echo "Failet re try";
}

function get($var){
  return mysql_real_escape_string($_SESSION[$var]);
}

?>
