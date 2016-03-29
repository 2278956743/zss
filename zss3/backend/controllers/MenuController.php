<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Zssmenu;
use backend\models\Zssshop;
use backend\models\Zssseries;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\data\Pagination;
use yii\web\Cookie;
//use backend\models\UploadForm;
/**
 * Site controller
 */
class MenuController extends Controller
{
    /**
         * [actionAdd 菜单添加页面]
    */
    //public  $enableCsrfValidation = false;
    public function actionAdd()
    {
        //实例化model层
        $model = new Zssmenu;
        //调用门店的方法
        $shop = $model->getShop();
        //调用分类的方法
        $series = $model->getSeries();
        return $this->renderPartial('add',array("shop" => $shop,"series" => $series));
    }
    /**
         * [actionDoadd 执行菜品添加]
    */
    public function actionDoadd()
    {
        $test = new Zssmenu;
        $status = $test->getMenuadd(\yii::$app->request->post());
        //echo $status;die;
        if($status)
        {
            echo "<script>alert('添加成功');location.href='index.php?r=menu/list';</script>";
        }
    }
    /**
         * [actionType 显示菜单分类页面]
    */ 
	public function actionType()
    {
        $model = new Zssseries;
        $data = $model->getSort();
        return $this->renderPartial("type",$data);
    }
     /**
         * [actionSerdel 菜品分类删除]
    */
    public function actionSerdel()
    {
        $model = new Zssseries;
        $series = $model->getDel();
        $series[0]->delete();
    }
    /**
         * [actionTypegai 菜品分类即点即改]
    */
   public function actionTypegai()
   {
        $model = new Zssseries;
        $status = $model->getTgai();
        if($status){
            echo "修改成功";
        }else{
            echo "修改失败";
        }
   }
   /**
         * [actionTypexiang 菜品分类详情]
    */
   public function actionTypexiang()
   {
        $model = new Zssseries;
        $series = $model->getXiang();
        //print_R($series);die;
        $data['xiang'] = $series;
        //print_r($data);die;
        return $this->renderPartial("type_xiang",$data);
   }
    /**
         * [actionTypeupd 菜品分类修改门店]
    */
    public function actionTypeupd()
    {
        $model = new Zssmenu;
        $models = new Zssseries;
        //获取门店信息
        $type = $model->getShop();
        //两表联查获取单独条内容
        $series_shop = $models->getUpd();
        //print_r($series_shop);die;
        return $this->renderPartial('typeupd',array("type" => $type,"arr" => $series_shop));
    }
    public function actionTypedoupd()
    {
        $model = new Zssseries;
        $save = $model->getDoupd();
        //echo $save;die;
        if($save)
        {
            echo "<script>alert('修改成功');location.href='index.php?r=menu/type';</script>";
        }
    }
     /**
         * [actionSerpi 分类批量删除]
    */
    public function actionSerpi()
    {
        $model = new Zssseries;
        $model->getDelpi();
    }
    /**
         * [actionSeradd 名厨系列添加]
    */
   public function actionSeradd()
   {
        $model = new Zssmenu;
        $shop = $model->getShop();
        return $this->renderPartial('seradd',array("shop" => $shop));
   }
   public function actionSerdoadd()
   {
        $test = new Zssseries;
        $status = $test->getSeradd(\yii::$app->request->post());
        if($status)
        {
            echo "<script>alert('添加成功');location.href='index.php?r=menu/type';</script>";
        }
   }

    /**
         * [actionList 菜品列表]
    */
	public function actionList()
    {
        $model = new Zssmenu;
        $data = $model->getList();
        //print_R($data);die;
        return $this->renderPartial("list",$data);
    }
    /**
         * [actionMenudel 菜品删除]
    */
    public function actionMenudel()
    {
        $model = new Zssmenu;
        $model->getMenudel();
    }
    /**
         * [actionMenudel 菜品名称即点即改]
    */
   public function actionMenugai()
   {
        $request = \yii::$app->request;
        $id = $request->get("id");
        $new_name = $request->get("new_name");
        //echo $id."<br>".$new_name;die;
        $menu = Zssmenu::find()->where(['menu_id' => $id])->one();
        print_R($menu);die;
        $menu->menu_name = $new_name;
        $menu->save();
   }
    /**
         * [actionMenudelall 菜品批量删除]
    */
    public function actionMenudelall()
    {
        $model = new Zssmenu;
        $model->getMenudelpi();
    }
    /**
         * [actionMenudelall 菜品修改]
    */
   public function actionMenuupd()
   {
        $model = new Zssmenu;
        $menu = $model->getUpd();
        return $this->renderPartial('menuupd',array("menu" => $menu));
   }
   public function actionDoupd()
   {
        $model = new Zssmenu;
        $save = $model->getDoupd();
        //echo $save;die;
        if($save>0)
        {
            echo "<script>alert('修改成功');location.href='index.php?r=menu/list';</script>";
        }else{
            echo "<script>alert('请选择图片');history.go(-1);</script>";
        }
   }
}