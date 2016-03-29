<?php 
  use yii\widgets\LinkPager;
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
   use yii\helpers\ArrayHelper;
   use yii\helpers\HtmlPurifier;
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Le styles -->

    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/css/stylesheet.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/icon/font-awesome.css" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/img/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/img/apple-touch-icon-114-precomposed.html">
     <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/img/apple-touch-icon-72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/img/apple-touch-icon-57-precomposed.html">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/Public/commen.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl ?>/assets/Public/cxcalendar.css">
    <style type="text/css">
    .input{ width:40px;
	text-align:center;}
	.daohanglink{
		height:40px; line-height:40px; vertical-align:middle; width:100%;
		background-color:rgb(248,248,248);
		margin-bottom:15px;
		}
	.daohanglink span{
		margin-left:5px;}
	.daohang{
	float: left;
	height: 15px;
	width: 5px;
	border-left-width: 5px;
	border-left-style: solid;
	border-left-color: #036;
	margin-top:12px;
	margin-left:15px;
		}
    </style>
  </head>
  <body>
    <div id="content"> <!-- Content start -->
      <div class="inner_content">
          <div class="widgets_area">
                <div class="row-fluid">
                    <div class="span12" style="display:block" id="body">
                        <div class="well brown">
                            <div class="well-content" style="border:0px;">

                            查看内容：按创建时间：<input type="text" class="input_cxcalendar" style="width:80px;height:20px;border:1px #ccc solid;background:white;" id='starttime' size="12"/>
                              <span class="newfont06">至</span>
                                <input type="text" size="12" class="input_cxcalendar" style="width:80px;height:20px;border:1px #ccc solid;background:white;" id="endtime"/>
                            <input name="Submit4" type="button" class="right-button02 select" value="查 询" />
                            <input type="button" class="right-button08" id='del' value="删除门店信息" />
                            <input type="button" class="right-button08 add" value="添加门店信息"></td>
                            <div id='list'>
                                <table class="table table-striped table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <td height="30">全选/反选<input type="checkbox" id='selectall'/></td>
                                            <td>门店名称</td>
                                            <td >门店电话号码</td>
                                            <td >门店地址</td>
                                            <td>门店状态</td>
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
                                    </thead>
                                    <tbody>
                                    <?php foreach($re as $k=>$val):?>
                                          <tr>
                                           <td  width="10%" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="delid" value="<?= HtmlPurifier::process($val['shop_id']) ?>"/>
                                           </td>
                                            <td  bgcolor="#EEEEEE"><a href="listmokuaimingxi.htm" onclick=""></a><?= HtmlPurifier::process($val['shop_name']) ?>
                                            </td>
                                            <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_phone']) ?>
                                            </td>
                                            <td  bgcolor="#EEEEEE"><?= HtmlPurifier::process($val['shop_address'])?>
                                            </td>
                                            <td  bgcolor="#EEEEEE"><?php
                                                  if($val['shop_status']==1){
                                                        echo "开店";
                                                  }else{
                                                        echo "关店";
                                                  }
                                              ?>
                                              </td>
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
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
 <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/jquery-1.10.2.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/jquery-ui-1.10.3.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/bootstrap.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/library/jquery.collapsible.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/library/jquery.mCustomScrollbar.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/library/jquery.sparkline.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/library/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/flatpoint_core.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/ueditor/js/datatables.js"></script>
	 <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/Public/calendar.js"></script>
<script>
/**
*隐藏列表显示添加
*/
$(document).on('click','.add',function(){
   location.href='index.php?r=shop/add';
})
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
