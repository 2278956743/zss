<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_gift}}".
 *
 * @property integer $gift_id
 * @property string $gift_name
 * @property string $gift_price
 * @property integer $gift_sum
 */
class Zssgift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_gift}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gift_price'], 'number'],
            [['gift_sum'], 'integer'],
            [['gift_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gift_id' => 'Gift ID',
            'gift_name' => 'Gift Name',
            'gift_price' => 'Gift Price',
            'gift_sum' => 'Gift Sum',
        ];
    }
    public function getZssvip()
    {
        return $this->hasOne(Zssvip::className(), ['vip_id' => 'vip_id']);
    }
    /**
     * gift_sel 赠品查询
     */
    public function gift_sel()
    {
        return $this->find()->asArray()->all();
    }
}
