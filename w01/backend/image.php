<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">校園映像資料管理</p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="60%">校園映像資料圖片</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php
				$rows = ${ucfirst($do)}->all();
				foreach ($rows as $row):
				?>
					<tr>
						<td>
							<img src="./images/<?= $row['img']; ?>" style="width:120px; padding-left: 20px;">
						</td>
						<td style="padding-left: 3%;">
							<input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
						</td>
						<td style="padding-left: 3%;">
							<input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
						</td>
						<td style="padding-left: 5%;">
							<input type="button" value="更換圖片" onclick="op('#cover','#cvr','./modal/update.php?id=<?= $row['id'] ?>&table=<?= $do; ?>')">
						</td>
					</tr>
					<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
				<?php endforeach; ?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px">
						<input type="hidden" name="table" value="<?= $do; ?>">
						<input type="button" onclick="op('#cover', '#cvr', './modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動畫圖片">
					</td>
					<td class="cent">
						<input type="submit" value="修改確定">
						<input type="reset" value="重置">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>