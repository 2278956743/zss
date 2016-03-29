<?php

namespace backend\models;
use yii\data\Pagination;
use Yii;

/**
 * This is the model class for table "{{%zss_subtract}}".
 *
 * @property integer $subtract_id
 * @property integer $shop_id
 * @property integer $menu_id
 * @property string $subtract_price
 * @property string $subtract_subtract
 * @property integer $subtract_show
 * @property integer $discount_status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Zsssubtract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_subtract}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'menu_id', 'subtract_show', 'discount_status', 'created_at', 'updated_at'], 'integer'],
            [['subtract_price', 'subtract_subtract'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subtract_id' => 'Subtract ID',
            'shop_id' => 'Shop ID',
            'menu_id' => 'Menu ID',
            'subtract_price' => 'Subtract Price',
            'subtract_subtract' => 'Subtract Subtract',
            'subtract_show' => 'Subtract Show',
            'discount_status' => 'Discount Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
      public function lesssel(){

         $query = Zsssubtract::find()->asArray();

                    $pages = new Pagination(['totalCount' => $query->count(),'pageSize'=>'3']);
                         $models = $query->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all();
                          
                            for($i=0;$i<count($models);$i++){
                                $models[$i]['created_at']=date('Y-m-d H:i:s', $models[$i]['created_at']);
                                $models[$i]['updated_at']=date('Y-m-d H:i:s',$models[$i]['updated_at']);
                            
                            }
                         $red_info['models'] = $models;
                         $red_info['pages'] = $pages;
                         return $red_info;

    }
    public function lessupdrk($subtract_id,$data){
               $re=new Zsssubtract;
            $res=$re->updateAll($data,'subtract_id=:subtract_id',array(":subtract_id"=>$subtract_id));
        return $res;



    }


    public function lessdel($subtract_id){

        $result =Zsssubtract::find()->where(['subtract_id'=>$subtract_id])->all();

        
            $aa = $result[0]->delete();
            return $aa ; 

    }
      public function less_del_all($data){

            $le = Zsssubtract::deleteAll("subtract_id in ($data)");
                return $re ;
        }
}
