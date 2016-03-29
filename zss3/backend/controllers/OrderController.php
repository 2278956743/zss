<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Zssorderinfo;
use backend\models\Zssorder;
use backend\models\Zssmenu;
use backend\models\Zssshop;
use backend\models\Zssuser;
use backend\models\Zssorderstatus;
use backend\models\Zsspaytype;
use backend\models\Zssdeliverytype;



/**
 * Order controller
 */ 
class OrderController extends Controller
{
	public  $enableCsrfValidation = false;    //_csrf
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post','get'],
                ],
            ],
        ];
    }
	
   /*
   **	@actionType  订单基本详情
	*/
	public function actionType()	
	{
		//实例化
		$orderInfo = new Zssorder();
		$order_status = new Zssorderstatus();
		$pay_type = new Zsspaytype();
		$delivery_type = new Zssdeliverytype();
		
		//订单详情表
		$orderInfos = $orderInfo->Order();
		//print_r($orderInfos);die;
		//订单状态
		$order_status = $order_status->Orderstatus();
		//支付方式
		$paytype = $pay_type->Paytype();
		//派送类型
		$delivery_type = $delivery_type->Deliverytype();	
        return $this->renderPartial('type', [
						            'arr' => $orderInfos,           
									'pay' => $paytype,
									'status' => $order_status,
									'delivery' => $delivery_type,
        ]);
	}
	
	/*
    **	@actionList  订单详情
	*/
	public function actionList()
	{
		$list = new Zssorder();
		$order_list = $list->Orderlist(Yii::$app->request->get());
		//print_r($order_list);die;
		return $this->renderPartial('order_list',[
									'order_list' => $order_list ,
		]);
	}

	/*
	**  @actiontimesel  时间查询
	*/	
	public function actionTimesel()
	{
		$start_time = Yii::$app->request->post("starttime");
		$end_time = Yii::$app->request->post("endtime");
		
		$timesel = new Zssorder();
		$order_time = $timesel->OrderSearch($start_time,$end_time);

		//订单状态
		$order_status = new Zssorderstatus();
		$order_status = $order_status->Orderstatus();

		//支付方式
		$pay_type = new Zsspaytype();
		$paytype = $pay_type->Paytype();

		//派送类型
		$delivery_type = new Zssdeliverytype();
		$delivery_type = $delivery_type->Deliverytype();

        return $this->renderPartial('time', [
						            'arr' => $order_time,									
        ]);
	}

	/*
	** @actionPaytype  支付方式,订单状态,派送类型多条件查询
	*/
	public function actionPaytype()
	{
		$pay_id = Yii::$app->request->get("pay_id");
		$status_id = Yii::$app->request->get("status_id"); 
		$delivery_id = Yii::$app->request->get("delivery_id");
		//echo $pay_id;die;
		$paytype = new Zssorder();
		$pay_type = $paytype->Paytype($pay_id,$status_id,$delivery_id);
		//print_r($pay_type);die;

        return $this->renderPartial('order', [
            						'arr' => $pay_type,        
        ]);
	}

}

