<?php

class CommentController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
            $model=new Comment;
			if(isset($_POST['Comment']))
            {
                $model->attributes=$_POST['Comment'];
                if($model->save()){
                     Yii::app()->user->setFlash('commentMessege', '<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 stile="margin-bottom:10px;">Ваш комментарий успешно отправлен.</h4>
  На странице появится после проверки.
</div>');
                   //$this->redirect(array('view','id'=>$model->id));
                   $this->redirect(array('news/view/'.$_POST['Comment']['news_id']));
                }
                   
			}
			$news=$_POST['Comment']['news_id'];
            $this->render('create',array(
                'model'=>$model,
				'news'=>$news,
            ));
    }

	
	/**
	 * Performs the AJAX validation.
	 * @param Comment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
