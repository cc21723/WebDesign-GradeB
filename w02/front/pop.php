<div class="nav" style="margin-bottom: 20px;">
    目前位置：首頁 > 人氣文章區 </span>
</div>
<table style="width: 95%; margin:auto;">
    <tr class="ct">
        <td width="20%">標題</td>
        <td width="60%">內容</td>
        <td>人氣</td>
    </tr>

    <?php
    $total = $News->count();
    $div = 3;
    $pages = ceil($total / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(" order by `good` desc limit $start, $div");
    foreach ($rows as $idx => $row):
    ?>
        <tr>
            <td><?=$row['title'];?></td>
            <td>
                <div class="short"><?=mb_substr($row['text'],0,30);?>...</div>
                <div class="all"></div>
            </td>
            <td></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>