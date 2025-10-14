<?php
echo "Nginx 兼容方案...\n\n";

// 方案1：创建代理加载器
$proxy_loader = '<?php
// Nginx 代理加载器
ob_start();
if (file_exists("index1.php")) {
    include "index1.php";
} else {
    echo "index1.php 未找到";
}
$content = ob_get_clean();

// 设置正确的 headers
header("Content-Type: text/html; charset=utf-8");
echo $content;
?>';

$proxy_files = [
    'home.php',
    'app.php', 
    'main.php',
    'portal.php'
];

foreach ($proxy_files as $file) {
    if (file_put_contents($file, $proxy_loader)) {
        echo "✓ 创建代理文件: $file\n";
    }
}

// 方案2：创建 HTML 跳转器（Nginx 会优先识别）
$html_jumper = '<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
    <meta http-equiv="refresh" content="0;url=index1.php">
    <script>window.location.href="index1.php"</script>
</head>
<body>
    <a href="index1.php">点击访问</a>
</body>
</html>';

// Nginx 默认会寻找这些文件
$html_files = [
    'index.html',
    'index.htm',
    'default.html',
    'default.htm'
];

foreach ($html_files as $file) {
    if (file_put_contents($file, $html_jumper)) {
        echo "✓ 创建 HTML 跳转: $file\n";
    }
}

echo "\n🌐 现在可以通过以下方式访问:\n";
echo "代理文件:\n";
foreach ($proxy_files as $file) {
    echo "  http://" . $_SERVER['HTTP_HOST'] . "/$file\n";
}
echo "\nHTML 跳转:\n";
foreach ($html_files as $file) {
    echo "  http://" . $_SERVER['HTTP_HOST'] . "/$file\n";
}
?>
