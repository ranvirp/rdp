<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
#return CMap::mergeArray(
#require(dirname(__FILE__).'/../modules/p3media/config/main.php'),
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'जिलाधिकारी कार्य प्रबंधन पोर्टल ',
 'aliases' => array(
    //If you manually installed it
    'xupload' => 'ext.xupload',
),
	// preloading 'log' component
	'preload'=>array('log'),
//'theme'=>'twitter_fluid',
'theme'=>'System-Office-1',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		 'application.modules.user.models.*',
        'application.modules.user.components.*',
		'ext.giix-components.*', // giix components
		'ext.p3extensions.*',
		'ext.*',
		'ext.p3extensions.widgets.*.*',
		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'user',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
			'ext.giix-core', // giix generators
		),
		),
		// rbac configured to run with module Yii-User
	'rbac'=>array(
		'tableUser'=>'tbl_users', 			// Table where Users are stored. RBAC Manager use it as read-only
		'columnUserid'=>'id', 			// The PRIMARY column of the User Table
		'columnUsername'=>'username', 	// used to display name and could be same as columnUserid
		'columnEmail'=>'email' 			// email (only for display)
		),
	
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=rdp',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix'=>'tbl_',
		),
           
		'authManager'=>array(
            'class'=>'CDbAuthManager', 				// Database driven Yii-Auth Manager
            'connectionID'=>'db', 					// db connection as above
			'defaultRoles'=>array('registered'), 	// default Role for logged in users
			'showErrors'=>true, 					// show eval()-errors in buisnessRules
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'filesAlias'=>'application.data.files',
	),
	
    'controllerMap'=>array(
        'wdcal'=>array(
            'class'=>'ext.wdCalendar.controllers.wdCalendarController',
            //'property1'=>'value1',
            //'property2'=>'value2',
        ),
        // other controllers
    ),

//)
);
?>