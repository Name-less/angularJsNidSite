<?php
$url = file_get_contents("php://input");

$cmd = 'cd ..;cd music;/usr/local/bin/youtube-dl --extract-audio --audio-format mp3 ' . escapeshellarg($url).'> /dev/null 2>/dev/null ;cd ..';

exec($cmd);
echo $url;
?>
