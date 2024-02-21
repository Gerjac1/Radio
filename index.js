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
    Range.value=0;
    volume();
    document.getElementById("myRange").style.background='linear-gradient(to right, rgba(6,223,23,1) 0%, grey 0%)';
}