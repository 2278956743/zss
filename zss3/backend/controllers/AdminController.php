<?php
namespace backend\controllers;
use Yii;
use backend\models\Zssshop;
use backend\models\Zssadminuser;
use backend\models\Zssmenu;
use yii\filters\AccessControl;
use yii\web\Controller;
//use common\models\LoginForm;
use yii\filters\VerbFilter;
header("Content-type:text/html;charset=utf-8");
/**
 * Site controller
 */
class AdminController extends Controller
{
   
    public function actionLogin()
    {
        return $this->renderPartial('login');
    }

	public function actionIndex()	
	{
		//取出cookie值
		$cookie=Yii::$app->request->cookies['user'];  
		$value=$cookie->value;  
		return $this->renderPartial('index');

	}

	public function actionTop()	
	{

		return $this->renderPartial('top');
	}

	public function actionLeft()	
	{
		return $this->renderPartial('left');
	}

	public function actionMainfra()	
	{
		return $this->renderPartial('mainfra');
	}
	public function actionYan()
	{
		$arr=Yii::$app->request->get();
		$re=Zssadminuser::find()->where(['user_name' =>$arr['user'],'user_password'=>$arr['pwd']])->one();
		if($re){
			/*
			**存储cookie值
			*/
			$cookies = Yii::$app->response->cookies;
			$cookies->add(new \yii\web\Cookie([
				'name' => 'user',
				'value' => $arr['user'],
			]));
			echo "1";
		}else{
			echo "0";
		}
		
	}
}
