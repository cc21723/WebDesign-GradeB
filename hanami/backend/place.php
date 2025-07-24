<?php
include_once '../api/db.php';

// 取得所有圖片
$stmt = $pdo->query("SELECT * FROM place ORDER BY uploaded_at DESC");
$images = $stmt->fetchAll();
?>

<table>
    <tr>
        <td></td>
        <td>
            <h3>環境/設備圖片管理</h3>
        </td>
        <td width="200px">
            <input type="hidden" name="table"  value="place">
            <input type="button" onclick="op('#cover', '#cvr', './modal/place.php')" value="新增環境/設備圖片">
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>圖片</th>
        <th>名稱</th>
        <th>顯示</th>
        <th>刪除</th>
    </tr>
    <?php
    $rows = $Place->all();
    foreach ($rows as $row):
    ?>
        <tr>
            <td>
                <input type="text" name="text[]" value="<?= $row['text']; ?>" style="width:90%;">
            </td>
            <td style="padding-left: 15px;">
                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
            </td>
            <td style="padding-left: 15px;">
                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
            </td>
        </tr>
        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
        <input type="hidden" name="table" value="product">
    <?php endforeach; ?>
</table>

<table>
    <tbody>
        <tr>
            <td class="cent">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
            </td>
        </tr>
    </tbody>
</table>