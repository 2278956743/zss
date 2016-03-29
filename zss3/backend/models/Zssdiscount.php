<?php

namespace backend\models;
use yii\data\Pagination;
use Yii;

/**
 * This is the model class for table "{{%zss_discount}}".
 *
 * @property integer $discount_id
 * @property integer $discount_num
 * @property integer $discount_show
 * @property integer $discount_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $shop_id
 */
class Zssdiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_discount}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount_num', 'discount_show', 'discount_status', 'created_at', 'updated_at', 'shop_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'discount_id' => 'Discount ID',
            'discount_num' => 'Discount Num',
            'discount_show' => 'Discount Show',
            'discount_status' => 'Discount Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'shop_id' => 'Shop ID',
        ];
    }

    public function dissel (){
        //折扣信息查询
         $query = Zssdiscount::find()->asArray();

            $pages = new Pagination(['totalCount' => $query->count(),'pageSize'=>'3']);
                         $models = $query->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all();
                        for($i=0;$i<count($models);$i++){
                                $models[$i]['created_at']=date('Y-m-d H:i:s', $models[$i]['created_at']);
                                $models[$i]['updated_at']=date('Y-m-d H:i:s',$models[$i]['updated_at']);
                            
                            }
                            $data['pages'] = $pages;
                            $data['models'] = $models; 
             //返回折扣信息
                  return  $data ;
    }
    public function disadd($data){
            //折扣添加
          $re=Yii::$app->db->createCommand()->insert('zss_discount',$data)->execute();
                  return $re;
 }

    public function disdel($discount_id){
            $result =Zssdiscount::find()->where(['discount_id'=>$discount_id])->all();
                $aa = $result[0]->delete();
                return $aa ; 
    }
    public function disupdrk($discount_id,$data){
        $re=new Zssdiscount();
      $res=$re->updateAll($data,'discount_id=:discount_id',array(":discount_id"=>$discount_id));
        return $res;
    }
	
	 public function discount_del_all($data){

        $re = Zssdiscount::deleteAll("discount_id in ($data)");
      return $re ;
    }

}
