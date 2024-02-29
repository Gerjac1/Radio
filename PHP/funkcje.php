<?php
function ile_stacji()
{
    $command="cat Internet_Radio |grep '#' |wc -l";
    exec($command,$output,$retvalue);
    $ile=$output[0];
    return $ile;
}
function nazwa_stacji($numer)
{
    $nazwa="";
    $command="cat Internet_Radio |grep '#' |sed -n '".$numer.",".$numer."p' |cut -d\"#\" -f2";
    exec($command,$output,$retvalue);
    $nazwa=$output[0];
    return $nazwa;
}
function numer_biezacej_stacji()
{
    $command="mpc status |grep \"#\" |cut -d\"#\" -f2 |cut -d\"/\" -f1";
    exec($command,$output,$retvalue);
    $numer=$output[0];
    return $numer;    
}

function system_temp()
{
    $command="vcgencmd measure_temp |cut -d\"=\" -f2";
    exec($command,$output,$retvalue);
    $temp=$output[0];
    return $temp;     
}

function system_load()
{
    $command="uptime |cut -d',' -f3 |cut -d':' -f2 |cut -d' ' -f2";
    exec($command,$output,$retvalue);
    $load=$output[0];
    $command1="echo ".$load."*25 |bc";
    exec($command1,$output1,$retvalue);
    $wynik=$output1[0];
    return $wynik;    
}
?>