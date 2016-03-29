<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
use backend\models\Zsszengpin;
/**
 * This is the model class for table "{{%zss_add}}".
 *
 * @property integer $add_id
 * @property integer $shop_id
 * @property string $add_price
 * @property integer $gift_id
 * @property integer $add_show
 * @property integer $add_status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Zssadd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_add}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'gift_id', 'add_show', 'add_status', 'created_at', 'updated_at'], 'integer'],
            [['add_price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'add_id' => 'Add ID',
            'shop_id' => 'Shop ID',
            'add_price' => 'Add Price',
            'gift_id' => 'Gift ID',
            'add_show' => 'Add Show',
            'add_status' => 'Add Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
	
	 public function add_del_all($data){
    
            $res=Zssadd::deleteAll("add_id in ($data)");

                return $res;
    }
}
