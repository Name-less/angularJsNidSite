<?php
	$data = file_get_contents("php://input");

	$f = fopen('sound_playing', 'w');
	file_put_contents('sound_playing',$data);

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

	//$cmd2 = "cd /mnt/usb/music;ffmpeg -i ".$name." 2>&1 | grep Duration | awk '{print $2}' | tr -d ,";
	//$time = exec($cmd2);
	//$time = exec("cd /mnt/usb/music;ffmpeg -i The_Good_Life_Chill_2015.mp3 2>&1 | grep Duration | awk '{print $2}' | tr -d ,");
	//echo $time;

	echo $cmd;
?>
