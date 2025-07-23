<?php
include_once '../api/db.php';

?>
<h3>使用者帳號管理</h3>
<table>
    <tr>
        <th>帳號</th>
        <th>密碼</th>
        <th>刪除</th>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $row):
    ?>
        <tr>
            <td>
                <input type="text" name="acc[]" value="<?= $row['acc']; ?>" style="width:90%">
            </td>
            <td>
                <input type="password" name="pw[]" value="<?= $row['pw']; ?>" style="width:90%">
            </td>
            <td>
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
                <input type="button" onclick="op('#cover', '#cvr', './modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增管理者帳號">
            </td>
            <td class="cent">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
            </td>
        </tr>
    </tbody>
</table>