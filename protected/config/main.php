<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'language'=>'ru',
    'sourceLanguage'=>'en',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Каникулы ЮФУ',

	// preloading 'log' component
	'preload'=>array('log'),
        
//        'aliases' => array(
//        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
//    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
            
                
		
	),

	// application components
	'components'=>array(
            'authManager' => array(
           // Будем использовать свой менеджер авторизации
            'class' => 'PhpAuthManager',
          // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
           'defaultRoles' => array('guest'),
),
//		'user'=>array(
//                        'class' => 'WebUser',
//			// enable cookie-based authentication
//			'allowAutoLogin'=>true,
//		),
		// uncomment the following to enable URLs in path-format
		'user'=>array(
                    'class'=>'WebUser',
                    'allowAutoLogin'=>true,
                  ),
            
//                  'authManager'=>array(
//                    'class'=>'RDbAuthManager',
//                    'defaultRoles' => array('Guest'),
//                  ),
            
//                'bootstrap' => array(
//                'class' => 'bootstrap.components.TbApi',   
//                ),
            
            
                
            
		'urlManager'=>array(
			'urlFormat'=>'path',
            		'showScriptName'=>false,
			'rules'=>array(
				''=>'site/index',
				'limanchik'=>'site/liman',
				'taimazi'=>'site/taimazi',
				'vityaz'=>'site/vityaz',
				'gallery'=>'site/gallery',
				'profile/<id:\d+>'=>'student/view',
				'profile/update/<id:\d+>'=>'student/update',
				'createRequest'=>'site/createRequest',
				'album/<id:\d+>'=>'site/album',
				'photo/<id:\d+>'=>'site/photo',
				'logout'=>'site/logout',
				'events/<id:\d+>'=>'site/developments',
				'login'=>'site/login',
				'registration'=>'site/registration',
				'statistics'=>'site/statistics',
				//'album'=>'site/album',

                            //'index'=>'site/index',
                            //'createRequest'=>'site/createRequest',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			//'connectionString' => 'mysql:host=db.kanikuly.sfedu.ru;dbname=kanikuly',
            'connectionString' => 'mysql:host=localhost;dbname=kanikuly',
			'emulatePrepare' => true,
			//'username' => 'kanikuly',
			//'password' => 'PIU31orB%Calk',
            'username' => 'root',
            'password' => '1010',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		
       
		'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"smtp.gmail.com",
            'Username'=>'kanikulysfedu@gmail.com',
            'Password'=>'sfedu1010',
            'Mailer'=>'smtp',
            'Port'=>587,
            'SMTPAuth'=>true,
            'SMTPSecure' => 'tls',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'chernigin.a.v@gmail.com',
	),
);
