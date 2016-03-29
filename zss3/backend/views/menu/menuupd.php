<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>菜品修改</title>
</head>
<body>
<center>
<h2>菜品添加</h2>
<form action="index.php?r=menu/doupd" method="post" enctype="multipart/form-data">
<input type="hidden" name="menu_id" value="<?php echo $menu['menu_id']?>">
<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
	<table>
		<tr>
			<td>菜品名称</td>
			<td><input type="text" name="menu_name" placeholder="<?php echo $menu['menu_name']?>"></td>
		</tr>
		<tr>
			<td>菜品价格</td>
			<td><input type="text" name="menu_price" placeholder="<?php echo $menu['menu_price']?>"></td>
		</tr>
		<tr>
			<td>菜品图片</td>
			<td>
				<img src="<?php echo \Yii::$app->request->baseUrl;?>/<?php echo $menu['menu_img']?>"  height="50px" width="50px">
				<input type="file" name="menu_img">
			</td>
		</tr>
		<tr>
			<td>菜品描述</td>
			<td><textarea name="menu_introduce"cols="30" rows="10"><?php echo $menu['menu_introduce']?></textarea></td>
		</tr>
		<tr>
			<td>菜品状态</td>
			<td>
				<select name="menu_status">
					<option value="1">上架</option>
					<option value="0">暂不上架</option>
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