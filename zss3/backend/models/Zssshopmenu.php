<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_shop_menu}}".
 *
 * @property integer $menu_id
 * @property integer $shop_id
 */
class Zssshopmenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_shop_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id'], 'required'],
            [['menu_id', 'shop_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'shop_id' => 'Shop ID',
        ];
    }
}
