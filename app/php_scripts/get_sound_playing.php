<?php
$f = fopen('sound_playing', 'r');
$line = fgets($f);
fclose($f);
$num = $line;
echo $num;
?>
