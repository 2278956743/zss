<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>项目管理系统 by www.mycodes.net</title>
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
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="/assets/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
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
    document.getElementById("fom").action="vip_selmu.htm";
   document.getElementById("fom").submit();
}
</SCRIPT>

<body>
<form name="fom" id="fom" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="/assets/images/nav04.gif">
    		    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        		  <tr>
        			 <td width="679" align="left"></td>
        		  </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">    
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
					       <tr>
                    <td height="20" colspan="9" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					         会员详情 </td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">会员等级名称</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo $data[0]['vip_name'];?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">积分</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo $data[0]['vip_integral'];?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">折扣</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo $data[0]['vip_subtract']?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">满减</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php $brr=explode(",",$data[0]['vip_subtract']); echo "满".$brr[0]."元 减".$brr[1]."元"?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">满赠</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo "满".$data[0]['vip_price']."元 赠".$data[0]['zssgift'][0]['gift_name']?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">状态</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php if($data[0]['user_status']=="0"){echo "禁用";}else{echo "启用";}?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">合作公司</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo $data[0]['zsscompany'][0]['company_name'];?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">创建时间</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo date("Y-m-d h:i:s",$data[0]['created_at']);?></td>
                    </tr>
                    <tr>
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">修改时间</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><?php echo date("Y-m-d h:i:s",$data[0]['updated_at']);?></td>
                    </tr>
                    <tr>  
                      <td width="15%" height="20" align="right" bgcolor="#FFFFFF">操作</td>
                      <td width="85%" align="left" bgcolor="#FFFFFF"><a href="index.php?r=member/memberlevel"><input type="button" value="返回" /></a></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="/assets/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
