<?php

//old dir
//$dir = '/home/pi/achillejs/app/music';

//usb dir
$dir = '/mnt/usb/music';

$dh  = opendir($dir);

$arr = array();

$num = 0;
while (false !== ($filename = readdir($dh))) {
        if(preg_match('`[a-z]*[m][p][3]`',$filename)){
        $name =$filename;
        $name = str_replace(' ','\ ',$name);
        $name = str_replace('(','\(',$name);
        $name = str_replace(')','\)',$name);
        $name = str_replace('"','\"',$name);
        $name = str_replace("'","\'",$name);
        $name = str_replace('&','\&',$name);
		$cmd = "cd /mnt/usb/music;ffmpeg -i ".$name." 2>&1 | grep Duration | awk '{print $2}' | tr -d ,";
        	$duration = exec($cmd);

		$arr [$num] = array('nom'=>$filename,'duration'=>$duration);
		//$arr [$num] = array('duration'=>$duration);
		$num++;
        }
}
$arr_json = json_encode($arr);
echo $arr_json;

?>
