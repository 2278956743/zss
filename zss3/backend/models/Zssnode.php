<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_node}}".
 *
 * @property integer $node_id
 * @property string $node_name
 * @property integer $node_status
 * @property string $node_desc
 * @property integer $node_pid
 * @property string $node_action
 */
class Zssnode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_node}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_status', 'node_pid'], 'integer'],
            [['node_name', 'node_action'], 'string', 'max' => 20],
            [['node_desc'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_id' => 'Node ID',
            'node_name' => 'Node Name',
            'node_status' => 'Node Status',
            'node_desc' => 'Node Desc',
            'node_pid' => 'Node Pid',
            'node_action' => 'Node Action',
        ];
    }
}
