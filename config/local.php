<?php
use kartik\grid\GridView;

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
\Yii::$container->set ( 'kartik\widgets\Grid', [
		'exportConfig' => [
				'csv',
				'excel'
		],
		'responsive' => true,
		'hover' => true
] );
$localConfig = [
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
				],
				'urlManager' => [
						'enablePrettyUrl' => true,
				]
		],
		'modules' => [
				'settings' => [
						'class' => 'pheme\settings\Module',
						'layout' => '@admin-views/layouts/main'
				],
				'gridview' => [
						'class' => '\kartik\grid\Module'
				]
		],
		'params' => [
				'yii.migrations' => [
						'@yii/rbac/migrations',
						'@mdm/admin/migrations',
						'@pheme/settings/migrations'
				]
		]
];

if (php_sapi_name () != 'cli') {
	$localConfig ['modules'] ['auth'] = [
			'class' => 'mdm\admin\Module',
			'layout' => '@admin-views/layouts/main'
	];
	$localConfig ['modules'] ['user'] = [
			'class' => 'dektrium\user\Module',
			'admins' => [
					'nguyendinhtrung141'
			],
			'controllerMap' => [
					'admin' => 'app\controllers\user\AdminController'
			]
	];
}
return $localConfig;