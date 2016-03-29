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
                                            <th width="10%"><center>会员名称<center></th>
                                            <th width="10%"><center>性别<center></th>
                                            <th width="10%"><center>手机号<center></th>
                                            <th width="8%"><center>余额<center></th>
                                            <th width="10%"><center>积分<center></th>
                                            <th width="10%"><center>公司<center></th>
                                            <th width="10%"><center>创建时间<center></th>
                                            <th width="10%"><center>修改时间<center></th>
                                            <th width="10%"><center>操作<center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($membertable as $k=>$v):?>
                                          <tr>
                                            <td bgcolor="#FFFFFF"><center><?php echo $v['user_name']?></center>
                                            </td>
                                            <td height="20" bgcolor="#FFFFFF">
                                                <center><?php echo $v['user_sex']?></center>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                                <center><?php echo $v['user_phone']?></center>
                                            </td>
                                            <td bgcolor="#FFFFFF" value="<?php echo $v['user_id']?>">
                                                <center><p class="user_price"><?php echo $v['user_price']?></p>
                                                 </center>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                                <center> <p class="user_integral"><?php echo $v['user_integral']?></p> </center>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                            <center>
                                                <?php echo $v['zsscompany'][0]['company_name']?></center>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                            <center>
                                                <?php echo date("Y-m-d h:i:s", $v['created_at'])?></center>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                            <center id="updated_at">
                                                <?php echo date("Y-m-d h:i:s", $v['updated_at'])?>
                                            </center>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                            <center>
                                            <a href="index.php?r=member/vip_add&user_id=<?php echo $v['user_id']?>">修改</a>
                                            <a href="index.php?r=member/vip_xinagqing&user_id=<?php echo $v['user_id']?>">详情</a>
                                             </center>
                                            </td>
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
    <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.9.1.js"></script>
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
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script>

//余额修改
 $(document).on("click", ".user_price", function () {
        var con = $(this).html();
        //alert(con)
        $(this).parent().html("<input id='new_price' type='text' value='" + con + " '/>");
        $("#new_price").focus().val(con);
    });
    
    $(document).on("blur", "#new_price", function () {
        var new_price = $("#new_price").val();
        var user_id = $(this).parent().parent().attr("value");
        $(this).parent().html("<p class='user_price'>" + new_price + "</p>");
        $.get("index.php?r=member/user_price",{new_price:new_price,user_id:user_id,},function(data){
            $("#updated_at").html("<?php echo date('Y-m-d h:i:s',time())?>");
        });
    });


    //积分修改
    $(document).on("click", ".user_integral", function () {
        var con = $(this).html();
        //alert(con)
        $(this).parent().html("<input id='new_integral' type='text' value='" + con + " '/>");
        $("#new_integral").focus().val(con);
    });
    
    $(document).on("blur", "#new_integral", function () {
        var new_integral = $("#new_integral").val();
        var user_id = $(this).parent().parent().attr("value");
        $(this).parent().html("<p class='user_price'>" + new_integral + "</p>");
        $.get("index.php?r=member/new_integral",{new_integral:new_integral,user_id:user_id,},function(data){
            $("#updated_at").html("<?php echo date('Y-m-d h:i:s',time())?>");
        });
    });
</script>