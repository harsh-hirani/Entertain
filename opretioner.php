<?php
$conn = mysqli_connect("127.0.0.1","root","","Entertain"); 
$opretion_keyword = $_POST['opretion'];
$num = (isset($_POST['numtoref']))?$_POST['numtoref']:20;
if ($opretion_keyword == 'h' || $opretion_keyword == 'H'){
    $sql = 'SELECT * FROM `history` ORDER BY date DESC LIMIT '.$num;
    $result = mysqli_query($conn,$sql);
    echo "<div class=\"container-fluid\">";
    for($i = 0; $i <$num; $i++){
        $ii = $i + 1;
        $data = mysqli_fetch_array($result);
        echo "<div class=\"row my-1 episode-hover\" style=\"cursor: pointer\" onclick=\"history_episode_change('$data[1]','$data[2]','$data[3]','$data[4]');\">";
        echo "<div class=\"col-2\" style=\"border:2px solid white;\">".$ii."</div>";
        $list = scandir("./$data[1]/$data[2]/$data[3]");
        array_shift($list);
        array_shift($list);
        $name = $list[$data[4]];
        $name = str_replace(".mkv","",$name);
        $name = str_replace(".mp4","",$name);
        $name = str_replace("."," ",$name);
        echo "<div class=\"col-10\" style=\"\">".$name."</div>";
        echo "</div>";
    }
}elseif ($opretion_keyword == 'd' || $opretion_keyword == 'D'){

}elseif ($opretion_keyword == "CEbS"){
    $showname_name = $_POST['showname_CEbS'];
    $sql_for_CEbS = "SELECT * FROM `history`WHERE show_name=\"$showname_name\" ORDER BY date DESC LIMIT 1";
    $result_of_CEbS_base = mysqli_query($conn,$sql_for_CEbS);
    $result_of_CEbS = mysqli_fetch_array($result_of_CEbS_base);
    if(mysqli_num_rows($result_of_CEbS_base) > 0){
        $changer = "$result_of_CEbS[1],$result_of_CEbS[2],$result_of_CEbS[3],$result_of_CEbS[4]";
        echo $changer;
    }else{
        echo "no data";
    }
}else{
    echo 'no actione :)';
}
?>