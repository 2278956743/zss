<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_pay_log}}".
 *
 * @property integer $log_id
 * @property integer $user_id
 * @property integer $log_type
 * @property string $log_price
 * @property string $log_give_price
 * @property integer $created_at
 */
class Zsspaylog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_pay_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'log_type', 'created_at'], 'integer'],
            [['log_price', 'log_give_price'], 'number']
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
            'log_type' => 'Log Type',
            'log_price' => 'Log Price',
            'log_give_price' => 'Log Give Price',
            'created_at' => 'Created At',
        ];
    }
    /**
     *Zssuser用户信息
     */
    public function getZssuser()
    {
        return $this->hasMany(Zssuser::className(),['user_id' => 'user_id']);
    }

    /**
     * Zsspaylog 充值信息
     */
    public function getZsspaylog()
    {
        return $this->hasMany(Zsspaylog::className(),['pay_log_id' => 'pay_log_id']);
    }

    /**
     * 支付类型信息
     */

    public function getZsspaytype()
    {
        return $this->hasMany(Zsspaytype::className(),['pay_id' => 'pay_id']);
    }
    /**
     * 查询充值记录
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function user_vip_pay_sel($data)
    {
        return $this->find()->with('zssuser')->with('zsspaytype')->where(['user_id' => $data['user_id']])->orderBy("pay_created_at desc")->limit("3")->asArray()->all();
    }
    public function vippay_user_log_type($user_id)
    {
      return $this->find()->with('zssuser')->with('zsspaytype')->where(["user_id" =>$user_id])->orderBy('pay_created_at desc')->asArray()->all();
    }
}
