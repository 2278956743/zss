


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

ul li{

list-style: none;

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
.pagination{height:30px; line-height: 30px; float:right;}
.pagination li {  float:left; border: 1px solid #dfdfdf;padding:0 8px; margin: 0 5px;}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/xiangmu.js"></script>
</head>

<?php 
  use yii\widgets\LinkPager;
?>  
<body onload="on_load()">
<form name="fom" id="fom" method="post" action="">
<table id="mainpage" width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="62" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">
          
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="21"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico07.gif" width="20" height="18" /></td>
			<td width="550">查看内容：按时间：
              <input name="textfield" type="text" size="12" readonly="readonly"/><span class="newfont06">至</span>
			 <input name="textfield" type="text" size="12" readonly="readonly"/>	
			 <input name="Submit" type="button" class="right-button02" value="查 询" /></td>
			 <td width="132" align="left"><a href="#" onclick="sousuo()">
			   <input name="Submit" type="button" class="right-button07" value="高级搜索" /></a></td>	
		  </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

          	 <tr>
               <td height="20"><span class="newfont07">选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a></span>
	              <input name="Submit" type="button" class="right-button08" value="删除所选项目信息" />
	              <input name="button" type="button" class="right-button08" value="添加项目" onclick="fun();"/></td>
          	 </tr>
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">

					                  <tr>
                    <td height="20" colspan="13" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 项目信息列表 &nbsp;</td>
                    </tr>
                  <tr>
				 
                    
              
              </tr>
            </table></td>
        </tr>
      </table>
     
           
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<div align="center">
        <div  style="width:700px; height:500px;border:1px solid #000;" id="add" > 
             <form action='index.php?r=marketing/re_discount_upd' method='post'> 
                   <table>
                          <h2 >修改营销折扣活动</h2>
                           <tr><td>请选择折扣：<input type="text" name="discount_num"  value="<?php echo $re[0]['discount_num']?>" />%</td></tr>
                           <tr>
                            <tr>  <td><input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                            <input name="discount_id" type="hidden" value="<?php echo $re[0]['discount_id']; ?>"></td></tr>
                           <tr>
                            <tr><td></td></tr>
                              <tr>
                             <td><input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>"></td>
                           </tr>
                           <tr>
                            <tr><td></td></tr>
                           <tr>
                             <td><input type='submit' value='修改'><input type='reset' value='取消'></td>
                           </tr>
                     </table>
              </form>
          </div>

</div>
<script>
    function fun(){
     document.getElementById('add').style.display='block';
    }
    function rechange(){
          var change = document.getElementById('change').value;
            if(change=='1'){
        document.getElementById('xianding').style.display='block';  
      }else{
      document.getElementById('xianding').style.display='none';  
      }
    }


</script>
</body>
</html>
000000000000000000000000000000000000