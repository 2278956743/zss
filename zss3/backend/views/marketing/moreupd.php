<div  style=" width:700px; height:200px;border:1px solid #000; "  > 
             <form action='index.php?r=marketing/moreaddrk' method='post'> 
                     <table>
                          <h2 >营销满增修改活动</h2> 
                          <tr><td >ID:&nbsp;&nbsp;&nbsp;<?php echo $re[0]['add_id']?></td></tr>
                           <tr>
                           <tr><td >满:&nbsp;&nbsp;&nbsp;<input type="text" name="add_price" style="width:30px;" value="<?php echo $re[0]['add_price']?>"/></td></tr>
                           <tr>
								<tr>
                           	<td><input type="hidden" name="add_id" value="<?php echo $re[0]['add_id']; ?>"></td>
                           </tr>
                            <tr><td>赠:&nbsp;&nbsp;&nbsp; <select name="zengpin_id">
                                <?php
                                  foreach ($zengpin as $key => $value) {
                                  echo "<option value='".$value['zengpin_id']."'>".$value['zengpin_name']."</option>";
                                  }
                                ?>
              
                            </select></td></tr>
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