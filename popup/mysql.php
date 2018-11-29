<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chapter 10 mysql</title>
  </head>
  <body>
    <pre>
    <?php
      require_once './database.php';
      $db_server = mysql_connect($db_hostname, $db_username,$db_password);
      if(!$db_server) die("Unable to connect mysql: " . mysql_error());
      mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
      $query = 'PREPARE statement FROM "INSERT INTO books VALUES(?,?,?,?,?)"';
      mysql_query($query);
      $query = 'SET @author = "PLOE Bronte", ' .
               '@title = "Wuthering Heights", ' .
               '@category = "Classic Fiction", ' .
               '@year = "1947", ' .
               '@isbn = "9780553212587"';
      mysql_query($query);
      $query = 'EXECUTE statement USING @author,@title,@category,@year,@isbn';
      mysql_query($query);
      $query = 'DEALLOCATE PREPARE statement';
      mysql_query($query);

      // $query = "SELECT * FROM books";
      // $result = mysql_query($query);
      // if(!$result) die("Database access failed: " . mysql_error());
      // $rows = mysql_num_rows($result); // mysql_num_rows in niit muriin toog bustaan
      // for($j=0;$j<$rows;++$j){
      //   $row = mysql_fetch_row($result);
      //   echo 'Author: ' . $row[0] . '<br>'; // mysql_result funciton in neg cell iiin utgiig butsaan
      //   echo 'Title: ' . $row[1] . '<br>';
      //   echo 'Category: ' . $row[2] . '<br>';
      //   echo 'Year: ' . $row[3] . '<br>';
      //   echo 'ISBN: ' . $row[4] . '<br><br>';
      // }
      // mysql_close($db_server);
    ?>
  </pre>
  </body>
</html>
