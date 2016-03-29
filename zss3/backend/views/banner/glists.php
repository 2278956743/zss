
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>项目管理系统</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
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
ul li{
  list-style:none;
}
.pagination{height:30px; line-height: 30px; float:right;}
.pagination li {  float:left; border: 1px solid #dfdfdf;padding:0 8px; margin: 0 5px;}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="<?php echo Yii::$app->request->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.9.1.min.js"></script>
<SCRIPT language=JavaScript>
function sousuo(){
	window.open("gaojisousuo.htm","","depended=0,alwaysRaised=1,width=800,height=510,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
//全选
$(document).on('click','#selectall',function(){
   var all=document.getElementsByName('delid');
          // alert(all);
           for(i=0;i<all.length;i++){
             if(selectall.checked==true){
                all[i].checked=true;
             }else{
                all[i].checked=false;
           }
       }
})
//批量删除
$(document).on('click','#del',function(){
    var all=document.getElementsByName('delid');
    //alert(all);
    str='';
    for(var i=0;i<all.length;i++){
        if(all[i].checked==true){
              str+=','+all[i].value; 
        }
        //alert(str);
        str=str.substr(1);
        
    }
   // alert(str);
    $.get('index.php?r=banner/delall',{carousel_id:str},function(txt){
                //alert(txt);
              location.reload();
    })
})
</SCRIPT>

<body>
<form name="fom" id="fom" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="<?php echo Yii::$app->request->baseUrl ?>/assets/images/nav04.gif">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <td width="21"></td>
			  
			   <td width="144" align="left"><a href="#" onclick="sousuo()">
			    
			   </a></td>	
		    </tr>
          </table></td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 <tr>
               
	              <input type="button" class="right-button08" id='del' value="批量删除信息" />
	              <input type="button" class="right-button08 add" value="添加轮播组信息"></td>
          	 </tr>
              <tr>
                <td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				 <tr class="CTitle" >
           <td height="22" colspan="16" align="center">轮播组详情表</td>
              </tr>
              <tr bgcolor="#EEEEEE">
				    <td height="30">全选/反选<input type="checkbox" id='selectall'/></td>
              <td>图片名称</td>
					<td >所属图片</td>
          <td >所属图片描述</td>
          <td >轮播组描述</td>
					<td >操作</td>
          </tr>
             <?php foreach($arr[0]['zsscarousel'] as $val) {?>
            <tr bgcolor="#FFFFFF">
            <td  width="10%" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="delid" value="<?php echo $val['carousel_id']?>"/></td>
                    <td  bgcolor="#EEEEEE"><a href="listmokuaimingxi.htm" onclick=""></a><?php echo $val['carousel_title']?></td>
                   <td  bgcolor="#EEEEEE">
                   <img src="<?php echo Yii::$app->request->baseUrl; echo $val['carousel_img']?>" width='60px' height='60px'></td>
                    <td  bgcolor="#EEEEEE"><?php echo $val['carousel_desc']?></td>
                    <tD bgcolor="#EEEEEE"><?php echo $arr[0]['group_desc']?></tD>
                    <td   bgcolor="#EEEEEE"><a href='index.php?r=banner/group_upt&&group_id=<?php echo $val['group_id']?>'>编辑|</a><a href='#' class='del' value="<?php echo $val['carousel_id']?>">删除</a></td>
                  </tr>
           <?php } ?>
				  </tr>
            </table></td>
        </tr>

      </table>
      <script src="<?php echo Yii::$app->request->baseUrl ?>/assets/js/jquery-1.9.1.min.js"></script>
      <script>
      //节点删除
      $(document).on('click','.del',function(){
              var carousel_id=$(this).attr("value");
               $.get("index.php?r=banner/gdel",{carousel_id:carousel_id},function(data){
                    //alert(data)
               })
             $(this).parent().parent().remove();
      })
      $(document).on('click','.reset',function(){
          location.href='index.php?r=banner/lists';
      })
      </script>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="<?php echo Yii::$app->request->baseUrl ?>/assets/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
              <tr>
               <input type="button" value="返回" class="reset">
  
             </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<div align='center' style="display:none" id='hidden'>
<div style="width:500px;height:350px;border:solid 2px #99cccc;padding-left:180px;"> 
    <center>
    <form action='index.php?r=banner/gadd_pro' method='post'enctype='multipart/form-data'>
      <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
         <br></br></br><table>
            <tr>
              <td width="15%">添加轮播组描述：</td>
              <td><textarea name="group_desc" rows="5" cols="20"></textarea></td>
            </tr>
            <tr>
              <td>是否显示轮播组：</td>
              <td><select name="group_isshow">
                <option value="1" >是
                <option value="0" selected>否
              </select></td>
            </tr>
            <tr>
              <td><input type="submit" value="保存"></td>
              <td></td>
            </tr>
         </table>
   </form> 
   </center>
</div>
</div>
</body>
</html>
<script>
	$(document).on('click','.add',function(){
		document.getElementById('hidden').style.display='block';
	})
</script>