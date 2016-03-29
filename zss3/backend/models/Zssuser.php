<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_user}}".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_phone
 * @property string $user_password
 * @property string $user_price
 * @property string $user_integral
 * @property string $user_sex
 * @property integer $vip_id
 * @property integer $company_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_lastlogin
 * @property string $user_lastip
 * @property integer $user_status
 */
class Zssuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_price', 'user_integral'], 'number'],
            [['vip_id', 'company_id', 'created_at', 'updated_at', 'user_lastlogin', 'user_status'], 'integer'],
            [['user_name'], 'string', 'max' => 30],
            [['user_phone'], 'string', 'max' => 11],
            [['user_password'], 'string', 'max' => 32],
            [['user_sex'], 'string', 'max' => 2],
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
            'user_phone' => 'User Phone',
            'user_password' => 'User Password',
            'user_price' => 'User Price',
            'user_integral' => 'User Integral',
            'user_sex' => 'User Sex',
            'vip_id' => 'Vip ID',
            'company_id' => 'Company ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_lastlogin' => 'User Lastlogin',
            'user_lastip' => 'User Lastip',
            'user_status' => 'User Status',
        ];
    }
     //引入相关联的表
    public function getZsscompany()
    {
        return $this->hasMany(Zsscompany::className(), ['company_id' => 'company_id']);
    }
    public function getZssorder()
    {
        return $this->hasMany(Zssorder::className(), ['order_id' => 'order_id']);
    }
    public function getZssshop()
    {
        return $this->hasMany(Zssshop::className(),['shop_id'=>'shop_id']);
    }
    public function getZssviplog()
    {
        return $this->hasMany(Zssviplog::className(),['log_id' => 'log_id']);
    }
    public function getZssvip()
    {
        return $this->hasMany(Zssvip::className(),['vip_id' => 'vip_id']);
    }

    /**
     * 查询合伙人
     * @return [type] [description]
     */
    public function company_sel()
    {
        return $this->find()->with('zsscompany')->asArray()->all();
    }

    /**
     * 查询用户表
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function user_sel($data)
    {
        return $this->find()->where(['user_id' => $data['user_id']])->asArray()->all();
    }


    public function user_vip($data)
    {
        return $this->find()->with("zssvip")->with('zsscompany')->where(['user_id' => $data['user_id']])->asArray()->all();
    }

    /**
     * zss_pay_type 调用充值信息model
     */
    public function getZsspaytype()
    {
        return $this->hasMany(Zsspaytype::className(),['pay_id' => 'pay_id']);
    }
    /**
     * Zsspaylog 充值信息
     */
    public function getZsspaylog()
    {
        return $this->hasMany(Zsspaylog::className(),['pay_log_id' => 'pay_log_id']);
    }

    /**
     *user_update_do   执行修改
     */
    public function user_update_do($data)
    {
        $model = Zssuser::find()->where(['user_id' => $data['user_id']])->one();

        $model->user_id = $data['user_id'];

        $model->user_price = $data['user_price'];

        $model->user_integral = $data['user_integral'];

        $model->updated_at = time();

        return $model->save();
    }
    /**
     * vippay_user_log_type 充值记录查询
     */
    public function vippay_user_log_type($user_id)
    {
        return $this->find()->with('zsspaylog')->with('zsspaytype')->where(["user_id" =>$user_id])->orderBy('created_at desc')->asArray()->all();
    }


    public function user_up($new_price,$user_id)
    {
        $model = Zssuser::find()->where(['user_id' => $user_id])->one();

        $model->user_price = $new_price;

        $model->updated_at = time();

        return $model->save();
    }

    public function user_up_int($new_integral,$user_id)
    {
        $model = Zssuser::find()->where(['user_id' => $user_id])->one();

        $model->new_integral = $new_integral;
        
        $model->updated_at = time();

        return $model->save();
    }
}
