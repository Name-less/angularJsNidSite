<?php
$url = file_get_contents("php://input");
//old url
//$cmd = 'cd ..;cd music;/usr/local/bin/youtube-dl --extract-audio --audio-format mp3 ' . escapeshellarg($url).'> /dev/null 2>/dev/null ;cd ..';

//usb url
$cmd = 'cd /home/pi/tmp;/usr/local/bin/youtube-dl --extract-audio --audio-format mp3 ' . escapeshellarg($url).'> /dev/null 2>/dev/null;mv * /mnt/usb/music';

exec($cmd);
echo $cmd;
?>
