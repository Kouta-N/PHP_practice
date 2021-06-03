<?php
session_start();
?>

<!DOCTYPE html>

<head>
</head>

<body>

  <?php

echo 'セッションを破棄しました<br><br>';

$_SESSION = [];

if(isset($_COOKIE['PHPSESSIID'])){
  setcookie('PHPSESSOD', '', time()-1800, '/');
}

session_destroy();

echo 'セッション';
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

echo 'クッキー';
echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';

// if(!isset($_SESSION['visited'])){
//   echo '初回訪問です';
// $_SESSION['visited'] = 1;
// $_SESSION['date'] = date('c');
// }else{
//     $visited = $_SESSION['visited'];
//     $visited++;
//     $_SESSION['visited'] = $visited;

//     echo $_SESSION['visited'].'回目の訪問です<br>';

//     if (isset($_SESSION['date'])) {
//         echo '前回訪問は'.$_SESSION['date'].'です';
//         $_SESSION['date'] = date('c');
//     }
// }

// setcookie('id', '', time()-1800, '/');

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// echo '<pre>';
// var_dump($_COOKIE);
// echo '</pre>';

?>

</body>

</html>