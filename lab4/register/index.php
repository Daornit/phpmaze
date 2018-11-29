<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student register</title>
  </head>
  <body>
    <?php if(isset($_GET['error'])){
      echo $_GET['error'];
    } ?>
  <form action="./process.php" method="post">
    <table>
      <tr>
        <th>SisiID</th>
        <th><input type="text" name="username" value=""><th>
      </tr>
      <tr>
        <th>Password</th>
        <th><input type="password" name="password" value=""><th>
      </tr>
      <tr>
        <th>Confirm</th>
        <th><input type="password" name="password2" value=""><th>
      </tr>
      <tr>
        <th>First Name</th>
        <th><input type="text" name="fname" value=""><th>
      </tr>
      <tr>
        <th>Last Name</th>
        <th><input type="text" name="lname" value=""><th>
      </tr>
      <tr>
        <th>Program</th>
        <th><input type="text" name="programID" value=""><th>
      </tr>
      <tr>
        <th>Gender</th>
        <th><select name="gender">
          <option value="male">male</option>
          <option value="female">female</option>
        </select><th>
      </tr>
      <tr>
        <th>Birth day</th>
        <th><input type="text" name="birth" value=""><th>
      </tr>
      <tr>
        <th><input type="submit" value="Register"></th>
      </tr>
    </table>
  </form>
  </body>
</html>
