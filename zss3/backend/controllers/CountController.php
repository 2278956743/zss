<?php
namespace backend\controllers;
header("Content-Type:text/html;charset=utf-8");
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\Zssorder;
use backend\models\Zssadminuser;
use backend\models\Zssshop;
use backend\models\Zssmenu;
use backend\models\Zssorderinfo;
//use common\models\LoginForm;
use yii\filters\VerbFilter;
//use yii\data\Pagination;

/**
 * Site controller
 */

class CountController extends Controller
{
	public $enableCsrfValidation = false;
	
	
   /*
   **财务统计
   */

    public function actionListyuangong()
    {
		$cookie=Yii::$app->request->cookies['user'];  
		$user=$cookie->value;  
		$order = new Zssorder;
		$name = $order->order1($user);
		
		
		if($name==1){
			//多表联查数据显示列表(分页)
			$arr = $order->lim();
			return $this->render('listyuangong', [
				'arr' => $arr['countries'],
				'sum'=>$arr['sum'],
				'pagination' => $arr['pagination'],
			]);
		}else{
			$arr = $order->limi($name);
			return $this->render('listyuangong', [
				'arr' => $arr['countries'],
				'sum'=>$arr['sum'],
				'pagination' => $arr['pagination'],
			]);
		
		}
    }
	/*
	**销量统计
	*/
	public function actionListzhiwu()
	{

		$cookie=Yii::$app->request->cookies['user'];  
		$user=$cookie->value;  
		$order = new Zssorder;
		$name = $order->order1($user);
		if($name==1){
			$arr=$order->xiao();
			return $this->renderPartial('listzhiwu',array('arr'=>$arr));
		}else{
			$arr=$order->liang($name);
			return $this->renderPartial('listzhiwu',array('arr'=>$arr));
		}
		return $this->renderPartial('listzhiwu');
	}

	/*
	**详情
	*/

	public function actionShow()
	{
		//取值
		$arr=Yii::$app->request->get();
		//传值显示
		return $this->renderPartial('listyuangongmingxi',array('arr'=>$arr));
	}
	

	/*
	**Excel导出数据
	*/
	public function actionDao()
	{
		//获取开始时间和结束时间	
		$start=Yii::$app->request->get('start');
		$end=Yii::$app->request->get('end');
		//取得用户名
		$cookie=Yii::$app->request->cookies['user'];  
		$user=$cookie->value;  
		//查出用户id
		$order = new Zssorder;
		$name = $order->order1($user);
			if($name==1){
				$re =$order->sel();
				$list =$order->excel($re);
				
			}else{
				$re =$order->sele($name);
				$list =$order->excel($re);

			}
			
	}


	/*
	**按时间查询搜索财务
	*/
	public function actionTime()
	{
		$start=Yii::$app->request->get('start');
		$end=Yii::$app->request->get('end');
		
		//取出cookie值
		$cookie=Yii::$app->request->cookies['user'];  
		$user=$cookie->value;  

		$order = new Zssorder;
		$name = $order->order1($user);
		if($name==1){
			$list = $order->ctime($start,$end);
			//print_R($list);die;
			return $this->render('listyuangong', [
				'arr' => $list['countries'],
				'sum'=>$list['sum'],
				'pagination' => $list['pagination'],
			]);
		}else{
			$list = $order->htime($start,$end,$name);
			return $this->render('listyuangong', [
				'arr' => $list['countries'],
				'sum'=>$list['sum'],
				'pagination' => $list['pagination'],
			]);
		}
	}
	//按时间搜索销量
	public function actionTime1(){
		$start=Yii::$app->request->get('start');
		$end=Yii::$app->request->get('end');

		//取出cookie值
		$cookie=Yii::$app->request->cookies['user'];  
		$user=$cookie->value;  

		$order = new Zssorder;
		$name = $order->order1($user);
		if($name!=1){
			$list = $order->ntime($start,$end);
			return $this->renderPartial('listzhiwu',array('arr'=>$list));
		}else{
			//分组查询总量(同一产品)
			$list = $order->ntime($start,$end,$name);
			return $this->renderPartial('listzhiwu',array('arr'=>$list));
		}
	}
	/*
	**统计销量详情
	*/
	public function actionShow1(){
		//取值
		$arr=Yii::$app->request->get();
		//传值显示
		return $this->renderPartial('listmoney',array('arr'=>$arr));
	}


}
