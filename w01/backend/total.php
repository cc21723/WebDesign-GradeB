<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">總進站人數管理</p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					
					<td width="60%"></td>
				</tr>
				<?php
				$rows = ${ucfirst($do)}->all();
				foreach ($rows as $row):
				?>
					<tr class="yel">
						<td width="40%">總進站人數</td>
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
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px">
						<input type="hidden" name="table" value="<?=$do;?>">
						<input type="button" onclick="op('#cover', '#cvr', './modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增動態文字廣告">
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