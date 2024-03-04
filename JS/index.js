function volume(){
    var RangeValue = document.getElementById("myRange").value;
    var wynik = document.getElementById("volume");
    wynik.innerHTML="Głośność: "+RangeValue+"%";
}

function SlideBar(){
    $('.slider').on( 'input', function( ) {
        if(this.value<50){
            $( this ).css( 'background', 'linear-gradient(to right, rgba(6,223,23,1) '+this.value+'%, grey 0%');
        } else{
            $( this ).css( 'background', 'linear-gradient(to right, rgba(6,223,23,1)' + this.value + '%, grey 50%');
        }
    });
}

function Mute(){
    var Range = document.getElementById("myRange");
    const newLocal = document.getElementById("muteImg");
    var mutebutton = newLocal;
    if(mutebutton.classList.contains("muted")){
        Range.value=RangeValue;
        volume();
        Range.style.background='linear-gradient(to right, rgba(6,223,23,1)'+ Range.value +'%, grey 0%)';
        mutebutton.classList.remove("muted");
    }
    else{
        RangeValue = document.getElementById("myRange").value;
        Range.style.background='linear-gradient(to right, rgba(6,223,23,1) 0%, grey 0%)';
        Range.value=0;
        volume();
        mutebutton.classList.add("muted");
    }
}

function zmien() {
    volumeSlider = document.getElementById("myRange");
    const volumeSliderValue = parseFloat(volumeSlider.value);
    logarithmicValue = (Math.log10(volumeSliderValue)*(170/2));
    if(logarithmicValue==-Infinity) logarithmicValue=0;
    
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {   
          if (this.readyState == 4 && this.status == 200) {   
          }
        };
        xmlhttp.open("GET", "./PHP/set_volume.php?v=" + logarithmicValue, true);  
        xmlhttp.send();
}

function pokaz_stacje() {
    var imgStacja = document.getElementById("imgStacja");
    const playImg = document.getElementById("playImg");
    var playbutton = playImg;
    var ifChanged = false;
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {   
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText.includes("<br>Radio Nowy Świat")) {
            imgStacja.src="./image/Radia/NowySwiat.png";  
            ifChanged = true;
        } 
        if(this.responseText.includes("RMF Classic")) { 
            imgStacja.src="./image/Radia/rmfclassic.png"; 
            ifChanged = true;
        } 
        if(this.responseText.includes("SmoothJazz")) { 
            imgStacja.src="./image/Radia/SmoothJazz.png"; 
            ifChanged = true;
        } 
        if(this.responseText.includes("Classic.nl")) { 
            imgStacja.src="./image/Radia/classicnl.png";  
            ifChanged = true;
        } 
        if(this.responseText.includes("RADIO 357")) { 
            imgStacja.src="./image/Radia/Radio357.png";  
            ifChanged = true;
        }
        if(this.responseText.includes("Muzo FM")) { 
            imgStacja.src="./image/Radia/MuzoFM.png";
            ifChanged = true;
        } 
        if(!ifChanged){
            imgStacja.src="./image/Back.png";
        }
        document.getElementById("NazwaStacji").innerHTML = this.responseText; 
        if(this.responseText.includes("Brak stacji")){
            playbutton.classList.remove("Stop");
        } else playbutton.classList.add("Stop");
      }
    };
    xmlhttp.open("GET", "./PHP/current_station.php", true);  
    xmlhttp.send();    
}

function pokaz_utwor() {
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {   
          if (this.readyState == 4 && this.status == 200) {   
            document.getElementById("song").innerHTML = this.responseText; 
          }
        };
        xmlhttp.open("GET", "./PHP/current_song.php", true);  
        xmlhttp.send();    
    }

function loadRange(){
    document.getElementById("myRange").addEventListener("input", zmien);
    document.getElementById("mute").addEventListener("click", zmien);
}

function ustaw_stacje(id) {
    document.getElementById("stacja").innerHTML="Zmieniam stację...";
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {   
      if (this.readyState == 4 && this.status == 200) {   
          }
        };
        console.log("Wykonuję set_station.php?s="+id)
        xmlhttp.open("GET", "./PHP/set_station.php?s=" + id, false);  
        xmlhttp.send();
}

function NextMusic(){
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.open("GET", "./PHP/next_station.php?y=yes", false);
    xmlhttp.send();
}

function PrevMusic(){
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.open("GET", "./PHP/prev_station.php?y=yes", false);
    xmlhttp.send();
}

function Play(){
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.open("GET", "./PHP/play.php?y=yes", false);
    xmlhttp.send();
}

function aktualnyCzas() {
    var dzisiaj = new Date();
    var godzina = dzisiaj.getHours();
    var minuty = dzisiaj.getMinutes();
   
    minuty = dodajZero(minuty);
    
    var czas = godzina + ":" + minuty;
    
    document.getElementById("czas").innerHTML = czas;
}

function dodajZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
}