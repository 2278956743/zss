<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_vip}}".
 *
 * @property integer $vip_id
 * @property string $vip_name
 * @property integer $vip_discount
 * @property string $vip_price
 * @property string $vip_subtract
 * @property integer $gift_id
 * @property integer $user_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $vip_integral
 * @property integer $company_id
 */
class Zssvip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_vip}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vip_discount', 'gift_id', 'user_status', 'created_at', 'updated_at', 'vip_integral', 'company_id'], 'integer'],
            [['vip_name'], 'string', 'max' => 30],
            [['vip_price', 'vip_subtract'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vip_id' => 'Vip ID',
            'vip_name' => 'Vip Name',
            'vip_discount' => 'Vip Discount',
            'vip_price' => 'Vip Price',
            'vip_subtract' => 'Vip Subtract',
            'gift_id' => 'Gift ID',
            'user_status' => 'User Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'vip_integral' => 'Vip Integral',
            'company_id' => 'Company ID',
        ];
    }
    //引入相关联的表
    public function getZssgift()
    {
        return $this->hasMany(Zssgift::className(), ['gift_id' => 'gift_id']);
    }
    public function getZsscompany()
    {
        return $this->hasMany(Zsscompany::className(),['company_id' => 'company_id']);
    }
     /**
     * memberlevel_sel  等级查询
     */
    public function memberlevel_sel()
    {
        return $this->find()->with('zssgift')->asArray()->all();
    }
    /**
     * vip_update 会员等级修改
     */
    public function vip_update($vip_id)
    {
        return $this->find()->with('zssgift')->where(['vip_id' => $vip_id])->orderBy('created_at desc')->asArray()->all();
    }
    /**
     * vip_update_do 执行会员等级修改
     */
    public function vip_update_do($data)
    {
        $vip_id = $data['vip_id'];

        $model = $this->find()->where(['vip_id' => $vip_id])->one();
       
        $model->user_status = $data['user_status'];
        
        $model->vip_id = $data['vip_id'];
        
        $model->vip_price = $data['vip_price'];
        
        $model->gift_id = $data['gift_id'];
        
        $model->vip_discount = $data['vip_discount'];
        
        $model->vip_subtract = $data['vip_subtract1'].",".$data['vip_subtract2'];
        
        $model->updated_at = time();
        
        return $model->save();
    }

    public function user_int($vip_id)
    {
        return $this->find()->where(['vip_id' => $vip_id])->asArray()->all();
    }

    /**
     * vip名称修改
     * @param  [type] $vip_name [description]
     * @param  [type] $vip_id   [description]
     * @return [type]           [description]
     */
    public function vip_name_up($vip_name,$vip_id)
    {

        $model = $this->find()->where(['vip_id' => $vip_id])->one();
       
        $model->vip_name = $vip_name;
        $model->updated_at = time();
        return $model->save();
    }

    /**
     * vip积分修改
     * @param  [type] $vip_integral [description]
     * @param  [type] $vip_id       [description]
     * @return [type]               [description]
     */
    public function vip_integral_up($vip_integral,$vip_id)
    {
        $model = $this->find()->where(['vip_id' => $vip_id])->one();
       
        $model->vip_integral = $vip_integral;
        $model->updated_at = time();
        return $model->save();
    }

    /**
     * vip折扣修改
     * @param  [type] $vip_discount [description]
     * @param  [type] $vip_id       [description]
     * @return [type]               [description]
     */
    public function vip_discount_up($vip_discount,$vip_id)
    {
        $model = $this->find()->where(['vip_id' => $vip_id])->one();
       
        $model->vip_discount = $vip_discount;
        $model->updated_at = time();
        return $model->save();
    }

    /**
     * 状态修改
     * @param  [type] $user_status [description]
     * @param  [type] $vip_id      [description]
     * @return [type]              [description]
     */
    public function user_status_up($user_status,$vip_id)
    {
        $model = $this->find()->where(['vip_id' => $vip_id])->one();
       
        $model->user_status = $user_status;
        $model->updated_at = time();
        return $model->save();
    }


    public function vip_sel($vip_id)
    {
        return $this->find()->where(['vip_id' => $vip_id])->with("zssgift")->with("zsscompany")->asArray()->all();
    }
}
