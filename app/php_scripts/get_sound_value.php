<?php
$f = fopen('sound_value', 'r');
$line = fgets($f);
fclose($f);
$num = (int)$line;
echo $num;
?>
