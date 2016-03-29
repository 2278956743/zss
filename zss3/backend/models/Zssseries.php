<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "{{%zss_series}}".
 *
 * @property integer $series_id
 * @property integer $shop_id
 * @property string $series_name
 * @property integer $series_status
 * @property integer $ctime
 * @property integer $utime
 */
class Zssseries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_series}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'series_status', 'ctime', 'utime','user_id'], 'integer'],
            [['series_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'series_id' => 'Series ID',
            'shop_id' => 'Shop ID',
            'series_name' => 'Series Name',
            'series_status' => 'Series Status',
            'user_id' => 'User ID',
            'ctime' => 'Created At',
            'utime' => 'Updated At',
        ];
    }
    /* 菜品分类删除*/
    public function getDel()
    {
        $request=\yii::$app->request;
        $series_id=$request->get("series_id");
        //echo $series_id;die;
        return Zssseries::find()->where(['series_id'=>$series_id])->all();
    }
    /*菜品分类修改门店*/
    public function getUpd()
    {
        $request=\yii::$app->request;
        $series_id=$request->get("series_id");
        return $this->find()->with("zssshop")->where(['series_id'=>$series_id])->asArray()->one();
    }
    public function getDoupd()
    {
        //接值
        $request=\yii::$app->request;
        $time=time();
        $series_id=$request->post("series_id");
        $series_shop=$request->post("series_shop");
        $series=Zssseries::find()->where(['series_id'=>$series_id])->one();
        $series->utime=$time;
        $series->shop_id=$series_shop;
        return $series->save();
    }
    //分类修改名称
    public function getTgai()
    {
        $request = \yii::$app->request;
        $id = $request->get("id");
        $new_name = $request->get("new_name");
        //echo $id."<br>".$new_name;
        $series = Zssseries::find()->where(['series_id' => $id])->one();
        //print_R($series);die;
        $series->series_name = $new_name;
        return $series->save();
    }
    //菜品分类详情
    public function getXiang()
    {
        $request = \yii::$app->request;
        $cookie = Yii::$app->request->cookies['user'];
        $user_name = $cookie->value;
        $series_id = $request->get("series_id");
        $series = Zssseries::find()->with('zssadminuser')->with('zssshop')->where(['series_id'=> $series_id])->asArray()->one();
        //print_r($series);die;
        return $series;
    }
    /*分类批量删除*/
    public function getDelpi()
    {
        //接值
        $request=\yii::$app->request;
        $series_id=$request->get("id");
        $arr="delete from zss_series where series_id in ($series_id)";
        return Yii::$app->db->createCommand($arr)->query();
    }
    /*分页展示分类列表*/
    public function getSort()
    {
        $zssshop=Zssseries::find()->with("zssshop")->asArray()->all();
        $data['type']=$zssshop;
        return $data;
    }
    /*添加厨师系列*/
    public function getSeradd($data)
    {
        $ctime=time();
        $session= \yii::$app->session;
        $session->open();
        $session->set("ctime",$ctime);
        $time=$session->get('ctime');
        $model=$this->series_name=$data['series_name'];
        $model=$this->shop_id=$data['series_shop'];
        $model=$this->series_status=$data['series_status'];
        $model=$this->ctime=$ctime;
        $model=$this->utime=$ctime;
        return $this->save();
    }
    public function getZssmenu()
    {
        return $this->hasOne(Zssmenu::className(), ['menu_id' => 'menu_id']);
    }
    public function getZssshop()
    {
        return $this->hasOne(Zssshop::className(), ['shop_id' => 'shop_id']);
    }
    public function getZsscoupon()
    {
        return $this->hasOne(Zsscoupon::className(), ['coupon_id' => 'coupon_id']);
    }
    public function getZssadminuser()
    {
        return $this->hasOne(Zssadminuser::className(), ['user_id' => 'user_id']);
    }
}
