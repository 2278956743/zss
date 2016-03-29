<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>项目管理系统 by www.mycodes.net</title>
<link rel="stylesheet" rev="stylesheet" href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" type="text/css" media="all" />

<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >任务门店页面</th>
  </tr>
  <tr>
    <td class="CPanel">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		<tr><td align="left">
		
		</td></tr>
		
		<TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>修改门店信息</legend>
				<form action='index.php?r=shop/upt_pro' method='post'>
				<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
				<input type='hidden' name='shop_id' value="<?php echo $row[0]['shop_id']?>">
				<center>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					  <tr>
					    <td width="13%">门店名称:</td><td><input name="shop_name" type="text" value="<?php echo $row[0]['shop_name']?>"/></td>
					   </tr>
					  <tr>
					    <td >门店电话号码:</td><td><input name="shop_phone" type="text" value="<?php echo $row[0]['shop_phone']?>"/></td>
					  </tr>
					  <tr>
					    <td width="13%">门店地址:</td><td><input name="shop_address" type="text" value="<?php echo $row[0]['shop_address']?>"/></td>
					   </tr>
					  <tr>
					    <td>外卖营业开饭时间:</td><td><input name="shop_open" type="text" value="<?php echo $row[0]['shop_open']?>"/></td>
					  </tr>
					  <tr>
					    <td width="13%">外卖营业结束时间:</td><td><input name="shop_over" type="text" value="<?php echo $row[0]['shop_over']?>"/></td>
					   </tr>
					  <tr>
					    <td>堂食/自取开饭时间:</td><td><input name="shop_opens" type="text" value="<?php echo $row[0]['shop_opens']?>"/></td>
					  </tr>
					  <tr>
					    <td>堂食/自取结束时间:</td><td><input name="shop_overs" type="text" value="<?php echo $row[0]['shop_overs']?>"/></td>
					  </tr>
					  <tr>
					    <td width="13%">门店支持类型:</td>
					    <td>
					    <input type="checkbox" name="shop_type[]" value="堂食">堂食
					    <input type="checkbox" name="shop_type[]" value="外卖">外卖
					    <input type="checkbox" name="shop_type[]" value="自取">自取
					    </td>
					   </tr>
					   <tr>
					   <tr>
					    <td>门店状态:</td>
					    <td>
					    <input type="radio" name="shop_status" value='1' checked>开店
					    <input type="radio" name="shop_status" value='0'>关店
                         </td>
					  </tr>
 				</tr>
					<TR>
					<TD colspan="2" align="center" height="50px">
					<input type="submit" value="修改 "/>　
					<input type="reset" value="返回" class='reset'/></TD>
				</TR>
				</table>
				</center>
			</form>
			 <br />
		</fieldset>			</TD>
		</TR>
		
		</TABLE>
	
	
	 </td>
 
		</TABLE>
	
	
	 </td>
  </tr>
  
  
  
  
  </table>

</div>
</body>
</html>
<script src="<?php echo yii::$app->request->baseUrl?>/assets/js/jquery-1.9.1.min.js"></script>
<script>
$(document).on('click','.reset',function(){
		location.href='index.php?r=shop/lists';
})
</script>
