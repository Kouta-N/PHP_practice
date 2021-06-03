<?php

$contactFile = '.contact.dat';

// $fileContents = file_get_contents($contactFile);

// $add = 'テストです'."\n";

// file_put_contents($contactFile,$add,FILE_APPEND);

// echo $fileContents;

// $allData = file($contactFile);

// foreach($allData as $lineData){
//   $lines = explode(',', $lineData);
//   echo $lines[0].'<br>';
//   echo $lines[1].'<br>';
//   echo $lines[2].'<br>';
// }

$contents = fopen($contactFile, 'a+');
$add = '1行追記'."\n";

fwrite($contents, $add);

fclose($contents);