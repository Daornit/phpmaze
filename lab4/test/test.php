<html>
<head>
<title>User Information</title>
</head>
<body>
<?php if (!empty($_GET['name'])) {
// do something with the supplied values ?>
<p><font face="helvetica,arial">Thank you for filling out the form,
<?php echo $_GET['name'] ?>.</font></p>
<?php }
else { ?>
<p><font face="helvetica,arial">Please enter the
following information:</font></p>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>">
<table>
<tr>
<td>Name:</td>
<td>
<input type="text" name="name" />
<input type="submit" />
</td>
</tr>
</table>
</form>
<?php } ?>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Testing chapter 12 and 13</title>
  </head>
  <body>
    <h1>Security</h1>
    <hr>
    <h1>Application technigues</h1>
    <hr>
    <form action="process.php" method="post">
      <p> Please enter your account name:
        <input type="text" name="username" value="">
        <input type="text" name="password" value="">
      <p>Please select a color:
      <select name="color">
        <option value="white">white</option>
        <option value="red">red</option>
        <option value="green">green</option>
      </select>
      <input type="submit" value="sent"></p>
    </form>
  </body>
</html> -->
