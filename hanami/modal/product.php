<?php
include_once '../api/db.php';
include_once '../api/auth.php';

// 取得所有圖片
$stmt = $pdo->query("SELECT * FROM images ORDER BY uploaded_at DESC");
$images = $stmt->fetchAll();
?>

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