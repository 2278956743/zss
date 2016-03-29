<?php
/* @var $this yii\web\View */
?>
<html>
<body>
    <form action='index.php?r=banner/upt_pro' method='post'enctype='multipart/form-data'>
      <input type='hidden' name='carousel_id' value="<?php echo $row[0]['carousel_id']?>">
       <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <table>
            <tr style='height:20px;'>

              <td width="13%">图片标题:</td><td><input name="carousel_title" type="text" value="<?php echo $row[0]['carousel_title']?>"/></td>
             </tr>
            <tr>
              <td width="13%">修改图片:</td><td><input name="carousel_img" type="file"/><img src="<?php echo yii::$app->request->baseUrl; echo $row[0]['carousel_img']?>" width="60px" height="60px"></td>
             </tr>
            <tr>
              <td>图片描述:</td><td><textarea name="carousel_desc" rows="5" cols="20"><?php echo $row[0]['carousel_desc']?></textarea></td>
            </tr>
            <tr>
          <td><input type="submit" value="修改"/></td>　
          <td><input type="reset" value="返回" class='upt'/></td>
        </tr>
        </table>
      </form>
</body>
</html>
<script src="<?php echo yii::$app->request->baseUrl;?>/assets/js/jquery-1.9.1.min.js"></script>
<script>
  $(document).on('click','.upt',function(){
      location.href='index.php?r=banner/lists';
  })
</script>