<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_group}}".
 *
 * @property integer $group_id
 * @property string $group_name
 * @property integer $created_time
 * @property integer $updated_time
 */
class Zssgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_time', 'updated_time'], 'integer'],
            [['group_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_name' => 'Group Name',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
    public function getZsscarousel(){

        return $this->hasMany(Zsscarousel::className(), ['group_id' => 'group_id']);
    }
    /**
    *轮播组列表
    */
    public function glist($group_id){
       $arr = $this->find()->with('zsscarousel')->where(['group_id' => $group_id])->asArray()->all();
        return $arr;
    }
    /**
    *添加
    */
    public function gadd($data){
        $data['group_addtime'] = time();
        unset($data[' _csrf']);
        $res = yii::$app->db->createCommand()->insert('zss_group',$data)->execute();
        return $res;
    }
    /**
    *修改
    */
    // public function gupt($carousel_id){
    //     echo $carousel_id;die;
    //     $arr = $this->find()->with('zsscarousel')->where(['group_id' => $group_id])->asArray()->all();

    // }
    /**
    *轮播组修改是否成功
    */
    public function guptpro($data){
        unset($data['_csrf']);
        $group_id=$data['group_id'];
        return $this->updateAll($data,"group_id=$group_id");
    }
}
