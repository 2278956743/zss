<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_admin_user}}".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_password
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_lastlogin
 * @property string $user_lastip
 * @property integer $user_status
 */
class Zssadminuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_admin_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'user_lastlogin', 'user_status'], 'integer'],
            [['user_name'], 'string', 'max' => 30],
            [['user_email'], 'string', 'max' => 50],
            [['user_phone'], 'string', 'max' => 11],
            [['user_password'], 'string', 'max' => 32],
            [['user_lastip'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'user_phone' => 'User Phone',
            'user_password' => 'User Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_lastlogin' => 'User Lastlogin',
            'user_lastip' => 'User Lastip',
            'user_status' => 'User Status',
        ];
    }
    public function getZssseries()
    {
        return $this->hasOne(Zssseries::className(), ['series_id' => 'series_id']);
    }
}
