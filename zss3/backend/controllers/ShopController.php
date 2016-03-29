<?php
namespace backend\controllers;
use Yii;
use yii\helpers\HtmlPurifier;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\ZssshopForm;
use backend\models\Zssshop;
/**
 * Shop controller
 */
class ShopController extends Controller
{
		
   /**
   *门店列表
   */
	public function actionLists()
	{
		$shopModel = new ZssshopForm();
		$searchModel = new Zssshop;
		$re = $searchModel->getsearch();
		return $this->renderPartial('lists1', [ 
				 're' => $re,
				 'shopModel'=>$shopModel,
		   ]);

	}
	/**
    *添加是否成功
    */
    public function actionAdd(){
    	$shopModel = new ZssshopForm();
		if(!empty(yii::$app->request->post())){
			if ($shopModel->load(yii::$app->request->post())&&$shopModel->validate()) {
				//验证唯一
				$data = yii::$app->request->post();
				$Model = new Zssshop();
				$res = $Model->getadd($data);
				if($res){
					echo "<script>alert('添加成功');location.href='index.php?r=shop/lists'</script>";
				}else{
					echo "<script>alert('添加失败');location.href='index.php?r=shop/lists'</script>";
				}
			}
		}
		return $this->renderPartial('add',[
				'shopModel'=>$shopModel
			]);
    }
	/**
	*删除门店信息
	*/
	public function actionDel(){
		$shop_id=yii::$app->request->get('shop_id');
		$shopModel = new Zssshop();
		$del = $shopModel->getdel($shop_id);
		echo $del;
	}
	/**
	*批量删除
	*/
	public function actionDelall(){
		$shop_id = yii::$app->request->get('shop_id');
		//print_R($shop_id);die;
		$shopModel = new Zssshop();
		$delall = $shopModel->getdelall($shop_id);
		echo $delall;
	}
	/**
	*修改门店信息
	*/
	public function actionUpt(){
			$shop_id = yii::$app->request->get('shop_id');
			$shopModel = new Zssshop();
			$upt = $shopModel->getupt($shop_id);
		  	return $this->renderPartial('upt', [ 
		         'row' => $upt,
		         
		    ]);
	}
	/**
	*修改门店信息是否成功
	*/
	public function actionUpt_pro(){
			$data = yii::$app->request->post();
			$shopModel = new Zssshop();
			$res = $shopModel->getupt_pro($data);
			if($res){
					echo "<script>alert('修改成功');location.href='index.php?r=shop/lists'</script>";
				}else{
					echo "<script>alert('修改失败');location.href='index.php?r=shop/lists'</script>";
			}

		}
	/**
	*按时间查询
	*/
	public function actionSearch(){
		$starttime = yii::$app->request->get('starttime');
		$endtime = yii::$app->request->get('endtime');
		$shopModel = new Zssshop();
		$re = $shopModel->getsearchall($starttime,$endtime);
		if($re){
			return $this->renderPartial('search',['rows'=>$re]);
		}else{
			echo "<script>alert('无搜索结果');location.href='index.php?r=shop/lists'</script>";
		}
		
	}
}
