<?php
    $pagename = "home";
    include 'basic.php';
    $connection = mysqli_connect("localhost","root","","Entertain");
    $sqlforthispage = "SELECT * FROM `last_use` WHERE id=1";
    $res = mysqli_query($connection,$sqlforthispage);
    $Ares = mysqli_fetch_array($res);
    $fx = "1120";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="title">Player</title>
        
        <link rel="stylesheet" href="../globle/Bootstrap/css/bootstrap.min.css">
        <style>
            *{
                margin: 0;padding: 0;
            }
            video{
                margin: auto;
                float: center;
                padding: 0; 
            }
            .btn-dark{
                border: none;
            }
            div#episode_list_bucket{
                height: 78vh;
                overflow-x: hidden;
            } /* div#episode_list_bucket::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);  background-color: #F5F5F5; } */
            #extraDIV{
                position: absolute;
                top: 90px; right: 44px;
                width: 18vw;
                height: 78vh;
                overflow: auto;
                background-color:#2e2e2e;
                color: #f1f1f1;
            }
            #shows,#shows1{
                overflow: auto; 
            }
            .down-arrow-by-right{
                max-width: 70px;
            }
            div#episode_list_bucket::-webkit-scrollbar,
            #extraDIV::-webkit-scrollbar{
                width: 10px;  /* background-color: #F5F5F5; */
            }
            div#episode_list_bucket::-webkit-scrollbar-thumb,
            #extraDIV::-webkit-scrollbar-thumb{ /* background-color: #0ae; background-image: -webkit-gradient(linear, 0 0, 0 100%, color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.5, transparent), to(transparent)); */
                background: linear-gradient(cyan,#30ff00);
                border-radius: 6px;
            }
            div#episode_list_bucket::-webkit-scrollbar-thumb:hover,
            #extraDIV::-webkit-scrollbar-thumb:hover{ /*background-color: #0ae; background-image: -webkit-gradient(linear, 0 0, 0 100%,  color-stop(.5, rgba(255, 255, 255, .2)),  color-stop(.5, transparent), to(transparent)); */
                background: linear-gradient(red,#30ff00);
            }
            .col-my,.col-dark-my{  
                text-align: inherit; 
                font: 640 16px Arial;
                border-radius: 4px;
                margin-top: 2px;
            }
            div#bottupper #progress_controller{ 
                position: absolute;
                -webkit-appearance: none;
                cursor: pointer;
                height: 26px; 
                width: 70vw;
                top: 0px;
                left: 0px;
                right: 0px; 
                border-radius: 4px;
                min-width: 5px;
                background: transparent;
                z-index: 1000;
            }
            div#bottupper #progress_controller::-webkit-slider-runnable-track {
                background: rgba(255,255,255,0.1);
            }
            div#bottupper #progress_controller::-webkit-slider-thumb {
                -webkit-appearance: none;
                width: 0px; 
                height: 26px;
                background: red; 
            } 
            #change{
                margin-left: 20px;
            } 
            .text_of_episode_bucket{
                font-size: 1.88em;
            }
            #darkerContainer{
                position: absolute;
                height: 24px;
                width: 6vw;
                min-width: 100px;
                top: 4px; 
                cursor: pointer;
                animation: r_dark_slid .36s linear 1 forwards;
            }
            @keyframes r_dark_slid {
                0%{
                    background-color: #0d6efd;
                    width: 6.4vw;
                    color: #f1f1f1;
                    border: 1px solid #0d6e0d;
                    border-radius: 50px;
                    right: 10px;
                }
                45%{
                    background-color: #fff;
                    width: 6.4vw;
                    color: #f1f1f1;
                    border: 1px solid #0d6e0d;
                    border-radius: 50px;
                    right: 20px;
                }
                100%{
                    background-color: #fff;
                    width: 6.4vw; 
                    color: #000;
                    border: 1px solid #0d6e0d;
                    border-radius: 0px;
                    right: 20px;
                }
            }
            #darkerContainer.activated{
                position: absolute;
                height: 25px;
                top: 4px;
                animation: dark_slid .36s linear 1 forwards;
                
            }
            @keyframes dark_slid {
                0%{
                    background-color: #0d6efd;
                    width: 6.4vw; 
                    color: #000;
                    border: 1px solid #0d6e0d;
                    border-radius: 0px;
                    right: 20px;
                }
                45%{
                    background-color: #0d6efd;
                    width: 6.4vw;
                    color: #f1f1f1;
                    border: 1px solid #0d6e0d;
                    border-radius: 50px;
                    right: 20px;
                }
                100%{
                    background-color: #0d6efd;
                    width: 6.4vw;
                    color: #f1f1f1;
                    border: 1px solid #0d6e0d;
                    border-radius: 50px;
                    right: 10px;
                }
            }
            #body{
                height: 100vh;
                width: 100vw;
                z-index: -10;
                position: absolute;
                top: 0px;
                left: 0px;
                right: 0px;
                transition: background .4s linear;
            }
            .dark_list_ol{
                background: #1c1c1c;
            }
            .dark_list_ol .list-group-item-actio.col-my{
                background: #444;
                color: #f1f1f1;
                width: 100%;
                overflow: auto;
            }
            .col-my-ol-my{
                font-size: 1.1rem;
            }
            .dark_list .col .col-my-ol-my{
                background: #333;
                color: #f1f1f1;
                cursor: pointer;
                font-size: 1rem;
            }
            .dark_list_ol .list-group-item-actio.col-my.activeo,
            .activeo{
                background-color: #0d6efd;
                border-color: #0d6efd;
                color: #f1f1f1;
            }
            .cursor-pointer{
                cursor: pointer;
            }
            div.buttons_of_actions_in_vertical_position{
                position: fixed;
                top: 85px;
                right:-16x;
                transform: rotate(90deg) translate(45% , -320%);
            }
            .my-row{
                display:flex;
            }
            #header{
                text-align:center;
                border-bottom: 2px soild black;
                text-transform:capitalize;
                border-bottom: 3px solid #fefeff;
            }
            .episode-hover{
                background:#000;
            }
            .episode-hover:hover{
                /* background: #30ff00; */
                background:#f1f1f1;
                color:#000;
            }
            .down-arrow-by-right{
                position: relative;
                left: 0px;
                top: 0px;
                transform: rotate(90deg);
                height: 50px;
                width: 23px;
                color: #f1f1f1;
                background: #555;
                border-color: #777;
                border-radius: 3px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 23px;
                cursor: pointer;
            }
            .dark_list .down-arrow-by-right{
                background: #0d6efd;
                border-color: #0d6efd;
                height: 100%;
            }
            .o-hidden{
                overflow: hidden;
            }
            .text-center{
                align-items: center;
            }
            #speed_meter{
                margin-left: 5px;
                height: 5px;
                line-height: 10px;
                padding: 0px 6px;
                background-color: #7d5fff;
                color: #fff;
                border-radius: 9px;
            }
            /* laptop view */
            @media (min-width:<?php echo $fx;?>px){
                .b-lap{
                    display: none;
                }
                #search_box{
                    position: absolute;
                    height: 35px;
                    width: 25vw;
                    top: -444px; /* 4px*/
                    right: 130px;
                    background: #fff;
                    cursor: pointer;
                    border-radius: 6px;
                }
                .dark_list .col-my-112211 .col-my-ol-my{
                    background: #333333;                                                                                                                                                                                                                                                                                                                        
                }
                #shows .col-my-112211{
                    max-height: 35px;
                    max-width: 20vw;
                }
                #shows.dark_list .col-my-112211{
                    color: #f1f1f1;
                } 
                #shows {
                    display:flex;
                    justify-content: space-between;flex-wrap: nowrap
                }
                .slider-allow-x{
                    overflow: auto;
                    width: 100%;
                }
                #shows::-webkit-scrollbar,
                .slider-allow-x::-webkit-scrollbar{
                    width: 1px;  
                    height: 2px;
                    transform: translateY(-20px);
                }
                div#episode_list_bucket::-webkit-scrollbar-thumb,
                .slider-allow-x::-webkit-scrollbar-thumb,
                #shows::-webkit-scrollbar-thumb{
                    background: linear-gradient(cyan,#30ff00);
                    border-radius: 6px;
                    animation: sliderSet 1.3s linear infinite;
                }
                @keyframes sliderSet {
                    0% {
                        background: linear-gradient(cyan,#30ff00);
                    }
                    50% {
                        background: linear-gradient(red,#30ff00);
                    }
                    100% {
                        background: linear-gradient(cyan,#30ff00);
                    }
                }
                div#episode_list_bucket::-webkit-scrollbar-thumb:hover,
                .slider-allow-x::-webkit-scrollbar-thumb:hover,
                #shows::-webkit-scrollbar-thumb:hover{ 
                    background: linear-gradient(red,#30ff00);
                }
                div#bottupper::after{
                    position: absolute;
                    content:'';
                    height:26px;
                    width: 5px;
                    background: linear-gradient(#ff3344,#f1c40f);
                    top: 0px;
                    right: 0px;
                    border-radius: 4px;
                }
                div#bottupper #player_time_indicator{ 
                    position: absolute;
                    cursor: pointer;
                    height: 26px; 
                    top: 0px;
                    left: 0px;
                    right: 0px; 
                    border-radius: 4px;
                    min-width: 5px;
                    background: linear-gradient(#f1c40f ,transparent);
                    z-index: -10;
                }
                div#bottupper{
                    position: fixed;
                    height: 26px;
                    bottom: 10px;
                    width: 70vw;
                    left: 20px;
                    padding: auto 3px;padding-left: 10px;
                }
                #timestamper{
                    position: fixed;
                    height: 26px;
                    bottom: 10px;
                    width: 10vw;
                    left: calc(60vw + 20px);
                    line-height: 26px;
                    background: transparent;
                    color: #fff;
                }
                div#bott{
                    position: absolute;
                    height: calc(26px*2);
                    bottom: 10px;
                    width: 27vw;
                    left: 72vw;
                    padding: auto 3px;
                    padding-left: 10px;
                    overflow: hidden;
                }
                div#episode_list_bucket{
                    position: absolute;
                    top: 90px; right: 44px;
                    width: 18vw;
                }
                .buttons_of_actions_in_vertical_position{
                    right: -10px;
                }
                #player_slayer{
                    content: "x";
                    height: 30px;
                    width: 62px;
                    background: chartreuse;
                    border-radius: 10px;
                    /* transition: all 1.1s linear; */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 15px;
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    cursor: pointer;
                    z-index: 1000000;
                }
                #player_slayer::before{
                    content: "...";
                    font-size: 92px;
                    position: absolute;
                    height: 33px !important;
                    top: -86px;
                    width: 90%;
                    color: #f1f1f1;
                }
            }
            /* mobile view */
            @media (max-width:<?php echo $fx;?>px){
                #darkerContainer{
                    display: none;
                }
                .b-mobile{
                    display: none;
                }
                #body{
                    display: block;
                }
                .class-of-video-in-mobile-view{
                    width: 87vw;
                    margin-left: -2%;
                    margin-top: 15px !important; 
                    border-radius: 7px;
                }
                div#episode_list_bucket{
                    width: 90%;
                    margin-left: 4%;
                }
                .col-my-ol-my{
                    font-size: 1rem;
                    min-width: 111px;
                }
                #extraDIV{
                    width: 70%;
                    opacity: 0.988;
                    right: 44px;
                }
                .my-row-for-scrolling-view{
                    display: flex;  
                    width: 96vw;
                    overflow: auto;
                }
                .my-col-for-scrolling-view{
                    width: 60%;
                    height: auto;
                    position: relative;
                }
                .my-row-for-scrolling-view::after,.my-row-for-scrolling-view::before{
                    position: absolute;
                    height: 30px;
                    width: height();
                    color: #fff;
                    background-color: #17c0eb;
                    border-radius: 3px;
                }
                .my-row-for-scrolling-view::before{
                    content: '<';
                    left: 10px;
                }
                .my-row-for-scrolling-view::after{
                    content: '>';
                    right: 10px;
                }
                .buttons_of_actions_in_vertical_position{
                    top: 146px !important;
                    right: -5px !important;
                    font-size: 17px;;
                }
                .text_of_episode_bucket{
                    font-size: 1.175rem;
                }
                .navbar.bg-my{
                    opacity: .959;
                    border-radius: 20px;
                    width: 88vw;
                    margin:1px 6vw 10px 6vw;
                    overflow: hidden;
                    height: 44px;
                    background: linear-gradient(to bottom, #a65ef6, #4542df 88%);
                    transition: .16s all linear;
                }
                #threeBar{
                    transform: rotate(90deg);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .navbar-expanded #threeBar{
                    content: 'x';
                }
                #bottupper{
                    width: 87vw;
                    margin-top: 10px;
                    margin-left: 3.88vw;
                    background: #1c1c1c;
                    color: #f1f1f1;
                    border-radius: 10px;
                    padding-left: 10px;
                }
                #shows1{
                    width:90vw;
                }
            } 
        </style>
    </head>
    <body>
        <div id="body">
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <nav class="navbar navbar-expand-sm my-2 bg-my b-lap" id="navbar">
            <div class="container-fluid">
                <div class="row w-100">
                    <div class="col-1">
                        <img src="http://localhost/favicon.ico" alt="" srcset="" height="30px">
                    </div>
                    <div class="col-3  text-white text_of_episode_bucket">&nbsp;&nbsp;&nbsp;&nbsp;Entertain</div>
                    <div class="col-1 offset-6 text-white" id="threeBar">|||</div>
                    <div class="col-9 offset-1 text-white">&nbsp;&nbsp; Watch the best freely </div>
                    <div class="col-11 offset-1">
                        <div class="row">
                            <button id="episode_btn1" class="btn-danger col-3" onclick="remove(1)" outline="none" onkeydown="event.preventDefault()">Close</button>
                            <button id="description_btn1" class="btn-dark col-3" onclick="show_description(1)" outline="none" onkeydown="event.preventDefault()">Description</button>
                            <button id="history_btn1" class="btn-dark col-3" onclick="show_history(1)" outline="none" onkeydown="event.preventDefault()">History</button>
                            <button id="speed_btn1" class="btn-dark col-3" onclick="show_adjestments(1)" outline="none" onkeydown="event.preventDefault()">Adjest</button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div id="darkerContainer" onclick="dark()"><label   class="col-dark-my">&nbsp;Dark Theme</label></div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- for data -->
        <div class="container-fluid" id="container">
           <!-- for laptop -->
            <div class="row b-mobile" id="platform"></div>
            <div class="row b-mobile" id="shows"></div>
            <div class="row b-mobile" id="seasons"></div>
           <!-- for mobile -->
            <div class="my-row-for-scrolling-view b-lap mb-2" id="platform1"></div>
            <div class="my-row-for-scrolling-view b-lap" id="shows1"></div>
            <div class="my-row-for-scrolling-view b-lap" id="seasons1"></div>
        </div>      
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div id="player_slayer" class="b-mobile" onmouseover="i();" onmouseout="o();" onclick="c();"></div>
        <div id="change"></div>                <!--   it's player area -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="buttons_of_actions_in_vertical_position my-row bg-dark text-white b-mobile">
            <button id="episode_btn" class="btn-danger col-3" onclick="remove(0)" outline="none" onkeydown="event.preventDefault()">Episodes</button>
            <button id="description_btn" class="btn-dark col-3 mx-1" onclick="show_description(0)" outline="none" onkeydown="event.preventDefault()">Description</button>
            <button id="history_btn" class="btn-dark col-3" onclick="show_history(0)" outline="none" onkeydown="event.preventDefault()">History</button>
            <button id="speed_btn" class="btn-dark col-3" onclick="show_adjestments(0)" outline="none" onkeydown="event.preventDefault()">Adjest</button>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div id="bottupper"></div>
        <div id="timestamper" class="row b-mobile">
            <div id="current_time" class="col-4 m-0"></div> 
            <div id="duration" class="col-8"></div>
        </div>
        <div id="bott"></div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="" id="episode_list_bucket"></div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div id="extraDIV">
            <div class="my-container">
                <h1 id="header"></h1>  
            </div>
            <div id="action_box"></div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
       
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div id="search_box" class="b-mobile">
            <input type="text" name="search" id="search">
            <i class="fas fa-search fa-2x btn-primary ml-auto"> ‖◕_◕‖ </i>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <script src="http://localhost/globle/JQ/jquery-3.6.0.js"></script>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <script>
            //// main vars used for script  /////////////////////////////////////////////////////////////////////////////////////
             var episode_list_bucket = document.getElementById("episode_list_bucket");
             first_time_change_of_green_slider = false;
             var active_number = 132;
             var speed_variables = [0.25,0.50,0.75,1.00,1.25,1.50,1.75,2.00];
             var platform = document.getElementById("platform");
             var shows = document.getElementById("shows");
             var seasons = document.getElementById("seasons");
             ////////////////////////////////////////////////////////////////
             var platform1 = document.getElementById("platform1");
             var shows1 = document.getElementById("shows1");
             var seasons1 = document.getElementById("seasons1");
             ////////////////////////////////////////////////////////////////
             var btns_of_vertical_actions = {
                "E" : document.getElementById("episode_btn"),
                "D" : document.getElementById("description_btn"),
                "H" : document.getElementById("history_btn"),
                "S" : document.getElementById("speed_btn"),
                "vnE" : document.getElementById("episode_btn1"),
                "vnD" : document.getElementById("description_btn1"),
                "vnH" : document.getElementById("history_btn1"),
                "vnS" : document.getElementById("speed_btn1"),
             };
             var btn_color_pre_code = "E";
             //////////////////   slider buttons var   //////////////////////
             let circle = document.getElementById('player_slayer');
             let slide_permission = false;
             let firstTimeOpen = true;
             let clicked = false;
             let current_speed = 1.00;
             let historyNum = 20;
             let refreshBtner = '<span class="mx-5 fa-2x" style="transform:scale(1.4);cursor: pointer;" onclick="refresher()">🔃</span>';
             ////////////////////////////////////////////////////////////////
             var plater_adder_for_lap = "";
             var plater_adder_for_mob = "";
             var _platform_ = "";
             var _series_ = "";
             var _season_ = "";
             var _q_ = 0;  
             var dark_status = false;
             var navbar_expanded = false;
             var full_screen_status = false;
             var resized_status = false;
             var action_box_status = false;
             var in_search = false;
             var backscriptpermission = <?php if(isset($_GET['backscript'])) { echo "\"no\""; } else { echo "\"yes\""; }?>;
             set_interval_time = 0;
             const password = ["1@1@harsh(00)","false"];
             protectedList = ["GGFF","Domestic na Kanojo"];
             var heightSpecifire = [590,100,0];//[defult height, height in persantage, extra height in pexels/10]
            ////var for dirs
             var data = [
                <?php
                    for($di=0;$di<sizeof($dirs);$di++){
                        echo "\"".$dirs[$di]."\""." ".",";
                    }
                ?>
             ];
            //adding a data series name list in each data its perfect dont touch it and error is name that was given later on for loop
            <?php
                for ($adi=0; $adi < sizeof($dirs)  ; $adi++) { 
                    $_un_plateform_name = scandir("./$dirs[$adi]");
                    array_shift($_un_plateform_name);
                    array_shift($_un_plateform_name);
                    //print_r($_un_series_name);
                    echo "\n data[\"$dirs[$adi]\"] = [];";
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
                    for ($bdi=0; $bdi < sizeof($_un_plateform_name); $bdi++) { 
                        $_un_series_name = scandir("./$dirs[$adi]/$_un_plateform_name[$bdi]");
                        array_shift($_un_series_name);
                        array_shift($_un_series_name);
                        echo "\n data[\"$dirs[$adi]\"][\"$_un_plateform_name[$bdi]\"] = [];"; 
                        echo "\n data[\"$dirs[$adi]\"][\"p\"] = [";
                        for ($bddi=0; $bddi < sizeof($_un_plateform_name); $bddi++) { 
                            echo "\"".$_un_plateform_name[$bddi]."\",";
                        }
                        echo"];";
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        for ($cdi=0; $cdi < sizeof($_un_series_name); $cdi++) { 
                            $_un_series_seasons = scandir("./$dirs[$adi]/$_un_plateform_name[$bdi]/$_un_series_name[$cdi]");
                            array_shift($_un_series_seasons);
                            array_shift($_un_series_seasons);
                            echo "\n data[\"$dirs[$adi]\"][\"$_un_plateform_name[$bdi]\"][\"p\"] = [";
                            for ($bddi=0; $bddi < sizeof($_un_series_name); $bddi++) { 
                                echo "\"".$_un_series_name[$bddi]."\",";
                            }
                            echo"];";
                            echo "\n data[\"$dirs[$adi]\"][\"$_un_plateform_name[$bdi]\"][\"$_un_series_name[$cdi]\"] = ["; 
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            for ($ddi=0; $ddi < sizeof($_un_series_seasons); $ddi++) { 
                                echo "\n\"$_un_series_seasons[$ddi]\",";
                            }
                            echo "\n];";
                        }
                    }
                }
            ?>
            /// of expending nav bar button ////////////////////////////////////////////////////////////////////////////////////
            document.getElementById("threeBar").addEventListener("click", () => {
                if (navbar_expanded === false) {
                    document.getElementById("navbar").style.height = "100px";
                    document.getElementById("navbar").classList.add("navbar-expanded");
                    navbar_expanded = true;
                }else if(navbar_expanded === true){
                    document.getElementById("navbar").style.height = "44px";
                    document.getElementById("navbar").classList.remove("navbar-expanded");
                    remove();
                    navbar_expanded = false;
                }
            });
            /// of slider buttons///////////////////////////////////////////////////////////////////////////////////////////////
            const i = () => {
                slide_permission = true;
            }
            const o = () => {
                slide_permission = false;
                clicked = false;
            }
            const c = () => {
                var changed_status = (clicked == true) ? false : true;
                clicked = changed_status;
            }
            const onMouseMove = (e) => {
                if (e.clientX < (screen.width / 2) && e.clientY < (screen.height / 2) && e.clientY > document.getElementById("container").offsetHeight && slide_permission === true && clicked === true) {
                    var x = e.pageX - 35 - 4;
                    var y = e.pageY - 15 - 3;
                    circle.style.left = x + 'px';
                    circle.style.top = y + 'px';
                    var tag = document.getElementById("change");
                    tag.style.left = x + 'px';
                    tag.style.top = y + 'px';
                }
            }
            document.addEventListener('mousemove', onMouseMove);
            const speed_shower = (e) => {
                document.getElementById("speed_meter").innerHTML = e + "x";
            }
            const toggleSpeed = (e) => {
                document.querySelector('video').playbackRate = e;
                current_speed = e;
                speed_shower(e);
            }
            /// of buttons//////////////////////////////////////////////////////////////////////////////////////////////////////
            for (let plater = 0; plater < data.length; plater++) {
                plater_adder_for_lap += "\n\t\t\t<div class=\"col b-mobile cursor-pointer plater px-5\"><div class=\"col-my-ol-my px-4 mt-1\" onclick=\"change_shows_list('" + data[plater] + "')\">" + data[plater] + "</div></div>";
                plater_adder_for_mob += "\n\t\t\t<div class=\"my-col-for-scrolling-view b-lap cursor-pointer plater px-5\"><div class=\"col-my-ol-my px-4 mt-1\" onclick=\"change_shows_list('" + data[plater] + "')\">" + data[plater] + "</div></div>";
            }
            platform.innerHTML = plater_adder_for_lap;
            platform1.innerHTML = plater_adder_for_mob;
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
            function red_converter(value,vn) {
                if (vn == 0) {     
                    btns_of_vertical_actions[btn_color_pre_code].classList.remove("btn-danger");
                    btns_of_vertical_actions[btn_color_pre_code].classList.add("btn-dark");
                    btns_of_vertical_actions[value].classList.remove("btn-dark");
                    btns_of_vertical_actions[value].classList.add("btn-danger");
                    btn_color_pre_code = value;
                }else if(vn == 1){
                    btns_of_vertical_actions["vn"+btn_color_pre_code].classList.remove("btn-danger");
                    btns_of_vertical_actions["vn"+btn_color_pre_code].classList.add("btn-dark");
                    btns_of_vertical_actions["vn"+value].classList.remove("btn-dark");
                    btns_of_vertical_actions["vn"+value].classList.add("btn-danger");
                    btn_color_pre_code = value;
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function remove(vn){
                document.getElementById("extraDIV").style.display = "none";
                document.getElementById("extraDIV").style.zIndex = "-333";
                red_converter("E",vn);
                document.getElementById("player_slayer").style.display = "none";
            }remove();
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function show_description(vn){
                document.getElementById("extraDIV").style.display = "block";
                document.getElementById("extraDIV").style.zIndex = "1000";
                document.getElementById("header").innerHTML = "description";
                red_converter("D",vn);
                $.post("opretioner.php",{opretion : "d",},(data,status)=>{
                    let addingdata = document.getElementById("bottupper").innerText+data;
                    document.getElementById("action_box").innerHTML=addingdata;
                });
                document.getElementById("player_slayer").style.display = "none";
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function show_history(vn,historyNumber){
                document.getElementById("extraDIV").style.display = "block";
                document.getElementById("extraDIV").style.zIndex = "1000";
                document.getElementById("header").innerHTML = "<div class=\"row\"><div class=\"col-8\">history</div><div class=\"col-3\"><select value=\""+historyNum+"\" oninput=\"history_num_selector(this);\"><option>20</option><option>25</option><option>30</option><option>40</option></select></div> </div>";
                red_converter("H",vn);
                $.post("opretioner.php",{opretion: "h",numtoref:historyNumber},(data,status)=>{
                    document.getElementById("action_box").innerHTML = data;
                }); 
                document.getElementById("player_slayer").style.display = "none";
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function show_adjestments(vn){
                red_converter("S",vn);
                document.getElementById("extraDIV").style.display = "block";
                document.getElementById("extraDIV").style.zIndex = "1000";
                document.getElementById("header").innerHTML = "Select Speed";
                var speedyData = "<div class=\"row m-0 p-0\">";
                for(var i = 0; i <speed_variables.length; i++) {
                    speedyData = speedyData + "<div class=\" col-8 offset-2\" style=\"font-size:19px;color:#f1f1f1; cursor:pointer;\" onclick=\"toggleSpeed("+speed_variables[i]+")\">" + speed_variables[i] + "</div>";
                }speedyData = speedyData + "</div>";
                speedyData = speedyData + "<div class=\"row m-0 p-0 b-mobile\"> <div class=\"col-10 offset-1\" style=\"wight:80%;height:7px;background: linear-gradient(45deg,cyan,chartreuse);\"> </div></div>";
                var new_adding = "<br> <label for=\"vEHEIGHTRange\" id=\"vEHEIGHTRangeLabel\" class=\"form-label\"  style=\"font-size:22px;color:#f1f1f1;\">Extra height +"+heightSpecifire[2]+"px</label> <input onkeydown=\"event.preventDefault()\" type=\"range\" value=\""+heightSpecifire[2]+"\" class=\"form-range\" min=\"0\" max=\"25\" id=\"vEHEIGHTRange\" oninput=\"videoheightadj('E',this)\">";
                speedyData = speedyData + "<div class=\"row m-0 p-0 b-mobile\"> <div class=\"col-10 offset-1\"> <label for=\"vHEIGHTRange\" id=\"vHEIGHTRangeLabel\" class=\"form-label\"  style=\"font-size:22px;color:#f1f1f1;\">Height - "+heightSpecifire[1]+"%</label> <input onkeydown=\"event.preventDefault()\" type=\"range\" value=\""+heightSpecifire[1]+"\" class=\"form-range\" min=\"30\" max=\"100\" id=\"vHEIGHTRange\" oninput=\"videoheightadj('N',this)\">" + new_adding;
                document.getElementById("action_box").innerHTML = speedyData;
                document.getElementById("player_slayer").style.display = "block";
                if (first_time_change_of_green_slider === false) {
                    circle.style.top = document.getElementById("container").offsetHeight + "px";
                    first_time_change_of_green_slider = true;
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            const refresher = () => {
                if(backscriptpermission == 'yes'){
                    var player_tage_for_shorcut = document.getElementById("video_player_tage");
                    //server jquery and updating 
                    var current_time = player_tage_for_shorcut.currentTime;
                    document.getElementsByClassName("col-my")[_q_].scrollIntoView();
                    $.post("update.php", {platformE : _platform_, show_name : _series_ , season_ : _season_, dir_index: _q_, playtime : current_time},(data, status)=>{if(data == "ok"){return true;}else{return false;}});
                }
            }      
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
            function change_shows_list(platform){ 
                var  shower_adder_for_lap = "";
                var  shower_adder_for_mob = "";
                for (let shower = 0; shower < data[platform]["p"].length; shower++) {
                    shower_adder_for_lap = shower_adder_for_lap + "<div class=\"co col-my-112211 b-mobile d-flex\"> <div class=\"col-my-ol-my w-100 cursor-pointer my-1 px-4\" onclick=\"change_episode_by_platform_and_showname('"+ platform + "','" + data[platform]["p"][shower] + "')\">" + data[platform]["p"][shower] + "</div>"; 
                    shower_adder_for_lap = shower_adder_for_lap + "<span class=\"down-arrow-by-right text-white\" onclick=\"change_season_list('" + platform + "','" + data[platform]["p"][shower] + "')\"> > </span> </div>";             
                    shower_adder_for_mob = shower_adder_for_mob + "<div class=\"my-col-for-scrolling-view b-lap d-flex\"> <div class=\"col-my-ol-my w-100 cursor-pointer my-1 px-4\" onclick=\"change_episode_by_platform_and_showname('"+ platform + "','" + data[platform]["p"][shower] + "')\">" + data[platform]["p"][shower] + "</div>"; 
                    shower_adder_for_mob = shower_adder_for_mob + "<span class=\"down-arrow-by-right text-white\" onclick=\"change_season_list('" + platform + "','" + data[platform]["p"][shower] + "')\"> > </span> </div>";             
                } 
                shows.innerHTML = shower_adder_for_lap;
                shows1.innerHTML = shower_adder_for_mob;
                seasons.innerHTML = "<div class=\"col\"> <div class=\"text-center text-primary text-capitalize col-my-ol-my cursor-pointer px-4\"> Please select show name to proceed</div></div>";
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            var passable = false;
            function change_season_list(platform,showname){
                if(password[1] == "false"){
                    if (showname == protectedList[0]||showname == protectedList[1]) {
                        var entered = prompt("data is protected please enter a password");
                        if (entered == password[0]) {
                            password[1] = "true";
                            passable = true;
                        }else{
                            alert("incorrect password");
                            passable = false;
                        }
                    }else{
                        passable = true;
                    }
                }
                if(passable){
                    last_show = showname;last_season="";
                    var seasoner_adder_for_lap = "";
                    var seasoner_adder_for_mob = "";
                    console.log(data[platform][showname]);
                    for (let seasoner = 0; seasoner < data[platform][showname]["p"].length; seasoner++) {
                        const element = data[platform][showname]["p"][seasoner];
                        seasoner_adder_for_lap +=  "<div class=\"col b-mobile\"> <div class=\"col-my-ol-my cursor-pointer px-4\" onclick=\"change_list('"+ platform + "','" + showname + "','" + element + "')\">" + element + "</div></div>";
                        seasoner_adder_for_mob +=  "<div class=\"my-col-for-scrolling-view b-lap\"> <div class=\"col-my-ol-my cursor-pointer px-4\" onclick=\"change_list('"+ platform + "','" + showname + "','" + element + "')\">" + element + "</div></div>";
                    }
                    seasons.innerHTML = seasoner_adder_for_lap;
                    seasons1.innerHTML = seasoner_adder_for_mob;
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            const f_2 = "</button>";
            function change_list(platform,series,season){
                if(passable){
                    if (season == last_season) {
                        // do nothing
                    }else{
                        last_season = season;
                        active_number = 132;
                        var list_epi = "";
                        list_epi = list_epi + "<div class=\"list-group also-bucket-with-my-own-scroll\">"; 
                        for (let li = 0; li < data[platform][series][season].length; li++) { 
                            lii = li + 1;
                            var tooltiper_ = data[platform][series][season][li];
                            var display_list_item;
                            if (platform == "Netflix") {
                                display_list_item = "Episode" + lii;
                            } else {
                                display_list_item = tooltiper_.replace(/\_/g, " ");
                            }
                            list_epi = list_epi +  "<button class=\"col-my slider-allow-x list-group-item list-group-item-actio\" data-toggle=\"tooltip\" title=\"" + tooltiper_ + "\" onclick=\"change_episode('" + platform + "','" + series + "','" + season +"'," + li + ")\"> <div class=\"text_of_episode_bucket\"> " + display_list_item + "</div>" + f_2;
                        }
                        list_epi = list_epi + "</div>"; 
                        episode_list_bucket.innerHTML = list_epi; 
                    }
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function change_episodeer_engine(platform,series,season,q){
                if(passable){
                    var videoname = data[platform][series][season][q];
                    _platform_ = platform; _series_ = series; _season_ = season; _q_ = q;
                    if ( screen.width > <?php echo $fx;?>) {
                        var stylesheet_according_screen = "\" height=\"590px\"";
                    }else{
                        var stylesheet_according_screen = " class-of-video-in-mobile-view \" controls";
                    }
                    if (firstTimeOpen) {
                        firstTimeOpen = false;
                    }else{
                        
                    }
                    if (dark_status == true) {
                        show_name_font_color = "#f1c40f";//yellow
                    } else {
                        show_name_font_color = "#2ecc71";//green
                    }
                    document.getElementById("change").innerHTML = "<video autoplay=\"on\" id=\"video_player_tage\" class=\"mt-2" + stylesheet_according_screen + "> \n <source  src=\"" + platform + "/" + series + "/" + season + "/" + videoname +"\" type=\"video/mp4\"> \n </video>";
                    document.getElementById("bott").innerHTML="you are watching ep_"+ (q+1) + "<span id=\"speed_meter\"></span>" + "<br/>" + "<span style=\"color:#ff3344;\">" + platform + "</span>" + " : " + "<span id=\"showname_bott\" style=\"color:" + show_name_font_color + ";\">" + series + "</span>" +  " -- " + "<span style=\"color:#1c63ff;\">" + season + "</span>"+refreshBtner ;
                    document.getElementById("bottupper").innerHTML ="<div id=\"player_time_indicator\"></div>" + videoname.replace(/\./g, " ") + "<input type=\"range\" onkeydown=\"event.preventDefault()\" onchange=\"change_video_current_time()\" id=\"progress_controller\" class=\"b-mobile\">";
                    document.getElementById("title").innerHTML = data[platform][series][season][q];
                    heightSpecifire[1] = 100; 
                    heightSpecifire[2] = 0; 
                    document.getElementsByClassName("col-my")[q].classList.add("activeo");
                    if(active_number===132){
                        active_number = q
                    }else{ 
                        document.getElementsByClassName("col-my")[active_number].classList.remove("activeo");
                        active_number = q;
                    }
                    $.post("reciever.php",{platformE : platform, show_name : series , season_ : season, dir_index: q},(data,status)=>{
                        document.getElementById("video_player_tage").currentTime = data;
                        document.getElementById("video_player_tage").playbackRate = current_speed;
                    }); 
                    speed_shower(current_speed);
                    resized_status = false;
                }
            }
            function change_episode(platform,series,season,q){
                if(q===active_number){
                }else{
                    change_episodeer_engine(platform,series,season,q);
                }
                remove();
            }
            function change_episode_by_platform_and_showname(platform,showname){
                var keys = {p : "",sh : "",se : "",d : "",}
                $.post("opretioner.php",{opretion : "CEbS" , showname_CEbS : showname,},(data_,status)=>{
                    keys = data_.split(",");
                    if(keys.length > 1){
                        change_season_list(keys[0],keys[1]);
                        change_list(keys[0],keys[1],keys[2]);
                        change_episode(keys[0],keys[1],keys[2],keys[3]);console.log("first")
                    }else if(data_ == "no data"){
                        change_season_list(platform,showname);console.log(platform+showname);console.log(data[platform]);console.log(platform+showname)
                        change_list(platform,showname,data[platform][showname]["p"][0]);
                        change_episode(platform,showname,data[platform][showname]["p"][0],0);
                    }console.log("done")
                });
            }
            function videoheightadj(type,valinput){
                var tage = document.getElementById("video_player_tage");
                if (type == "N") {
                    var px = heightSpecifire[0] * (valinput.value / 100);
                    document.getElementById("vHEIGHTRangeLabel").innerHTML = "Height - " + valinput.value  + "%";
                    document.getElementById("vEHEIGHTRangeLabel").innerHTML = "Extra height +0px";
                    heightSpecifire[1] = valinput.value;
                    heightSpecifire[2] = 0;
                    document.getElementById("vEHEIGHTRange").value = 0;
                }else if(type == "E"){
                    var px = heightSpecifire[0] + (valinput.value * 10);
                    document.getElementById("vEHEIGHTRangeLabel").innerHTML = "Extra height +" + (valinput.value * 10) + "px";
                    document.getElementById("vHEIGHTRangeLabel").innerHTML = "Height - 100%";
                    heightSpecifire[2] = valinput.value;
                    heightSpecifire[1] = 100;
                    document.getElementById("vHEIGHTRange").value = 100;
                }
                tage.style.height = px + "px";
            }
            // doing same as left //////////////////////////////////////////////////////////////////////////////////////////////
            change_shows_list("<?php echo $Ares[1];?>");
            change_season_list("<?php echo $Ares[1];?>","<?php echo $Ares[2];?>");
            change_list("<?php echo $Ares[1];?>","<?php echo $Ares[2];?>","<?php echo $Ares[3];?>");
            change_episode("<?php echo $Ares[1];?>","<?php echo $Ares[2];?>","<?php echo $Ares[3];?>",<?php echo $Ares[4];?>);
            // done/////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ///dark theme 
            function dark(){
                if( screen.width > <?php echo $fx;?>){
                    if (dark_status == false) {
                        dark_status = true;
                        document.getElementById("showname_bott").style.color = "#f1c40f";
                        document.getElementById("darkerContainer").classList.add("activated");
                        document.getElementById("body").style.backgroundColor = "#000";
                        document.getElementById("change").style.backgroundColor = "#000";
                        document.getElementById("change").classList.add("text-white");
                        document.getElementById("bott").style.backgroundColor = "#111";
                        document.getElementById("bott").classList.add("text-white");
                        document.getElementById("bottupper").style.backgroundColor = "#111";
                        document.getElementById("bottupper").classList.add("text-white");
                        episode_list_bucket.classList.add("dark_list_ol");
                        platform.classList.add("dark_list");
                        shows.classList.add("dark_list");
                        seasons.classList.add("dark_list");
                    } else if (dark_status == true) {
                        dark_status = false;
                        document.getElementById('showname_bott').style.color = "#2ecc71";
                        document.getElementById("darkerContainer").classList.remove("activated");
                        document.getElementById("body").style.backgroundColor = "#fff"; 
                        document.getElementById("change").style.backgroundColor = "#fff";
                        document.getElementById("change").classList.remove("text-white");
                        document.getElementById("bott").style.backgroundColor = "#fff";
                        document.getElementById("bott").classList.remove("text-white");
                        document.getElementById("bottupper").style.backgroundColor = "#fff";
                        document.getElementById("bottupper").classList.remove("text-white");
                        episode_list_bucket.classList.remove("dark_list_ol");
                        platform.classList.remove("dark_list");
                        shows.classList.remove("dark_list");
                        seasons.classList.remove("dark_list");
                    }
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            const player_time_indicator_updater = () => {
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                var player_time_indicator = document.getElementById("player_time_indicator");
                var player_tage_for_shorcut = document.getElementById("video_player_tage");
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                var current_time = player_tage_for_shorcut.currentTime;
                var total_seconds = player_tage_for_shorcut.duration;
                var persentage_of_player_runtime = (current_time/total_seconds)*100; 
                var actule_length = persentage_of_player_runtime;
                var actule_value = actule_length + "%";
                player_time_indicator.style.width = actule_value;  
                var current_time = Math.floor(player_tage_for_shorcut.currentTime);
                var total_seconds = Math.floor(player_tage_for_shorcut.duration);                
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                if(Math.floor(current_time/60 >= 60)){
                    if((Math.floor(current_time / 60) - 60 ) <= 9){
                        var current_time_readable = Math.floor(current_time/3600) + ":0" + (Math.floor(current_time / 60) % 60 ) + ":" + (current_time % 60);
                    }else{
                        var current_time_readable = Math.floor(current_time/3600) + ":" + (Math.floor(current_time / 60) % 60 ) + ":" + (current_time % 60);
                    }
                }else{
                    var current_time_readable = Math.floor(current_time / 60) + ":" + (current_time % 60);
                }
                if(Math.floor(total_seconds/60) >= 60 ){
                    if ((Math.floor(total_seconds / 60) % 60) <+ 9) {
                        var total_seconds_readable = Math.floor(total_seconds/3600) + ":0" + (Math.floor(total_seconds / 60) % 60 ) + ":" + (total_seconds % 60);
                    } else {                        
                        var total_seconds_readable = Math.floor(total_seconds/3600) + ":" + (Math.floor(total_seconds / 60) % 60 ) + ":" + (total_seconds % 60);
                    }
                }else{
                    var total_seconds_readable = Math.floor(total_seconds / 60) + ":" + (total_seconds % 60);
                }
                document.getElementById("current_time").innerText = current_time_readable;
                document.getElementById("duration").innerText = "/ " + total_seconds_readable;
                
            }
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            const change_video_current_time = () => {
                var player_tage_for_shorcut = document.getElementById("video_player_tage");
                var value_of_scrolling_in_percentage = document.getElementById("progress_controller").value; 
                var send_time_ = player_tage_for_shorcut.duration * value_of_scrolling_in_percentage;
                var send_time = send_time_ / 100;
                player_tage_for_shorcut.currentTime = send_time;
                player_time_indicator_updater();
            }
            function history_episode_change(platform,series,season,q){
                change_shows_list(platform);
                change_season_list(platform,series);
                change_list(platform,series,season);
                change_episode(platform,series,season,q);
                remove(0);
            }
            function history_num_selector(e){
                historyNum = parseInt(e.value);
                show_history(0,parseInt(e.value));
            }
            document.addEventListener("keyup",function(event){ //console.log(event.keyCode);
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                var player_time_indicator = document.getElementById("player_time_indicator");
                var player_tage_for_shorcut = document.getElementById("video_player_tage");
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                event.preventDefault(); 
                var codee = event.keyCode;
                if (codee === 27){// for removal of search_box by ``esc``
                    document.getElementById("search_box").style.top = "-444px";
                    in_search = false;
                }else if(in_search == false){
                    if (codee === 68) {
                        dark();
                    }else if(codee === 78 && _q_ < (data[_platform_][_series_][_season_].length-1) ){// for next
                        full_screen_status = false;
                        change_episode(_platform_,_series_,_season_,parseInt(_q_)+1);         
                        if (_q_ > 10) {
                        }
                    }else if(codee === 80 && _q_ > 0 ){//for previous
                        full_screen_status = false;
                        document.getElementsByClassName("col-my")[_q_].scrollIntoView();
                        change_episode(_platform_,_series_,_season_,parseInt(_q_)-1);
                    }else if(codee === 32){// for play pause
                        if(player_tage_for_shorcut.paused){
                            player_tage_for_shorcut.play();
                        } else {
                            player_tage_for_shorcut.pause();
                        }
                    }else if (codee === 83){// for serch by ``S``
                        document.getElementById("search_box").style.top = "4px";
                        document.getElementById("search").focus();
                        document.getElementById("search").value = "";
                        in_search = true;
                    }else if(codee === 37){// for move backwards 10 seconds
                        player_tage_for_shorcut.currentTime -= 10;
                        player_time_indicator_updater();
                    }else if(codee === 39){// for move forwards 10 seconds
                        player_tage_for_shorcut.currentTime += 10;
                        player_time_indicator_updater();
                    }else if(codee === 70){// for full screen functionality
                        if (full_screen_status == false) {
                            full_screen_status = true;
                            player_tage_for_shorcut.requestFullscreen();
                        } else {
                            full_screen_status = false;
                            player_tage_for_shorcut.webkitExitFullScreen(); 
                        }
                    }else if(codee === 38){// for volume up
                        var volume_level = player_tage_for_shorcut.volume * 100; 
                        player_tage_for_shorcut.volume += 0.1;
                    }else if(codee === 40){// for volume down
                        player_tage_for_shorcut.volume -= 0.1;
                    }else if(codee === 72){// for history by ``H``
                        show_history(0,historyNum);
                    }else if(codee === 69){// for episode list by ``E``
                        remove(0);
                    }else if(codee === 84 || codee ===71){// for history by ``F``,``T``
                        show_description(0);
                    }else if(codee === 65){// for adjestments by `A`
                        show_adjestments(0);
                    }else if(codee === 82){// for refress stats in DB of currentContent by ``S``
                        refresher();
                    }
                }
            });  
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            setInterval(() => {
                refresher();
            }, 30000);//remove 1 default is 30000 = 30s
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            document.getElementById("video_player_tage").currentTime = <?php echo $Ares[5];?>;
            document.getElementById("video_player_tage").onended =  () => {
                document.getElementById("video_player_tage").webkitExitFullScreen();
                if (_q_>= (data[_platform_][_series_][_season_].length -1 )) {
                    change_episode(_platform_,_series_,_season_,_q_+1);
                    full_screen_status = false;
                }
            };
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            dark();player_time_indicator_updater();
            setInterval(() => {
                player_time_indicator_updater();
            },1000);
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // setInterval(()=>{
            //     if(!document.getElementById("video_player_tage").paused || backscriptpermission == 'yes'){
            //         player_time_indicator_updater();
            //         var player_tage_for_shorcut = document.getElementById("video_player_tage");
                    
            //         ////////////    resizing video tage    //////////////////////////////////////////////////////////////////////////
            //         if(resized_status == false){
            //             var height_of_video = document.getElementById("video_player_tage").videoHeight;
            //             var width_of_video = document.getElementById("video_player_tage").videoWidth;
            //             if (height_of_video/width_of_video < .45) {//console.log(height_of_video/width_of_video);
            //                 player_tage_for_shorcut.removeAttribute("height");
            //                 player_tage_for_shorcut.width = "1070";
            //                 player_tage_for_shorcut.style.position = "fixed";
            //                 var margin_from_bottom = ( 590 - height_of_video + 72 )+ "px";
            //                 player_tage_for_shorcut.style.bottom = margin_from_bottom;
            //             }else{
            //                 player_tage_for_shorcut.removeAttribute("width");
            //                 player_tage_for_shorcut.height = "590";
            //             }
            //             resized_status = true;
            //         }
            //     }
            // },100000);//remove 2 and add 2 zeros default is 1000
            document.getElementById("video_player_tage").pause();
            if ( screen.width > <?php echo $fx;?>) {
                document.getElementById("change").style.position = "absolute";
                document.getElementById("change").style.top = (document.getElementById("container").offsetHeight) + "px";
            }
            </script>
    </body>
    </html> 
    <!-- THE END -->
    <!-- 
        <?php  include "details.json"; ?>
    -->