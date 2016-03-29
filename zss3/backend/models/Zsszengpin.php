<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zss_zengpin}}".
 *
 * @property integer $zengpin_id
 * @property string $zengpin_name
 */
class Zsszengpin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_zengpin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zengpin_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zengpin_id' => 'Zengpin ID',
            'zengpin_name' => 'Zengpin Name',
        ];
    }
     public function getZssadd()
    {
        return $this->hasOne(Zssadd::className(), ['add_id' => 'add_id']);
    }
    public function getZsszengpin()
    {
        return $this->hasOne(Zsszengpin::className(), ['zengpin_id' => 'zengpin_id']);
    }
    public function moresel(){

        $query=Zssadd::find()->with("zsszengpin");
            //分页(小部件)
         $pagination = new Pagination([
             'defaultPageSize' => 3,
              'totalCount' => $query->count(),
        ]);

        $countries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            
            ->all();
            for($i=0;$i<count($countries);$i++){
                                $countries[$i]['created_at']=date('Y-m-d H:i:s', $countries[$i]['created_at']);
                                $countries[$i]['updated_at']=date('Y-m-d H:i:s',$countries[$i]['updated_at']);
                            
                            }
                            
            $data['countries'] = $countries;
            $data['pagination'] = $pagination;
            return $data;
    }
    public function moreadd($data){

        $re=Yii::$app->db->createCommand()->insert('zss_add',$data)->execute();
        return $re;
    }
    public function moreupd($add_id){
            $data['info'] = Zssadd::find()->where(['add_id'=>$add_id])->asArray()->all();

             $data['zenginfo'] = Zsszengpin::find()->asArray()->all();
             return $data;
    }
    public function moreupdrk($add_id,$data){

        $re=new Zssadd;
            $res=$re->updateAll($data,'add_id=:add_id',array(":add_id"=>$add_id));
                return $res;
    }
}
