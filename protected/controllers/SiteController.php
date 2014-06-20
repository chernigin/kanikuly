<?php

class SiteController extends Controller {
    
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
				'testLimit'=>'1',
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('deny',
                'actions' => array('createRequest', 'developments', 'gallery', 'photo', 'album'),
                'users' => array('?'),
            ),
            array('allow', 
                'users' => array('*'),
            ),

        );
    }

   
    public function actionRegistration() {
		$m = new LoginForm;
		$s = new Support;
        $model = new Student;
        $model->scenario = 'registration';
        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);
       
        if (isset($_POST['Student'])) {
            $model->attributes = $_POST['Student'];
         try {     
			if ($model->save()) {
				$s->login = $_POST['Student']['username'];
				$s->email = $_POST['Student']['email'];
				$s->pass = $_POST['Student']['pass'];
				$s->save();
				$m->username = $_POST['Student']['username']; 
                $m->password = $_POST['Student']['pass']; 
                if ($m->validate() && $m->login()){
                
                Yii::app()->user->setFlash('regisrtation', '<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Добро пожаловать на наш сайт.</h4>
	
</div>');
                //$this->redirect(array('index'));
				//$this->mailsend($_POST['Student']['email'], Yii::app()->params['adminEmail'], 'Регистрация', 'Все ОКэЙ');
				$this->redirect(Yii::app()->user->returnUrl);}
            }
            }
			catch(CDbException $e)  {
                  Yii::app()->user->setFlash('regis',' <div style="padding: 50px;" class="alert alert-error fade in">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 style="margin-bottom:7px;">Проблема с номером студенческого.</h4>
  Он слишном длинный. Уже исправляем данную ошибку. А пока введите произвольный номер билета. Спасибо.
</div>');
                  //$this->redirect(array('site/registration'));
                 }

        }

        $this->render('registration', array(
            'model' => $model,
        ));
    }

    public function actionIndex() {
        
        //$iu=Yii::app()->user->id;
        $this->layout = '/layouts/column2';
        $criteria = new CDbCriteria;
        $criteria->order='id DESC';
            $total = News::model()->count();
 
            $pages = new CPagination($total);
            $pages->pageSize = 4;
            $pages->applyLimit($criteria);
 
            $posts = News::model()->findAll($criteria);
 
        $this->render('index', array(
                'posts' => $posts,
                'pages' => $pages,
                //'iu'=>$iu,
            ));
    }
    
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
           /* $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact','<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Благодарим Вас за обращение.</h4>Мы ответим вам как можно скорее.
</div>');
                 //$this->refresh();
				 $this->redirect('contact');
            }*/
			//$this->mailsend($_POST['ContactForm']['email'], Yii::app()->params['adminEmail'], $_POST['ContactForm']['subject'], $_POST['ContactForm']['body']);
			$subject = '=?UTF-8?B?' . base64_encode($_POST['ContactForm']['subject']) . '?=';
			$message = '<b>Имя:</b> '.$_POST['ContactForm']['name']."<br/> <b>Email:</b> ".$_POST['ContactForm']['email']."<br/> <b>Сообщение:</b> ".$_POST['ContactForm']['body'];
			$this->mailsend(Yii::app()->params['adminEmail'], $_POST['ContactForm']['email'], $subject, $message);
			
			Yii::app()->user->setFlash('contact','<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Благодарим Вас за обращение.</h4>Мы ответим вам как можно скорее.
</div>');
			//$this->refresh();
			//$this->redirect('contact');
			 $this->redirect(array('site/index'));
			
        }
        $this->render('contact', array('model' => $model));
    }
	
	public function mailsend($to,$from,$subject,$message){
        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Kanikuly Sfedu');
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else {
            echo "Message sent!";
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
			if ($_POST['LoginForm']['passworddop'])
				die ('STOP BOT');
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    
    function actionCreateRequest(){
        $putevka=Putevka::model()->findAll();
        
        $model = new Request;
        if (isset($_POST['Request'])) {

            $model->attributes = $_POST['Request'];
            $model->student=Yii::app()->user->id;
            try {
                    
              if ($model->save())
              {
                Yii::app()->user->setFlash('requestMessage','<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Заявка принята.</h4>
</div>');
                $this->redirect(array('site/index'));
              }
             }
            catch(CDbException $e)  {
                  Yii::app()->user->setFlash('requestMessage',' <div class="alert alert-error fade in">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>На летний период можно подать только одну заявку.</h4>
</div>');
                  $this->redirect(array('site/createRequest'));
                 }
            
        }
        
        
        $this->render('createRequest',array('putevka'=>$putevka,
            'model'=>$model));
    }
            
    
    function actionPutevkaPeriod($p_id) {
        $t = Putevka::model()->findByPk($p_id);
        if (!$t) {
            echo CJSON::encode(array('content' => ''));
        } else {
            echo CJSON::encode(array('content' => $t->periods));
        }
    }
        
function actionLiman(){
    $this->layout = '/layouts/column1';
    $this->render('liman');
}

function actionTaimazi(){
    $this->layout = '/layouts/column1';
    $this->render('taimazi');
}

function actionVityaz(){
    $this->layout = '/layouts/column1';
    $this->render('vityaz');
}

function actionDevelopments(){
  
    $this->layout = '/layouts/column1';
    if (isset($_GET['year'])) {

            $year=$_GET['year'];
    }      
    if (isset($_GET['month'])) {

            $month=$_GET['month'];
            if($month<10){$month = str_pad($month, 2, '0', STR_PAD_LEFT);}
    }
    if (isset($_GET['day'])) {

            $day=$_GET['day'];
            if($day<10){$day = str_pad($day, 2, '0', STR_PAD_LEFT);}
    }
    if(isset($year, $month, $day)){
    $date = $year.'-'.$month.'-'.$day;
    
    
    $news = Yii::app()->db->createCommand("SELECT * FROM developments WHERE DATE_FORMAT(DATE,'%Y-%m-%d')='".$date."'")->queryAll();
    }
    if (isset($news)){
    $this->render('developments',array('news'=>$news,));
    }else {
    if (isset($_GET['id'])){
        $news_detail = Yii::app()->db->createCommand("SELECT * FROM developments WHERE id='".$_GET['id']."'")->queryAll();
        $this->render('developments',array('news_detail'=>$news_detail,));
        
    }
    else 
        $this->render('developments');
}}
function actionGallery(){
    $this->layout = '/layouts/column1';
    $albumName = Yii::app()->db->createCommand("SELECT * FROM album")->queryAll();
    $gallery = Yii::app()->db->createCommand("SELECT * FROM gallery")->queryAll();
    $this->render('gallery', array('gallery'=>$gallery,'albumName'=>$albumName,));
}

function actionAlbum($id){
    $gallery = Gallery::model()->findByPk($id);
    $this->layout = '/layouts/column1';
    $album = Yii::app()->db->createCommand("SELECT * FROM album WHERE gallery='".$id."' order by id desc")->queryAll();
    $this->render('album', array('album'=>$album,'gallery'=>$gallery,));
}  

function actionPhoto($id)
{
    $this->layout = '/layouts/column1';
    //$gallery = Gallery::model()->findByAttributes(array('album'=>$id,));
    $album = Album::model()->findByPk($id);
    $photo = Yii::app()->db->createCommand("SELECT * FROM foto WHERE album='".$id."' order by id desc")->queryAll();
    $this->render('photo', array('photo'=>$photo, 'album'=>$album,/*'gallery'=>$gallery,*/));
    
}

/*function actionPhoto($id){
    $album = Album::model()->findByPk($id);
    $criteria = new CDbCriteria;
    $criteria->params=array(':album'=>$id);
    $criteria->condition='album=:album';
    $criteria->order='id DESC';
    $total = Foto::model()->count();
 
    $pages = new CPagination($total);
    $pages->pageSize = 5;
    $pages->applyLimit($criteria);
	$photo = Foto::model()->findAll($criteria);
 
    $this->render('photo', array(
                'photo' => $photo,
                'pages' => $pages,
                'album' => $album,
     ));
    
}
function actionPhoto($id){
    $this->layout = '/layouts/column1';
    $album = Album::model()->findByPk($id);
    $photo = Yii::app()->db->createCommand("SELECT * FROM foto WHERE album='".$id."' order by id desc")->queryAll();
    $this->render('photo', array('photo'=>$photo, 'album'=>$album,));
    
}*/

function actionRss(){
    $this->layout = '/layouts/column1';
    $this->render('rss');
}

function actionStatistics(){
    $this->layout = '/layouts/column1';
	$user = Yii::app()->db->createCommand("SELECT count(id) as user FROM student")->queryAll();
	$request = Yii::app()->db->createCommand("SELECT count(id) as request FROM request")->queryAll();
	$liman = Yii::app()->db->createCommand("select count(*) as d from request group by period having period in (2,6,7,8)")->queryAll();
	$vityaz = Yii::app()->db->createCommand("select count(*) as d from request group by period having period in (9,10,11,12)")->queryAll();
	$taimazi = Yii::app()->db->createCommand("select count(r.id) as c, p.period1 as p1, p.period2 as p2 from request r join period p on r.period = p.id where r.period in (4,5,13,14)")->queryAll();
    $faculty = Yii::app()->db->createCommand("select cc, name from (select count(s.id) as cc, s.faculty as fac from request r join student s where r.student = s.id group by faculty) as d join faculty where d.fac = faculty.id")->queryAll();
	$this->render('statistics', array('user'=>$user, 'request'=>$request,'liman'=>$liman,'vityaz'=>$vityaz,'taimazi'=>$taimazi,'faculty'=>$faculty,));
}


}
