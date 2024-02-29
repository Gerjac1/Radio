<?php
$output=null;
$retvalue=null;
$command="mpc status";
exec($command,$output,$retvalue);

$is_playing = false;
foreach ($output as $line) {
    if(strpos($line, "playing")){
        $is_playing = true;
        break;
    }
}

if($is_playing){
    exec('mpc current -f %position%', $songIdOutput, $songIdReturn);
    $songId = trim($songIdOutput[0]);
    $output=null;
    $retvalue=null;
    $command="mpc stop";
    exec($command,$output,$retvalue);
}
else{
    $output=null;
    $retvalue=null;
    $command="mpc play ".$songId;
    exec($command,$output,$retvalue);
}
?>