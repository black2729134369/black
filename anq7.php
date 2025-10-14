<?php
/**
 * 安全PHP文件管理器
 * 仅用于合法的网站管理用途
 * 请务必设置强密码
 */

// ==================== 配置区域 ====================
$config = array(
    'username' => 'admin',           // 修改为您的用户名
    'password' => 'YourStrongPassword123!', // 修改为强密码
    'base_dir' => __DIR__,           // 限制操作目录
    'max_upload_size' => 10 * 1024 * 1024, // 10MB
    'allowed_extensions' => array('php', 'html', 'css', 'js', 'txt', 'jpg', 'png', 'gif', 'zip')
);

// ==================== 功能函数 ====================
function sanitizePath($path, $baseDir) {
    $realBase = realpath($baseDir);
    $realPath = realpath($path);
    
    if ($realPath === false || strpos($realPath, $realBase) !== 0) {
        return $baseDir;
    }
    return $realPath;
}

function formatSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' Bytes';
    }
}

function getFileIcon($file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $icons = array(
        'php' => '📄', 'html' => '🌐', 'css' => '🎨', 'js' => '⚡',
        'txt' => '📝', 'jpg' => '🖼️', 'png' => '🖼️', 'gif' => '🖼️',
        'zip' => '📦', 'pdf' => '📕', 'doc' => '📘', 'xls' => '📗'
    );
    return isset($icons[$ext]) ? $icons[$ext] : (is_dir($file) ? '📁' : '📄');
}

// 递归删除目录函数
function deleteDirectory($dir) {
    if (!is_dir($dir)) return false;
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        is_dir($path) ? deleteDirectory($path) : unlink($path);
    }
    return rmdir($dir);
}

// ==================== 安全验证 ====================
session_start();

// 登录验证
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $error = '';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === $config['username'] && $_POST['password'] === $config['password']) {
            $_SESSION['logged_in'] = true;
        } else {
            $error = "用户名或密码错误";
        }
    }
    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        showLoginForm($error);
        exit;
    }
}

// ==================== 主要逻辑 ====================
$current_dir = isset($_GET['dir']) ? $_GET['dir'] : $config['base_dir'];
$current_dir = sanitizePath($current_dir, $config['base_dir']);

// 处理文件操作
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 文件上传
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
        $file_name = basename($_FILES['file_upload']['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_size = $_FILES['file_upload']['size'];
        
        if ($file_size > $config['max_upload_size']) {
            $message = "错误：文件大小超过限制";
        } elseif (!in_array($file_ext, $config['allowed_extensions'])) {
            $message = "错误：不允许的文件类型";
        } else {
            $target_path = $current_dir . DIRECTORY_SEPARATOR . $file_name;
            if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path)) {
                $message = "文件上传成功: " . htmlspecialchars($file_name);
            } else {
                $message = "文件上传失败";
            }
        }
    }
    
    // 创建文件
    if (isset($_POST['create_file'])) {
        $file_name = trim($_POST['new_filename']);
        if ($file_name && !preg_match('/[\/\\\\]/', $file_name)) {
            $file_path = $current_dir . DIRECTORY_SEPARATOR . $file_name;
            if (!file_exists($file_path)) {
                if (touch($file_path)) {
                    $message = "文件创建成功: " . htmlspecialchars($file_name);
                } else {
                    $message = "文件创建失败";
                }
            } else {
                $message = "文件已存在";
            }
        } else {
            $message = "无效的文件名";
        }
    }
    
    // 创建目录
    if (isset($_POST['create_dir'])) {
        $dir_name = trim($_POST['new_dirname']);
        if ($dir_name && !preg_match('/[\/\\\\]/', $dir_name)) {
            $dir_path = $current_dir . DIRECTORY_SEPARATOR . $dir_name;
            if (!file_exists($dir_path)) {
                if (mkdir($dir_path, 0755)) {
                    $message = "目录创建成功: " . htmlspecialchars($dir_name);
                } else {
                    $message = "目录创建失败";
                }
            } else {
                $message = "目录已存在";
            }
        } else {
            $message = "无效的目录名";
        }
    }
    
    // 删除文件/目录
    if (isset($_POST['delete_path'])) {
        $delete_path = sanitizePath($_POST['delete_path'], $config['base_dir']);
        if ($delete_path !== $config['base_dir']) { // 防止删除根目录
            if (is_dir($delete_path)) {
                if (deleteDirectory($delete_path)) {
                    $message = "目录删除成功";
                } else {
                    $message = "目录删除失败";
                }
            } else {
                if (unlink($delete_path)) {
                    $message = "文件删除成功";
                } else {
                    $message = "文件删除失败";
                }
            }
        } else {
            $message = "不能删除根目录";
        }
    }
    
    // 文件编辑
    if (isset($_POST['edit_file'])) {
        $file_path = sanitizePath($_POST['file_path'], $config['base_dir']);
        $content = $_POST['file_content'];
        
        if (is_file($file_path) && is_writable($file_path)) {
            if (file_put_contents($file_path, $content) !== false) {
                $message = "文件保存成功";
            } else {
                $message = "文件保存失败";
            }
        } else {
            $message = "文件不可写或不存在";
        }
    }
}

// 文件编辑功能
$edit_mode = false;
$edit_content = '';
$edit_file = '';
if (isset($_GET['edit'])) {
    $edit_file = sanitizePath($_GET['edit'], $config['base_dir']);
    if (is_file($edit_file) && is_readable($edit_file)) {
        $edit_mode = true;
        $edit_content = file_get_contents($edit_file);
    }
}

// ==================== 显示界面 ====================
function showLoginForm($error = '') {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>文件管理器 - 登录</title>
        <style>
            body { font-family: Arial, sans-serif; max-width: 400px; margin: 100px auto; padding: 20px; background: #f0f0f0; }
            .login-form { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            .form-group { margin-bottom: 15px; }
            label { display: block; margin-bottom: 5px; font-weight: bold; }
            input[type="text"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; }
            button { background: #007cba; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
            .error { color: red; margin-bottom: 15px; text-align: center; }
            h2 { text-align: center; margin-bottom: 20px; color: #333; }
        </style>
    </head>
    <body>
        <div class="login-form">
            <h2>🔒 文件管理器登录</h2>
            <?php if ($error): ?><div class="error"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label>用户名:</label>
                    <input type="text" name="username" required autofocus>
                </div>
                <div class="form-group">
                    <label>密码:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">登录</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}

// 如果是编辑模式，显示编辑器
if ($edit_mode) {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>编辑文件 - <?php echo htmlspecialchars(basename($edit_file)); ?></title>
        <style>
            body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f0f0f0; }
            .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
            .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ddd; }
            textarea { width: 100%; height: 500px; font-family: monospace; padding: 10px; border: 1px solid #ddd; border-radius: 4px; resize: vertical; }
            .btn { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
            .btn-danger { background: #dc3545; }
            .btn-group { display: flex; gap: 10px; margin-top: 15px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>编辑文件: <?php echo htmlspecialchars(basename($edit_file)); ?></h1>
                <a href="?dir=<?php echo urlencode(dirname($edit_file)); ?>" class="btn">返回</a>
            </div>
            
            <form method="post">
                <input type="hidden" name="file_path" value="<?php echo htmlspecialchars($edit_file); ?>">
                <textarea name="file_content"><?php echo htmlspecialchars($edit_content); ?></textarea>
                <div class="btn-group">
                    <button type="submit" name="edit_file" class="btn">保存文件</button>
                    <a href="?dir=<?php echo urlencode(dirname($edit_file)); ?>" class="btn btn-danger">取消</a>
                </div>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// 主界面
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>安全文件管理器</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f0f0f0; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ddd; }
        .message { padding: 10px; margin: 10px 0; border-radius: 4px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .file-list { border: 1px solid #ddd; border-radius: 4px; overflow: hidden; margin-bottom: 20px; }
        .file-item { display: flex; align-items: center; padding: 12px; border-bottom: 1px solid #eee; }
        .file-item:hover { background: #f8f9fa; }
        .file-icon { margin-right: 10px; font-size: 20px; width: 30px; text-align: center; }
        .file-name { flex: 1; }
        .file-actions { display: flex; gap: 8px; }
        .file-size { color: #666; margin-right: 15px; min-width: 80px; }
        .file-time { color: #888; margin-right: 15px; min-width: 150px; }
        .action-form { display: inline; }
        button, .btn { background: #007cba; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; font-size: 14px; }
        .btn-danger { background: #dc3545; }
        .btn-success { background: #28a745; }
        .btn-warning { background: #ffc107; color: #000; }
        .upload-section, .create-section { background: #f8f9fa; padding: 15px; margin: 15px 0; border-radius: 4px; }
        .form-group { margin-bottom: 10px; }
        input[type="text"], input[type="file"] { padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 100%; }
        .breadcrumb { margin-bottom: 15px; background: #e9ecef; padding: 10px; border-radius: 4px; }
        .breadcrumb a { color: #007cba; text-decoration: none; }
        .breadcrumb a:hover { text-decoration: underline; }
        .section-title { margin-top: 0; color: #333; }
        .current-dir { background: #e7f3ff; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-weight: bold; }
        @media (max-width: 768px) {
            .file-item { flex-direction: column; align-items: flex-start; }
            .file-actions { margin-top: 10px; width: 100%; justify-content: flex-end; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔒 安全文件管理器</h1>
            <div>
                <span>欢迎, <?php echo htmlspecialchars($config['username']); ?></span>
                <a href="?logout=1" class="btn" style="margin-left: 15px;">退出</a>
            </div>
        </div>

        <?php if (isset($_GET['logout'])): ?>
            <?php 
            session_destroy(); 
            echo '<script>window.location.href = "?";</script>';
            exit; 
            ?>
        <?php endif; ?>

        <?php if ($message): ?>
            <div class="message <?php echo (strpos($message, '成功') !== false) ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- 当前目录 -->
        <div class="current-dir">
            📁 当前目录: <?php echo htmlspecialchars($current_dir); ?>
        </div>

        <!-- 面包屑导航 -->
        <div class="breadcrumb">
            <?php
            $path_parts = array();
            $temp_path = $current_dir;
            while ($temp_path && $temp_path !== dirname($config['base_dir'])) {
                $path_parts[] = array('name' => basename($temp_path), 'path' => $temp_path);
                $temp_path = dirname($temp_path);
            }
            $path_parts = array_reverse($path_parts);
            
            echo '<a href="?dir=' . urlencode($config['base_dir']) . '">根目录</a>';
            foreach ($path_parts as $part) {
                if ($part['path'] !== $config['base_dir']) {
                    echo ' / <a href="?dir=' . urlencode($part['path']) . '">' . htmlspecialchars($part['name']) . '</a>';
                }
            }
            ?>
        </div>

        <!-- 文件上传 -->
        <div class="upload-section">
            <h3 class="section-title">📤 上传文件</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="file_upload" required>
                    <small>最大: <?php echo formatSize($config['max_upload_size']); ?>, 允许类型: <?php echo implode(', ', $config['allowed_extensions']); ?></small>
                </div>
                <button type="submit" class="btn">上传文件</button>
            </form>
        </div>

        <!-- 创建文件/目录 -->
        <div class="create-section">
            <h3 class="section-title">📝 新建</h3>
            <form method="post" style="display: flex; gap: 15px; flex-wrap: wrap;">
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label>文件名:</label>
                    <input type="text" name="new_filename" placeholder="newfile.txt" required>
                    <button type="submit" name="create_file" class="btn" style="margin-top: 5px;">创建文件</button>
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label>目录名:</label>
                    <input type="text" name="new_dirname" placeholder="newfolder" required>
                    <button type="submit" name="create_dir" class="btn" style="margin-top: 5px;">创建目录</button>
                </div>
            </form>
        </div>

        <!-- 文件列表 -->
        <div class="file-list">
            <?php
            $items = @scandir($current_dir);
            if ($items === false) {
                echo '<div class="file-item" style="text-align: center; color: #666;">无法读取目录</div>';
            } else {
                $items = array_diff($items, array('.', '..'));
                
                // 排序：目录在前，文件在后
                $dirs = array();
                $files = array();
                foreach ($items as $item) {
                    $item_path = $current_dir . DIRECTORY_SEPARATOR . $item;
                    if (is_dir($item_path)) {
                        $dirs[] = $item;
                    } else {
                        $files[] = $item;
                    }
                }
                
                sort($dirs);
                sort($files);
                $items = array_merge($dirs, $files);
                
                foreach ($items as $item) {
                    $item_path = $current_dir . DIRECTORY_SEPARATOR . $item;
                    $is_dir = is_dir($item_path);
                    $file_size = $is_dir ? '-' : formatSize(@filesize($item_path));
                    $file_time = date('Y-m-d H:i:s', @filemtime($item_path));
                    ?>
                    <div class="file-item">
                        <div class="file-icon"><?php echo getFileIcon($item); ?></div>
                        <div class="file-name">
                            <?php if ($is_dir): ?>
                                <a href="?dir=<?php echo urlencode($item_path); ?>"><strong><?php echo htmlspecialchars($item); ?></strong></a>
                            <?php else: ?>
                                <?php echo htmlspecialchars($item); ?>
                            <?php endif; ?>
                        </div>
                        <div class="file-size"><?php echo $file_size; ?></div>
                        <div class="file-time"><?php echo $file_time; ?></div>
                        <div class="file-actions">
                            <?php if (!$is_dir): ?>
                                <a href="<?php echo htmlspecialchars($item_path); ?>" target="_blank" class="btn">查看</a>
                                <a href="?edit=<?php echo urlencode($item_path); ?>" class="btn btn-warning">编辑</a>
                            <?php endif; ?>
                            <form method="post" class="action-form" onsubmit="return confirm('确定要删除 <?php echo htmlspecialchars($item); ?> 吗？');">
                                <input type="hidden" name="delete_path" value="<?php echo htmlspecialchars($item_path); ?>">
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                
                if (empty($items)) {
                    echo '<div class="file-item" style="text-align: center; color: #666;">目录为空</div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
