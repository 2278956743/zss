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
    <style>
        .gallery > div {
          position: relative;
          padding: 5px;
        }
        .gallery > div > img {
          width: 66px;
          transition: .1s transform;
          transform: translateZ(0);
          /* hack */
        }

        .gallery > div:hover {
            z-index: 1;
        }

        .gallery > div:hover > img {
            transform: scale(2, 2);
            transition: .3s transform;
        }
        table td{
            border:1px solid #b9f4ed;
        }
        table th{
            border:1px solid #b9f4ed;
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
                            <a href="index.php?r=menu/add" style="text-decoration:none"><input type="button" value ="添加菜品"></a><input type="button" id="alldel" value="批量删除">
                                <table class="table table-striped table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%"><center>
                                              <input id="all" type="checkbox"/>
                                              <span id="allspan">全选</span>
                                              <center></th>
                                            <th width="10%"><center>菜品名称<center></th>
                                            <th width="10%"><center>图片<center></th>
                                            <th width="10%"><center>所属名厨<center></th>
                                            <th width="10%"><center>所属门店<center></th>
                                            <th width="10%"><center>价格<center></th>
                                            <th width="10%"><center>状态<center></th>
                                            <th width="10%"><center>创建时间<center></th>
                                            <th width="10%"><center>修改时间<center></th>
                                            <th width="10%"><center>操作<center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($menulist as $k=>$v) : ?>
                                      <tr> 
                                        <td value="<?php echo $v['menu_id']?>" bgcolor="#FFFFFF"><center>
                                          <input class="abc" type="checkbox" value="<?php echo $v['menu_id']?>"/>
                                        </center></td>
                                        <td bgcolor="#FFFFFF" value="<?php echo $v['menu_id']?>"><center><span class="gai"><?php echo $v['menu_name']?></span></center></td>
                                         <td><div class="gallery cf"><div><img src="<?php echo \Yii::$app->request->baseUrl;?>/<?php echo $v['menu_img']?>"  height="66px" width="66px"></div></div></td>
                                        <td bgcolor="#FFFFFF"><center><?php echo $v['zssseries']['series_name']?></center></td>
                                        <td bgcolor="#FFFFFF"><center><?php echo $v['zssshop']['shop_name']?></center></td>
                                        <td bgcolor="#FFFFFF"><center><?php echo $v['menu_price']?></center></td>
                                       <td bgcolor="#FFFFFF"><center>
                                          <?php if($v['menu_status']==1){
                                            echo "上架";
                                          }else{
                                            echo "暂不上架";
                                          }?>
                                        </center></td>
                                       <td bgcolor="#FFFFFF"><center>
                                          <?php echo date("Y-m-d H:i:s",$v['addtime'])?>
                                        </center></td>
                                        <td bgcolor="#FFFFFF"><center>
                                          <?php echo date("Y-m-d H:i:s",$v['updtime'])?>
                                        </center></td>
                                        <td bgcolor="#FFFFFF"><center>
                                            <a href="javascript:void(0)" value="<?php echo $v['menu_id']?>" class="del">删除</a>|
                                            <a href="index.php?r=menu/menuupd&menu_id=<?php echo $v['menu_id']?>">修改</a>
                                        </center></td>
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
  <script type="text/javascript">
  //菜品删除
  var $ = jQuery.noConflict();
  $(".del").click(function(){
    var menu_id=$(this).attr("value")
    $.get("index.php?r=menu/menudel",{menu_id:menu_id},function(data){
        //alert(data)
    })
    $(this).parent().parent().parent().remove();
  })

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

    //批量删除
    $(document).on("click", "#alldel", function () {
      var chk_value =[];    
        $('.abc:checked').each(function(){    
          chk_value.push($(this).val());   
          $(this).parent().parent().parent().remove();
        });
        if (chk_value.length==0){
          alert("你还没有选择任何内容")
        }else{
          $.get("index.php?r=menu/menudelall",
          {
            id:chk_value.join(",")
          },function(data){
            //alert(data)
          });
        }
    })
    //即点即改
    $(document).on("click", ".gai", function () {
        var con = $(this).html();
        //alert(con)
        $(this).parent().html("<input id='new_name' type='text' value='" + con + " '/>");
        $(".new_name").focus().val(con);
    });
    
    $(document).on("blur", "#new_name", function () {
        var new_name = $("#new_name").val();
        var upid = $(this).parent().parent().attr("value");
        //alert(upid);
        $(this).parent().html("<span class='gai'>" + new_name + "</span>");
        $.get("index.php?r=menu/menugai",
        {
          new_name:new_name,
          id:upid,
        },function(data){
          alert(data)
        });
    });
</script>
</html>
