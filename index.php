<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once './popup/database.php';
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if(!$db_server) due("Error on connection of server: " . mysql_error());
    mysql_select_db($db_database) or due("Error occured on Database select: " . mysql_error());
    // INSERT INTO selectedLessons(sisi,lessinId)
    // VALUES ('16b1seas0054','DGT3'),
    // ('16b1seas0054','IER5'),
    // ('16b1seas0054','ISC3'),
    // ('16b1seas0054','ISC4'),
    // ('16b1seas0054','ISC8'),
    // ('16b1seas0002','ORF1'),
    // ('16b1seas0002','POR4'),
    // ('16b1seas0002','PYT0'),
    // ('16b1seas0002','TBG2');
    // INSERT INTO lesson(lessinId, lessonName,programID,credit)
    // VALUES ('ISC86','c++ development','Software enginering',3),
    // ('ISC34','Web developing','Software enginering',3),
    // ('IER54','Basics of System','System control',2),
    // ('ISC43','Basics of algorithm','Software enginering',3),
    // ('POR44','Niigmiin sudalgaa','Setgelzui',2),
    // ('ORF12','Tootsoolon bodoh matematic','Magadlal static',3),
    // ('GRT45','Onshlohui','Setgelzui',2),
    // ('DGT34','Probablity and Static','Magadlal static',3),
    // ('FVD32','Hureelen bui orchin','Setgelzui',4),
    // ('RTD65','Deep learning','Software enginering',3),
    // ('TBG23','Affilician learning','Software enginering',3),
    // ('PYT00','Python language','Software enginering',3);
    // $query = "CREATE TABLE selectedLessons (
    //   lessinId varchar(4) NOT NULL,
    //   sisi varchar(12) NOT NULL,
    //   FOREIGN KEY (lessinId) REFERENCES lesson(lessinId),
    //   FOREIGN KEY (sisi) REFERENCES student(sisi)
    // )";
    // mysql_query($query);

    // $query = "CREATE TABLE lesson (
    //   lessinId varchar(4) NOT NULL,
    //   lessonName varchar(40) NOT NULL,
    //   credit int(1) NOT NULL,
    //   programID varchar(25) NOT NULL,
    //   PRIMARY KEY (lessinId)
    // )";
    // mysql_query($query);
    // $query = "ALTER TABLE lesson
    //           ADD FOREIGN KEY (programID) REFERENCES program(programID)";
    // mysql_query($query);

    // $query = "ALTER TABLE student
    //           ADD FOREIGN KEY (programID) REFERENCES program(programID)";
    //            mysql_query($query);

    // $query = "CREATE TABLE program (
    //   programID varchar(25),
    //   date date NOT NULL,
    //   PRIMARY KEY (programID)
    // )";
    // mysql_query($query);

    // $query = "CREATE TABLE student (
    //   fName varchar(30) NOT NULL,
    //   lName varchar(30) NOT NULL,
    //   sisi varchar(12) NOT NULL,
    //   gender varchar(6) NOT NULL,
    //   programID varchar(25) NOT NULL,
    //   birth date,
    //   PRIMARY KEY (sisi)
    // )";
    // mysql_query($query);

    // $query = "INSERT INTO student (fName,lName,gender,birth,sisi,programID) VALUES ('Bold','Davaajantsan','male','1998-2-4','16b1seas0002','Magadlal static')";
    // mysql_query($query);
    // $query = "INSERT INTO student (fName,lName,gender,birth,sisi,programID) VALUES ('Saruul','Tugs','female','1998-10-3','16b1seas0917','Software enginering')";
    // mysql_query($query);
    // $query = "INSERT INTO student (fName,lName,gender,birth,sisi,programID) VALUES ('Tungalag','Harhuu','female','1998-9-1','16b1seas1114','System control')";
    // mysql_query($query);x
    // $query = "INSERT INTO student (fName,lName,gender,birth,sisi,programID) VALUES ('Ebo','Enkhbold','male','1999-2-5','16b1seas0003','Software enginering')";
    // mysql_query($query);
    // $query = "INSERT INTO student (fName,lName,gender,birth,sisi,programID) VALUES ('Tuvshinsaihan','Baatar','male','1998-11-6','16b1seas0063','Software enginering')";
    // mysql_query($query);








    ?>
  </body>
</html>
