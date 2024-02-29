<?php
//Sprawdź która stacja z listy jest odtwarzana
$output=null;
$retvalue=null;
$command="mpc status |grep playing |cut -d# -f2 |cut -d/ -f1";
exec($command,$output,$retvalue);
$stacja=$output[0];
//echo $stacja;
switch ($stacja) {
    case "1":
        $opis="";
        break;
    case "2":
        $opis="";
        break;
    case "3":        
        $opis="";
        break;
    case "4":
    case "6":
    case "8":
    case "5":
        $output=null;
        $retvalue=null;
        $command=" mpc status |head -n 1 |cut -d ':' -f2- |cut -d '|' -f-1";
        exec($command,$output,$retvalue);
        $opis=$output[0];
        break;
    default:
    $output=null;
    $retvalue=null;
    $command="mpc status |head -n 1 |cut -d ':' -f2- |cut -d' ' -f2-";
    exec($command,$output,$retvalue);
    $opis=$output[0];
}
$opis="Utwór: ".substr($opis,0,60);
if(strpos($opis, "n/a")) {
    $opis = "Aktualnie nie gra żadna muzyka";
    echo $opis;
}
else echo $opis;
?>