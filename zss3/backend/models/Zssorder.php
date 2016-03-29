<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "{{%zss_order}}".
 *
 * @property integer $order_id
 * @property string $order_sn
 * @property string $shop_name
 * @property string $user_name
 * @property string $user_phone
 * @property string $order_freight
 * @property integer $delivery_type
 * @property string $address
 * @property integer $meal_number
 * @property string $amount
 * @property string $price_amount
 * @property integer $pay_type
 * @property string $pay_at
 * @property string $created_time
 * @property string $updated_time
 * @property integer $order_status
 */
class Zssorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zss_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_freight', 'amount', 'price_amount'], 'number'],
            [['delivery_type', 'meal_number', 'pay_type', 'order_status'], 'integer'],
            [['pay_at', 'created_time', 'updated_time'], 'safe'],
            [['order_sn'], 'string', 'max' => 20],
            [['shop_name', 'user_name'], 'string', 'max' => 30],
            [['user_phone'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_sn' => 'Order Sn',
            'shop_name' => 'Shop Name',
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'order_freight' => 'Order Freight',
            'delivery_type' => 'Delivery Type',
            'address' => 'Address',
            'meal_number' => 'Meal Number',
            'amount' => 'Amount',
            'price_amount' => 'Price Amount',
            'pay_type' => 'Pay Type',
            'pay_at' => 'Pay At',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'order_status' => 'Order Status',
        ];
    }
    /**
    * 订单基本详情
    */
    public function Order()
    {         
        $query = $this->find()->with("zssuser")->with("zssorderinfo")->with("zssmenu")->with("zssshop")->asArray()->all();
        //print_r($query);die;             
        return $query;

    }

    /**
    * 订单详情
    */
    public function Orderlist($data)
    {
        $order_id=$data['order_id'];
        return $this->find()->with("zssuser")->with("zssorderinfo")->with("zssmenu")->with("zssshop")->where("order_id = '$order_id'")->asArray()->One();
       // print_r($arr);die;
    }

    /**
    *  时间查询
    */
    public function OrderSearch($start_time,$end_time)
    {
        return $this->find()->with("zssuser")->with("zssorderinfo")->with("zssmenu")->with("zssshop")->where("created_time>='$start_time' and created_time<='$end_time'")->all();
    }

    /**
    * 选择查询(支付方式,派送类型,支付状态)
    */
    public function Paytype($pay_id,$status_id,$delivery_id)
    {
        $where='';
        if($pay_id!='--请选择--'){
            $where.="pay_type='$pay_id'";
        }else{
            $where.= 1;
        }
        if($status_id!="--请选择--"){
            $where.=" and order_status='$status_id'";
        }else{
            $where.=" and 1 ";
        }
        if($delivery_id!="--请选择--"){
            $where.=" and delivery_type='$delivery_id'";
        }else{
            $where.= " and 1 ";
        }
        $query=$this->find()->with("zssuser")->with("zssorderinfo")->with("zssmenu")->with("zssshop")->where("$where")->asArray()->all();
        return $query;

    }

    /**
    * 订单关联详情表
    * Zssmenu 菜品表
    * Zssshop 门店表
    * Zssuser 用户表
    * Zssorderinfo 订单基本详情表
    */
	public function getZssmenu()
	{      
		return $this->hasOne(Zssmenu::className(), ['menu_id' => 'menu_id']);
	}

	public function getZssshop()
	{
		return $this->hasOne(Zssshop::className(), ['shop_id' => 'shop_id']);
	}
	public function getZssuser()
	{
		return $this->hasOne(Zssuser::className(), ['user_id' => 'user_id']);
	}
	public function getZssorderinfo()
	{
		return $this->hasOne(Zssorderinfo::className(), ['order_id' => 'order_id']);
	}

    public function order1($user){
        $username=Zssadminuser::find()->where(['user_name' =>$user])->one();
        return $username['user_id'];
        
    }

    //财务查询数据分页model
    public function lim(){
        $query=Zssorder::find()->with('zssmenu')->with('zssshop')->with('zssorderinfo');
        $pagination = new Pagination([
        'defaultPageSize' => 7,
            'totalCount' => $query->count(),
        ]);
        
        $countries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        //print_r($countries);die;
        foreach($countries as $k=>$v){
            $re[]=$v['price_amount'];
        }
        $sum=array_sum($re);
        return array('pagination'=>$pagination,'countries'=>$countries,'sum'=>$sum);
    }

    /*
    **财务数据查询带user条件
    */
    public function limi($name){
        $query=Zssorder::find()->with('zssmenu')->with('zssshop')->with('zssorderinfo')->where("shop_id=$name");
        $pagination = new Pagination([
        'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);
        
        $countries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        foreach($countries as $k=>$v){
            $re[]=$v['price_amount'];
        }
        $sum=array_sum($re);
        return array('pagination'=>$pagination,'countries'=>$countries,'sum'=>$sum);
    }

    /*
    **查询销量
    */
    public function xiao(){
        //分组查询总量(同一产品)
            $sql="SELECT SUM(menu_num),SUM(price_amount),zss_menu.menu_name,zss_order_info.order_id from zss_order inner join zss_order_info on zss_order.order_id=zss_order_info.order_id inner join zss_menu on zss_order_info.menu_id=zss_menu.menu_id group by zss_order_info.menu_id order by SUM(menu_num) desc";
            $connection=Yii::$app->db;
            $command=$connection->createCommand($sql);
            $arr=$command->queryAll();
            return $arr;
    }

    /*
    **有条件查询销量
    */
    public function liang($user){
        //分组查询总量(同一产品)
            $sql="SELECT SUM(menu_num),SUM(price_amount),zss_menu.menu_name,zss_order_info.order_id from zss_order inner join zss_order_info on zss_order.order_id=zss_order_info.order_id inner join zss_menu on zss_order_info.menu_id=zss_menu.menu_id where zss_order.shop_id=$user group by zss_order_info.menu_id  order by SUM(menu_num) desc";
            $connection=Yii::$app->db;
            $command=$connection->createCommand($sql);
            return $command->queryAll();
            
    }

    /*
    excel 导出数据model
    */
    public function excel($re){

        $sum=$re['sum'];
        $arr=$re['list'];
        $status=require_once '/data0/htdocs/www/svndata/three/zss/backend/web/assets/PHPExcel/Classes/PHPExcel.php';
        $phpexcel = new \PHPExcel();
        $phpexcel->getActiveSheet()->setTitle('收入明细表');
        $phpexcel->getActiveSheet() ->setCellValue('A1','门店')
                            ->setCellValue('B1','菜品')
                            ->setCellValue('C1','份数')
                            ->setCellValue('D1','金额')
                            ->setCellValue('E1','时间');
        $i=2;
        foreach($arr as $k=>$v){
            $phpexcel->getActiveSheet() 
                ->setCellValue('A'.$i,$v['shop_name'])
                ->setCellValue('B'.$i, $v['menu_name'])
                ->setCellValue('C'.$i, $v['menu_num'])
                ->setCellValue('D'.$i,$v['price_amount'])
                ->setCellValue('E'.$i, $v['pay_at']);
                                    
            $i++;
        }
        $phpexcel->getActiveSheet() ->setCellValue('D'.(3+count($arr)), '总计')
        ->setCellValue('E'.(3+count($arr)), $sum);
        
        $obj_Writer = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
        //print_r ($obj_Writer);die;
        $filename ='Export'. date('Y-m-d').".xls";
        header("Content-Type: application/force-download"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Type: application/download"); 
        header('Content-Disposition:inline;filename="'.$filename.'"'); 
        header("Content-Transfer-Encoding: binary"); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Pragma: no-cache"); 
        return print_r($obj_Writer->save('php://output'));//输出
        die();//种植执行
        
    }
    /*
    **按时间查询财务
    */
    public function sel(){
        $query = (new \yii\db\Query());
                $list=$query
                ->select(['zss_menu.menu_name','price_amount','zss_shop.shop_name','pay_at','zss_order_info.menu_num'])
                ->from('zss_order')
                ->innerJoin('zss_menu','zss_order.menu_id=zss_menu.menu_id')
                ->innerJoin('zss_shop','zss_order.shop_id=zss_shop.shop_id')
                ->innerJoin('zss_order_info','zss_order.order_id=zss_order_info.order_id')
                ->all();
                foreach($list as $k=>$v){
                    $re[]=$v['price_amount'];
                }
                $sum=array_sum($re);
                return array('list'=>$list,'sum'=>$sum);
    }

    /*
    **按时间查询财务(user条件)
    */
    public function sele($name){
        $query = (new \yii\db\Query());
                $list=$query
                ->select(['zss_menu.menu_name','price_amount','zss_shop.shop_name','pay_at','zss_order_info.menu_num'])
                ->from('zss_order')
                ->innerJoin('zss_menu','zss_order.menu_id=zss_menu.menu_id')
                ->innerJoin('zss_shop','zss_order.shop_id=zss_shop.shop_id')
                ->innerJoin('zss_order_info','zss_order.order_id=zss_order_info.order_id')
                ->where("zss_order.shop_id=$name")
                ->all();
                print_r ($list);die;
                foreach($list as $k=>$v){
                    $re[]=$v['price_amount'];
                }
                $sum=array_sum($re);
                return array('list'=>$list,'sum'=>$sum);
    }
    /*
    **按时间查询销量
    */
    public function ctime($start,$end){
        $query=Zssorder::find()->with('zssmenu')
				->with('zssshop')
				->with('zssorderinfo')
				->where("pay_at>='$start' and pay_at<='$end'");
            $pagination = new Pagination([
            'defaultPageSize' => 2,
                'totalCount' => $query->count(),
            ]);
            
            $countries = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            //print_r($countries);die;
            foreach($countries as $k=>$v){
                $re[]=$v['price_amount'];
            }
            $sum=array_sum($re);
            return array('pagination'=>$pagination,'countries'=>$countries,'sum'=>$sum);
    }

    /*
    **按时间查询销量(user条件)
    */
    public function htime($start,$end,$name){
        $query=Zssorder::find()
	->with('zssmenu')
	->with('zssshop')
	->with('zssorderinfo')
	->where("pay_at>='$start' and pay_at<='$end'")
	->andwhere("shop_id='$name'");
            $pagination = new Pagination([
            'defaultPageSize' => 2,
                'totalCount' => $query->count(),
            ]);
            
            $countries = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            print_r($countries);die;
            foreach($countries as $k=>$v){
                $re[]=$v['price_amount'];
            }
	    print_r(re);die;
            $sum=array_sum($re);
            return array('pagination'=>$pagination,'countries'=>$countries,'sum'=>$sum);
    }
    /*
    **按时间查询销量
    */

    public function ntime($start,$end){
        //分组查询总量(同一产品)
            $sql="SELECT SUM(menu_num),SUM(price_amount),zss_menu.menu_name,zss_order_info.order_id from zss_order inner join zss_order_info on zss_order.order_id=zss_order_info.order_id inner join zss_menu on zss_order_info.menu_id=zss_menu.menu_id where pay_at>='".$start."' and pay_at<='".$end."' group by zss_order_info.menu_id order by SUM(menu_num) desc";
            $connection=Yii::$app->db;
            $command=$connection->createCommand($sql);
            $arr=$command->queryAll();
            return $arr;
    }

    /*
    **按时间查询销量(user条件)
    */
    public function btime($start,$end,$name){
        $sql="SELECT SUM(menu_num),SUM(price_amount),zss_menu.menu_name,zss_order_info.order_id from zss_order inner join zss_order_info on zss_order.order_id=zss_order_info.order_id inner join zss_menu on zss_order_info.menu_id=zss_menu.menu_id group by zss_order_info.menu_id where pay_at>='".$start."' and pay_at<='".$end."' and shop_id=$name order by SUM(menu_num) desc";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($sql);
        $arr=$command->queryAll();
        return $arr;
    }
    

}
