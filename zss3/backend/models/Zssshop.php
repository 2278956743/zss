<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "{{%zss_shop}}".
 *
 * @property integer $shop_id
 * @property string $shop_name
 * @property string $shop_phone
 * @property string $shop_address
 * @property string $shop_longitude
 * @property string $shop_latitude
 * @property integer $shop_open
 * @property integer $shop_over
 * @property integer $shop_opens
 * @property integer $shop_overs
 * @property integer $shop_type
 * @property integer $shop_status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Zssshop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_shop}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_longitude', 'shop_latitude'], 'number'],
            [['shop_open', 'shop_over', 'shop_opens', 'shop_overs', 'shop_type', 'shop_status', 'created_at', 'updated_at'], 'integer'],
            [['shop_name'], 'string', 'max' => 30],
            [['shop_phone'], 'string', 'max' => 15],
            [['shop_address'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_id' => '门店id',
            'shop_name' => '门店名称',
            'shop_phone' => '门店联系方式',
            'shop_address' => '门店地址',
            'shop_longitude' => '经度',
            'shop_latitude' => '纬度',
            'shop_open' => '外卖营业开放时间',
            'shop_over' => '外卖营业结束时间',
            'shop_opens' => '堂食/自取开放时间',
            'shop_overs' => '堂食/自取结束时间',
            'shop_type[]' => '门店支持类型',
            'shop_status' => '门店状态',
        ];
    }

    public function getZssviplog()
    {
        return $this->hasMany(Zssviplog::className(),['log_id'=>'log_id']);
    }

    /**
   *查询门店表
   */
    public function getsearch(){
        $re = Zssshop::find()->asArray()->all();
        // $pages = new Pagination(['totalCount' => $re->count(),'pageSize'=>'3']);
        // $models = $re->offset($pages->offset)
        //         ->limit($pages->limit)
        //         ->all();
        return $re;
    }
    /**
   *门店添加
   */
     public function getadd($res){
        //print_R($re);die;
        $created_at = time();
         $updated_at = time();
        $res['ZssshopForm']['created_at'] = $created_at;
        $res['ZssshopForm']['updated_at'] = $updated_at;
         unset($res['_csrf']);
         $str = '';
        for($i=0;$i<count($res['ZssshopForm']['shop_type']);$i++){

             $str.=','.$res['ZssshopForm']['shop_type'][$i];
        }
         $str = substr($str,1);
        $res['ZssshopForm']['shop_type'] = $str;
        $arr = $res['ZssshopForm'];
        //print_r($arr);die;
        $re = yii::$app->db->createCommand()->insert('zss_shop',$arr)->execute();
        return $re;
     }
    /**
   *删除
   */
    public function getdel($id){
        $re = Zssshop::deleteAll('shop_id='.$id);
        return $re;
    }
    /**
   *批量删除
   */
     public function getdelall($id){
        $re = Zssshop::deleteAll("shop_id in($id)");
        //echo $re;die;
        return $re;
    }
    /**
   *修改
   */
     public function getupt($id){
        $row = Zssshop::find()->where(['shop_id'=>"$id"])->all();
        return $row;
    }
    /**
   *修改是否成功
   */
     public function getupt_pro($data){
		if(empty($data['shop_type'])){
			//unset($data['shop_type']);
			unset($data['_csrf']);
			$shop_id = $data['shop_id'];
			$row = Zssshop::updateAll($data,array('shop_id'=>$shop_id));
			return $row;
		}else{
			$str = '';
			for($i=0;$i<count($data['shop_type']);$i++){

             $str.=','.$data['shop_type'][$i];
        }
			 $str = substr($str,1);
			$data['shop_type'] = $str;
			unset($data['_csrf']);
			//print_R($data);die;
			$shop_id = $data['shop_id'];
			$row = Zssshop::updateAll($data,array('shop_id'=>$shop_id));
			return $row;
		}

    }
     /**
   *按时间查询
   */
    public function getsearchall($starttime,$endtime){
        $data['created_at']=strtotime($starttime);
        $data['updated_at']=strtotime($endtime);
        $rows = Zssshop::find()
        ->where(['between','created_at',$data['created_at'],$data['updated_at']])
         ->all();
       return $rows;

    }
}
