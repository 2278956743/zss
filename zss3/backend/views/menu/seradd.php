<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>名厨系列添加</title>
</head>
<body>
<center>
	<h2>名厨系列添加</h2>
	<form action="index.php?r=menu/serdoadd" method="post">
	<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
		<table>
			<tr>
				<td>菜系名厨: </td>
				<td><input type="text" name="series_name" id="series_name"><span id="name_sp"></span></td>
			</tr>
			<tr>
				<td>所属门店: </td>
				<td>
					<select name="series_shop">
					<?php foreach($shop as $k=>$v) : ?>
						<option value="<?php echo $v['shop_id']?>"><?php echo $v['shop_name']?></option>
					<?php endforeach;?>
					</select>
				</td>
			</tr>
			<tr>
				<td>状态: </td>
				<td>
					<select name="series_status">
						<option value="1">上架</option>
						<option value="0">暂不上架</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="添加"></td>
				<td><a href="index.php?r=menu/type" style="text-decoration:none"><input type="button" value ="名厨列表"></a></td>
			</tr>
		</table>
	</form>
</center>
<script src="/assets/js/jq.js"></script>
<script>
$(document).ready(function(){
	var kk=0;
	$(document).on("blur","#series_name",function(){
		var series_name = $(this).val();
		var reg=/^[\u4e00-\u9fa5]{2,17}$/;
		if(reg.test(series_name)){
			$("#name_sp").html("<font color='blue'>输入正确</font>");
			kk=1;
			return kk;
		}else if(series_name==""){
			$("#name_sp").html("<font color='red'>输入不能为空</font>");
		}else{
			$("#name_sp").html("<font color='red'>输入格式错误,只能是汉字</font>");
		}
	});
	$("form").submit(function(){
		if(kk==1){		
			return true;
		}else{
			return false;
		}
	});
});
</script>
</body>
</html>