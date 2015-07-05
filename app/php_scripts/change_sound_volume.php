<?php
$data = file_get_contents("php://input");
$num = (int)$data*30/100+70;

$f = fopen('sound_value', 'w');
file_put_contents('sound_value', (int)$data);

exec('amixer sset PCM '.$num.'%');
echo $num;
?>
