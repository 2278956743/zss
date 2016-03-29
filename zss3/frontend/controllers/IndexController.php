<?php
	namespace frontend\controllers;

	use Yii;
	use common\models\LoginForm;
	use frontend\models\PasswordResetRequestForm;
	use frontend\models\ResetPasswordForm;
	use frontend\models\SignupForm;
	use frontend\models\ContactForm;
	use yii\base\InvalidParamException;
	use yii\web\BadRequestHttpException;
	use yii\web\Controller;
	use yii\filters\VerbFilter;
	use yii\filters\AccessControl;

	class IndexController extends Controller{

		public function createPermission($item)
		{
			$auth = Yii::$app->authManager;
			$createPost = $auth->createPermission($item);
			$createPost->description = '创建了 ' . $item . ' 许可';
			$auth->add($createPost);
		}
		
		public function actionIndex(){
				echo "It's myself！";
			}

		public function createRole($item)
		{
			$auth = Yii::$app->authManager;
			$role = $auth->createRole($item);
			$role->description = '创建了 ' . $item . ' 角色';
			$auth->add($role);
		}

		static public function createEmpowerment($items)
		{
			$auth = Yii::$app->authManager;
			$parent = $auth->createRole($items['name']);
			$child = $auth->createPermission($items['description']);
			$auth->addChild($parent, $child);
		}

		static public function assign($item)
		{
			$auth = Yii::$app->authManager;
			$reader = $auth->createRole($item['name']);
			$auth->assign($reader, $item['description']);
		}
		public function beforeAction($action)
		{
			$action = Yii::$app->controller->action->id;
			if(\Yii::$app->user->can($action)){
				return true;
			}else{
				throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
			}
		}
	}
?>