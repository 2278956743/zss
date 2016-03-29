<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

	<?= Html::cssFile('./assets/css.css')?>
	<?= Html::cssFile('./assets/commen.css')?>
	<?= Html::cssFile('./assets/css/cxcalendar.css')?>
	<?= Html::cssFile('./assets/css/style.css')?>
	<?= Html::cssFile('./assets/css/page.css')?>
	    <!-- Le styles -->
	<?= Html::cssFile('./assets/css/bootstrap.css')?>
	<?= Html::cssFile('./assets/css/bootstrap-responsive.css')?>
	<?= Html::cssFile('./assets/css/stylesheet.css')?>
	<?= Html::cssFile('./assets/css/icon/font-awesome.css')?>

	<style type="text/css">
	    .input{ width:40px;
			text-align:center;}
		.daohanglink{
			height:40px; line-height:40px; vertical-align:middle; width:100%;
			background-color:rgb(248,248,248);
			margin-bottom:15px;
		}
		.daohanglink span{
			margin-left:5px;
		}
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
          	<!--时间查询开始-->	
					<tr>			
						<input type="text" class="input_cxcalendar" style="width:150px;height:30px;border:1px #ccc solid;background:white;margin-bottom:10px;" id="starttime"/>
						<span class="newfont06">至</span>
						<input type="text" class="input_cxcalendar" style="width:150px;height:30px;border:1px #ccc solid;background:white;margin-bottom:10px;" id="endtime"/>	
					 <input type="button" class="right-button02" value="查 询" id="button"/></td>			
					</tr>
					<!--时间查询结束-->
					<tr>
						&nbsp;&nbsp;&nbsp;&nbsp;支付方式:
						<select id="pay_type" class="change" style="width:150px;margin-bottom:10px;">
							<option>--请选择--</option>
						<?php foreach($pay as $k=>$v):?>
							<option value="<?php echo $v['pay_id']?>"><?php echo $v['pay_name']?></option>
					<?php endforeach;?>
						</select>
					</tr>
					  <tr>
						&nbsp;&nbsp;&nbsp;&nbsp;订单状态:<select id="order_status" class="change" style="width:150px;margin-bottom:10px;">
							<option>--请选择--</option>
							<?php foreach($status as $kk=>$vv):?>
								<option value="<?php echo $vv['status_id']?>"><?php echo $vv['status_name']?></option>
							<?php endforeach;?>
						</select>
					  </tr>
					  <tr>
						&nbsp;&nbsp;&nbsp;&nbsp;派送类型:<select id="delivery" class="change" style="width:150px;margin-bottom:10px;">
							<option>--请选择--</option>
							<?php foreach($delivery as $kkk=>$vvv):?>
								<option value="<?php echo $vvv['delivery_id']?>"><?php echo $vvv['delivery_name']?></option>
							
							<?php endforeach?>
						</select>
					  </tr>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="well brown">
                            <div class="well-content" style="border:0px;">
                            <div class="tables">
                                <table class="table table-striped table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%"><center>订单ID<center></th>
                                            <th width="10%"><center>订单号<center></th>
                                            <th width="10%"><center>菜品名称<center></th>
                                            <th width="10%"><center>菜品个数<center></th>
                                            <th width="8%"><center>菜品单价<center></th>
                                            <th width="10%"><center>派送类型<center></th>
                                            <th width="10%"><center>支付方式<center></th>
                                            <th width="10%"><center>支付状态<center></th>
                                            <th width="10%"><center>添加时间<center></th>
                                            <th width="10%"><center>操作<center></th>
                                        </tr>
                                    </thead>
                                    <tbody id = "list">
                                     <?php foreach($arr as $value){ ?>
                                          <tr>
                                            <td bgcolor="#FFFFFF"><center><?php echo $value['order_id']?></center></td>
                                            <td height="20" bgcolor="#FFFFFF"><center><?php echo $value['order_sn']?></center></td>
                                            <td bgcolor="#FFFFFF"><center><?php echo $value['zssmenu']['menu_name']?></center></td>
                                            <td bgcolor="#FFFFFF"><center><?php echo $value['zssorderinfo']['menu_num']?></center></td>
											<td bgcolor="#FFFFFF"><center><?php echo $value['zssmenu']['menu_price']?></center></td>
												<?php if(($value['delivery_type'])==1): ?>
															<td><center>外卖</center></td>
														<?php elseif(($value['delivery_type'])==2):?>
															<td><center>自取</center></td>
														<?php elseif(($value['delivery_type'])==3):?>
															<td><center>堂食</center></td>
														<?php endif?>

														<?php if(($value['pay_type'])==1): ?>
															<td><center>微信</center></td>
														<?php elseif(($value['pay_type'])==2):?>
															<td><center>支付宝</center></td>
														<?php elseif(($value['pay_type'])==3):?>
															<td><center>银联</center></td>
														<?php endif?> 
														
														<?php if(($value['order_status'])==1): ?>
															<td><center>未支付</center></td>
														<?php elseif(($value['order_status'])==2):?>
															<td><center>已付款<center></td>
														<?php elseif(($value['order_status'])==3):?>
															<td><center>订单关闭</center></td>
														<?php elseif(($value['order_status'])==4):?>
															<td><center>成功</center></td>
														<?php elseif(($value['order_status'])==5):?>
															<td><center>失败</center></td>
														<?php endif?> 
																		
												<td bgcolor="#FFFFFF"><center><?php echo $value['created_time']?></center></td>
												<td bgcolor="#FFFFFF"><center>
													<a href="index.php?r=order/list&&order_id=<?php echo $value['order_id']?>">详情</a></center>
												</td>
                                          </tr>
                                        <?php } ?>
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
  
	<?= Html::jsFile('./assets/js/jquery-1.10.2.js')?>
	<?= Html::jsFile('./assets/js/jquery-ui-1.10.3.js')?>
	<?= Html::jsFile('./assets/js/bootstrap.js')?>
	<?= Html::jsFile('./assets/js/library/jquery.collapsible.min.js')?>
	<?= Html::jsFile('./assets/js/library/jquery.mCustomScrollbar.min.js')?>
	<?= Html::jsFile('./assets/js/library/jquery.sparkline.min.js')?>
	<?= Html::jsFile('./assets/js/library/jquery.dataTables.js')?>
	<?= Html::jsFile('./assets/js/flatpoint_core.js')?>
	<?= Html::jsFile('./assets/js/datatables.js')?>

	<?= Html::jsFile('./assets/js/jquery-1.11.1.min.js')?>
	<?= Html::jsFile('./assets/js/calendar.js')?>
</body> 
<script>
$(document).ready(function(){

	//时间插件
	$('.input_cxcalendar').each(function(){
        var a = new Calendar({
            targetCls: $(this),
            type: 'yyyy-mm-dd HH:MM:SS',
            wday:2
        },function(val){
            console.log(val);
        });
    });

	$(document).on("click","#button",function(){
		var starttime=$("#starttime").val();		
		var endtime=$("#endtime").val();		
		$.post("index.php?r=order/timesel",{"starttime":starttime,"endtime":endtime},function(data){
			$("#list").html(data);
		});
		
	});

	//多条件搜索
	$(".change").change(function(){
		status_id=$('#order_status').val();
		pay_id=$("#pay_type").val();	// delivery_id=$('#delivery').children('option:selected').val();
		 delivery_id=$('#delivery').val();
		$.get("index.php?r=order/paytype",{pay_id:pay_id,status_id:status_id,delivery_id:delivery_id},function(data){
			$("#list").html(data);
		})
	})
});
</script>
</html>
