<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Task 3th SISI</title>
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
    <h1 align="center">Student Counsel</h1><hr>
    <pre>
    <?php
      include_once './info_and_lesson.php';
      if(isset($_POST['sisi']) && $_POST['sisi']!=''){
        $lessons = explode(', ', $_POST['lessons']);
        if(add_lesson($_POST['sisi'],$lessons,$information_of_student)){
          echo "<p align='center'>Хичээлийг амжилттай нэмлээ. <br>";
          htmlcreater(search_student($_POST['sisi'],$information_of_student));
        }else{
          echo "<p align='center'>Таний оруулсан сиси ID олдсонгүй. <br>";
        }
      }else if(isset($_POST['search']) && $_POST['search']!=''){
        htmlcreater(search_student($_POST['search'],$information_of_student));
      }else{
        uasort($information_of_student, function($a, $b){
          return ordinal($a['firstname'])-ordinal($b['firstname']);
        });
        htmlcreater($information_of_student);
      }


      
      function htmlcreater($info){
        echo "<table>
        <tr>
          <th>№</th>
          <th>Нэр</th>
          <th>Овог</th>
          <th>SISI ID</th>
          <th>Хөтөлбөр</th>
          <th>Хичээлүүд</th>
        </tr>";
        $i = 1;
        foreach ($info as $student) {
          echo "<tr><td>$i</td>";
          foreach ($student as $key => $value) {
            if(is_array($value)){
              echo '<td>';
              $j=1;
              foreach ($value as $lname) {
                echo "$j: $lname <br>";
                $j++;
              }
              echo '</td>';
            }else{
              echo '<td>' . $value . '</td>';
            }
          }
          echo '</tr>';
          $i++;
        }
        echo '</table>';
      }
    ?>
    <form action="./sisi.php" method="post">
      <p align='center'>Оюутан хайх: <input type="text" name="search" value=""></p>
      <hr>
      <h3 align="center">Оюутанд хичээл нэмэх</h3>
      <p align="center">Оюутан sisiID: <input type="text" name="sisi" value=""></p>
      <p align="center"><span>Хичээлүүдийг тусгаарлахдаа голд нь ', ' хаалтан дотрох тэмдэглэгээг ашиглан уу.</span><p>
      <p align="center">Оруулах хичээлүүд: <input type="text" name="lessons" value=""></p>
      <button type="submit" name="button">Оруулах</button>
    </form>
  </pre>
  </body>
</html>
