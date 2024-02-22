<?php
require_once("funkcje.php");
for($i=1;$i<=ile_stacji();$i++)
{
  if ($i==numer_biezacej_stacji())
    echo "<div class=\"radiostacja_active\" id=\"stacja_$i\">".nazwa_stacji($i)."</div>\n";
  else
    echo "<div class=\"radiostacja\" id=\"stacja_$i\" onclick=\"ustaw_stacje(".$i.")\">".nazwa_stacji($i)."</div>\n";
}
?>