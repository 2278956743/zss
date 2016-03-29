<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/stylesheet.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl ?>/assets/icon/font-awesome.css" rel="stylesheet">


    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::$app->request->baseUrl ?>/assets/img/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::$app->request->baseUrl ?>/assets/img/apple-touch-icon-114-precomposed.html">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::$app->request->baseUrl ?>/assets/img/apple-touch-icon-72-precomposed.html">
                    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::$app->request->baseUrl ?>/assets/img/apple-touch-icon-57-precomposed.html">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/html5shiv.js"></script>
    <![endif]-->
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
                    <div class="span12">
                        <div class="well brown">
                            <div class="well-content" style="border:0px;">
                                <table class="table table-striped table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%"><center>支付类型</center></th>
                                            <th width="10%"><center>充值金额</center></th>
                                            <th width="10%"><center>赠金</center></th>
                                            <th width="8%"><center>日期</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($vippay_user_log_type as $k=>$v):?>
                                          <tr>
                                            <td bgcolor="#FFFFFF"><center><?php echo $v['zsspaytype'][0]['pay_name']?></center></td>
                                            <td height="20" bgcolor="#FFFFFF"><center><?php echo $v['log_price']?></center></td>
                                            <td bgcolor="#FFFFFF"><center><?php echo $v['log_give_price']?></center></td>
                                            <td bgcolor="#FFFFFF"><center><?php echo date("Y-m-d h:i:s",$v['pay_created_at']) ?></center></td>
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
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-ui-1.10.3.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/library/jquery.collapsible.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/library/jquery.mCustomScrollbar.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/library/jquery.sparkline.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/library/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/flatpoint_core.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/datatables.js"></script>
  </body>
</html>
