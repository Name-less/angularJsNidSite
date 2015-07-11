<?php

$cmd = 'sudo arp-scan --interface=eth0 --localnet | awk '{print $2}''
$result = exec($cmd);

?>
