<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>菜品添加</title>
</head>
<body>
<center>
<h2>菜品添加</h2>
<form action="index.php?r=menu/doadd" method="post" enctype="multipart/form-data">
<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
	<table>
		<tr>
			<td>菜品分类</td>
			<td>
				<select name="menu_series">
				<?php foreach($series as $k=>$v) : ?>
					<option value="<?php echo $v['series_id']?>"><?php echo $v['series_name']?></option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>菜品名称</td>
			<td><input type="text" name="menu_name" id="menu_name"><span id="name_sp"></span></td>
		</tr>
		<tr>
			<td>所属门店</td>
			<td>
				<select name="menu_shop">
				<?php foreach($shop as $k=>$v) : ?>
					<option value="<?php echo $v['shop_id']?>"><?php echo $v['shop_name']?></option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>菜品价格</td>
			<td><input type="text" name="menu_price" id="menu_price"><span id="price_sp"></span></td>
		</tr>
		<tr>
			<td>菜品图片</td>
			<td><input type="file" name="menu_img"></td>
		</tr>
		<tr>
			<td>菜品描述</td>
			<td><textarea name="menu_introduce" cols="30" rows="10" id="menu_introduce"></textarea><span id="intro_sp"></span></td>
		</tr>
		<tr>
			<td>菜品状态</td>
			<td>
				<select name="menu_status" id="menu_status">
					<option value="1">上架</option>
					<option value="0">暂不上架</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="添加"></td>
			<td><a href="index.php?r=menu/list" style="text-decoration:none"><input type="button" value ="菜品列表"></a></td>
		</tr>
	</table>
</form>
</center>
<script src="/assets/js/jq.js"></script>
<script>
$(document).ready(function(){
	var kk1=0;
	var kk2=0;
	var kk3=0;
	$(document).on("blur","#menu_name",function(){
		var menu_name = $(this).val();
		var reg=/^[\u4e00-\u9fa5]{2,17}$/;
		if(reg.test(menu_name)){
			$("#name_sp").html("<font color='blue'>输入正确</font>");
			kk1=1;
			return kk;
		}else if(menu_name==""){
			$("#name_sp").html("<font color='red'>输入不能为空</font>");
		}else{
			$("#name_sp").html("<font color='red'>输入格式错误,只能是汉字</font>");
		}
	});
	$(document).on("blur","#menu_price",function(){
		var menu_price = $(this).val();
		var reg=/^\d{1,3}$/;
		if(reg.test(menu_price)){
			$("#price_sp").html("<font color='blue'>输入正确</font>");
			kk2=1;
			return kk;
		}else if(menu_price==""){
			$("#price_sp").html("<font color='red'>输入不能为空</font>");
		}else{
			$("#price_sp").html("<font color='red'>只能是数字,不能超过三位</font>");
		}
	});
	$(document).on("blur","#menu_introduce",function(){
		var menu_introduce = $(this).val();
		var reg=/^[\u4e00-\u9fa5]{1,17}$/;
		if(reg.test(menu_introduce)){
			$("#intro_sp").html("<font color='blue'>输入正确</font>");
			kk3=1;
			return kk;
		}else if(menu_introduce==""){
			$("#intro_sp").html("<font color='red'>输入不能为空</font>");
		}else{
			$("#intro_sp").html("<font color='red'>输入格式错误,必须是中文</font>");
		}
	});
	$("form").submit(function(){
		if(kk1==1 && kk2==1 && kk3==1){		
			return true;
		}else{
			return false;
		}
	});
});
</script>
</body>
</html>