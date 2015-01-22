<?php
namespace app\controllers\user;

use dektrium\user\controllers\AdminController as BaseAdminController;
use mdm\admin\components\AccessControl;
use yii\helpers\VarDumper;

class AdminController extends BaseAdminController
{
	/**
	 * @override
	 */
	public function behaviors(){
		$behaviors = parent::behaviors();
		$behaviors['access'] = [
				'class' => AccessControl::className()
		];
		return $behaviors;
	}
}