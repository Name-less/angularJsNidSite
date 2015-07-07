<?php
	$data = file_get_contents("php://input");

        $name =$data;
        $name = str_replace(' ','\ ',$name);
        $name = str_replace('(','\(',$name);
        $name = str_replace(')','\)',$name);
        $name = str_replace('"','\"',$name);
        $name = str_replace("'","\'",$name);
        $name = str_replace('&','\&',$name);
        exec("kill $(ps -e | grep mplayer | cut -d ' ' -f 2)");
        //old command
	//$cmd = 'mplayer -idle /home/pi/achillejs/app/music/'.$name.'> /dev/null 2>/dev/null &';
        //usb command
	$cmd = 'mplayer -idle /mnt/usb/music/'.$name.'> /dev/null 2>/dev/null &';
        exec($cmd);
	echo "success";
?>
