<?php

$dirs = scandir("./");
array_shift($dirs);
array_shift($dirs);
array_pop($dirs);
array_pop($dirs);
array_pop($dirs);
array_pop($dirs);
array_pop($dirs);
array_pop($dirs);
//for photos
array_pop($dirs);
array_pop($dirs);
array_pop($dirs);
array_pop($dirs);
// print_r($dirs);

// $FURL = $_SERVER['REQUEST_URI'];

// function db_con($DBName){
//     $server = "localhost";
//     $username = "root";
//     $password = "";
//     return mysqli_connect($server,$username,$password,$DBName);
// }
// $conn = db_con("Entertain");


// //for last seen
// $Q = "select * from last_use";
// $res = mysqli_query($conn,$Q);
// $Ares = mysqli_fetch_array($res);

// /// updating last visit
// date_default_timezone_set('Asia/Kolkata');
// $date = date('d/m/y');
// $time = date('h:i:s a',time());
// $UPDATE_sql = "UPDATE `last_use` SET `URL`='$FURL',`Lable`='$pagename',`date`='$date',`time`='$time' WHERE id=1";
// mysqli_query($conn,$UPDATE_sql);

?>