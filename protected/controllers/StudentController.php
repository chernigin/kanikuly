<?php

class StudentController extends Controller
{
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
    public function actionPassword($id)
	{
		$model = $this->loadModel($id); 
		$s = Support::model()->findByAttributes(array('login'=>$model->username));
		if($model->id!==Yii::app()->user->id) throw new CHttpException('404', 'Ошибка доступа');
		if(isset($_POST['Password'])){
			$model->pass=$_POST['Password'];
			$s->pass=$_POST['Password'];
			$s->save();
			if ($model->save()){
				//Yii::app()->user->logout();
				//$this->redirect(array('site/login'));
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$this->render('password',array(
				'model'=>$this->loadModel($id),
			));
	}

	
	public function actionUpdate($id)
	{
        $layout='/layouts/column2';
		$model=$this->loadModel($id);
        if($model->id!==Yii::app()->user->id) throw new CHttpException('404', 'Ошибка доступа');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
      
		if(isset($_POST['Student']))
		{

			//$model->attributes=$_POST['Student'];
            $model->nsb=$_POST['Student']['nsb'];
			$model->surname=$_POST['Student']['surname'];
			$model->name=$_POST['Student']['name'];
			$model->mid_name=$_POST['Student']['mid_name'];
			$model->username=$_POST['Student']['username'];
			$model->phone=$_POST['Student']['phone'];
			$model->email=$_POST['Student']['email'];
			$model->faculty=$_POST['Student']['faculty'];
			$model->cource=$_POST['Student']['cource'];
			
			//$model->pass=$_POST['Student']['pass'];
			if($model->save())
                                // Yii::app()->user->setState('username',$model->username);
				$this->redirect(array('view','id'=>$model->id));
				//Yii::app()->user->logout();
				//$this->redirect(array('site/login'));}
		
        }
        
		$this->render('update',array(
			'model'=>$model,
             ));
	}

	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
        if($model->id!==Yii::app()->user->id) throw new CHttpException('404', 'Ошибка доступа');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
        if($model->id!==Yii::app()->user->id) throw new CHttpException('404', 'Хитер бобёр');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Student $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

