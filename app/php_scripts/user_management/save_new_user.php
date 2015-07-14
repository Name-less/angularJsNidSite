<?php
$ip = $_SERVER['REMOTE_ADDR'];
$name = file_get_contents("php://input");
echo $ip;
/*
open data base and insert new user
update if ip already exist
*/


?>
