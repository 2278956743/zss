<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%zss_menu}}".
 *
 * @property integer $menu_id
 * @property string $menu_name
 * @property string $original_img
 * @property string $wx_img
 * @property string $pc_img
 * @property string $menu_img
 * @property string $menu_price
 * @property string $menu_introduce
 * @property integer $menu_status
 * @property integer $num
 * @property string $shop_id
 * @property integer $series_id
 * @property integer $addtime
 * @property integer $updtime
 */
class Zssmenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_price'], 'number'],
            [['menu_status', 'series_id', 'addtime', 'updtime','user_id'], 'integer'],
            [['menu_name', 'original_img', 'wx_img', 'pc_img', 'menu_img', 'shop_id'], 'string', 'max' => 50],
            [['menu_introduce'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'menu_name' => 'Menu Name',
            'original_img' => 'Original Img',
            'wx_img' => 'Wx Img',
            'pc_img' => 'Pc Img',
            'menu_img' => 'Menu Img',
            'menu_price' => 'Menu Price',
            'menu_introduce' => 'Menu Introduce',
            'menu_status' => 'Menu Status',
            'shop_id' => 'Shop ID',
            'series_id' => 'Series ID',
            'user_id' => 'User ID',
            'addtime' => 'Created At',
            'updtime' => 'Updated At',
        ];
    }
    /*查询门店*/
    public function getShop(){
        return $shop=Zssshop::find()->all();
    }
    /*查询菜品系列*/
    public function getSeries(){
        return $shop=Zssseries::find()->all();
    }
    /*菜品删除*/
    public function getMenudel()
    {
        //接值
        $request=\yii::$app->request;
        $menu_id=$request->get("menu_id");
        $menu=Zssmenu::find()->where(['menu_id'=>$menu_id])->all();
        return $menu[0]->delete();
    }
    /*菜品批量删除*/
    public function getMenudelpi()
    {
        //接值
        $request=\yii::$app->request;
        $menu_id=$request->get("id");
        $arr="delete from zss_menu where menu_id in ($menu_id)";
        return Yii::$app->db->createCommand($arr)->query();
    }
    /*菜品即点即改*/
    // public function getMgai()
    // {
    //     $request = \yii::$app->request;
    //     $id = $request->get("id");
    //     $new_name = $request->get("new_name");
    //     //echo $id."<br>".$new_name;
    //     $series = Zssseries::find()->where(['series_id' => $id])->one();
    //     //print_R($series);die;
    //     $series->series_name = $new_name;
    //     return $series->save();
    // }
    /*菜品修改*/
    public function getUpd()
    {
        //接值
        $request=\yii::$app->request;
        $menu_id=$request->get("menu_id");
        //echo $menu_id;die;
        return Zssmenu::find()->where(['menu_id'=>$menu_id])->asArray()->one();
    }
    public function getDoupd()
    {
        $request=\yii::$app->request;
        $time=time();
        $menu_id=$request->post("menu_id");
        $menu_name=$request->post("menu_name");
        $menu_price=$request->post("menu_price");
        $menu_introduce=$request->post("menu_introduce");
        $menu_status=$request->post("menu_status");
        $menu=Zssmenu::find()->where(['menu_id'=>$menu_id])->one();
        //print_R($menu);die;

        //接受图片名称
        $img = UploadedFile::getInstanceByName('menu_img');
        if($img==""){
            return "0";die;
        }else{
            $dir = $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/';
            //echo $dir;die;
            if(!is_dir($dir))
            {
                mkdir($dir);
            }
            $filename = rand(100000,999999);
            $file = $dir.$filename.".jpg";
            //echo $file;die;
            $menu_img=substr($file,32);
            //echo $menu_img;die;
            $status=$img->saveAs($file,true);
            $menu->menu_name=$menu_name;
            $menu->menu_price=$menu_price;
            $menu->menu_introduce=$menu_introduce;
            $menu->menu_status=$menu_status;
            $menu->menu_img=$menu_img;
            $menu->updtime=$time;
            $menu->series_id=$menu->series_id;
            return $menu->save();
        }
    }
    /*分页展示菜品列表*/
    public function getList()
    {
        $series=Zssseries::find()->all();
        $data['series']=$series;
        $query=Zssmenu::find()->with("zssseries")->with("zssshop")->asArray()->all();
        $data['menulist']=$query;
        return $data;
    }
    public function getMenuadd($data)
    {  
        $addtime=time();
        $session= \yii::$app->session;
        $session->open();
        $session->set("addtime",$addtime);
        $time=$session->get('addtime');
        /*图片上传*/
        $dir = isset($_REQUEST['dir']) ? $_REQUEST['dir'] : '';
        //接受图片名称
        $img = UploadedFile::getInstanceByName('menu_img');
        if($img==""){
            return "<script>alert('请选择图片');location.href='index.php?r=menu/add';</script>";die;
        }
        //echo $img;die;
        $dir = $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/';
        $thu_dir=$_SERVER['DOCUMENT_ROOT'].'/assets/uploads/thumb/';
        //echo $dir;die;
        if(!is_dir($dir))
        {
            mkdir($dir);
        }
        $filename = rand(100000,999999);
        $file = $dir.$filename.".jpg";
        //echo $file;die;
        $menu_img=substr($file,32);
        //echo $menu_img;die;
        /*缩略图开始*/
        //设置缩略图的文件名
        $thu_filename = rand(10000,99999); 
        $thu_file=$thu_dir."thu_".$thu_filename.".jpg";
        //echo $thu_file;die;
        $menu_wx=substr($thu_file,32);
        //echo $menu_wx;die;
        //上传原文件图片
        $status=$img->saveAs($file,true);
 
        //设置缩略图的宽高
        $thumbWi = 200;
        $thumbHe = 200;

        $im=imagecreatefromjpeg($file);  //原图的信息
        //echo $im;die;
        list($src_W,$src_H)=getimagesize($file);
        $tn = imagecreatetruecolor($thumbWi, $thumbHe); //创建缩略图
        //print_r($tn);die;
        imagecopyresampled($tn, $im, 0, 0, 0, 0, $thumbWi,$thumbHe, $src_W, $src_H); //复制图像并改变大小
        imagejpeg($tn,$thu_file); //图像生成
        /*缩略图结束*/
        $model=$this->menu_name=$data['menu_name'];
        $model=$this->menu_price=$data['menu_price'];
        $model=$this->menu_introduce=$data['menu_introduce'];
        $model=$this->menu_status=$data['menu_status'];
        $model=$this->shop_id=$data['menu_shop'];
        $model=$this->series_id=$data['menu_series'];
        $model=$this->menu_img=$menu_img;
        $model=$this->original_img=$menu_wx;
        $model=$this->addtime=$addtime;
        $model=$this->updtime=$addtime;
        return $this->save();
    }
	public function getZssorder(){
        return $this->hasOne(Zssorder::className(), ['menu_id' => 'menu_id']);
	}
	public function getZssseries()
    {
        return $this->hasOne(Zssseries::className(), ['series_id' => 'series_id']);
    }
    public function getZssshop()
    {
        return $this->hasOne(Zssshop::className(), ['shop_id' => 'shop_id']);
    }
    public function getZsscoupon()
    {
        return $this->hasOne(Zsscoupon::className(), ['coupon_id' => 'coupon_id']);
    }
}
