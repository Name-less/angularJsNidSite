<?php

$data = file_get_contents("php://input");
$num = (int)$data;
if($num == 1){
	exec("sudo kill -SIGSTOP $(ps -e | grep mplayer | cut -d ' ' -f 2)");
	echo 0;
}else if($num == 0){
	exec("sudo kill -SIGCONT $(ps -e | grep mplayer | cut -d ' ' -f 2)");
	echo 1;
}else{
	echo "receive ".$num;
}


?>
