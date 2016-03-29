<?php foreach($arr as $value){ ?>
 	 <tr>
	    <td bgcolor="#FFFFFF"><center><?php echo $value['order_id']?></center></td>
	    <td height="20" bgcolor="#FFFFFF"><center><?php echo $value['order_sn']?></center></td>
	    <td bgcolor="#FFFFFF"><center><?php echo $value['zssmenu']['menu_name']?></center></td>
	    <td bgcolor="#FFFFFF"><center><?php echo $value['zssorderinfo']['menu_num']?></center></td>
		<td bgcolor="#FFFFFF"><center><?php echo $value['zssmenu']['menu_price']?></center></td>

		<?php if(($value['delivery_type'])==1): ?>
					<td><center>外卖</center></td>
				<?php elseif(($value['delivery_type'])==2):?>
					<td><center>自取</center></td>
				<?php elseif(($value['delivery_type'])==3):?>
					<td><center>堂食</center></td>
				<?php endif?>

				<?php if(($value['pay_type'])==1): ?>
					<td><center>微信</center></td>
				<?php elseif(($value['pay_type'])==2):?>
					<td><center>支付宝</center></td>
				<?php elseif(($value['pay_type'])==3):?>
					<td><center>银联</center></td>
				<?php endif?> 
				
				<?php if(($value['order_status'])==1): ?>
					<td><center>未支付</center></td>
				<?php elseif(($value['order_status'])==2):?>
					<td><center>已付款<center></td>
				<?php elseif(($value['order_status'])==3):?>
					<td><center>订单关闭</center></td>
				<?php elseif(($value['order_status'])==4):?>
					<td><center>成功</center></td>
				<?php elseif(($value['order_status'])==5):?>
					<td><center>失败</center></td>
				<?php endif?> 
								
		<td bgcolor="#FFFFFF"><center><?php echo $value['created_time']?></center></td>
		<td bgcolor="#FFFFFF"><center>
			<a href="index.php?r=order/list&&order_id=<?php echo $value['order_id']?>">详情</a></center>
		</td>
	 </tr>
<?php } ?>