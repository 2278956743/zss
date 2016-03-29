<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%zss_carousel}}".
 *
 * @property integer $carousel_id
 * @property integer $group_id
 * @property string $carousel_img
 * @property string $carousel_title
 * @property string $carousel_desc
 */
class Zsscarousel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_carousel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['carousel_img'], 'string', 'max' => 200],
            [['carousel_title', 'carousel_desc'], 'string', 'max' => 50],
            [['carousel_title', 'carousel_desc'], 'requierd', 'message' =>'不能为空'],
            //验证图片标题的唯一性
            ['carousel_title', 'unique', 'targetClass' => '\backend\models\Zsscarousel', 'message' => '图片标题已存在']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'carousel_id' => 'Carousel ID',
            'group_id' => 'Group ID',
            'carousel_img' => 'Carousel Img',
            'carousel_title' => 'Carousel Title',
            'carousel_desc' => 'Carousel Desc',
        ];
    }
     public function getZssgroup(){

        return $this->hasMany(Zssgroup::className(), ['group_id' => 'group_id']);
    }
    /**
    *轮播图列表
    */
    public function getSearch(){
        $re=Zsscarousel::find()->with('zssgroup')->asArray();
        $pages = new Pagination(['totalCount' => $re->count(),'pageSize'=>'2']);
        //echo $pages;die;
		$res=Zssgroup::find()->asArray()->all();
        $models = $re->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
		//print_R($models);die;
       return array( 'models' => $models,'res'=>$res,'pages' => $pages,);          
                 
    }
    /**
    *图片上传
    */
     public function getUpload($data){
        unset($data['_csrf']);
        $dir = $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/';
            if(!is_dir($dir))
            {
                mkdir($dir);
            }
        $filename = rand(100000,999999);
        $file = $dir.$filename.".jpg";
		//echo $file;die;
        $carousel_img=substr($file,48);
        $data['carousel_img']->saveAs($file,true);
        $data['carousel_img']=$carousel_img;
        $re = yii::$app->db->createCommand()->insert('zss_carousel',$data)->execute();
        return $re;

      }
    /**
    *删除
    */
    public function del($carousel_id){
          $re = Zsscarousel::findOne($carousel_id)->delete();
          return $re;
                 
    }
    /**
    *修改
    */
    public function upt($carousel_id){
        $re = Zsscarousel::find()->where("carousel_id=$carousel_id")->all();
        return $re;
                 
    }
     /**
    *修改是否成功
    */
     public function uptpro($data){
         unset($data['_csrf']);
        $dir = $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/';
            if(!is_dir($dir))
            {
                mkdir($dir);
        }
        $filename = rand(100000,999999);
        $file = $dir.$filename.".jpg";
        $carousel_img=substr($file,48);
        $data['carousel_img']->saveAs($file,true);
        $data['carousel_img']=$carousel_img;
        $id=$data['carousel_id'];
        $res=Zsscarousel::updateAll($data,"carousel_id=$id");
        return array('res'=>$res,'file'=>$file);             
    }
}
