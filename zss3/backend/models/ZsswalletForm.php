<?php
namespace backend\models;
use Yii\base\Model;
use Yii;
use yii\data\Pagination;
use yii\validators\Validator;
use backend\models\Zsswallet;

class ZsswalletForm extends \yii\base\Model
{

    public $wallet_name;
    public $wallet_shares_price;
    public $wallet_price;
    public $wallet_share_price;

 public static function tableName()
    {
        return '{{%zss_wallet}}';
    }
   public function attributeLabels()
    {
        return [
            'wallet_id' => 'Wallet ID',
            'wallet_name' => '名称',
            'wallet_is_price' => '是否限定金额',
            'wallet_price' => '红包金额',
            'wallet_share_price' => '分享者得到的金钱',
            'wallet_shares_price' => '被分享者得到金钱',
            'wallet_show' => '是否显示',
            'wallet_template' => '红包模板',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
    public function rules()
    {
        return [

         	  [['wallet_name'], 'required', 'message' => '名称不能为空'],   // 在这里定义验证规则
              [['wallet_name'], 'unique', 'targetClass' =>'\backend\models\Zsswallet','message'=>'名称已存在'],
            
         	  [['wallet_share_price'], 'required', 'message' => '分享者得到金钱不能为空'],
              [['wallet_share_price'], 'integer', 'message' => '请输入数字.'],
        	  [['wallet_shares_price'], 'required', 'message' => '被分享者得到的金钱不能为空'],
              [['wallet_shares_price'], 'integer', 'message' => '请输入数字.'],
        ];


        }
    
}
