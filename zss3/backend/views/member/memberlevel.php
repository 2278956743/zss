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
                                            <th width="10%"><center>会员等级</center></th>
                                            <th width="10%"><center>积分</center></th>
                                            <th width="10%"><center>折扣</center></th>
                                            <th width="10%"><center>状态</center></th>
                                            <th width="10%"><center>操作</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($memberlevel as $k=>$v):?>
                                          <tr>
                                            <td bgcolor="#FFFFFF" value="<?php echo $v['vip_id']?>">
                                                <center><span class="vip_name"><?php echo $v['vip_name']?></span></center>
                                            </td>
                                            <td height="20" bgcolor="#FFFFFF" value="<?php echo $v['vip_id']?>">
                                                <center><span class="vip_integral"><?php echo $v['vip_integral']?></span></center>
                                            </td>
                                            <td bgcolor="#FFFFFF" value="<?php echo $v['vip_id']?>">
                                                <center><span class="vip_discount"><?php echo $v['vip_discount']?></span>%</center>
                                            </td>
                                           <td bgcolor="#FFFFFF" value="<?php echo $v['vip_id']?>"><center>
                                           <span class="user_status"><?php if($v['user_status']=="0"){echo "禁用";}else{echo "启用";}?></span></center>
                                            </td>
                                            <td bgcolor="#FFFFFF"><center><a href="index.php?r=member/vip_update&vip_id=<?php echo $v['vip_id']?>">修改</a>||<a href="index.php?r=member/vip_sel&vip_id=<?php echo $v['vip_id']?>">详情</a></center></td>
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
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script>
    //vip名称修改
    $(document).on("click", ".vip_name", function () {
        var con = $(this).html();
        //alert(con)
        $(this).parent().html("<input id='vip_name' type='text' value='" + con + " '/>");
        $("#vip_name").focus().val(con);
    });
    
    $(document).on("blur", "#vip_name", function () {
        var vip_name = $("#vip_name").val();
        var vip_id = $(this).parent().parent().attr("value");
        $(this).parent().html("<span class='vip_name'>" + vip_name + "</span>");
        $.get("index.php?r=member/vip_name_up",{vip_name:vip_name,vip_id:vip_id,},function(data){
            $("#updated_at").html("<?php echo date('Y-m-d h:i:s',time())?>");
        });
    });
    //vip积分修改
    $(document).on("click", ".vip_integral", function () {
        var con = $(this).html();
        //alert(con)
        $(this).parent().html("<input id='vip_integral' type='text' value='" + con + " '/>");
        $("#vip_integral").focus().val(con);
    });
    
    $(document).on("blur", "#vip_integral", function () {
        var vip_integral = $("#vip_integral").val();

        var vip_id = $(this).parent().parent().attr("value");

        $(this).parent().html("<span class='vip_integral'>" + vip_integral + "</span>");
        
        $.get("index.php?r=member/vip_integral_up",{vip_integral:vip_integral,vip_id:vip_id,},function(data){
            $("#updated_at").html("<?php echo date('Y-m-d h:i:s',time())?>");
        });
    });   
    //vip折扣修改
    $(document).on("click", ".vip_discount", function () {
        var con = $(this).html();
        //alert(con)
        $(this).parent().html("<input id='vip_discount' type='text' value='" + con + " '/>");
        $("#vip_discount").focus().val(con);
    });
    
    $(document).on("blur", "#vip_discount", function () {
        var vip_discount = $("#vip_discount").val();

        var vip_id = $(this).parent().parent().attr("value");

        $(this).parent().html("<span class='vip_discount'>" + vip_discount + "</span>%");
        
        $.get("index.php?r=member/vip_discount_up",{vip_discount:vip_discount,vip_id:vip_id},function(data){
            $("#updated_at").html("<?php echo date('Y-m-d h:i:s',time())?>");
        });
    });
    //vip状态修改
    $(document).on("click", ".user_status", function () {
        var con = $(this).html();
        var vip_id = $(this).parent().parent().attr("value");
        if(con == "启用"){
            $(this).html("禁用");
            var user_status = '0';
        }else if(con == "禁用"){
            $(this).html("启用");
            var user_status = '1';
        };
        $.get("index.php?r=member/user_status_up", {user_status:user_status,vip_id:vip_id}, function(data){
            $("#updated_at").html("<?php echo date('Y-m-d h:i:s',time())?>");
        });
    });  
</script>