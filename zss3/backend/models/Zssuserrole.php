<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_user_role}}".
 *
 * @property integer $user_id
 * @property integer $role_id
 */
class Zssuserrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_user_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'role_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
        ];
    }
}
