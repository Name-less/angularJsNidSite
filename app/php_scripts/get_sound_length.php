
<?php

$name = file_get_contents("php://input");

$name = str_replace(' ','\ ',$name);
$name = str_replace('(','\(',$name);
$name = str_replace(')','\)',$name);
$name = str_replace('"','\"',$name);
$name = str_replace("'","\'",$name);
$name = str_replace('&','\&',$name);
$cmd = "cd /mnt/usb/music;ffmpeg -i ".$name." 2>&1 | grep Duration | awk '{print $2}' | tr -d ,";
$duration = exec($cmd);

echo $duration;

?>


