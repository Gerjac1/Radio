<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./index.css">
        <script src="index.js"></script>
    </head>
    <body onload="SlideBar();volume();">
        <div id="Stacja">
            <img id="imgStacja" src="./img/Back.png"></img>
            <h1 id="NazwaStacji">Nazwa stacji</h1>
            <h2 id="song">Informacje o granej muzyce</h2>
        </div>
        <button id="mute" onclick="Mute();"><img id="muteImg" src="./img/unmuted.png"></img></button>
        <div id="glos">
            <div id="volume">Głośność: </div>
            <input type="range" min="0" max="100" value="50" class="slider" id="myRange" onchange="volume()">
        </div>
        <div id="Pasek">
            <button id="back"><img src="./img/Back.png"></img></button>
            <button id="play" onclick="ChangeImage();ustaw_stacje(0)"><img id="playImg" src="./img/play.png"></img></button>
            <button id="next"><img src="./img/Next.png"></img></button>
        </div>
    </body>
    <script>
        loadRange();
        zmien();
        pokaz_stacje();
        pokaz_utwor();
    </script>
</html>