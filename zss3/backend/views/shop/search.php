<div>
<table class="table table-striped table-bordered table-hover datatable">
        <thead>
          <tr>
             
              <td>门店名称</td>
              <td >门店电话号码</td>
              <td >门店地址</td>
              <td>门店状态</td>
              <td>门店支持类型</td>
              <td >外卖营业开放时间</td>
              <td >外卖营业结束时间</td>
              <td >堂食/自取营业开放时间</td>
              <td >堂食/自取营业结束时间</td>
              <td >经度</td>
              <td >纬度</td>
              <td >创建时间</td>
              <td >修改时间</td>
              <td >操作</td>
          </tr>
      </thead>
    <tbody>
    <?php foreach($rows as $k=>$val):?>
          <tr bgcolor="#FFFFFF">
                    <td  bgcolor="#EEEEEE"><a href="listmokuaimingxi.htm" onclick=""></a><?php echo $val['shop_name']?></td>
                   <td  bgcolor="#EEEEEE"><?php echo $val['shop_phone']?></td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['shop_address']?></td>
                    <td  bgcolor="#EEEEEE"><?php
                          if($val['shop_status']==1){
                                echo "开店";
                          }else{
                                echo "关店";
                          }
                      ?></td>
                    <td bgcolor="#EEEEEE">
                      <?php echo $val['shop_type']?>
                    </td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['shop_open']?></td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['shop_over']?></td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['shop_opens']?></td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['shop_overs']?></td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['shop_longitude']?></td>
                    <td bgcolor="#EEEEEE"><?php echo $val['shop_latitude']?></td>
                    <td  bgcolor="#EEEEEE"><?php echo date('Y-m-d H:i:s',$val['created_at'])?></td>
                    <td  bgcolor="#EEEEEE"><?php echo date('Y-m-d H:i:s',$val['updated_at'])?></td>
                    <td   bgcolor="#EEEEEE"><a href='index.php?r=shop/upt&&shop_id=<?php echo $val['shop_id']?>'>编辑|</a><a href='#' class='del' value="<?php echo $val['shop_id']?>">删除</a></td>

                  </tr>
        <?php endforeach;?>
    </tbody>
</table>
</div>