function ChangeImage(){
    const newLocal = document.getElementById("playImg");
    var playbutton = newLocal;
    if(playbutton.classList.contains("Stop")){
        playbutton.classList.remove("Stop");
    }
    else playbutton.classList.add("Stop");

}

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
    // Przekształcenie wartości suwaka na logarytmiczną skalę
    logarithmicValue = (Math.log10(volumeSliderValue)*(170/2));
    if(logarithmicValue==-Infinity) logarithmicValue=0;
    // Tutaj umieść kod do zmiany głośności na podstawie wartości logarytmicznej
    //console.log("Suwak: " + volumeSliderValue + " | Głośność: " + logarithmicValue);
    
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

function pokaz_stacje() {
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {   
      //I status jest OK....
      if (this.readyState == 4 && this.status == 200) {   
        //Wynik wstaw w <span id=wynik>
        document.getElementById("NazwaStacji").innerHTML = this.responseText; 
      }
    };
    //True oznacza async.
    xmlhttp.open("GET", "current_station.php", true);  
    xmlhttp.send();    
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

function loadRange(){
    document.getElementById("myRange").addEventListener("input", zmien);
    document.getElementById("mute").addEventListener("click", zmien);
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
    //console.log("Teraz przeładuję przyciski...");
    //Załaduj na nowo przyciski ze stacjami
    /*xmlhttp.onreadystatechange = function() {   
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
    }*/
}