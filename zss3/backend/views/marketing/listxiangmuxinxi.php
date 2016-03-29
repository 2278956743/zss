<?php  
namespace backend\controllers;
use Yii;
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\helpers\HtmlPurifier;

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
               <input type="button" id="alldel" value="批量删除"> 
	            <input name="button" type="button" class="right-button08" value="添加项目" onclick="fun();"/></td>
         	 </tr>
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">

					                  <tr>
                    <td height="20" colspan="13" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 项目信息列表 &nbsp;</td>
                    </tr>
                  <tr>
				           
                                              
                                           

                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE"><input id="all" type="checkbox"/>
                                              <span id="allspan">全选</span></td>
                                              <td width="10%" align="center" bgcolor="#EEEEEE">ID</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">红包名称</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">是否限定金额</td>
                    <td width="5%" align="center" bgcolor="#EEEEEE">分享者得到</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">被分享者得到</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">创建时间</td>
                    <td width="6%" align="center" bgcolor="#EEEEEE">修改时间</td>
                    <td width="5%" align="center" bgcolor="#EEEEEE">状态</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>
                    <?php
               foreach ($models as $model){
                echo  '<tr><td width="5%" align="center" bgcolor="#EEEEEE"><input type="checkbox" value ="'.$model['wallet_id'].'" class="abc" /></td>';
                    echo '<td width="10%" height="20" align="center" bgcolor="#EEEEEE">'.$model['wallet_id'].'</td>';
                   echo  '<td width="10%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['wallet_name']).'</td>';
                    echo '<td width="10%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['wallet_is_price']).'</td>';
                    echo '<td width="5%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['wallet_share_price']).'</td>';
                    echo '<td width="10%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['wallet_shares_price']).'</td>';
                    echo '<td width="10%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['created_at']).'</td>';
                    echo '<td width="6%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['updated_at']).'</td>';
                    echo '<td width="5%" align="center" bgcolor="#EEEEEE">'.HtmlPurifier::process($model['wallet_show']).'</td>';
                   echo  '<td width="10%" align="center" bgcolor="#EEEEEE"><a href="#" class="del" value='.$model['wallet_id'].'>删除</a></td>';
            echo  '<td width="10%" align="center" bgcolor="#EEEEEE"><a href="index.php?r=marketing/upd&id='.$model['wallet_id'].'" class="upd" >编辑</a></td>';
  
                 echo '</tr>';
                        }  
                      ?>
                  </table></td> 
                      <script src=" <?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.11.1.min.js" ></script>
                  <script>
                  var aaa ='re'
      $(document).on('click','.del',function(){
          
              var wallet_id=$(this).attr("value");
               
               $.get("index.php?r=marketing/del",{wallet_id:wallet_id},function(data){ 
                 
                 if(data == 'ok'){
              
                    return aaa ='ok';
                 }else{
                 alert('删除失败')
                 }
               }); 
              
                 if(aaa=='ok'){
               $(this).parent().parent().remove();
               }    
      })
      </script>
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
               <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>           </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<div align="center">
        <div  style="width:700px; height:500px;border:1px solid #000;display:none;" id="add" > 
           <?php  $form = ActiveForm::begin([
              'id' => 'login-form',
              'options' => ['class' => 'form-horizontal'],
          ]) ?>
                     <table>
                          
                           <tr>
                             <td>是否限定金额：
                             <select  onchange="rechange()" id="change" name="wallet_is_price">
                               <option value='1'>是</option>
                               <option value='0'  selected="checked">否</option>
                             </select>
                             </td>
                           </tr>
                           <tr>
                             <td><input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>"></td>
                           </tr>
                           <tr>
                             <td style="display:none "  id="xianding">限定金额：<input type="text" value="20" name="xianding"  onblur="red_name()" /></td>
                           </tr>
                           <tr>
                             <td> <?= $form->field($re_models,'wallet_name') -> textInput() ?></span> </td>
                           </tr>
                           <tr>
                             <td><?= $form->field($re_models,'wallet_share_price')->textInput()?></td>
                           </tr>
                           <tr>
                             <td><?= $form->field($re_models,'wallet_shares_price')->textInput()?></td>
                           </tr>
                           <tr>
                            <td>红包模板：<div style="width:500px; height:300px;border:1px solid #000;"></div></td>
                           </tr>
                           <tr>
                             <td><input type='submit' value='添加'><input type='reset' value='取消'></td>
                           </tr>
                     </table>
        <?php  ActiveForm::end()?>
          </div>

</div>
<script>
//全选全不选
    $(document).on("click", "#all", function () {
      
      var obj = $(".abc");
      if($("#allspan").text()=="全选"){
        $("#allspan").text("全不选");
        for (var i = 0; i < obj.length; i++) {
          obj[i].checked = true
        }
      }else{
        $("#allspan").text("全选")       
        $("#all").checked = false;        
        for (var i = 0; i < obj.length; i++) {
          obj[i].checked = false
        }
      }     
    });
   $(document).on("click", "#alldel", function () {
      var chk_value =[];    
        $('.abc:checked').each(function(){    
          chk_value.push($(this).val());   
          $(this).parent().parent().remove();
        });

        if (chk_value.length==0){
          alert("你还没有选择任何内容")
        }else{
          $.get("index.php?r=marketing/red_del_all",
          {
            id:chk_value.join(",")

          },function(data){
            alert(data)
          
          });
        }
    })


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

function  red_name(abj){
  var  text = abj.value;
 var grep=/^([\u4E00-\uFA29a-z\d\w]){1,10}$/;
  if(grep.test(text)){
        document.getElementById('yan_name').innerHTML='√'
         document.getElementById('yan_name').style.color='blue'
          return true
 }else{
  alert('buhefa')
  return false
 }   
}
</script>
</body>
</html>
