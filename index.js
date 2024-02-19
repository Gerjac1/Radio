function ChangeImage(){
    const newLocal = document.getElementById("playImg");
    var playbutton = newLocal;
    if(playbutton.classList.contains("Stop")){
        playbutton.classList.remove("Stop");
    }
    else playbutton.classList.add("Stop");
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