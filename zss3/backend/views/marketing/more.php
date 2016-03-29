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
<body >
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
                    <td height="20" colspan="13" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 满赠信息列表 &nbsp;</td>
                    </tr>
                  <tr>
            <td width="5%" align="center" bgcolor="#EEEEEE"> <input id="all" type="checkbox"/>
                                              <span id="allspan">全选</span></td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">ID</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">满</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">赠</td>
                    <td width="5%" align="center" bgcolor="#EEEEEE">创建时间</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">修改时间</td>
                    
                 
                   <td width="10%" align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>
                    <?php
               foreach ($arr as $model){
                      echo '<td width="10%" height="20" align="center" bgcolor="#EEEEEE"><input type="checkbox" class="abc" value="'.$model['add_id'].'"/></td>';
                    echo '<td width="10%" height="20" align="center" bgcolor="#EEEEEE">'.$model['add_id'].'</td>';
                   echo  '<td width="10%" align="center" bgcolor="#EEEEEE">'.$model['add_price'].'</td>';
                  
                    echo '<td width="6%" align="center" bgcolor="#EEEEEE">'.$model['zsszengpin']['zengpin_name'].'</td>';
                    echo '<td width="5%" align="center" bgcolor="#EEEEEE">'.$model['created_at'].'</td>';
                     echo '<td width="5%" align="center" bgcolor="#EEEEEE">'.$model['updated_at'].'</td>';
                   echo  '<td width="10%" align="center" bgcolor="#EEEEEE"><a href="#" class="del" value='.$model['add_id'].'>删除</a></td>';
            echo  '<td width="10%" align="center" bgcolor="#EEEEEE"><a href="#" onclick="upd('.$model['add_id'].');" class="upd" >编辑</a></td>';
  
                 echo '</tr>';
                        }  
                      ?>
                  </table></td> 
                      <script src=" <?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.11.1.min.js" ></script>
                  <script>
                  var aaa ='re'
      $(document).on('click','.del',function(){
          
              var add_id=$(this).attr("value");
         
               $.get("index.php?r=marketing/moredel",{add_id:add_id},function(data){ 
                 
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
          $.get("index.php?r=marketing/add_del_all",
          {
            id:chk_value.join(",")

          },function(data){
            alert('删除成功')
          
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
                  


<?= LinkPager::widget(['pagination' => $pagination]) ?>

                         </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<div align="center"  id="huan">
       

</div>
 <div  style=" width:700px; height:200px;border:1px solid #000;display:none; " id="add" > 
             <form action='index.php?r=marketing/moreadd' method='post'> 
                     <table>
                          <h2 >营销满增活动</h2>
                           <tr><td >满:&nbsp;&nbsp;&nbsp;<input type="text" name="add_price" style="width:30px;"/></td></tr>
                           <tr>
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
                             <td><input type='submit' value='添加'><input type='reset' value='取消'></td>
                           </tr>
                     </table>

              </form>
          </div>
          <script>
            //全选全不选
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

          </script>
<script>
    function fun(){
     var form  = document.getElementById('add').innerHTML;
     document.getElementById('huan').innerHTML=form
    }
    function rechange(){
          var change = document.getElementById('change').value;
            if(change=='1'){
        document.getElementById('xianding').style.display='block';  
      }else{
      document.getElementById('xianding').style.display='none';  
      }
    }
    function upd(add_id){
     var ajax = new XMLHttpRequest()
      ajax.open('get','index.php?r=marketing/moreupd&add_id='+add_id,true)
      ajax.send()

      ajax.onreadystatechange=function(){
      if(ajax.readyState==4 && ajax.status==200){
       document.getElementById('huan').innerHTML=ajax.responseText

            }
              }
    }

</script>
</body>
</html>
