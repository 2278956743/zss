<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_pay_type}}".
 *
 * @property integer $pay_id
 * @property string $pay_name
 */
class Zsspaytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_pay_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pay_id' => 'Pay ID',
            'pay_name' => 'Pay Name',
        ];
    }
     /**
     *Zsspaylog 充值信息
     *
     */
    public function Zsspaylog()
    {
        return $this -> hasMany(Zsspaylog::className(),['pay_log_id' => 'pay_log_id']);
    }
    /**
    *  支付方式
    */
    public function Paytype()
    {
        return $this->find()->all();
    }
}
