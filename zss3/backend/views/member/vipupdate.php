<center>

<h2>等级修改</h2>

<form action="index.php?r=member/vip_update_do" method="post">

	<table>

		<tr>

			<td>ID:<?php echo $vipupdate[0]['vip_id']?></td>

			<td>

				<input type="hidden" name="vip_id" value="<?php echo $vipupdate[0]['vip_id']?>">

			</td>

		</tr>

		<tr>

			<td>等级:<?php echo $vipupdate[0]['vip_name']?></td>

			<td></td>

		</tr>

		<tr>

			<td>折扣:<input type="text" style="width:40px;" id="vip_discount" name="vip_discount" value="<?php echo
			$vipupdate[0]['vip_discount']?>">%</td>

			<td>

				<span id="dis_list"></span>

			</td>

		</tr>

		<tr>

			<td>满减:满<?php $data=explode(",",$vipupdate[0]['vip_subtract']);?><input type="text" id="vip_subtract1"
				style="width:40px;" name="vip_subtract1" value="<?php echo $data[0]?>"> 减<input type="text" style="width:40px;"
				name="vip_subtract2" id="vip_subtract2" value="<?php echo $data['1']?>">
			</td>

			<td>

				<span id="sub_list"></span>

			</td>
		</tr>

		<tr>

			<td>满赠:满<input type="text" style="width:40px;" id="vip_price" name="vip_price" value="<?php echo
			$vipupdate[0]['vip_price']?>">

			赠 <select name="gift_id">

				<?php foreach($gift as $v):?>

					<option value="<?php echo $v['gift_id']?>"><?php echo $v['gift_name']?></option>

				<?php endforeach;?>

			</select>

		</td>

		<td>

			<span id="price_list"></span>

		</td>



		</tr>

		<tr>

			<td>状态:

				<select name="user_status">

					<option value="1">启用</option>

					<option value="0">禁用</option>

				</select>

		</tr>

		<tr>

			<td><input type="submit" value="确定"><input type="reset" id="quxiao" value="取消"></td>

			<td></td>

		</tr>

	</table>

</form>

</center>

<script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.10.2.js"></script>

<script>

	$(document).ready(function(){

		kk1 = 0;

		kk2 = 0;

		kk3 = 0;

		/**
		 * 验证折扣
		 */

		$(document).on("blur","#vip_discount",function(){

			var vip_discount = $(this).val();

			if(vip_discount == ""){

				$("#dis_list").html("<font color='red'>不能为空</font>");

				kk1 = 1;

				return kk1;

			}else {

				if(vip_discount >100){

					$("#dis_list").html("<font color='red'>不能大于100</font>");

					$(this).val("")

					kk1 = 1;

					return kk1;

				}else{

					if(/^\d{1,3}$/.test(vip_discount)){

						$("#dis_list").html("<font color='blue'>OK</font>");

						kk1 = 0;

						return kk1;

					}else{

						$("#dis_list").html("<font color='red'>格式不正确,必须是数字</font>");

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
		$(document).on("blur","#vip_subtract2",function(){

			var vip_subtract1 = $("#vip_subtract1").val();

			var vip_subtract2 = $(this).val();

			if(vip_subtract2 > vip_subtract1){

				$("#sub_list").html("<font color='red'>这样会赔钱的</font>");

				$(this).val("");

				kk2 = 1;

				return kk2;

			}else{

				$("#sub_list").html("<font color='blue'>OK</font>");

				kk2 = 0;

				return kk2;

			}

		});
		/**
		 * 满赠
		 */
		$(document).on("blur","#vip_price",function(){

			var vip_price = $(this).val();

			if(vip_price == ""){

				$("#price_list").html("<font color='red'>不能为空</font>");

				kk3 = 1;

				return kk3;

			}else{

				$("#price_list").html("<font color='blue'>OK</font>");

				kk3 = 0;

				return kk3;

			}

		});

		$("form").submit(function(){

			if(kk1==0 && kk2 == 0 && kk3 == 0){

				return true;

			}else{

				return false;
			}

		});

	});

</script>
