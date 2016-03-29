<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>温亚飞</title>
<style type="text/css">
<!--
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
}

ul li{

list-style: none;

}
.tabfont01 {  
  font-family: "宋体";
  font-size: 9px;
  color: #555555;
  text-decoration: none;
  text-align: center;
}
.font051 {font-family: "宋体";
  font-size: 12px;
  color: #333333;
  text-decoration: none;
  line-height: 20px;
}
.font201 {font-family: "宋体";
  font-size: 12px;
  color: #FF0000;
  text-decoration: none;
}
.button {
  font-family: "宋体";
  font-size: 14px;
  height: 37px;
}
.pagination{height:30px; line-height: 30px; float:right;}
.pagination li {  float:left; border: 1px solid #dfdfdf;padding:0 8px; margin: 0 5px;}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/xiangmu.js"></script>
</head>

<?php 
  use yii\widgets\LinkPager;
?>  
<body onload="on_load()">
<form name="fom" id="fom" method="post" action="">
<table id="mainpage" width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="62" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">
          
       <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
      <td width="21"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/ico07.gif" width="20" height="18" /></td>
      <td width="550">查看内容：按时间：
              <input name="textfield" type="text" size="12" readonly="readonly"/><span class="newfont06">至</span>
       <input name="textfield" type="text" size="12" readonly="readonly"/>  
       <input name="Submit" type="button" class="right-button02" value="查 询" /></td>
       <td width="132" align="left"><a href="#" onclick="sousuo()">
         <input name="Submit" type="button" class="right-button07" value="高级搜索" /></a></td> 
      </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

             <tr>
             <input type="button" id="alldel" value="批量删除">
              
                <input name="button" type="button" class="right-button08" value="添加项目" onclick="fun();"/></td>
             </tr>
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">

                            <tr>
                    <td height="20" colspan="13" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 折扣列表 &nbsp;</td>
                    </tr>
                  <tr>
            <td width="5%" align="center" bgcolor="#EEEEEE"> <input id="all" type="checkbox"/><span id="allspan">全选</span></td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">
                                           ID  </td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">折扣</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">状态</td>
                    <td width="5%" align="center" bgcolor="#EEEEEE">创建时间</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">修改时间</td>
                    
                 
                   <td width="10%" align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>
                    <?php
               foreach ($models as $model){
                echo '<td width="10%" height="20" align="center" bgcolor="#EEEEEE"><input type="checkbox" class="abc" value="'.$model['discount_id'].'" /></td>';
                    echo '<td width="10%" height="20" align="center" bgcolor="#EEEEEE">'.$model['discount_id'].'</td>';
                   echo  '<td width="10%" align="center" bgcolor="#EEEEEE">'.$model['discount_num'].'</td>';
                  
                    echo '<td width="6%" align="center" bgcolor="#EEEEEE">'.$model['discount_show'].'</td>';
                    echo '<td width="5%" align="center" bgcolor="#EEEEEE">'.$model['created_at'].'</td>';
                     echo '<td width="5%" align="center" bgcolor="#EEEEEE">'.$model['updated_at'].'</td>';
                   echo  '<td width="10%" align="center" bgcolor="#EEEEEE"><a href="#" class="del" value='.$model['discount_id'].'>删除</a></td>';
            echo  '<td width="10%" align="center" bgcolor="#EEEEEE"><a href="index.php?r=marketing/discount_upd&id='.$model['discount_id'].'" class="upd" >编辑</a></td>';
  
                 echo '</tr>';
                        }  
                      ?>
                  </table></td> 
                      <script src=" <?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.11.1.min.js" ></script>
                  <script>
                  var aaa ='re'
      $(document).on('click','.del',function(){
          
              var discount_id=$(this).attr("value");
        
               $.get("index.php?r=marketing/discount_del",{discount_id:discount_id},function(data){ 
                 
                 if(data == 'ok'){
              
                    return aaa ='ok';
                 }else{
                 alert('删除失败')
                 }
               }); 
              
                 if(aaa=='ok'){
               $(this).parent().parent().remove();
               }    
      })


       $(document).on("click", "#alldel", function () {
      var chk_value =[];    
        $('.abc:checked').each(function(){    
          chk_value.push($(this).val());   
          $(this).parent().parent().remove();
        });

        if (chk_value.length==0){
          alert("你还没有选择任何内容")
        }else{
          $.get("index.php?r=marketing/discount_del_all",
          {
            id:chk_value.join(",")

          },function(data){
            alert(data)
          
          });
        }
    })

      </script>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
              <tr>
               <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>           </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<div align="center">
        <div  style="width:700px; height:200px;border:1px solid #000;display:none;" id="add" > 
             <form action='index.php?r=marketing/discount_add' method='post'> 
                     <table>
                          <h2 >营销折扣活动</h2>
                           <tr><td>请选择折扣：<input type="text" name="discount_num"  />%</td></tr>
                           <tr>
                            <tr><td></td></tr>
                           <tr>
                            <tr><td></td></tr>
                              <tr>
                             <td><input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>"></td>
                           </tr>
                           <tr>
                            <tr><td></td></tr>
                           <tr>
                             <td><input type='submit' value='添加'><input type='reset' value='取消'></td>
                           </tr>
                     </table>

              </form>
          </div>

</div>
<script>
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
    function fun(){
     document.getElementById('add').style.display='block';
    }
    function rechange(){
          var change = document.getElementById('change').value;
            if(change=='1'){
        document.getElementById('xianding').style.display='block';  
      }else{
      document.getElementById('xianding').style.display='none';  
      }
    }


</script>
</body>
</html>
