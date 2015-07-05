<?php


$dir = '/home/pi/achillejs/app/music';

$dh  = opendir($dir);

$arr = array();

$num = 0;
while (false !== ($filename = readdir($dh))) {
        if(preg_match('`[a-z]*[m][p][3]`',$filename)){
		$arr [$num] = array('nom'=>$filename);
		$num++;
        }
}
$arr_json = json_encode($arr);
echo $arr_json;

?>
