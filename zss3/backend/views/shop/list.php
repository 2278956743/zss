<?php 
  use yii\widgets\LinkPager;
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
   use yii\helpers\ArrayHelper;
   use yii\helpers\HtmlPurifier;
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	line-height: 10px;
}
.font201 {font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "宋体";
	font-size: 12px;
	height: 20px;
}
ul li{
  list-style:none;
}
.pagination{height:30px; line-height: 30px; float:right;}
.pagination li {  float:left; border: 1px solid #dfdfdf;padding:0 8px; margin: 0 5px;}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
</script>
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/Public/commen.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl ?>/assets/Public/cxcalendar.css">
<script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl ?>/assets/Public/calendar.js"></script>
<form name="fom" id="fom" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="40" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <!-- 查询时间开始 -->
        <tr>
			  <td width="21"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico07.gif" width="20" height="18" /></td>
			  <td width="400">查看内容：按创建时间：
        <input type="text" class="input_cxcalendar" style="width:80px;height:20px;border:1px #ccc solid;background:white;" id='starttime' size="12"/>
  <span class="newfont06">至</span>
    <input type="text" size="12" class="input_cxcalendar" style="width:80px;height:20px;border:1px #ccc solid;background:white;" id="endtime"/>
<input name="Submit4" type="button" class="right-button02 select" value="查 询" /></td>
			  
		    </tr>
        <!-- 查询时间结束 -->
          </table></td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 <tr>
               
	              <input type="button" class="right-button08" id='del' value="删除门店信息" />
	              <input type="button" class="right-button08 add" value="添加门店信息"onclick='add()'></td>
          	 </tr>
              <tr>
                <td height="40" class="font60">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				 <tr class="CTitle" >
           <td height="22" colspan="16" align="center">门店详情表</td>
              </tr>
              <tr bgcolor="#EEEEEE">
				    <td height="30">全选/反选<input type="checkbox" id='selectall'/></td>
              <td>门店名称</td>
					<td >门店电话号码</td>
               <td >门店地址</td>
          <td >门店状态</td>
              <td>门店支持类型</td>
					<td >外卖营业开放时间</td>
					<td >外卖营业结束时间</td>
          <td >堂食/自取营业开放时间</td>
          <td >堂食/自取营业结束时间</td>
          <td >经度</td>
          <td >纬度</td>
          <td >创建时间</td>
          <td >修改时间</td>
					<td >操作</td>
          </tr>
         <?php foreach($models as $val) {?>
            <tr bgcolor="#FFFFFF">
				    <td  width="10%" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="delid" value="<?= HtmlPurifier::process($val['shop_id']) ?>"/></td>
                    <td  bgcolor="#EEEEEE"><a href="listmokuaimingxi.htm" onclick=""></a><?= HtmlPurifier::process($val['shop_name']) ?></td>
					         <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_phone']) ?></td>
                    <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_address'])?></td>
                    <td  bgcolor="#EEEEEE"><?php
                          if($val['shop_status']==1){
                                echo "开店";
                          }else{
                                echo "关店";
                          }
                      ?></td>
                    <td bgcolor="#EEEEEE">
                      <?php echo $val['shop_type']?>
                    </td>
                    <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_open'])?></td>
                    <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_over'])?></td>
                    <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_opens'])?></td>
                    <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_overs'])?></td>
                    <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_longitude'])?></td>
                    <td bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_latitude'])?></td>


                    <td  bgcolor="#EEEEEE"><?php echo date('Y-m-d H:i:s',$val['created_at'])?></td>
                    <td  bgcolor="#EEEEEE"><?php echo date('Y-m-d H:i:s',$val['updated_at'])?></td>
                    <td   bgcolor="#EEEEEE"><a href='index.php?r=shop/upt&&shop_id=<?php echo $val['shop_id']?>'>编辑|</a><a href='#' class='del' value="<?php echo $val['shop_id']?>">删除</a></td>
					           
                  </tr>
           <?php } ?>
				  </tr>
            </table></td>
        </tr>
      </table>
      
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
       
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
              <tr>
                <?php echo LinkPager::widget([
                  'pagination' => $pages,
                ]);?> 
             </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<div id='list'></div>
</form>
<div align='center' id='hidden' style="display:none">
<div style="width:500px;height:500px;border:solid 1px grey;padding-left:150px;"> 
 <center>
   <form method="post">
      <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <table>
            <tr><td>门店名称：<input type="text" name="ZssshopForm[shop_name]">
            <?= Html::error($shopModel,"shop_name")?></td></tr> 
            <tr><td>门店联系电话：<input type="text" name="ZssshopForm[shop_phone]">
            <?= Html::error($shopModel,"shop_phone")?></td></tr> 
            <tr><td>门店地址：<input type="text" name="ZssshopForm[shop_address]">
            <?= Html::error($shopModel,"shop_address")?></td></tr> 
            <tr><td>门店支持类型：
            <input type="checkbox" name="ZssshopForm[shop_type][]" value="堂食">堂食
            <input type="checkbox" name="ZssshopForm[shop_type][]" value="外卖">外卖
            <input type="checkbox" name="ZssshopForm[shop_type][]" value="自取">自取
            <?= Html::error($shopModel,"shop_type")?></td></tr>
            <tr><td>门店状态：
            <input type="radio" name="ZssshopForm[shop_status]" value="1" select='cheacked'>开店
            <input type="radio" name="ZssshopForm[shop_status]" value="0">关店
            <?= Html::error($shopModel,"shop_status")?></td></tr>  
            <tr><td>外卖营业开放时间：<input type="text" name="ZssshopForm[shop_open]">
            <?= Html::error($shopModel,"shop_open")?></td></tr> 
            <tr><td width="13%">外卖营业结束时间：<input type="text" name="ZssshopForm[shop_over]">
              <?= Html::error($shopModel,"shop_over")?></td></tr> 
            <tr><td>堂食/外卖营业开放时间：<input type="text" name="ZssshopForm[shop_opens]">
            <?= Html::error($shopModel,"shop_open")?></td> </tr> 
            <tr><td width="13%">堂食/外卖结束时间：<input type="text" name="ZssshopForm[shop_overs]">
              <?= Html::error($shopModel,"shop_over")?> </td></tr>
            <tr><td>经度： <input type="text" name="ZssshopForm[shop_longitude]">
            <?= Html::error($shopModel,"shop_longitude")?></td></tr>
           
            <tr><td width="13%">纬度：<input type="text" name="ZssshopForm[shop_latitude]">
              <?= Html::error($shopModel,"shop_latitude")?> </td></tr>   
          <tr> <td >
          <?= Html::submitButton('添加', ['class' => 'submit']) ?>
          <?= Html::resetButton('重置', ['class' => 'reset']) ?>
          </td></tr>
        </table>
      </form>
 </center>
</div>
</div>
</body>
</html>
<script>
function add(){
     document.getElementById('hidden').style.display='block';
  }
  //节点删除
$(document).on('click','.del',function(){
          var shop_id=$(this).attr("value");
           $.get("index.php?r=shop/del",{shop_id:shop_id},function(data){
                //alert(data)
           })
         $(this).parent().parent().remove();
  })
//全选
$(document).on('click','#selectall',function(){
   var all=document.getElementsByName('delid');
          // alert(all);
           for(i=0;i<all.length;i++){
             if(selectall.checked==true){
                all[i].checked=true;
             }else{
                all[i].checked=false;
           }
       }
})
//批量删除
$(document).on('click','#del',function(){
    var all=document.getElementsByName('delid');
    //alert(all);
    str='';
    for(var i=0;i<all.length;i++){
        if(all[i].checked==true){
              str+=','+all[i].value; 
        }
        str=str.substr(1);
    }
    //alert(str);
     $.get('index.php?r=shop/delall',{shop_id:str},function(txt){
               //alert(txt);
                location.reload();
    })
})
// 查询时间
  $('.input_cxcalendar').each(function(){
        var a = new Calendar({
            targetCls: $(this),
            type: 'yyyy-mm-dd HH:MM',
            wday:2
        },function(val){
          //alert(val);
            console.log(val);
        });
    });
  $(document).on('click','.select',function(){ 
      var starttime=$('#starttime').val();
      var endtime=$('#endtime').val();
     $.get("index.php?r=shop/search",{starttime:starttime,endtime:endtime},function(data){
          //alert(data);
          $('#list').html(data);
      })
  })
</script>


