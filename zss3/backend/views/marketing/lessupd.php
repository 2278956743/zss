<div  style="width:700px; height:200px;border:1px solid #000;"  > 
             <form action='index.php?r=marketing/lessupdrk' method='post'> 
                     <table>
                          <h2 >营销满减活动修改</h2>
                          <tr><td >ID:&nbsp;&nbsp;&nbsp;<?php echo $re[0]['subtract_id']?></td></tr>
                           <tr>
                           <tr>
                           	<td><input type="hidden" name="subtract_id" value="<?php echo $re[0]['subtract_id']; ?>"></td>
                           </tr>
                           <tr><td >满:&nbsp;&nbsp;&nbsp;<input type="text" name="subtract_price" style="width:30px;" value="<?php echo $re[0]['subtract_price']?>"/></td></tr>
                           <tr>
                            <tr><td>减:&nbsp;&nbsp;&nbsp;<input type="text" name="subtract_subtract" style="width:30px;" value="<?php echo $re[0]['subtract_subtract']?>" /></td></tr>
                           <tr>
                            <tr><td></td></tr>
                              <tr>
                             <td><input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>"></td>
                           </tr>
                           <tr>
                            <tr><td></td></tr>
                           <tr>
                             <td><input type='submit' value='修改'><input type='reset' value='取消'></td>
                           </tr>
                     </table>

              </form>
          </div>