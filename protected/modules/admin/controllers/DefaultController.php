<?php

class DefaultController extends Controller {

    public function actionIndex($p_id=3) {
        
        
        $command = Yii::app()->db->createCommand("CALL statistic_request1(".intval($p_id).");");
        $res = $command->queryAll();
        $this->render('index',array('res'=>$res,'p_id'=>$p_id));
    }
	
	public function actionExcel(){
        $this->layout = '/layouts/column0';
        $this->render('excel');
    }

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','excel'),
                'users' => array('admin', 'chernigin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

}