	<?php
    use yii\widgets\LinkPager;
  use yii\helpers\html;
  use yii\helpers\HtmlPurifier;
  ?>

  <h2 >营销优惠券活动修改</h2>
 <div style="width:550px;  height:250px;border:1px solid #000;">
             
             <form  style="width:740px; padding-top:50px; height:240px;" action='index.php?r=marketing/couponupdrk' method='post'> 
	<table style="float:left;">
                          
                           <tr><td >名字:&nbsp;&nbsp;&nbsp;<input type="text" name="coupon_name" style="width:70px;" value="<?php echo HtmlPurifier::process($re[0]['coupon_name']); ?>"/></td></tr>
                           <tr>			
                           <tr>
                           	<td><input type="hidden" name="coupon_id" value="<?php echo HtmlPurifier::process($re[0]['coupon_id']); ?>"></td>
                           </tr>
                            <tr><td>抵用品种:&nbsp;&nbsp;&nbsp;
                              <select name="series_id" id="series" onchange="ser()">
                                <option value="0"> 全部</option>
                                    <?php
                                  foreach ($series as $key => $value) {

                                 	if($value['series_id']==$re[0]['series_id']){
                                 	 echo "<option selected=selected value='".$value['series_id']."'>".HtmlPurifier::process($value['series_name'])."</option>";	
                                 	}else{
                                  echo "<option value='".$value['series_id']."'>".HtmlPurifier::process($value['series_name'])."</option>";
                                  }
                              }
                                ?>
                            </select>
        
                         </td></tr>
                           <tr>
                            <tr><td>抵用金额：<input type="text"  name="coupon_price" style="width:50px;" value="<?php echo HtmlPurifier::process($re[0]['coupon_price']); ?>"/></td></tr>
                              <tr>
                              <tr><td>到期时间<input type="text"  name="end_at" style="width:150px;" value="<?php echo HtmlPurifier::process($re[0]['end_at']); ?>" /></td></tr>
                              <tr><tr><td>请按照格式填写时间如：年-月-日 时:秒:分</td></tr>
                             <td><input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>"></td>
                           </tr>
                           <tr>
                            <tr><td></td></tr>
                           <tr>
                             <td><input type='submit' value='修改'><input type='reset' value='取消'></td>
                           </tr>
                     </table>


<div style=" overflow:scroll; width:250px;height:200px; margin-top:-20px;border:1px solid #000;float:right; margin-right:220px"  id ="menu_fen">
                                    

</div>
</div></form>
                   
