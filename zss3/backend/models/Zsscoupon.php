<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
use backend\models\Zssseries;
/**
 * This is the model class for table "{{%zss_coupon}}".
 *
 * @property integer $coupon_id
 * @property string $coupon_name
 * @property string $coupon_price
 * @property integer $menu_id
 * @property integer $shop_id
 * @property integer $add_show
 * @property integer $add_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $end_at
 */
class Zsscoupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_coupon}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_price'], 'number'],
            [['menu_id', 'shop_id', 'add_show', 'add_status', 'created_at', 'updated_at', 'end_at'], 'integer'],
            [['coupon_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coupon_id' => 'Coupon ID',
            'coupon_name' => 'Coupon Name',
            'coupon_price' => 'Coupon Price',
            'menu_id' => 'Menu ID',
            'shop_id' => 'Shop ID',
            'add_show' => 'Add Show',
            'add_status' => 'Add Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'end_at' => 'End At',
        ];
    }

      public function getZssseries()
    {
        return $this->hasOne(Zssseries::className(), ['series_id' => 'series_id']);
    }

    public function couponsel(){

        $query=Zsscoupon::find()->with("zssseries");
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
                                $countries[$i]['end_at']=date('Y-m-d H:i:s',$countries[$i]['end_at']);
                            }
        $zenginfo = Zssseries::find()->asArray()->all();
        $data['countries'] = $countries ;
        $data['pagination'] = $pagination;
        $data['zenginfo'] = $zenginfo;
        return $data;
    }
	
	public function coupon_del_all($data){

        $re = Zsscoupon::deleteAll("coupon_id in ($data)");
        return $re;
    }
}
