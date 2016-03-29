<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Zsscarousel;
use backend\models\Zssgroup;
use yii\data\Pagination;
class BannerController extends \yii\web\Controller
{
	/**
	*轮播列表
	*/
    public function actionLists(){
    	$carouselModel = new Zsscarousel();
    	$re = $carouselModel->getsearch();
		//print_R($re);die;
    	return $this->renderPartial('list', [ 
		         'models' => $re['models'],
		         'pages' => $re['pages'],
				 'res' => $re['res'],
		         'carouselModel' => $carouselModel,
		    ]);
    }
    /**
    *图片上传
    */
    public function actionAdd_pro()
    {   
    	$data = yii::$app->request->post();
        if(Yii::$app->request->isPost) {
            $data['carousel_img'] = UploadedFile::getInstanceByName('carousel_img');
            $carouselModel = new Zsscarousel();
    		$re = $carouselModel->getupload($data);
           	if($re ){
           		echo "<script>alert('添加成功');location.href='index.php?r=banner/lists'</script>";
           	}else{
           		echo "<script>alert('添加失败');location.href='index.php?r=banner/lists'</script>";

           	}

        }
   } 
    /**
    *删除
    */
    public function actionDel(){
    	$carousel_id=yii::$app->request->get('carousel_id');
    	$carouselModel=new Zsscarousel();
    	$row=$carouselModel->del($carousel_id);
		echo $row;
    }
   /**
   *修改
   */
    public function actionGupt(){
    	$carousel_id = yii::$app->request->get('carousel_id');
    	$carouselModel = new Zsscarousel();
    	$row = $carouselModel->upt($carousel_id);
		return $this->renderPartial('upt',['row'=>$row]);
    }
    /**
    * 修改是否成功
    */
    public function actionUpt_pro(){
    	$data = yii::$app->request->post();
        if(Yii::$app->request->isPost) {
            $data['carousel_img'] = UploadedFile::getInstanceByName('carousel_img');
			if(empty($data['carousel_img'])){
				$id = $data['carousel_id'];
				unset($data['_csrf']);
				unset($data['carousel_img']);
				$re = Zsscarousel::updateAll($data,"carousel_id=$id");
			}else{
				$carouselModel = new Zsscarousel();
				$re = $carouselModel->uptpro($data);
				//move_uploaded_file($re['file'],true);
			}
           	if($re ){
           		echo "<script>alert('修改成功');location.href='index.php?r=banner/lists'</script>";
           	}else{
           		echo "<script>alert('修改失败');location.href='index.php?r=banner/lists'</script>";

           	}

        }
    }
    /**
    *批量删除
    */
    public function actionDelall(){
		$carousel_id = yii::$app->request->get('carousel_id');
		//echo $carousel_id;die;
		$row = Yii::$app->db->createCommand("delete from zss_carousel where carousel_id in('$carousel_id')")->execute();
		//print_R($row);
		if($row){
			echo '1';
		}else{
			echo '0';
		}
	}
	/**
	*轮播组列表
	*/
	public function actionGrouplist(){
		$group_id = yii::$app->request->get('group_id');
		$groupModel = new Zssgroup();
		$arr = $groupModel->glist($group_id);

		return $this->render('glists',['arr'=>$arr]);
	}
	/**
	*添加轮播组信息
	*/
	public function actionGadd_pro(){
		$data = yii::$app->request->post();
		$groupModel = new Zssgroup();
		$res = $groupModel->gadd($data);
		 if($res){
           		echo "<script>alert('添加成功');location.href='index.php?r=banner/lists'</script>";
           	}else{
           		echo "<script>alert('添加失败');location.href='index.php?r=banner/lists'</script>";

           	}
	}
	/**
	*删除(轮播组)
	*/
    public function actionGdel(){
    	$carousel_id = yii::$app->request->get('carousel_id');
    	$groupModel = new Zsscarousel();
		$res = $groupModel->del($carousel_id);
		echo $res;
    }
    /**
    *轮播组修改
    */
     public function actionGroup_upt(){
    	$group_id = yii::$app->request->get('group_id');
    	$query = (new \yii\db\Query());
		$arr = $query
			->select(['*'])
			->from('zss_group')
			->innerJoin('zss_carousel','zss_group.group_id=zss_carousel.group_id')
			->where("zss_group.group_id='$group_id'")
			->all();
		//print_R($arr);die;
		return $this->renderPartial('gupt',['arr'=>$arr]);
    }
    /**
    *轮播组修改是否成功
    */
    public function actionGupt_pro(){
    	$data = yii::$app->request->post();
    	$groupModel=new Zssgroup;
    	$res=$groupModel->guptpro($data);
		if($res){
			echo "<script>alert('修改成功');location.href='index.php?r=banner/lists'</script>";
		}else{
			echo "<script>alert('修改失败');location.href='index.php?r=banner/lists'</script>";
		}

    }
 }
