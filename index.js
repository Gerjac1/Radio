function ChangeImage(){
    const newLocal = document.getElementById("playImg");
    var playbutton = newLocal;
    if(playbutton.classList.contains("Stop")){
        playbutton.classList.remove("Stop");
    }
    else playbutton.classList.add("Stop");
}
