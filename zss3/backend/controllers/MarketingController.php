<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Zsswallet;
use backend\models\Zssdiscount;
use backend\models\Zsssubtract;
use backend\models\Zssadd;
use backend\models\Zsszengpin;
use backend\models\Zsscoupon;
use backend\models\Zssmenu;
use backend\models\Zssseries;
use backend\models\ZsswalletForm;
use yii\data\Pagination;
header('content-type:text/html;charset=utf8');
/**
 * Site controller
 */
class MarketingController extends Controller
{	


      
   

	//红包管理
    public function actionRed()
    {			//查询红包数据
    			$redform = new ZsswalletForm();
				$red = new Zsswallet();
			if(!empty(yii::$app->request->post())){
    			if($redform->load(yii::$app->request->post())&&$redform->validate()){
    					$data = yii::$app->request->post();
    					$data['ZsswalletForm']['wallet_price']=$data['xianding'];
    					$data['ZsswalletForm']['wallet_is_price']=$data['wallet_is_price'];
    					$data['ZsswalletForm']['wallet_show']=1;
   						$data['ZsswalletForm']['created_at']     = time();	
   						$data['ZsswalletForm']['updated_at']      = time();
   						$re = $red->redadd($data['ZsswalletForm']);
    				if($re){
    						echo "<script>alert('添加成功')</script>";
    					}else{
    						echo " <script>alert('添加失败')</script>";
    					}
    }

}
	//调用视图
    		 $red_info = $red->redselect();
    			return $this->renderPartial('listxiangmuxinxi', [
					         'models' => $red_info['models'],
					         'pages' => $red_info['pages'],
					         're_models' => $redform,
					    ]);
 	 }
    //红包删除
   function actionDel(){
   	//接受红包ID
   			$wallet_id=yii::$app->request->get('wallet_id');  
   	//调用model
   			$re = new Zsswallet;
   			$resutl = $re->reddel($wallet_id);
   	//输出
   			echo $resutl;
   }
//	批量删除
   function actionRed_del_all(){
   	$wallet_id = yii::$app->request->get('id');

   	 	  $re = new Zsswallet;
   			$resutl = $re->reddelall($wallet_id);
   			echo $result;
   }
 
   	//红包修改
   public function actionUpd(){
   	//接收红包ID
   		$wallet_id=Yii::$app->request->get('id');
   		//调用model
   		$red = new Zsswallet();
   		$red_info = $red -> upd($wallet_id);
   		//view输出
	    return $this->renderPartial('upd',array('re'=>$red_info));

   }
   public function actionRe_upd(){
   	//接收红包修改信息
   			   				$data['wallet_name']=Yii::$app->request->post('wallet_name');
					   		$data['wallet_is_price']=Yii::$app->request->post('wallet_is_price');
					   		$data['wallet_id']=Yii::$app->request->post('wallet_id');
					   		$data['wallet_price']=Yii::$app->request->post('xianding');
					   		$data['wallet_share_price']=Yii::$app->request->post('wallet_share_price');
					   		$data['wallet_shares_price']=Yii::$app->request->post('wallet_shares_price');	
					   		if($data['wallet_share_price']>$data['wallet_price']){
   			echo "<script>alert('添加失败,得到钱数不能大于默认以及限定钱数');location.href='index.php?r=marketing/red'</script>";die;
   		}elseif($data['wallet_shares_price']>$data['wallet_share_price']){
   			echo "<script>alert('添加失败,被分享者钱数不能大于分享者');location.href='index.php?r=marketing/red'</script>";die;
   		}elseif($data['wallet_shares_price']>$data['wallet_price']){
   			echo "<script>alert('添加失败,被分享者钱数不能大于默认以及限定钱数');location.href='index.php?r=marketing/red'</script>";die;
   		}elseif($data['wallet_shares_price']+$data['wallet_share_price'] > $data['wallet_price']){
   			echo "<script>alert('添加失败,被分享者钱数加上分享者钱数不能大于默认以及限定钱数');location.href='index.php?r=marketing/red'</script>";die;
   		}
					   		$data['updated_at']=time();	
					$Zsswallet = new Zsswallet();	
					$re = $Zsswallet->re_upd($data);
					//判断修改结果   			
			
					if($re){
					echo "<script>alert('修改成功');location.href='index.php?r=marketing/red'</script>";
					}else{
						echo "<script>alert('修改失败');location.href='index.php?r=marketing/red'</script>";
					}


   }
    //折扣管理
	public function actionDiscount()	
	{

		//折扣信息分页查询
		$discount = new Zssdiscount();
		$disinfo = $discount->dissel();
		//view 显示	 
					    return $this->renderPartial('discount', [
					         'models' => $disinfo['models'],
					         'pages' => $disinfo['pages'],
					    ]);
			}
	//折扣添加
	public function actionDiscount_add(){
		//接收折扣信息
					$data['discount_num']=Yii::$app->request->post('discount_num');
					$data['created_at']=time();
					$data['updated_at']=time();
					$data['discount_show']=1;
		//调用model
				$discount = new Zssdiscount();
				$re = $discount->disadd($data);		

		if($re){
						echo "<script>alert('添加成功');location.href='index.php?r=marketing/discount'</script>";
					}else{
						echo "<script>alert('添加失败');location.href='index.php?r=marketing/discount'</script>";
					}

	}
	//折扣删除	
			public function actionDiscount_del(){
				//接收折扣ID
			$discount_id=yii::$app->request->get('discount_id');
			//调用model
			$Zssdiscount= new Zssdiscount();
			$re = $Zssdiscount->disdel($discount_id);
   		
			if($aa ){
				echo "ok";
			}else{
				echo "no";
			}
	}
		//批量删除
	public function actionDiscount_del_all(){
	
		$discount_id = yii::$app->request->get('id');
		
		$dis = new Zssdiscount; 
		$Re  = $dis->discount_del_all($discount_id);
		
	}

		//折扣修改
	public function actionDiscount_upd(){
		//接受折扣ID
		  	$discount_id=Yii::$app->request->get('id');
		 //根据折扣查询	
   			$re = Zssdiscount::find()->where(['discount_id'=>$discount_id])->asArray()->all();

   			return $this->renderPartial('discount_upd',array('re'=>$re));
	}
	  // 折扣修改入库
		public function actionRe_discount_upd(){
			//接收折扣ID和信息
					$discount_id=Yii::$app->request->post('discount_id');
					 
					$data['discount_num']=Yii::$app->request->post('discount_num');
					$data['updated_at']=time();	

				$Zssdiscount=new Zssdiscount();
				$res = $Zssdiscount->disupdrk($discount_id,$data);
	
		
					if($res){
						echo "<script>alert('修改成功');location.href='index.php?r=marketing/discount'</script>";
					}else{
						echo "<script>alert('修改失败');location.href='index.php?r=marketing/discount'</script>";
					}

		}
	//满减管理
    public function actionLess()
    {
    	//满减查询
    	$discount = new Zsssubtract();
		$data = $discount->lesssel();
		//view 显示	 
		
					    return $this->renderPartial('less', [
					         'models' => $data['models'],
					         'pages' => $data['pages'],
					    ]);

    }
    //满减添加
	public function actionLessadd(){
					$data['subtract_price']=Yii::$app->request->post('subtract_price');
					$data['subtract_subtract']=Yii::$app->request->post('subtract_subtract');
					$data['created_at']=time();
					$data['updated_at']=time();
					$data['subtract_show']=1;
					$data['discount_status']=1;
					$re=Yii::$app->db->createCommand()->insert('zss_subtract',$data)->execute();
					if($re){
						echo "<script>alert('添加成功');location.href='index.php?r=marketing/less'</script>";
					}else{
						echo "<script>alert('添加失败');location.href='index.php?r=marketing/less'</script>";
					}


	}
	 //满减修改
	public function actionLessupd(){
			//接受ID                                                        
					$subtract_id=yii::$app->request->get('subtract_id');
					$data = Zsssubtract::find()->where(['subtract_id'=>$subtract_id])->asArray()->all();
					return $this->renderPartial('lessupd',['re'=>$data]);

		}
//满减修改入库
		public function actionLessupdrk(){
				//接受ID    	
					$subtract_id=Yii::$app->request->post('subtract_id');
							 
					$data['subtract_price']=Yii::$app->request->post('subtract_price');
					$data['subtract_subtract']=Yii::$app->request->post('subtract_subtract');
					$data['updated_at']=time();	


					$Zssdiscount=new Zsssubtract();
					$res = $Zssdiscount->less；updrk($subtract_id,$data);
	
				
					if($res){
						echo "<script>alert('修改成功');location.href='index.php?r=marketing/less'</script>";
					}else{
						echo "<script>alert('修改失败');location.href='index.php?r=marketing/less'</script>";
					}
		}
			//满减删除
		public function actionLessdel(){
			//接受ID   

			$subtract_id=yii::$app->request->get('subtract_id');
			$re = new Zsssubtract();
			$aa = $re -> lessdel($subtract_id);

			
			if($aa ){
				echo "ok";
			}else{
				echo "no";
			}
		}
		//满减批量删除
		public function actionLess_del_all(){
			$subtract_id=yii::$app->request->get('id');
			 $sub = new Zsssubtract();
			 $sub->less_del_all($subtract_id);
		}

    //满赠管理
		


	public function actionMore()	
	{
			//满增查询
		$more = new Zssadd();
		$data = $more->moresel();
	 
		$zenginfo = Zsszengpin::find()->asArray()->all();
        return $this->renderPartial('more', [
            'arr' => $data['countries'],
            'pagination' => $data['pagination'],
            'zengpin' => $zenginfo,
        ]);
	


	}

		//满赠添加
	public function actionMoreadd(){

					$data['add_price']=Yii::$app->request->post('add_price');
					$data['zengpin_id']=Yii::$app->request->post('zengpin_id');
					$data['created_at']=time();
					$data['updated_at']=time();
					$data['add_show']=1;
					$data['add_status']=1;
					$moreadd = new 	Zssadd();
					$re = $moreadd->moreadd($data);
					
					if($re){
						echo "<script>alert('添加成功');location.href='index.php?r=marketing/more'</script>";
					}else{
						echo "<script>alert('添加失败');location.href='index.php?r=marketing/more'</script>";
					}
						
			}

	//满赠删除
	public function actionMoredel(){
		//接收ID
			$add_id=yii::$app->request->get('add_id');

			$result =Zssadd::find()->where(['add_id'=>$add_id])->all();
			$aa = $result[0]->delete();
			if($aa ){
				echo "ok";
			}else{
				echo "no";
			}		


	}
	//满赠修改
	public function actionMoreupd(){
				$add_id=yii::$app->request->get('add_id');
			
				$moreupd = new Zssadd();
				$data = $moreupd->moreupd($add_id); 
					
			return $this->renderPartial('moreupd',['re'=>$data['info'],'zengpin'=>$data['zenginfo']]);

	}
		public function actionMoreaddrk(){

					$add_id=Yii::$app->request->post('add_id');
					 

					$data['add_price']=Yii::$app->request->post('add_price');

					$data['zengpin_id']=Yii::$app->request->post('zengpin_id');

					$data['updated_at']=time();	

					$moreupdrk = new Zssadd();
					$res= $moreupdrk->moreupdrk($add_id,$data); 
					
				if($res){
						echo "<script>alert('修改成功');location.href='index.php?r=marketing/more'</script>";
					}else{
						echo "<script>alert('修改失败');location.href='index.php?r=marketing/more'</script>";
					}
		
		}
		//满赠批量删除
		public function actionAdd_del_all(){
			$add_id= yii::$app->request->get('id');

				$add = new Zssadd();
				$add->add_del_all($add_id);
			}
	//优惠劵管理
	public function actionCoupon()	
	{
			$coupon = new Zsscoupon();			
			$data = $coupon->couponsel();
		

        return $this->renderPartial('coupon', [
            'arr' => $data['countries'],
            'pagination' => $data['pagination'],
            'series' => $data['zenginfo'],
        ]);
	
}	
		//优惠券菜单查询
		public function actionSer(){

				$series_id= yii::$app->request->get('series');	
				if($series_id==0){
						echo "<h2>您选择了全部菜系</h2>";
				}else{
				$re = Zssmenu::find()->with('zssseries')->where('series_id='.$series_id)->asArray()->all();
							echo "<h2>".$re[0]['zssseries']['series_name']."菜系</h2>";
         			foreach ($re as $k => $v) {
         			
         			   		echo "<input type='checkbox' name='menu_id[]' value='".$v['menu_id']."'>".$v['menu_name']."<br/>";
         			   	}}   	
		}
		//优惠券添加
		public function actionCouponadd(){
						$str = "";
							$data = yii::$app->request->post(); 
							$data['end_at']=strtotime($data['end_at']);

							$data['add_show']=1;
							$data['add_status']=1;
							$data['updated_at']=time();
							$data['created_at']=time();
	isset($data['series_id'])?$data['series_id']:$data['series_id']=0;
	isset($data['menu_id'])?$data['menu_id']:$data['menu_id']=0;
						if(count($data['menu_id'])>0){

				$menu = Zssmenu::find()->with('zssseries')->where('series_id='.$data['series_id'])->asArray()->all();

						if(count($data['menu_id'])==count($menu))
						{
								$str=0;
						}else{


									for($i=0;$i<count($data['menu_id']);$i++){
										$str.=','.$data['menu_id'][$i];
									}
							$str = substr($str,1);
							}
							$data['menu_id']=$str;}
							else{
							$data['menu_id']=$data['menu_id']['0'];
						}
							unset($data['_csrf']);
						$re=Yii::$app->db->createCommand()->insert('zss_coupon',$data)->execute();
							if($re){
						echo "<script>alert('添加成功');location.href='index.php?r=marketing/coupon'</script>";
					}else{
						echo "<script>alert('添加失败');location.href='index.php?r=marketing/coupon'</script>";
					}
		}
					public function actionCoupondel(){
						//优惠券删除
						$coupon_id=yii::$app->request->get('coupon_id');
									$result =Zsscoupon::find()->where(['coupon_id'=>$coupon_id])->all();
									$aa = $result[0]->delete();
									if($aa ){
										echo "ok";
									}else{
										echo "no";
									}		


					}

			public function actionCouponupd(){
						//优惠券修改查询
					$coupon_id=yii::$app->request->get('coupon_id');
					
					$re = Zsscoupon::find()->with('zssseries')->where('coupon_id='.$coupon_id)->asArray()->all();
					$re[0]['end_at']=date('Y-m-d H:i:s',$re[0]['end_at']);

					$zenginfo = Zssseries::find()->asArray()->all();


					return $this->renderPartial('couponupd',[
						're'=>$re,
						'series'=>$zenginfo,
							]);
				
			}

			public function actionCouponupdrk(){
						$coupon_id=yii::$app->request->post('coupon_id');
						$data = yii::$app->request->post(); 
							$data['end_at']=strtotime($data['end_at']);
							$data['updated_at']=time();
						isset($data['menu_id'])?$data['menu_id']:$data['menu_id']=0;
							$str="";
						if(count($data['menu_id'])>0)
					{

				$menu = Zssmenu::find()->with('zssseries')->where('series_id='.$data['series_id'])->asArray()->all();

						if(count($data['menu_id'])==count($menu))
						{
								$str=0;
						}else{


									for($i=0;$i<count($data['menu_id']);$i++)
									{
										$str.=','.$data['menu_id'][$i];
									}
							$str = substr($str,1);
							}	

						
							$data['menu_id']=$str;
						}else{
							$data['menu_id']=$data['menu_id']['0'];
						}
						unset($data['_csrf']);
							$re=new Zsscoupon;
			$res=$re->updateAll($data,'coupon_id=:coupon_id',array(":coupon_id"=>$coupon_id));
				if($re){
						echo "<script>alert('修改成功');location.href='index.php?r=marketing/coupon'</script>";
					}else{
						echo "<script>alert('修改失败');location.href='index.php?r=marketing/coupon'</script>";
					}

			}
		//优惠券批量删除
			public function actionCoupon_del_all(){
					$coupon_id = yii::$app->request->get('id');
					$coupon = new Zsscoupon();
					$re = $coupon->coupon_del_all($coupon_id);
						echo $re;
			}



} 


