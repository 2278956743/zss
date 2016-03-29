<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单详情</title>


<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<SCRIPT language=JavaScript>
function sousuo(){
	window.open("gaojisousuo.htm","","depended=0,alwaysRaised=1,width=800,height=510,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
function selectAll(){
	var obj = document.fom.elements;
	for (var i=0;i<obj.length;i++){
		if (obj[i].name == "delid"){
			obj[i].checked = true;
		}
	}
}

function unselectAll(){
	var obj = document.fom.elements;
	for (var i=0;i<obj.length;i++){
		if (obj[i].name == "delid"){
			if (obj[i].checked==true) obj[i].checked = false;
			else obj[i].checked = true;
		}
	}
}

function link(){
    document.getElementById("fom").action="kehu.htm";
   document.getElementById("fom").submit();
}

</SCRIPT>

<body>
<form name="fom" id="fom" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <td width="24"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico07.gif" width="20" height="18" /></td>
			  <td width="519"><label>公司名称:
			      <input name="text" type="text" nam="gongs" />
			  </label>
			    </input>
			    <input name="Submit" type="button" class="right-button02" value="查 询" /></td>
			   <td width="679" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>	
		    </tr>
          </table></td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 <tr>
               <td height="20"><span class="newfont07">选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a></span>
		           <input name="Submit" type="button" class="right-button08" value="删除所选人员信息" /> <input name="Submit" type="button" class="right-button08" value="添加人员信息" onclick="link();" />
		           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	              </td>
          </tr>
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">

					                  <tr>
                    <td height="20" colspan="14" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客户详细列表 &nbsp;</td>
                    </tr>
                  <tr>
				    <td width="8%" align="center" bgcolor="#EEEEEE">选择</td>
					<td width="12%" height="20" align="center" bgcolor="#EEEEEE">订单ID</td>
                    <td width="7%" align="center" bgcolor="#EEEEEE">订单号</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">门店id</td>
                    <td width="14%" align="center" bgcolor="#EEEEEE">用户姓名</td>
					<td width="28%" align="center" bgcolor="#EEEEEE">用户手机号</td>
					<td width="10%" align="center" bgcolor="#EEEEEE">用户地址</td>
                    <td width="11%" align="center" bgcolor="#EEEEEE">运费</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">派送类型</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">取餐号</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">订单实付款</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">总价格</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">支付方式</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">支付时间</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">创建时间</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">修改时间</td>
					<td width="11%" align="center" bgcolor="#EEEEEE">订单状态</td>
                  </tr>
                  <tr>
				    <td bgcolor="#FFFFFF"><input type="checkbox" name="delid"/></td>
					<td height="20" bgcolor="#FFFFFF"><a href="listyuangongmingxi.html"><?php echo $order_list['order_id']?></a></td>
                    <td bgcolor="#FFFFFF"><a href="listyuangongmingxi.html"><?php echo $order_list['order_sn']?></a></td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo $order_list['shop_name']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['user_name']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['user_phone']?></td>
					<td bgcolor="#FFFFFF"><?php echo $order_list['address']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['order_freight']?></td>
					<td bgcolor="#FFFFFF"><?php echo $order_list['delivery_type']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['meal_number']?></td>
					<td bgcolor="#FFFFFF"><?php echo $order_list['amount']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['price_amount']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['pay_type']?></td>
					<td bgcolor="#FFFFFF"><?php echo $order_list['pay_at']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['created_time']?></td>
					<td bgcolor="#FFFFFF"><?php echo $order_list['updated_time']?></td>
                    <td bgcolor="#FFFFFF"><?php echo $order_list['order_status']?></td>
					<!--<td bgcolor="#FFFFFF"><a href="kehu.htm">编辑</a>&nbsp;|&nbsp;<a href="kehuminxi.html">查看</a></td>-->
                  </tr>
                  
                </table>
				</td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
              <tr>
                <td width="50%">共 <span class="right-text09">5</span> 页 | 第 <span class="right-text09">1</span> 页</td>
                <td width="49%" align="right">[<a href="#" class="right-font08">首页</a> | <a href="#" class="right-font08">上一页</a> | <a href="#" class="right-font08">下一页</a> | <a href="#" class="right-font08">末页</a>] 转至：</td>
                <td width="1%"><table width="20" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%"><input name="textfield3" type="text" class="right-textfield03" size="1" /></td>
                      <td width="87%"><input name="Submit23222" type="submit" class="right-button06" value=" " />
                      </td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
