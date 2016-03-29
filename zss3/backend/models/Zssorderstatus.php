<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_order_status}}".
 *
 * @property integer $status_id
 * @property string $status_name
 */
class Zssorderstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_order_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_name' => 'Status Name',
        ];
    }
    /**
    *  查询订单状态
    */
    public function Orderstatus()
    {
        return $this->find()->all();
    }
}
