<?php
\Yii::$container->set ( 'kartik\widgets\DatePicker', [
		'pluginOptions' => [
				'format' => 'yyyy-mm-dd',
				'todayHighlight' => true
		]
] );
\Yii::$container->set ( 'kartik\widgets\TimePicker', [
		'pluginOptions' => [
				'showSeconds' => true,
				'showMeridian' => false
		]
] );
\Yii::$container->set ( 'kartik\widgets\DateTimePicker', [
		'pluginOptions' => [
				'format' => 'yyyy-mm-dd HH:ii:ss',
				'todayHighlight' => true
		]
] );
return [
		'language' => 'vi',
		'components' => [
				'authManager' => 'yii\rbac\DbManager',
				'settings' => 'pheme\settings\components\Settings',
				'i18n' => [
						'translations' => [
								'*' => [
										'class' => 'yii\i18n\PhpMessageSource',
										'basePath' => '@app/messages'
								]
						]
				]
		],
		'modules' => [
				'settings' => [
						'class' => 'pheme\settings\Module',
						'layout'       => '@admin-views/layouts/main',
				],
				'auth' => [
						'class' => 'mdm\admin\Module',
						'layout'       => '@admin-views/layouts/main',
				],
				'user' => [
						'admins' => ['nguyendinhtrung141'],
						'controllerMap' => [
								'admin' => 'app\controllers\user\AdminController'
						],
				],
		]
		,
		'params' => [
				'yii.migrations' => [
						'@yii/rbac/migrations',
						'@mdm/admin/migrations',
						'@pheme/settings/migrations'
				]
		]
];