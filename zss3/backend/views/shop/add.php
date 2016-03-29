  <?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\helpers\ArrayHelper;
  use yii\helpers\HtmlPurifier;
  ?>
  <!-- 添加页面开始 --> 
<html>
  <head>
	  <style>
		  .con{
			width:250px;
			height:40px;
		  }
		  .help-block{
			color:#ff6600;
		  }
	  </style>
  </head>
 <body>
 <center>
   <?php 
   $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]) ?>
      <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <table width="80%" height="80%" id="tab">
            <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_name')->textInput(['class'=>'con'])?></td>
            <td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_phone')->passwordInput(['class'=>'con'])?></td></tr> 
            <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_status')->radioList(['1'=>'开店','0'=>'关店'])?></td>
			<td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_type[]')->checkboxList(['堂食' => '堂食', '外卖' => '外卖', '自取' => '自取']);?></td></tr> 
             
            <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_open')->textInput(['class'=>'con'])?></td>
			<td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_over')->textInput(['class'=>'con'])?></td></tr> 
            <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_opens')->textInput(['class'=>'con'])?></td>
            <td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_overs')->textInput(['class'=>'con'])?></td></tr> 
            <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_longitude')->textInput(['class'=>'con'])?></td>
            <td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_address')->textInput(['class'=>'con'])?></td></tr> 
            <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= $form->field($shopModel, 'shop_latitude')->textInput(['class'=>'con'])?></td><td width="10%" align="center" bgcolor="#EEEEEE"></td></tr>   
          <tr><td width="10%" align="center" bgcolor="#EEEEEE"><?= Html::submitButton('添加', ['class' => 'submit']) ?></td> 
          <td width="10%" align="center" bgcolor="#EEEEEE"><?= Html::resetButton('返回', ['class' => 'reset']) ?></td></tr>     
        </table>
<?php ActiveForm::end(); ?>
 </center>
 </body>
  </html>
<!-- 结束添加 -->

