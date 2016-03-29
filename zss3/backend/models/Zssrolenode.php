<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_role_node}}".
 *
 * @property integer $role_id
 * @property integer $node_id
 */
class Zssrolenode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_role_node}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'node_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'node_id' => 'Node ID',
        ];
    }
}
