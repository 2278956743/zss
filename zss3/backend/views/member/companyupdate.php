<center>
<h2>合伙人修改</h2>
<form action="index.php?r=member/com_up_do" method="post">
	<table>
		<tr>
			<td>ID:<?php echo $companyupdate[0]['company_id']?></td>
			<td>
					<input type="hidden" name="company_id" value="<?php echo $companyupdate[0]['company_id']?>">
			</td>
			<td></td>
		</tr>
		<tr>
			<td>名称:<?php echo $companyupdate[0]['company_name']?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>折扣:<input type="text" style="width:40px;" id="company_discount" name="company_discount" value="<?php echo $companyupdate[0]['company_discount']?>">%
			</td><td><span id="dis_list"></span></td>
		</tr>
		<tr>
			<td>满减:满<?php $data=explode(",",$companyupdate[0]['company_subtract']);?><input type="text" style="width:40px;" id="company_subtract1" name="company_subtract1" value="<?php echo $data[0]?>">减<input type="text" style="width:40px;" id="company_subtract2" name="company_subtract2" value="<?php echo $data['1']?>">
			</td>
			<td><span id="sub_list"></span></td>
		</tr>
		<tr>
			<td style="with:40px">满赠:满<input type="text" style="width:40px;" id="company_price" name="company_price" value="<?php echo $companyupdate[0]['company_price']?>">

				<select name="gift_id">
				<?php foreach($gift as $v):?>
					<option value="<?php echo $v['gift_id']?>"><?php echo $v['gift_name']?></option>
				<?php endforeach;?>
				</select>
			</td>
			<td><span id="price_list"></span></td>
		</tr>
		<tr>
			<td>状态:
				<select name="user_status">
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</select>
		</tr>
		<tr>
			<td><input type="submit" value="确定"><input type="reset" value="取消"></td>
			<td></td>
		</tr>
	</table>
</form>
</center>
<script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.10.2.js"></script>
<script>
	$(document).ready(function(){
		kk1 = 0;
		kk2 = 1;
		kk3 = 0;
		/**
		 * 折扣
		 */
		$(document).on("blur","#company_discount",function(){
			var company_discount = $(this).val();
			if(company_discount == ""){
				$("#dis_list").html("<font color='red'>不能为空</font>");
				kk1 = 1;
				return kk1;
			}else {
				if(company_discount >100){
					$("#dis_list").html("<font color='red'>不能大于100</font>");
					$(this).val("")
					kk1 = 1;
					return kk1;
				}else{
					if(/^\d{1,3}$/.test(company_discount)){
						$("#dis_list").html("<font color='blue'>OK</font>");
						kk1 = 0;
						return kk1;
					}else{
						$("#dis_list").html("<font color='red'>格式不正确</font>");
						$(this).val("")
						kk1 = 1;
						return kk1;
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
				kk2=1;
				return kk2;
			}else{
				$("#sub_list").html("<font color='blue'>OK</font>");
				kk2=0;
				return kk2;
			}
		});
		/**
		 * 满赠
		 */
		$(document).on("blur","#company_price",function(){
			var company_price = $(this).val();
			if(company_price == ""){
				$("#price_list").html("<font color='red'>不能为空</font>");
				kk3=1;
				return kk3;
			}else{
				$("#price_list").html("<font color='blue'>OK</font>");
				kk3=0;
				return kk3;
			}
		});
		$("form").submit(function(){
			if(kk1==1 && kk2==1 && kk3==1){

				return false;
			}else if(kk1 == 0 && kk2 ==0 && kk3 == 0){

				return true;
			}else{
				return false;
			}
		});
	});
</script>
