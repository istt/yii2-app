<?php
return [
		'components' => [
				'gtmDb' => [
						'class' => 'yii\db\Connection',
						'dsn' => 'pgsql:host=localhost;port=5432;dbname=lrd',
						'username' => 'lrd',
						'password' => 'lrd',
						'tablePrefix' => 'yii2_'
				]
		],
		'modules' => [
			'gtm' => [
    				'class' => 'syniverse\gtm\GtmModule',
					'layout'       => '@admin-views/layouts/main',
			]
		]
];