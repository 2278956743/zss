<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>宅食送后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl ?>/assets/Styles/base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl ?>/assets/Styles/admin-all.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl ?>/assets/Styles/bootstrap.min.css" />

    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/assets/Scripts/jquery-1.7.2.js"></script>

    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/assets/Scripts/jquery.spritely-0.6.js"></script>

    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/assets/Scripts/chur.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl ?>/assets/Styles/login.css" />
    <script type="text/javascript">
        $(function () {
            $('#clouds').pan({ fps: 20, speed: 0.7, dir: 'right', depth: 10 });
            $('.login').click(function () {
                if ($('#uid').val() == "" || $('#pwd').val() == "" || $('#code').val() == "") { $('.tip').html('用户名或密码不可为空！') }
                else {
					user=$("#uid").val();
					pwd=$("#pwd").val();
					$.get("index.php?r=admin/yan",{user:user,pwd:pwd},function(data){
						if(data==1){
							alert("登录成功");location.href="index.php?r=admin/index";
						}else{
							alert("用户名或密码错误,登录失败")
						}
					
					});

                }
            })
        })
    </script>
</head>
<body>
    <div id="clouds" class="stage"></div>
    <div class="loginmain">
    </div>

    <div class="row-fluid">
        <h1>宅食送后台管理系统</h1>
        <p>
            <label>帐&nbsp;&nbsp;&nbsp;号：<input type="text" id="uid" /></label>
        </p>
        <p>
            <label>密&nbsp;&nbsp;&nbsp;码：<input type="password" id="pwd" /></label>
        </p>
        <p class="tip">&nbsp;</p>
        <hr />
        <input type="button" value=" 登 录 " class="btn btn-primary btn-large login" />
        &nbsp;&nbsp;&nbsp;<input type="button" value=" 取 消 " class="btn btn-large" />
    </div>
</body>
</html>
