<?php
include_once '../api/db.php';

// 取得所有圖片
$stmt = $pdo->query("SELECT * FROM date ORDER BY uploaded_at DESC");
$images = $stmt->fetchAll();
?>
<h3>預約時間圖片管理</h3>
<table>
    <tr>
        <th>圖片</th>
        <th>名稱</th>
        <th>顯示</th>
        <th>操作</th>
    </tr>
    <?php
    $rows = $Date->all();
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
    <?php endforeach; ?>
</table>

<table>
    <tbody>
        <tr>
            <td width="200px">
                <input type="hidden" name="table" value="<?= $do; ?>">
                <input type="button" onclick="op('#cover', '#cvr', './modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增預約時間圖片">
            </td>
            <td class="cent">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
            </td>
        </tr>
    </tbody>
</table>