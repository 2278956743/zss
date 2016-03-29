<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SystemController extends Controller
{
   //添加用户
    public function actionUser()
    {
        return $this->renderPartial('register');
    }
    //添加角色
	public function actionRole()	
	{
		return $this->renderPartial('role');
	}

	
}
