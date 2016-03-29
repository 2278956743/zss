<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_order_info}}".
 *
 * @property integer $info_id
 * @property integer $order_id
 * @property integer $course_id
 * @property integer $menu_num
 * @property string $menu_price
 * @property integer $created_at
 */
class Zssorderinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_order_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'course_id', 'menu_num', 'created_at'], 'integer'],
            [['menu_price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'order_id' => 'Order ID',
            'course_id' => 'Course ID',
            'menu_num' => 'Menu Num',
            'menu_price' => 'Menu Price',
            'created_at' => 'Created At',
        ];
    }
    //¹ØÁªorder±í(zss_order.order_id=zss_order_info.order_id)
    public function getZssorderinfo()
    {
        return $this->hasOne(Zssorderinfo::className(), ['order_id' => 'order_id']);
    }
}
