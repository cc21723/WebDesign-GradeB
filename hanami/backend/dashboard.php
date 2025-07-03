<?php
include_once '../api/db.php';
include_once '../api/auth.php'; // 驗證是否已登入

// 取得所有圖片
$stmt = $pdo->query("SELECT * FROM images ORDER BY uploaded_at DESC");
$images = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>🛠️ 圖片管理後台</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffafc;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            margin-top: 40px;
        }
        .image-thumb {
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .logout {
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛠️ 後台圖片管理</h2>
        <a href="logout.php" class="btn btn-sm btn-danger logout">登出</a>

        <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-4 mb-4">
            <label>新增圖片：</label>
            <div class="input-group">
                <input type="file" name="image" class="form-control" required>
                <button class="btn btn-primary" type="submit">上傳</button>
            </div>
        </form>

        <?php if (count($images) > 0): ?>
            <div class="row">
                <?php foreach ($images as $img): ?>
                    <div class="col-md-3 mb-4">
                        <img src="../images/<?= htmlspecialchars($img['filename']) ?>" class="img-fluid image-thumb">
                        <form action="delete.php" method="post" onsubmit="return confirm('確定要刪除嗎？');">
                            <input type="hidden" name="id" value="<?= $img['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger mt-2 w-100">刪除</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-muted">目前尚未上傳任何圖片。</p>
        <?php endif; ?>
    </div>
</body>
</html>
