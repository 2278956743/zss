<center>
<h2>会员修改</h2>
<form action="index.php?r=member/vip_add_do" method="post">
	<table>
		<tr>
			<td>姓名:<?php echo $usersel[0]['user_name']?></td>
			<td>
				<input type="hidden" name="user_id" value="<?php echo $usersel[0]['user_id']?>">
			</td>
		</tr>
		<tr>
			<td>性别:<?php echo $usersel[0]['user_sex']?></td>
			<td></td>
		</tr>
		<tr>
			<td>余额:<?php echo $usersel[0]['user_price']?><input type="button" value="调整" id="price">
			<br><input type="text" id="list_price" name="user_price" style="display:none" value="<?php echo $usersel[0]['user_price']?>"></td>
		</tr>
		<tr>
			<td>积分:<?php echo $usersel[0]['user_integral']?><input id="integral" type="button" value="调整">
			<br><input type="text" id="list_int" name="user_integral" value="<?php echo $usersel[0]['user_price']?>" style="display:none"></td>
		</tr>
		<tr>
			<td>消费记录</td>
			<td><a href="index.php?r=member/viplog&user_id=<?php echo $usersel[0]['user_id']?>">更多</a></td>
		</tr>
		<tr>
		<td>
			<table border="" style="margin-top:10px">
				<tr>
					<td><center>订单号</center></td>
					<td><center>消费门店</center></td>
					<td><center>取餐号</center></td>
					<td><center>金额</center></td>
					<td><center>积分</center></td>
					<td><center>日期</center></td>
				</tr>
				<?php foreach($user_vip_log as $v):?>
				<tr>
					<td><center><?php echo $v['zssorder'][0]['order_sn']?></center></td>
					<td><center><?php echo $v['zssshop'][0]['shop_name']?></center></td>
					<td><center><?php echo $v['zssorder'][0]['meal_number']?></center></td>
					<td><center><?php echo $v['zssorder'][0]['price_amount']?></center></td>
					<td><center><?php echo $v['zssuser'][0]['user_integral']?></center></td>
					<td><center><?php echo $v['zssorder'][0]['created_time']?></center></td>
				</tr>
				<?php endforeach;?>
			</table>
		</td>
			
		</tr>
		<tr style="margin-left:-10%">
			<td>充值记录</td>
			<td><a href="index.php?r=member/vippay&user_id=<?php echo $usersel[0]['user_id']?>">更多</a></td>
		</tr>
		<tr>
		<td>
			<table border="" style="margin-top:10px">
					<tr>
						<td>支付类型</td>
						<td>充值金额</td>
						<td>赠金</td>
						<td>日期</td>
					</tr>
					<?php foreach($user_vip_pay as $vv):?>
					<tr>
						<td><center><?php echo $vv['zsspaytype'][0]['pay_name']?></center></td>
						<td><center><?php echo $vv['log_price']?></center></td>
						<td><center><?php echo $vv['log_give_price']?></center></td>
						<td><center><?php echo date("Y-m-d h:i:s",$vv['pay_created_at']) ?></center></td>
					</tr>
				<?php endforeach;?>
				</table>
		</td>
			
			</tr>
		<tr>
			<td><input type="submit" value="确定"><input type="button" value="取消"></td>
			<td></td>
		</tr>
	</table>
</form>
</center>
<script src="assets/js/jq.js"></script>
<script>
		$("#price").click(function(){

			if($("#list_price").css("display")=="none"){
				$("#list_price").show();
			}else{
				$("#list_price").hide();
			}

		});
		$("#integral").click(function(){

			if($("#list_int").css("display")=="none"){
				$("#list_int").show();
			}else{
				$("#list_int").hide();
			}

		});
		
</script>