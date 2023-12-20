<?php

$conn = mysqli_connect("127.0.0.1","root","","Entertain");
// $conn = mysqli_connect("sql311.epizy.com","epiz_28500091","m8YKo24jOMq7","epiz_28500091_chatroom");
$plateform = $_POST['platformE'];
$show_name = $_POST['show_name'];
$season = $_POST['season_']; 
$dir_index = $_POST['dir_index'];  
$playtime = $_POST['playtime'];  


$sql = "select * from `history` where plateform = '$plateform' and 	show_name = '$show_name' and season = '$season' and dir_index = '$dir_index'";
$res = mysqli_query($conn,$sql);
// setting time zoon
date_default_timezone_set('Asia/Kolkata');
$date = date('y/m/d');
$time = date('h:i:s a',time());
$number = mysqli_num_rows($res);

if ($number == 0) {
    $sql1 = "INSERT into `history` (`plateform`,`show_name`,`season`,`dir_index`,`time`,`date`,`playtime`) values ('$plateform','$show_name','$season','$dir_index','$time','$date','$playtime')";
}elseif($number > 0){
    $sql1 = "UPDATE `history` SET	`time`='$time',`date`='$date',`playtime`='$playtime' WHERE  plateform = '$plateform' and 	show_name = '$show_name' and season = '$season' and dir_index = '$dir_index'";
    
}if(mysqli_query($conn,$sql1)){echo "ok";}else{echo "null";}

mysqli_query($conn,"UPDATE `last_use` SET `plateform`='$plateform',`show_name`='$show_name',`season`='$season',`dir_index`='$dir_index',`playtime`='$playtime' WHERE id=1");



// $sql = "insert into `history` ;";
// if(mysqli_query($conn,$sql)){}else{echo "no".mysqli_error($conn);}
// mysqli_close($conn);


?>