<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_vip_log}}".
 *
 * @property integer $log_id
 * @property integer $user_id
 * @property integer $order_id
 * @property integer $shop_id
 * @property integer $created_at
 */
class Zssviplog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_vip_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_id', 'shop_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'shop_id' => 'Shop ID',
            'created_at' => 'Created At',
        ];
    }
    //引入相关联的表
    public function getZssuser()
    {
        return $this->hasMany(Zssuser::className(), ['user_id' => 'user_id']);
    }
    //引入相关联的表
    public function getZsscompany()
    {
        return $this->hasMany(Zsscompany::className(), ['company_id' => 'company_id']);
    }
    public function getZssorder()
    {
        return $this->hasMany(Zssorder::className(), ['order_id' => 'order_id']);
    }
    public function getZssshop()
    {
        return $this->hasMany(Zssshop::className(),['shop_id'=>'shop_id']);
    }
     /**
     * viplog  会员消费记录查询
     */
    public function viplog_sel($user_id)
    {
        return $this->find()->with("zssuser")->with("zssorder")->with("zssshop")->where("user_id='$user_id'")->asArray()->all();
    }
    /**
     * 查询消费记录
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function user_vip_log_sel($data)
    {
        return $this->find()->with("zssuser")->with("zssorder")->with("zssshop")->where(['user_id' => $data['user_id']])->orderBy('created_at desc')->limit('3')->asArray()->all();
    }
}
