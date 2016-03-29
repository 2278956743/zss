<html>
<head>
<meta http-equiv="Content-Type" content="text/html;"/>
<title>订单详情</title>

<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>


<body>
<form name="fom" id="fom" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">
            
		   </td>
        </tr>
    </table></td></tr>
  <tr>
    <td>
	<table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
         
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				
					<tr>
                    <td height="20" colspan="2"  bgcolor="#EEEEEE"class="tablestyle_title"><center>订单详情</center></td>
                    </tr>
						  <tr>
							<td height="20" align="right" bgcolor="#FFFFFF">订单ID</td>
							<td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['order_id']?></td>
						  </tr>
                      <tr>
				    <td width="16%" height="20" align="right" bgcolor="#FFFFFF">订单号:</td>
                    <td width="84%" colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['order_sn']?></td>
                    </tr>
					<tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">取餐号:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['meal_number']?></td>
                  </tr>
                  <tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">门店名称:</td>
				    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['zssshop']['shop_name']?></td>
                    </tr>
				  <tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">菜品名称:</td>
				    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['zssmenu']['menu_name']?></td>
                    </tr>
				 <tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">菜品个数:</td>
				    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['zssorderinfo']['menu_num']?></td>
                    </tr>
                  <tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">用户姓名:</td>
				    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['zssuser']['user_name']?></td>
                    </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">用户手机号:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['zssuser']['user_phone']?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">用户地址:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['address']?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">运费:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['order_freight']?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">派送类型:</td>                 
							<?php if(($order_list['delivery_type'])==1): ?>
								<td colspan="2" bgcolor="#FFFFFF">外卖</td>
							<?php elseif(($order_list['delivery_type'])==2):?>
								<td colspan="2" bgcolor="#FFFFFF">自取</td>
							<?php elseif(($order_list['delivery_type'])==3):?>
								<td colspan="2" bgcolor="#FFFFFF">堂食</td>
							<?php elseif(empty($order_list['delivery_type'])):?>
								<td colspan="2" bgcolor="#FFFFFF"></td>
							<?php endif?>
						
                  </tr>
                  
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">订单实付款:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['amount']?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">总价格:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['price_amount']?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">支付方式:</td>
							<?php if(($order_list['pay_type'])==1): ?>
								<td colspan="2" bgcolor="#FFFFFF">微信</td>
							<?php elseif(($order_list['pay_type'])==2):?>
								<td colspan="2" bgcolor="#FFFFFF">支付宝</td>
							<?php elseif(($order_list['pay_type'])==3):?>
								<td colspan="2" bgcolor="#FFFFFF">银联</td>
							<?php elseif(empty($order_list['pay_type'])):?>
								<td colspan="2" bgcolor="#FFFFFF"></td>
							<?php endif?> 
											
                  </tr>
                  <tr>
                    <td height="20" align="right" bgcolor="#FFFFFF">支付时间:</td>
                    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['pay_at']?></td>
                  </tr>
                  <tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">创建时间:</td>
				    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['created_time']?></td>
                    </tr>
					<tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">修改时间:</td>
				    <td colspan="2" bgcolor="#FFFFFF"><?php echo $order_list['updated_time']?></td>
                    </tr>
					<tr>
				    <td height="20" align="right" bgcolor="#FFFFFF">订单状态:</td>
							<?php if(($order_list['order_status'])==1): ?>
								<td colspan="2" bgcolor="#FFFFFF">未支付</td>
							<?php elseif(($order_list['order_status'])==2):?>
								<td colspan="2" bgcolor="#FFFFFF">已付款</td>
							<?php elseif(($order_list['order_status'])==3):?>
								<td colspan="2" bgcolor="#FFFFFF">订单关闭</td>
							<?php elseif(($order_list['order_status'])==4):?>
								<td colspan="2" bgcolor="#FFFFFF">成功</td>
							<?php elseif(($order_list['order_status'])==5):?>
								<td colspan="2" bgcolor="#FFFFFF">失败</td>
							<?php elseif(empty($order_list['order_status'])):?>
								<td colspan="2" bgcolor="#FFFFFF"></td>
							<?php endif?> 
												
                    </tr>
                </table></td>
              </tr>
            </table></td>
        </tr>
    </table>   
  </tr>
</table>
</form>
</body>
</html>
