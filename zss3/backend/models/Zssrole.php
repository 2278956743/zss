<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_role}}".
 *
 * @property integer $role_id
 * @property string $role_name
 * @property integer $role_status
 * @property string $role_desc
 */
class Zssrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_status'], 'integer'],
            [['role_name'], 'string', 'max' => 20],
            [['role_desc'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_status' => 'Role Status',
            'role_desc' => 'Role Desc',
        ];
    }
}
