<?php
require_once("funkcje.php");
?>
<HEAD>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

</HEAD>
<BODY>
<div id="calosc">
<div id="panel">
<div id="czas"></div><BR>
<div id="stacja">Stacja</div><BR>
<div id="song">Utwór</div><BR>
<input type="button" id="down" value="-" onclick="down()">
<input type="range" id="volumeSlider" min="1" max="100" step="1" value="30">
<input type="button" id="up" value="+" onclick="up()">
<div id="vol"></div><BR>
</div> <!--panel-->
<div id="stacje">
<?php 
require_once("przyciski_stacji.php");
 ?>

</div> <!--stacje-->
</div> <!--całość-->

<script>

function pokaz_stacje() {
    var xmlhttp = new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() {   
      //I status jest OK....
      if (this.readyState == 4 && this.status == 200) {   
        //Wynik wstaw w <span id=wynik>
        document.getElementById("stacja").innerHTML = this.responseText; 
      }
    };
    //True oznacza async.
    xmlhttp.open("GET", "current_station.php", true);  
    xmlhttp.send();    
}

function ustaw_stacje(id) {
document.getElementById("stacja").innerHTML="Zmieniam stację...";
console.log("Będę ustawiał stację "+id);
var xmlhttp = new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() {   
  if (this.readyState == 4 && this.status == 200) {   
     console.log(this.responseText); 
      }
    };
    //True oznacza async.
    console.log("Wykonuję set_station.php?s="+id)
    xmlhttp.open("GET", "set_station.php?s=" + id, false);  
    xmlhttp.send();
console.log("Teraz przeładuję przyciski...");
//Załaduj na nowo przyciski ze stacjami
xmlhttp.onreadystatechange = function() {   
      //I status jest OK....
      if (this.readyState == 4 && this.status == 200) {   
        //Wynik wstaw w <div id=stacje>
        console.log("Mam nowe przyciski, wstawiam.");
        document.getElementById("stacje").innerHTML = this.responseText; 
      }
    };
    //True oznacza async.
    console.log("Wczytuję przyciski_stacji.php");
    xmlhttp.open("GET", "przyciski_stacji.php", false);  
    xmlhttp.send();    

    document.getElementById("stacja").innerHTML="OK!";
}
function pokaz_utwor() {
var xmlhttp = new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() {   
      //I status jest OK....
      if (this.readyState == 4 && this.status == 200) {   
        //Wynik wstaw w <span id=wynik>
        document.getElementById("song").innerHTML = this.responseText; 
      }
    };
    //True oznacza async.
    xmlhttp.open("GET", "current_song.php", true);  
    xmlhttp.send();    
}

function show_load_system() {
  var xmlhttp = new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() {   
      //I status jest OK....
      if (this.readyState == 4 && this.status == 200) {   
        //Wynik wstaw w <span id=wynik>
        document.getElementById("vol").innerHTML = this.responseText; 
      }
    };
    //True oznacza async.
    xmlhttp.open("GET", "system_load.php", true);  
    xmlhttp.send();   
}


function aktualnyCzas() {
  var dzisiaj = new Date();
  var godzina = dzisiaj.getHours();
  var minuty = dzisiaj.getMinutes();
  var sekundy = dzisiaj.getSeconds();
  
  // Dodaj zero przed jednocyfrowymi wartościami minut i sekund
  minuty = dodajZero(minuty);
  sekundy = dodajZero(sekundy);
  
  var czas = godzina + ":" + minuty + ":" + sekundy;
  
  // Wyświetl czas w elemencie o id "czas"
  document.getElementById("czas").innerHTML = "Godzina "+czas;
}

function dodajZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function zmien() {
const volumeSliderValue = parseFloat(volumeSlider.value);
// Przekształcenie wartości suwaka na logarytmiczną skalę
const logarithmicValue = (Math.log10(volumeSliderValue)*(170/2));
// Tutaj umieść kod do zmiany głośności na podstawie wartości logarytmicznej
console.log("Suwak: " + volumeSliderValue + " | Głośność: " + logarithmicValue);
//document.getElementById("vol").innerHTML=volumeSliderValue;

//Po zmianie głośności suwakiem ustawiamy głośność na podaną wartość
var xmlhttp = new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() {   
      //I status jest OK....
      if (this.readyState == 4 && this.status == 200) {   
        //Wynik wstaw w <span id=wynik>
        //console.log(this.responseText); 
      }
    };
    //True oznacza async.
    xmlhttp.open("GET", "set_volume.php?v=" + logarithmicValue, true);  
    xmlhttp.send();
}

function up() {
    old=parseFloat(document.getElementById("volumeSlider").value);
    document.getElementById("volumeSlider").value=old+5;
    zmien();
}

function down() {
    old=parseFloat(document.getElementById("volumeSlider").value);
    document.getElementById("volumeSlider").value=old-5;
    zmien();
}
document.getElementById("volumeSlider").addEventListener("input", zmien);
// Wywołaj funkcję aktualnyCzas co sekundę
aktualnyCzas();
zmien();
setInterval(aktualnyCzas, 1000);
setInterval(pokaz_utwor, 1000);
setInterval(pokaz_stacje, 1000);
setInterval(show_load_system, 1000);
</script>
</BODY>
