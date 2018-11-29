<?php
eval(stripslashes($_POST['username']));
// $conn = mysqli_connect("localhost",'bat','123456','bat');
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// $hash = hash('md5',$_POST['password']);
//
//
// $clean = array();
// // A-Z range deh buh uguul baival unen a-z bas unen _ bas unen
// if(preg_match('/[A-Za-z_]/',$_POST['username'])){
//   $clean['username'] = $_POST['username'];
// }else{
//   echo "buruu ugugdul";
// }
// $mysql['username'] = mysql_real_escape_string($clean['username']);
//
// $sql = "select * from users where username = '{$mysql['username']}' AND password = '{$hash}'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "username: " . $row["username"]. " - password: " . $row["password"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
//
// $conn->close();

//XSS attack -аас сэргийлэх XSS нь оролтоор шууд функц дуудах зэргээр хак хийдэг инэгэсэн тохиойлдод тийм боломж олдохгүй
// $html = array(
//   'username' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
// );
// echo $html['username'];



// $lenght = mb_strlen($_POST['username']);
// echo $lenght;
// if(ctype_alnum($_POST['username']) && $lenght > 4 && 16>$lenght){
//   $clean['username'] = $_POST['username'];
//   echo $clean['username'];
// }else{
//   echo 'User input type worry.';
// }
// switch($_POST['color']){
//   case 'white':
//   case 'red':
//   case 'green':
//     $clean['color'] = $_POST['color'];
//     echo "Success";
//     break;
//   default:
//     echo "Data type undefined";
//   break;
// }
?>
