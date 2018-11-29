<?php
 include "/root/Projects/mazenet/partials/header.php";

 $a = "batORGIL";
 $a1 = "EnhBOLD";
 $a2 = "TuvshinSAIHAN";
 echo $a . " " . $a1 . " " . $a2 . "<br>";
 fix_names();
 echo $a . " " . $a1 . " " . $a2 . "<br>";
 function fix_names(){
    global $a; $a = ucfirst(strtolower($a));
    global $a1; $a1 = ucfirst(strtolower($a1));
    global $a2; $a2 = ucfirst(strtolower($a2));
 }

  // $a = "batORGIL";
  // $a1 = "EnhBOLD";
  // $a2 = "TuvshinSAIHAN";
  // echo $a . " " . $a1 . " " . $a2 . "<br>";
  // fix_names($a,$a1,$a2);
  // echo $a . " " . $a1 . " " . $a2 . "<br>";
  // function fix_names(&$n1,&$n2,&$n3){
  //     $n1 = ucfirst(strtolower($n1));
  //     $n2 = ucfirst(strtolower($n2));
  //     $n3 = ucfirst(strtolower($n3));
  // }

  // $names = fix_names("batorgil","enhbold","tuvShinsaihan");
  // print_r($names);
  // function fix_names($n1,$n2,$n3){
  //   $n1 = ucfirst(strtolower($n1));
  //   $n2 = ucfirst(strtolower($n2));
  //   $n3 = ucfirst(strtolower($n3));
  //   return array($n1,$n2,$n3);
  // }

  // echo fix_names("TFDSMG","fdlskj","gfdjofFDSF");
  //
  // function fix_names($n1,$n2,$n3){
  //   $n1 = ucfirst(strtolower($n1));
  //   $n2 = ucfirst(strtolower($n2));
  //   $n3 = ucfirst(strtolower($n3));
  //
  //   return $n1 + " " + $n2 . " " . $n3;
  // }
  echo "<h3>5 бүлгийн функц сэдсийг ажлуулан үзэж ойлгосон явдал.</h3>"
  include "/root/Projects/mazenet/partials/footer.php";
  ?>
