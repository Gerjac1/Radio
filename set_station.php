<?php
if (isset($_GET['s']))
    $stacja=$_GET['s'];
else
{
    echo "Coś nie działa.";
    exit(-1);
}
$output=null;
$retvalue=null;
$command="mpc play ".$stacja;
exec($command,$output,$retvalue);
echo $output[0];
echo "OK";
?>