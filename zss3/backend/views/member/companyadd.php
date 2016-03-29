<center>
<h2>添加合伙公司</h2>
<form action="index.php?r=member/company_add_do" method="post">
	<table>
		<tr>
			<td>名称:</td>
			<td><input type="text" id="company_name" name="company_name" style="width:50px">
				<span id="company_list"></span>
			</td>
			<td><span id="name_list"></span></td>
		</tr>
		<tr>
			<td>折扣:</td>
			<td><input type="text" id="company_discount" name="company_discount" style="width:50px">%</td>
			<td><span id="dis_list"></span></td>
		</tr>
		<tr>
			<td>满减:</td>
			<td>满<input type="text" id="company_subtract1" style="width:40px;" name="company_subtract1">减<input type="text" id="company_subtract2" style="width:40px;" name="company_subtract2"></td>
			<td><span id="sub_list"></span></td>
		</tr>
		<tr>
			<td>满赠:</td>
			<td>满<input type="text" id="company_price" style="width:40px;" name="company_price">赠
				<select name="gift_id">
				<?php foreach($gift as $v):?>
					<option value="<?php echo $v['gift_id']?>"><?php echo $v['gift_name']?></option>
				<?php endforeach;?>
				</select>
			</td>
			<td><span id="price_list"></span></td>
		</tr>
		<tr>
			<td><input type="submit" value="确定"><input type="button" value="取消"></td>
			<td></td>
		</tr>
	</table>
</form>
</center>
<script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.10.2.js"></script>
<script>
	$(document).ready(function(){
		kk = 0;
		/**
		 * 验证用户名
		 */
		$(document).on("blur","#company_name",function(){
			var company_name = $(this).val();
			if(company_name == ""){
				$("#name_list").html("<font color='red'>不能为空</font>");
				kk=1;
				return kk;
			}else{
				if(/^[\u4E00-\u9FA5]{1,6}$/.test(company_name)){
					$("#name_list").html("<font color='blue'>OK</font>");
					kk=0;
					return kk;
				}else{
					$("#name_list").html("<font color='red'>格式不正确,必须是汉字</font>");
					$(this).val("")
					kk=1;
					return kk;
				}
			}
		});
		/**
		 * 验证折扣
		 */
		$(document).on("blur","#company_discount",function(){
			var company_discount = $(this).val();
			if(company_discount == ""){
				$("#dis_list").html("<font color='red'>不能为空</font>");
				kk=1;
				return kk;
			}else {
				if(company_discount >100){
					$("#dis_list").html("<font color='red'>不能大于100</font>");
					$(this).val("")
					kk=1;
					return kk;
				}else{
					if(/^\d{1,3}$/.test(company_discount)){
						$("#dis_list").html("<font color='blue'>OK</font>");
						kk=0;
						return kk;
					}else{
						$("#dis_list").html("<font color='red'>格式不正确,必须是数字</font>");
						$(this).val("")
						kk=1;
						return kk;
					}
				}

			}
		});
		/**
		 * 满减
		 */
		$(document).on("blur","#company_subtract2",function(){
			var company_subtract1 = $("#company_subtract1").val();
			var company_subtract2 = $(this).val();
			//alert(company_subtract1)
			if(company_subtract2 > company_subtract1){
				$("#sub_list").html("<font color='red'>这样会赔钱的</font>");
				$(this).val("");
				kk=1;
				return kk;
			}else{
				$("#sub_list").html("<font color='blue'>OK</font>");
				kk=0;
				return kk;
			}
		});
		/**
		 * 满赠
		 */
		$(document).on("blur","#company_price",function(){
			var company_price = $(this).val();
			if(company_price == ""){
				$("#price_list").html("<font color='red'>不能为空</font>");
				kk=1;
				return kk;
			}else{
				$("#price_list").html("<font color='blue'>OK</font>");
				kk=0;
				return kk;
			}
		});
		$("form").submit(function(){
			if(kk==1){

				return false;
			}else if(kk==0){

				return true;
			}
		});
	});
</script>
