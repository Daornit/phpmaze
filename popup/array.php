<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Array usage</title>
  </head>
  <body>
   <h1 align="center">PHP array ашиглах</h1>
   <hr>
   <?php
   $names = array('aav'=>'Даваажанцан','Бат','Оргил','Алимаа');
   print_r(each($names));
   // $names = array('aav'=>'Даваажанцан','Бат','Оргил','Алимаа');
   // print_r($names);
   // uasort($names, function($a, $b){
   //   return ordinal($a,1)-ordinal($b,1);
   // });
   // print_r($names);
   //
   // function ordinal($str,$number){
   //    $charString = mb_substr($str, $number-1, $number, 'utf-8');
   //    $size = strlen($charString);
   //    $ordinal = ord($charString[0]) & (0xFF >> $size);
   //    //Merge other characters into the value
   //    for($i = 1; $i < $size; $i++){
   //        $ordinal = $ordinal << 6 | (ord($charString[$i]) & 127);
   //    }
   //    return $ordinal;
   //  }

   // $temp = explode(' ', "This is a sentence with seven words");
   // print_r($temp);

   // $arr = "15sfjd;skl";
   // if((int)$arr){
   //   echo "$arr changed to number";
   // }else{
   //   echo "$arr not changed to number";
   // }

   // $perhaps = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
   // print_r($perhaps);
   // echo '<br>';
   // shuffle($perhaps);
   // print_r($perhaps);
   // rsort($perhaps,SORT_NUMERIC);
   // print_r($perhaps);
   // echo (is_array($perhaps)) ? "Is array." : "Is NOT array";
   // $chessboard = array(
   //   array('r','n','b','q','k','b','n','r'),
   //   array('p','p','p','p','p','p','p','p'),
   //   array(' ',' ',' ',' ',' ',' ',' ',' '),
   //   array(' ',' ',' ',' ',' ',' ',' ',' '),
   //   array(' ',' ',' ',' ',' ',' ',' ',' '),
   //   array(' ',' ',' ',' ',' ',' ',' ',' '),
   //   array('P','P','P','P','P','P','P','P'),
   //   array('R','N','B','K','Q','B','N','R')
   // );
   // echo '<pre>';
   // foreach($chessboard as $row){
   //   foreach ($row as $piece)
   //     echo "$piece ";
   //   echo '<br>';
   // }
   // echo '</pre>';

   // $products = array(
   //   'paper'=>array(
   //     'copier' => 'Copier & Multipurpose',
   //     'inkjet' => 'Inkjet Printer',
   //     'laser' => 'Laser Printer',
   //     'photo' => 'Photographic Paper',
   //   ),
   //   'pens' => array(
   //     'ball' => 'Ball point',
   //     'hilite' => 'Highlighters',
   //     'marker' => 'Markers',
   //   ),
   //   'misc' => array(
   //     'tape' => 'Sticky Tape',
   //     'glue' => 'Adhesives',
   //     'clips' => 'Paperclips',
   //   )
   // );
   // echo $products['misc']['clips'];
   // echo '<pre>';
   // foreach($products as $section => $item){
   //   foreach ($item as $key => $value) {
   //     echo "$section:\t$key\t($value)<br>";
   //   }
   // }
   // echo '</pre>';

   // $paper2 = array("Batorgil" => "He is owner of this computer",
   //                  "Tuvshinsaihan" => "He is owners friend"
   //                );
   // echo '<pre>';
   // while(list($item, $def)=each($paper2)){
   //   echo "$item: $def <br>";
   // }

   // foreach ($paper2 as $username => $definition) {
   //   echo "$username: $definition <br>";
   // }

   // $paper = array("Batorgil","Tuvshinsaihan");
   // $j = 0;
   // foreach($paper as $item){
   //   echo "$j: $item<br>";
   //   $j++;
   // }
   // $paper1 = array("Batorgil","Tuvshinsaihan");
   // echo 'p1: ' . $paper1[0] . '<br>';
   // $paper2 = array("Batorgil" => "He is owner of this computer",
   //                "Tuvshinsaihan" => "He is owners friend"
   //                );
   // echo 'p2: ' . $paper2['Batorgil'];

   // $paper['Batorgil'] = 'He is owner of this computer';
   // $paper['Tuvshinsaihan'] = 'He is owners friend';
   // echo $paper['Batorgil'];

   // $paper[0]='Speech recocnition';
   // $paper[1]='Deep Learning with Python';
   // $paper[2]='javascript is best way to Develop Front-end for website';
   // for ($i=0; $i<count($paper); $i++) {
   //   echo "$i: $paper[$i] . <br>";
   // }
   // echo '<br>';

   // $paper[0]='Speech recocnition';
   // $paper[1]='Deep Learning with Python';
   // $paper[2]='javascript is best way to Develop Front-end for website';
   // print_r($paper);

   // $paper[]='Speech recocnition';
   // $paper[]='Deep Learning with Python';
   // $paper[]='javascript is best way to Develop Front-end for website';
   // print_r($paper);
   // ?>
  </body>
</html>
