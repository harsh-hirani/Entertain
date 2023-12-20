<?php

$conn = mysqli_connect("127.0.0.1","root","","Entertain"); 
$plateform = $_POST['platformE'];
$show_name = $_POST['show_name'];
$season = $_POST['season_']; 
$dir_index = $_POST['dir_index'];   

$sql2 = "SELECT `playtime` FROM `history` WHERE plateform = '$plateform' and show_name = '$show_name' and season = '$season' and dir_index = '$dir_index'";
$return = mysqli_fetch_array(mysqli_query($conn,$sql2));
if (isset($return[0])) {
    echo  $return[0];
}else{
    echo "0.00";
}
?>