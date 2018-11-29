<?php
  session_start();
  require_once 'dbConf.php';
  $conn = mysqli_connect($hostname,$username,$password,$database);
  if(!$conn) due("Connection failed: " . mysqli_connect_error());

  $pass = '';
  $sql = "SELECT * FROM users WHERE sisi = 'admin'";
  $result = $conn -> query($sql);
  if($result->num_rows){
    $row = $result->fetch_assoc();
    $pass = $row['password'];
  }

  if($_SESSION['sisi'] == 'admin' && $_SESSION['password'] == $pass){
?>
<body>
<?php
  if(isset($_POST['check_list'])){
    $activeList = $_POST['check_list'];
    foreach($activeList as $str){
      if((int)$str){
        $query = "UPDATE students SET active = 1 where sisi = '$str'";
        $result = $conn -> query($query);
      }else{
        $query = "UPDATE staffs SET active = 1 where sisi = '$str'";
        $result = $conn -> query($query);
      }
    }
  }
  if(isset($_POST['unchecked'])){
    $result=array_diff($_POST['unchecked'],$_POST['check_list']);
    foreach($result as $str){
      if((int)$str){
        $query = "UPDATE students SET active = 0 where sisi = '$str'";
        $result = $conn -> query($query);
      }else{
        $query = "UPDATE staffs SET active = 0 where sisi = '$str'";
        $result = $conn -> query($query);
      }
    }
  }
  $sql = "SELECT * FROM users where sisi <> 'admin'";
  if ($result = $conn->query($sql)) {
      /* fetch object array */
      echo <<< _END
      <pre>
      <form action="./users.php" method="post">
        <table>
          <tr>
            <th>
              SISI
            </th>
            <th>
              HASH-D Passwords
            </th>
            <th>
              Active
            </th>
          </tr>

_END;
      while ($row = $result->fetch_row()) {
        htmlGenerator($row);
      }
      echo <<< _END
      </table>
        <input type="submit" value="Submit">
      </form>
    </pre>
_END;
      /* free result set */
      $result->close();
  }
?>
</body>


<?php
  }else{
    header("Location: ../lab4/login?error=user name or password wrong");
  }

  function htmlGenerator($user){
    $isChecked = '';
    $unchecked = '';
    if($user[2]==1){
      $isChecked = "<input type='checkbox' name='check_list[]' value='$user[0]' checked>";
      $unchecked = "<input type='hidden' name='unchecked[]' value='$user[0]'>";
    }else{
      $unchecked = "<input type='hidden' name='unchecked[]' value='$user[0]'>";
      $isChecked = "<input type='checkbox' name='check_list[]' value='$user[0]'>";
    }
    echo "<tr>
            <td>
              $user[0]
            </td>
            <td>
              $user[1]
            </td>
            <td>
              $isChecked
              $unchecked
            </td>
          </tr>";
  }
?>
