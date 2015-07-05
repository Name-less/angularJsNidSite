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
        $cmd = 'mplayer -idle /home/pi/achillejs/app/music/'.$name.'> /dev/null 2>/dev/null &';
        //$cmd = 'mplayer -idle ./music/'.$name;
        //echo $cmd;
        //echo "<br>";
        exec($cmd);
	echo "success";
?>
