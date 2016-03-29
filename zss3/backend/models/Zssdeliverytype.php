<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_delivery_type}}".
 *
 * @property integer $delivery_id
 * @property string $delivery_name
 */
class Zssdeliverytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_delivery_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'delivery_id' => 'Delivery ID',
            'delivery_name' => 'Delivery Name',
        ];
    }
    /**
    * 派送类型
    */ 
    public function Deliverytype()
    {
        return $this->find()->all();
    }
}
