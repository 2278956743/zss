<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>项目管理系统 by www.mycodes.net</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(<?php echo Yii::$app->request->baseUrl ?>/assets/images/left.gif);
}
-->
</style>
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
</head>
<SCRIPT language=JavaScript>
function tupian(idt){
    var nametu="xiaotu"+idt;
    var tp = document.getElementById(nametu);
    tp.src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico05.gif";//图片ico04为白色的正方形
	
	for(var i=1;i<30;i++)
	{
	  
	  var nametu2="xiaotu"+i;
	  if(i!=idt*1)
	  {
	    var tp2=document.getElementById('xiaotu'+i);
		if(tp2!=undefined)
	    {tp2.src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif";}//图片ico06为蓝色的正方形
	  }
	}
}

function list(idstr){
	var name1="subtree"+idstr;
	var name2="img"+idstr;
	var objectobj=document.all(name1);
	var imgobj=document.all(name2);
	
	
	//alert(imgobj);
	
	if(objectobj.style.display=="none"){
		for(i=1;i<10;i++){
			var name3="img"+i;
			var name="subtree"+i;
			var o=document.all(name);
			if(o!=undefined){
				o.style.display="none";
				var image=document.all(name3);
				//alert(image);
				image.src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif";
			}
		}
		objectobj.style.display="";
		imgobj.src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico03.gif";
	}
	else{
		objectobj.style.display="none";
		imgobj.src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif";
	}
}

</SCRIPT>

<body>
<table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01">
  <tr>
    <TD>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="207" height="55" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav01.gif">
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="25%" rowspan="2"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico02.gif" width="35" height="35" /></td>
					<td width="75%" height="22" class="left-font01">您好，<span class="left-font02"><?php $cookie=Yii::$app->request->cookies['user'];  
					echo $cookie->value;  ?></span></td>
				  </tr>
				  <tr>
					<td height="22" class="left-font01">
						[&nbsp;<a href="index.php?r=admin/login" target="_top" class="left-font01">退出</a>&nbsp;]</td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table>
		


		<!--  任务系统开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img8" id="img8" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="index.php?r=shop/lists" target="mainFrame" class="left-font03" onClick="list('8');" >门店管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<!--  任务系统结束    -->

		

		<!--  消息系统开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img7" id="img7" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('7');" >菜品管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree7" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="index.php?r=menu/type" target="mainFrame" class="left-font03" onClick="tupian('17');">菜品分类</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu18" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
					<a href="index.php?r=menu/list" target="mainFrame" class="left-font03" onClick="tupian('18');">菜品列表</a></td>
				</tr>
				
      </table>
		<!--  消息系统结束    -->

<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img1" id="img1" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('1');" >营销管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree1" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="index.php?r=marketing/red" target="mainFrame" class="left-font03" onClick="tupian('17');">红包管理</a>
						
					</td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="index.php?r=marketing/discount" target="mainFrame" class="left-font03" onClick="tupian('17');">折扣管理</a>		
					</td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="index.php?r=marketing/less" target="mainFrame" class="left-font03" onClick="tupian('17');">满减管理</a>
						
				</td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="index.php?r=marketing/more" target="mainFrame" class="left-font03" onClick="tupian('17');">满赠管理</a>
						
					</td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="index.php?r=marketing/coupon" target="mainFrame" class="left-font03" onClick="tupian('17');">优惠券管理</a>
						
					</td>
				</tr>
				
			
      </table>

		<!--  项目系统结束    -->

	  <!--  会员管理开始    -->
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="8%" height="12"><img name="img2" id="img2" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
                  <td width="92%"><a href="javascript:" target="mainFrame" class="left-font03" onClick="list('2');" >会员信息</a></td>
                </tr>
            </table></td>
          </tr>
      </table>
	  
	  <table id="subtree2" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
        
		<tr>
          <td width="9%" height="20" ><img id="xiaotu7" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="index.php?r=member/membertable" target="mainFrame" class="left-font03" onClick="tupian('7');">会员信息</a></td>
        </tr>
		<tr>
          <td width="9%" height="20" ><img id="xiaotu7" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="index.php?r=member/memberlevel" target="mainFrame" class="left-font03" onClick="tupian('7');">会员等级管理</a></td>
        </tr>
		<tr>
          <td width="9%" height="20" ><img id="xiaotu7" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="index.php?r=member/partner" target="mainFrame" class="left-font03" onClick="tupian('7');">合作伙伴管理</a></td>
        </tr>

      </table>

	  <!--  会员管理结束    -->

	  <!--  人员系统开始    -->
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="8%" height="12"><img name="img3" id="img3" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
                  <td width="92%"><a href="javascript:" target="mainFrame" class="left-font03" onClick="list('3');" >统计管理</a></td>
                </tr>
            </table></td>
          </tr>
      </table>
	  
	  <table id="subtree3" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
        <tr>
          <td width="9%" height="20" ><img id="xiaotu8" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="index.php?r=count/listyuangong" target="mainFrame" class="left-font03" onClick="tupian('8');">财务统计</a></td>
        </tr>
		<tr>
          <td width="9%" height="20" ><img id="xiaotu9" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="index.php?r=count/listzhiwu" target="mainFrame" class="left-font03" onClick="tupian('9');">销量统计</a></td>
        </tr>
		
      </table>
	
	  <!--  人员系统结束    -->

	   <!--  考勤系统开始    -->
	   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="8%" height="12"><img name="img4" id="img4" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
                  <td width="92%"><a href="javascript:" target="mainFrame" class="left-font03" onClick="list('4');" >订单管理</a></td>
                </tr>
            </table></td>
          </tr>
      </table>
	  
	  <table id="subtree4" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
		<tr>
          <td width="9%" height="20" ><img id="xiaotu11" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="index.php?r=order/type" target="mainFrame" class="left-font03" onClick="tupian('11');">订单详情</a></td>
        </tr>
      </table>

      <!--  考勤系统结束    -->

	 <!--个人信息管理开始-->

		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img9" id="img9" src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="index.php?r=banner/lists" target="mainFrame" class="left-font03" onClick="list('9');" >轮播图管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<!--  个人信息结束    -->

	  </TD>
  </tr>
  
</table>
</body>
</html>
