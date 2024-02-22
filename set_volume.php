<?php
if (isset($_GET['v']))
    $volume=$_GET['v'];
else
    exit(-1);
$output=null;
$retvalue=null;
$command="amixer -c 0 sset Digital ".$volume;
exec($command,$output,$retvalue);
?>