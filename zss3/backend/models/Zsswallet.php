<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%zss_wallet}}".
 *
 * @property integer $wallet_id
 * @property string $wallet_name
 * @property integer $wallet_is_price
 * @property string $wallet_price
 * @property string $wallet_share_price
 * @property string $wallet_shares_price
 * @property integer $wallet_show
 * @property string $wallet_template
 * @property integer $created_at
 * @property integer $updated_at
 */
class Zsswallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_wallet}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wallet_is_price', 'wallet_show', 'created_at', 'updated_at'], 'integer'],
            [['wallet_price', 'wallet_share_price', 'wallet_shares_price'], 'number'],
            [['wallet_name'], 'string', 'max' => 50],
            [['wallet_template'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wallet_id' => 'Wallet ID',
            'wallet_name' => 'Wallet Name',
            'wallet_is_price' => 'Wallet Is Price',
            'wallet_price' => 'Wallet Price',
            'wallet_share_price' => 'Wallet Share Price',
            'wallet_shares_price' => 'Wallet Shares Price',
            'wallet_show' => 'Wallet Show',
            'wallet_template' => 'Wallet Template',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function redselect(){

                  $query = Zsswallet::find()->asArray();

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
     public function reddel($wallet_id){

        $result =Zsswallet::find()->where(['wallet_id'=>$wallet_id])->all();
            $aa = $result[0]->delete();
            if($aa ){
                return "ok";
            }else{
               return "no";
            }
     }
     public function redadd($data ){
        //红包添加
          $re =  Yii::$app->db->createCommand()->insert('zss_wallet',$data)->execute();
             return $re;
     }
     public function upd($wallet_id){
            //根据红包ID查询红包信息
            $red_info  = Zsswallet::find()->where(['wallet_id'=>$wallet_id])->asArray()->all();
            return $red_info;
     }
     public function re_upd($data){
        //根据红包数据修改红包信息
        $re = new Zsswallet();
        $resu = $re->updateAll($data,'wallet_id=:wallet_id',array(":wallet_id"=>$data['wallet_id']));
        return $resu;
     }
	   public function reddelall($data){
    
            $res=Zsswallet::deleteAll("wallet_id in ($data)");

                return $res;
    }
}
