<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 * http://localhost/path/to/index.php?r=admin/route
http://localhost/path/to/index.php?r=admin/permission
http://localhost/path/to/index.php?r=admin/menu
http://localhost/path/to/index.php?r=admin/role
http://localhost/path/to/index.php?r=admin/assignment

 */
return [
		['label' => Yii::t('app', 'Route'), 'url'=>['/auth/route']],
		['label' => Yii::t('app', 'Permission'), 'url'=>['/auth/permission']],
		['label' => Yii::t('app', 'Menu'), 'url'=>['/auth/menu']],
		['label' => Yii::t('app', 'Role'), 'url'=>['/auth/role']],
		['label' => Yii::t('app', 'Assignment'), 'url'=>['/auth/assignment']],
];