<?php
use yii\helpers\Html;

use yii\widgets\LinkPager;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="list1">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<title>项目管理系统</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tabfont01 {
	font-family: "宋体";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "宋体";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "宋体";
	font-size: 14px;
	height: 37px;
}
html { overflow-x: auto; overflow-y: auto; }
-->
</style>

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
    document.getElementById("fom").action="yuangong.htm";
   document.getElementById("fom").submit();
}

</SCRIPT>

<body>
<form method="post">
<table width="100%" cellspacing="0" cellpadding="0" id="list">

  <tr>
    <td height="30">      <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">

		   <table width="98%"  align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <td width="24"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico07.gif" width="20" height="18" /></td>
			  <td width="519">
			   <input name="textfield" type="date" size="12" id="start"/><span class="newfont06">至</span>
			   <input name="textfield" type="date" size="12" id="end"/>
			   <input name="Submit" type="button" id="cha" class="right-button02" value="查 询" /></td>
			   <td width="679" align="left"><a href="#" onclick="sousuo()">

			   </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		    </tr>
          </table></td>
        </tr>
		 <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jq.js"></script>

	 <script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click",'#cha',function(){
				var start=$("#start").val();
				var end=$("#end").val();
				var date = new Date(+new Date()+8*3600*1000).toISOString().replace(/T/g,' ').replace(/\.[\d]{3}Z/,'')
				if (start=="" || end==""){
					alert("搜索日期不能为空")				
				}else{
					if(date<end || date<start){
						alert("输入时间有误")
					}else{
						$.get("index.php?r=count/time1",{start:start,end:end},function(data){
					 		$("#list1").html(data);
						});
					}
				}
			});
		})
	 </script>
    </table></td></tr>

  <tr>
       <td>
	   <table id="subtree1" style="DISPLAY: " width="100%" align="center">
          <tr>
          <td><table width="100%"  align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="40" class="font42"><table width="100%" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03" align="center">
					        <tr>
                    <td height="20" colspan="15" align="center" bgcolor="#EEEEEE"class="tablestyle_title"><center> 财销量统计列表</center></td>
                  </tr>
                  <tr>
				    				<td width="6%" align="center" bgcolor="#EEEEEE">选择</td>
                    <td width="9%" align="center" bgcolor="#EEEEEE">菜品名称</td>
										<td width="9%" align="center" bgcolor="#EEEEEE">份数(份)</td>
										<td width="9%" align="center" bgcolor="#EEEEEE">金额(￥)</td>
                    <td width="5%" align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>
				  			<?php foreach($arr as $k=>$v){?>
                  <tr>
				    				<td bgcolor="#FFFFFF"><input type="checkbox" name="delid"/></td>
                    <td bgcolor="#FFFFFF" align="center"><?php echo $v['menu_name']?></td>
					 					<td bgcolor="#FFFFFF" align="center"><?php echo $v['SUM(menu_num)']?></td>
					 					<td bgcolor="#FFFFFF" align="center"><?php echo $v['SUM(price_amount)']?></td>
                    <td bgcolor="#FFFFFF" align="center"><a href="index.php?r=count/show1&&menu_name=<?php echo $v['menu_name']?>&&menu_num=<?php echo $v['SUM(menu_num)']?>">详情</a></td>
                  </tr>
				  			<?php }?>
                </table>
							</td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="95%" align="center" cellpadding="0" cellspacing="0">

        <tr>
          <td height="6"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="60%"  align="center" cellpadding="0" cellspacing="0" class="right-font08">
              <tr>

                    </tr>

                </table></td>
              </tr>

          </table></td>
        </tr>
		<td align="center" height="50px">

		<input type="button" name="back" id="back" onclick="window.history.go(-1);" value="返回"/>
	</td>
      </table></td>
  </tr>
</table>
</form>

</body>
</html>
