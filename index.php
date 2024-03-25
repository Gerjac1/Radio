<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src=".\JQuery\src\jquery.cookie.js"></script>
        <link rel="stylesheet" href="./index.css">
        <script src="./JS/index.js"></script>
    </head>
    <body onload="SlideBar();volume();toggleScreensaver();">
    <div class="screensaver"><iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:150px;height:150px; margin-top:21%; margin-left:41.5%"src="https://www.clocklink.com/html5embed.php?clock=024&timezone=MOT&color=black&size=150&Title=&Message=&Target=&From=2024,1,1,0,0,0&Color=black"></iframe></div>
        <div id="ide8b3750ec2d3c" a='{"t":"s","v":"1.2","lang":"pl","locs":[4441],"ssot":"c","sics":"ds","cbkg":"#FFFFFF","cfnt":"#FFFFFF","slgp":"5","sfnt":"a"}' style="background: none; display: relative; width: 50px; height: 50px; left: 710px; top: -7.5px; padding: 0">Źródło danych pogodowych: <a href="https://sharpweather.com/weather_warsaw/30_days/">weather forecast Warsaw 30 days</a></div><script async src="https://static1.sharpweather.com/widgetjs/?id=ide8b3750ec2d3c"></script>
        <div id="czas"></div>
        <div id="Stacja">
            <img id="imgStacja" src="./image/Back.png"></img>
            <h3 id="NazwaStacji">Brak stacji</h3>
            <h3 id="song">Aktualnie nie gra żadna muzyka</h3>
        </div>
        <div id="schedule">
            <button id="btnschedule" onclick="ShowWindow();"><image id="imgSchedule" src="./image/schedule.png"></img></button>
            <div id="popup" class="hiden">
            Godzina wyciszenia:<input id="muteTime" type="time"></input><br>
            Godzina odciszenia:<input id="startTime" type="time" value=""></input><br>
            <button id="reset" onclick="reset();">Reset</button>
            </div>
        </div>
        <button id="mute" onclick="Mute();"><img id="muteImg" src="./image/unmuted.png"></img></button>
        <div id="glos">
            <div id="volume">Głośność: </div>
            <input type="range" min="0" max="100" value="50" class="slider" id="myRange" onchange="volume()">
        </div>
        <div id="Pasek">
            <button id="back" onclick="PrevMusic();"><img src="./image/Back.png"></img></button>
            <button id="play" onclick="Play();"><img id="playImg" src="image/play.png"></img></button>
            <button id="next" onclick="NextMusic();"><img src="./image/Next.png"></img></button>
        </div>
    </body>
    <script>
        setInterval(aktualnyCzas, 1000);
        loadRange();
        zmien();
        setInterval(pokaz_stacje, 100);
        setInterval(pokaz_utwor, 100);
        setInterval(CheckHours, 1000);
        setInterval(CheckCookies, 1000);
    </script>
</html>