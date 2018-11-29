<?php
  $pass = $_POST['pass'];
  $sisi = $_POST['sisi'];
  require_once './popup/database.php';
  $conn = new PDO("mysql:host=localhost;dbname=bat",$db_username,$db_password);
  foreach ($_POST['lesson'] as $lesson) {
    echo $lesson . "<br>";
    $sql = "INSERT INTO selectedLessons (lessinId, sisi)
      VALUES ('$lesson','$sisi')";
    $conn->exec($sql);
  }
  echo <<< __END
  <form action='./profile.php' method='post'>
    <input type="hidden" name='sisi' value='$sisi'>
    <input type="hidden" name='pass' value='$pass'>
    <input type="submit" value='Redirect'>
  </form>
__END;
?>
