<?php
 $db_hostname = 'localhost:8080';
 $db_database = 'bat';
 $db_username = 'bat';
 $db_password = '123456';
 function mysql_fatal_error($msg){
   $msg2 = mysql_error();
   echo <<< _END
   We are sorry, but it was not possible to completete
   the requisted task. The error message we got was:
       <p>$msg: $msg2</p>
   Please click the back button on your browser
   and try again. If you are still having problems,
   please <a href="mailto:admin@server.com"> email our
   adminstration</a>. Thank you.
_END;
 }
 // $rows = mysql_num_rows($result); // mysql_num_rows in niit muriin toog bustaan
 // for($j=0;$j<$rows;++$j){
 //   echo 'Author: ' . mysql_result($result,$j,'author') . '<br>'; // mysql_result funciton in neg cell iiin utgiig butsaan
 //   echo 'Title: ' . mysql_result($result,$j,'title') . '<br>';
 //   echo 'Category: ' . mysql_result($result,$j,'category') . '<br>';
 //   echo 'Year: ' . mysql_result($result,$j,'year') . '<br>';
 //   echo 'ISBN: ' . mysql_result($result,$j,'ISBN') . '<br><br>';
 // }
?>
