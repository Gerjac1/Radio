<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./index.css">
        <script src="./JS/index.js"></script>
    </head>
    <body onload="SlideBar();volume();">
        <div id="czas"></div>
        <div id="Stacja">
            <image id="imgStacja" src="./image/Back.png"></img>
            <h3 id="NazwaStacji">Brak stacji</h3>
            <h3 id="song">Aktualnie nie gra żadna muzyka</h3>
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
    </script>
</html>