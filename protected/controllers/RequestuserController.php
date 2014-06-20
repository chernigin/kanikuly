<?php

class RequestuserController extends Controller
{
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function actionUpdate($id){
         
    $m=$this->loadModel($id);
 
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
 
    if(isset($_POST['Requestuser'])){
        $m->attributes=$_POST['Requestuser'];
        if($m->save()){
            if(Yii::app()->request->isAjaxRequest){
                echo 'success';
				Yii::app()->user->setFlash('updateRequest', '<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Запрос успешно отредактирован</h4></div>');
                Yii::app()->end();
            }
            else{
				
				$this->redirect(array('index'));
               // $this->redirect(array('view','id'=>$model->id));
			   }
        }
    }
    if(Yii::app()->request->isAjaxRequest)
        $this->renderPartial('update',array('m'=>$m), false, true);
    else
        $this->render('update',array('m'=>$m));
 
} 

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/student/view/','id'=>Yii::app()->user->id));
	}

	public function actionIndex()
	{
		$m=new Requestuser('search');
		$m->unsetAttributes();  // clear any default values
                if(isset($_GET['Requestuser']))
			$m->attributes=$_GET['Requestuser'];

		$this->render('index',array(
			'm'=>$m,
		));
	}

	
	public function loadModel($id)
	{
		$m=Requestuser::model()->findByPk($id);
		if($m===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $m;
	}
        
	protected function performAjaxValidation($m)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='requestuser-form')
		{
			echo CActiveForm::validate($m);
			Yii::app()->end();
		}
	}
}
