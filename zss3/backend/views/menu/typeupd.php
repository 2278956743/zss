<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>菜品分类修改</title>
</head>
<body>
<center>
<h2>菜品分类修改</h2>
<form action="index.php?r=menu/typedoupd" method="post" enctype="multipart/form-data">
<input type="hidden" name="series_id" value="<?php echo $arr['series_id']?>">
<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
	<table>
		<tr>
			<td>所属门店</td>
			<td>
				<select name="series_shop">
				<?php foreach($type as $k=>$v) : ?>
					<option value="<?php echo $v['shop_id']?>"><?php echo $v['shop_name']?></option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="确认修改"></td>
			<td><input type="reset" value="取消"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>