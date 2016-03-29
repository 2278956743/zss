<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\Zssuser;
use backend\models\Zssvip;
use backend\models\Zssgift;
use backend\models\Zssviplog;
use backend\models\Zsscompany;
use backend\models\Zssmenu;
use backend\models\Zsspaylog;
use yii\filters\VerbFilter;
use yii\data\Pagination;


/**
 * Site controller
 */
class MemberController extends Controller
{
    public  $enableCsrfValidation = false;
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

   /**
    * 会员信息管理
    * @return [type] [description]
    */
    public function actionMembertable()
    {
        $model = new Zssuser;

        $company_sel = $model->company_sel();

        return $this->renderPartial("membertable",array('membertable'=>$company_sel));
    }

    /**
     * 用户余额修改
     * @param  [type] $new_price [description]
     * @param  [type] $user_id   [description]
     * @return [type]            [description]
     */
    public function actionUser_price($new_price,$user_id)
    {
        $model = new Zssuser;

        $var = $model->user_up($new_price,$user_id);
 
    }

    /**
     * 用户积分修改
     * @param  [type] $new_integral [description]
     * @param  [type] $user_id      [description]
     * @return [type]               [description]
     */
    public function actionNew_integral($new_integral,$user_id)
    {
        $model = new Zssuser;

        $var = $model->user_up_int($new_integral,$user_id);

    }

    /**
     * vip名称修改
     * @param  [type] $vip_name [vip名称]
     * @param  [type] $vip_id   [vip的ID]
     * @return [type]           [description]
     */
    public function actionVip_name_up($vip_name,$vip_id)
    {
        $model = new Zssvip;

        $var = $model->vip_name_up($vip_name,$vip_id);

    }  

    /**
     * vip积分修改
     * @param  [type] $vip_integral [description]
     * @param  [type] $vip_id       [description]
     * @return [type]               [description]
     */
    public function actionVip_integral_up($vip_integral,$vip_id)
    {
        $model = new Zssvip;

        $var = $model->vip_integral_up($vip_integral,$vip_id);

    }

    /**
     * vip折扣修改
     * @param  [type] $vip_discount [description]
     * @param  [type] $vip_id       [description]
     * @return [type]               [description]
     */
    public function actionVip_discount_up($vip_discount,$vip_id)
    {
        $model = new Zssvip;

        $var = $model->vip_discount_up($vip_discount,$vip_id);
    }

    /**
     * vip状态修改
     * @param  [type] $user_status [description]
     * @param  [type] $vip_id      [description]
     * @return [type]              [description]
     */
   public function actionUser_status_up($user_status,$vip_id)
   {

        $model = new Zssvip;

        $var = $model->user_status_up($user_status,$vip_id);

   }

    /**
     * 详情
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function actionVip_xinagqing($user_id)
    {
        $model = new Zssuser;
        $user_sel = $model->user_vip(Yii::$app->request->get());
        return $this->renderPartial("vip_sel",array('vip_sel' => $user_sel));
    }

    /**
     * 修改会员
     * @return [type] [description]
     * $user_id         用户信息ID
     * $user            用户信息
     * $user_vip_log    用户消费记录
     * $user_vip_pay    用户充值记录
     */
    public function actionVip_add()
    {
        $model = new Zssuser;

        $user_sel = $model->user_sel(Yii::$app->request->get());

        $user_vip_log = new Zssviplog;

        $user_vip_log_sel = $user_vip_log->user_vip_log_sel(Yii::$app->request->get());

        $user_vip_pay = new Zsspaylog;

        $user_vip_pay_sel = $user_vip_pay->user_vip_pay_sel(Yii::$app->request->get());

        return $this->renderPartial('vip_add',array('user_vip_log'=>$user_vip_log_sel,'user_vip_pay'=>$user_vip_pay_sel,'usersel'=>$user_sel));
    }

    /**
     * 执行修改
     * @return [type] [description]
     */
    public function actionVip_add_do()
    {
        $user_update_do = new Zssuser;

        $save=$user_update_do->user_update_do(Yii::$app->request->post());

        if($save>0) {

          echo "<script>alert('修改成功');location.href='index.php?r=member/membertable';</script>";

        } else {

          echo "<script>alert('修改失败');history.go(-1);</script>";

        }
    }

    /**
     * 消费记录更多
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function actionViplog($user_id)
    {
        $viplog = new Zssviplog;

        $viplog_sel = $viplog->viplog_sel($user_id);

        return $this->renderPartial('viplog', ['viplog' => $viplog_sel]);
    }

    /**
     * 充值记录
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function actionVippay($user_id)
    {
        $vippay = new Zsspaylog;

        $vippay_user_log_type = $vippay->vippay_user_log_type($user_id);

        return $this->renderPartial('vippay',array('vippay_user_log_type'=>$vippay_user_log_type));
    }

     /**
      * 会员等级管理
      * @return [type] [description]
      */
    public function actionMemberlevel()
    {
        $memberlevel = new Zssvip;

        $memberlevel_sel=$memberlevel->memberlevel_sel();

        return $this->renderPartial('memberlevel', ['memberlevel' => $memberlevel_sel,]);
    }

    /**
     * 修改会员等级
     * @param  [type] $vip_id [description]
     * @return [type]         [description]
     */
    public function actionVip_update($vip_id)
    {
        $vip_update = new Zssvip;

        $vipsel = $vip_update->vip_update($vip_id);

        $gift_sel = new Zssgift;

        $gift = $gift_sel->gift_sel();

        return $this->renderPartial('vipupdate',array('vipupdate'=>$vipsel,'gift'=>$gift));
    }

    /**
     * 执行会员等级修改
     * @return [type] [description]
     */
    public function actionVip_update_do()
    {
        $vip = new Zssvip;

        $vip_up_do = $vip->vip_update_do(Yii::$app->request->post());

          if($vip_up_do>0) {

              echo "<script>alert('修改成功');location.href='index.php?r=member/memberlevel';</script>";

          } else {

              echo "<script>alert('修改失败');history.go(-1);</script>";

          }
    }

    /**
     * 合作伙伴管理管理
     * @return [type] [description]
     */
    public function actionPartner()
    {
        $memberpartner = new Zsscompany;

        $memberpartner_sel = $memberpartner->memberpartner_sel();

        return $this->renderPartial('memberpartner',['memberpartner' => $memberpartner_sel]);
    }

    /**
     * 修改合伙人信息
     * @param  [type] $company_id [description]
     * @return [type]             [description]
     */
    public function actionCompany_update($company_id)
    {
        $company_up = new Zsscompany;

        $gift = new Zssgift;

        $company_sel = $company_up->company_up($company_id);

        $gift_sel = $gift->gift_sel();

        return $this->renderPartial('companyupdate',array('companyupdate'=>$company_sel,'gift'=>$gift_sel));
    }

    /**
     * 执行合伙人修改
     * @return [type] [description]
     */
    public function actionCom_up_do()
    {
        $company = new Zsscompany;

        $company_up_do = $company->company_up_do(Yii::$app->request->post());

          if($company_up_do>0) {

              echo "<script>alert('修改成功');location.href='index.php?r=member/partner';</script>";

          } else {

              echo "<script>alert('修改失败');history.go(-1);</script>";

          }
    }

    /**
     * 合伙人信息删除
     * @param  [type] $company_id [description]
     * @return [type]             [description]
     */
    public function actionCompany_delete($company_id)
    {
        $model=new Zsscompany();

        $data=$model->company_del($company_id);

        if($data>0) {

              echo "<script>alert('删除成功');location.href='index.php?r=member/partner';</script>";

          } else {

              echo "<script>alert('删除失败');history.go(-1);</script>";

          }
    }

    /**
     * 合伙人添加
     * @return [type] [description]
     */
    public function actionCompany_add()
    {
        $model = new Zssgift;

        $gift_sel = $model->gift_sel();

        return $this->renderPartial("companyadd",array('gift'=>$gift_sel));
    }

    /**
     * 执行添加合伙人
     * @return [type] [description]
     */
    public function actionCompany_add_do()
    {
        $model = new Zsscompany;

        $data = $model->company_add(Yii::$app->request->post());

        if($data>0){

              echo "<script>alert('添加成功');location.href='index.php?r=member/partner';</script>";

          } else {

              echo "<script>alert('添加失败');history.go(-1);</script>";

          }
    }

    /**
     * vip查询
     * @param  [type] $vip_id [description]
     * @return [type]         [description]
     */
    public function actionVip_sel($vip_id)
    {
        $model = new Zssvip;

        $data = $model->vip_sel($vip_id);
        //print_r($data);die;
        $arr['data'] = $data;
        //print_R($arr);die;
        return $this->renderPartial("vip_xinagqing",$arr);
    }

    /**
     * 合伙人公司名称修改
     * @param  [type] $company_name [description]
     * @param  [type] $comapny_id   [description]
     * @return [type]               [description]
     */
    public function actionCompany_name_up($company_name,$comapny_id)
    {
        $model = new Zsscompany;

        $var = $model->company_name_up($company_name,$comapny_id);

    }


    public function actionCompany_xiang($company_id)
    {
        $model = new Zsscompany;

        $data = $model->company_sel($company_id);
        
        return $this->renderPartial("company_sel",['data' => $data]);
        
    }

}
