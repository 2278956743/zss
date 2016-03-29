<?php
/* @var $this yii\web\View */
?>
<html>
<body>

    <form action='index.php?r=banner/gupt_pro' method='post'enctype='multipart/form-data'>
       <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>"> 
        <input type='hidden' name='group_id' value="<?php echo $arr[0]['group_id']?>">
         <br></br></br><table>
            <tr>
              <td width="15%">修改轮播组描述：</td>
              <td><textarea name="group_desc" rows="5" cols="20"><?php echo $arr[0]['group_desc']?></textarea></td>
            </tr>
            <tr>
              <td>是否显示轮播组：</td>
              <td><select name="group_isshow">
                <option value="1" >是
                <option value="0" selected>否
              </select></td>
            </tr>
            <tr>
              <td><input type="submit" value="修改"></td>
              <td><input type="reset" value="返回" class='reset'></td>
              <td></td>
            </tr>
         </table>
   </form> 
</body>
</html>
<script src="<?php echo yii::$app->request->baseUrl;?>/assets/js/jquery-1.9.1.min.js"></script>
<script>
  $(document).on('click','.reset',function(){
      location.href='index.php?r=banner/lists';
  })
</script>