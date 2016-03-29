<?php
/* @var $this yii\web\View */
?>
<html>
<body>

<div style="width:500px;height:300px;border:solid 1px #99cccc;padding-left:180px;"> 
 <center>
    <form action='index.php?r=banner/add_pro' method='post'enctype='multipart/form-data'>
       <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <table>
            <tr style='height:20px;'>

              <td width="13%">图片标题:</td><td><input name="carousel_title" type="text"/></td>
             </tr>
            <tr>
              <td width="13%">上传:</td><td><input name="carousel_img" type="file"/></td>
             </tr>
            <tr>
              <td>图片描述:</td><td><textarea name="carousel_desc" rows="" cols=""></textarea></td>
            </tr>
            <tr>
          <td><input type="submit" value="保存"/></td>　
          <td><input type="reset" value="返回"/></td>
        </tr>
        </table>
      </form>
 </center>
</div>
</body>
</html>
