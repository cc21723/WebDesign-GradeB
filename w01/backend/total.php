<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">進站總人數管理</p>
	<form method="post" action="./api/edit_column.php">
		<table width="50%" style="margin: auto;">
			<tbody>
				<tr>
					<td width="50%" style="background-color: #F3DA49; text-align:center;">進站總人數：</td>
					<!-- ${ucfirst($do)}->find(1)['total'];  -->
					<!-- 可改成 -->
					 <?php
					 $row= $Total->find(1);
					 ?>
					<td><input type="text" name="total" value="<?= $row['total']; ?>" style="width:90%;"></td>
					<input type="hidden" name="id" value="<?= $row['id']; ?>">
				</tr>				
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<input type="hidden" name="table" value="<?=$do;?>">
					<td width="200px">
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