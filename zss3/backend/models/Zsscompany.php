<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_company}}".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property integer $company_discount
 * @property string $company_price
 * @property string $company_subtract
 * @property integer $menu_id
 * @property integer $user_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $gift_id
 */
class Zsscompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_discount', 'menu_id', 'user_status', 'created_at', 'updated_at', 'gift_id'], 'integer'],
            [['company_name', 'company_price', 'company_subtract'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_discount' => 'Company Discount',
            'company_price' => 'Company Price',
            'company_subtract' => 'Company Subtract',
            'menu_id' => 'Menu ID',
            'user_status' => 'User Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'gift_id' => 'Gift ID',
        ];
    }
      //引入相关联的表
    public function getZssuser()
    {

        return $this->hasMany(Zssuser::className(), ['user_id' => 'user_id']);
    
    }

    public function getZssgift()
    {

        return $this->hasMany(Zssgift::className(), ['gift_id' => 'gift_id']);
    
    }


    /**
     * 合伙人查询
     * @return [type] [description]
     */
    public function memberpartner_sel()
    {

        return $this->find()->asArray()->all();
    
    }

    /**
     * 修改合伙人
     * @param  [type] $company_id [description]
     * @return [type]             [description]
     */
    public function company_up($company_id)
    {

        return $this->find( )->with('zssgift')->where(['company_id' => $company_id])->orderBy('created_at desc')->asArray()->all();
    
    }

    /**
     * 执行修改
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function company_up_do($data)
    {
        
        $model = $this->find()->where(['company_id' => $data['company_id']])->one();
        
        $model->company_price = $data['company_price'];
        
        $model->company_subtract = $data['company_subtract1'].','.$data['company_subtract2'];
        
        $model->company_discount = $data['company_discount'];
        
        $model->gift_id = $data['gift_id'];
        
        $model->user_status = $data['user_status'];
        
        $model->updated_at = time();
        
        return $model->save();
    }
    /**
     * 删除合伙人
     * @param  [type] $company_id [description]
     * @return [type]             [description]
     */
    public function company_del($company_id)
    {
        return $this->deleteAll("company_id = $company_id");
    }
    /**
     * 添加合伙人
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function company_add($data)
    {
        
        $model = $this->company_name = $data['company_name'];
        
        $model = $this->company_discount = $data['company_discount'];
        
        $model = $this->company_price = $data['company_price'];
        
        $model = $this->company_subtract = $data['company_subtract1'].','.$data['company_subtract2'];
        
        $model = $this->created_at = time();
        
        $model = $this->updated_at = time();
        
        return $this->save();
    
    }

    /**
     * 合伙人名称修改
     * @param  [type] $company_name [description]
     * @param  [type] $comapny_id   [description]
     * @return [type]               [description]
     */
    public function company_name_up($company_name,$comapny_id)
    {
        $model = $this->find()->where(['company_id' => $comapny_id])->one();

        $model->company_name = $company_name;
        
        $model->updated_at = time();
        
        return $model->save();
    }


    public function company_sel($company_id)
    {

        return $this->find()->with("zssgift")->where(['company_id' => $company_id])->asArray()->all();

    }
}
