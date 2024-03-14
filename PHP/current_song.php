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
        $output=null;
        $retvalue=null;
        $command="mpc status |head -n 1 | cut -d ':' -f2-";
        exec($command,$output,$retvalue);
        $opis=$output[0];
        break;
    case "2":
        $output=null;
        $retvalue=null;
        $command="mpc status |head -n 1 | cut -d: -f2- |cut -d '|' -f1,1";
        exec($command,$output,$retvalue);
        $opis=$output[0];
        break;
    default:
        $output=null;
        $retvalue=null;
        $command="mpc status |head -n 1 |cut -d ':' -f2- |cut -d' ' -f2-";
        exec($command,$output,$retvalue);
        $opis=$output[0];
        break;
}
$opis="Utwór: ".substr($opis,0,60);
if(strpos($opis, "n/a")) {
    $opis = "Aktualnie nie gra żadna muzyka";
    echo $opis;
}
else echo $opis;
?>