<?php

namespace backend\models;
use Yii;
use common\models\User;
use yii\di\Container;
use yii\backend\models\Zssshop;
use yii\base\Model;
use yii\validators\Validator;
class ZssshopForm extends Model
{

 public $shop_name;
 public $shop_phone;
 public $shop_address;
 public $shop_longitude;
 public $shop_latitude;
 public $shop_open;
 public $shop_over;
 public $shop_opens;
 public $shop_overs;
 public $shop_type;
 public $shop_status;
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
            
          
            [['shop_open', 'shop_over', 'shop_opens', 'shop_overs'], 'required','message'=>"不能为空"],
          
            [['shop_name'], 'string', 'max' => 30,"message"=>"你的格式不对"],
            [['shop_name'], 'required',"message"=>"门店名称不能超过30个中文"],
            ['shop_name', 'unique', 'targetClass' => '\backend\models\Zssshop', 'message' => '店名已存在'],
            [['shop_phone'], 'string', 'max' => 15,"message"=>"最大15位"],
            [['shop_phone'], 'required',"message"=>"请填写正确的联系方式"],
            [['shop_address'], 'string', 'max' => 50,"message"=>"你的格式不对"],
            [['shop_address'], 'required',"message"=>"请填写正确的门店地址"],
            [['shop_longitude', 'shop_latitude'], 'number',"message"=>"必须是数字"],
            [['shop_longitude', 'shop_latitude'], 'required',"message"=>"不能为空"],
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
            'shop_type' => '门店支持类型',
            'shop_status' => '门店状态',
        ];
    }
    
}
