<?php
//Sprawdź która stacja z listy jest odtwarzana
$output=null;
$retvalue=null;
$command="mpc status |grep playing |cut -d# -f2 |cut -d/ -f1";
//$command='cat Internet_Radio |grep "#" |head -n '.$station.' |tail -n 1 |cut -d \'#\' -f2';
exec($command,$output,$retvalue);
$stacja=$output[0];
//echo $stacja."<BR>";
$output=null;
$retvalue=null;
$command="cat Internet_Radio |grep \"#\" |head -n ".$stacja." |tail -n 1 |cut -d '#' -f2";
exec($command,$output,$retvalue);
$opis=$output[0];
if($opis=="") {
    $opis = "Brak stacji";
    echo $opis;
}
else {
    $opis="Stacja: <br>".$opis;
    echo $opis;
}
?>