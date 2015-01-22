<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\admin;

use yii\helpers\ArrayHelper;


/**
 * Class Module
 * @package app\modules\admin
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class Module extends \yii\base\Module
{
    public function getMenuItems()
    {
        $menuItemPresets = [
            'admin'   => ['label' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>', 'url' => ['/admin']],
            'user'    => ['label' => '<i class="fa fa-users"></i> <span>Users</span>', 'url' => ['/user/admin']],
            'packaii' => ['label' => '<i class="fa fa-cubes"></i> <span>Packages</span>', 'url' => ['/packaii']],
            'gii'     => ['label' => '<i class="fa fa-code"></i> <span>Code Generation</span>', 'url' => ['/gii']],
        ];

        foreach (\Yii::$app->getModules() AS $name => $m) {
            switch ($name) {
                case 'admin':
                case 'user':
                case 'packaii':
                case 'gii':
                    $menuItems[$name] = $menuItemPresets[$name];
                    break;
                default:
                    $module          = \Yii::$app->getModule($name);
                    // Automatically add menu items in case of `_menu[ModuleID].php` exists in module or app path...
                    $items = [];
                    if ($module && (file_exists($phpFile = $module->getViewPath() . '/layouts/_menu' . ucfirst($name) . '.php'))) {
                    	$items = array_merge_recursive($items, require($phpFile));
                    } elseif ($module && (file_exists($phpFile = \Yii::$app->getViewPath() . '/layouts/_menu' . ucfirst($name) . '.php'))){
                    	$items = array_merge_recursive($items, require($phpFile));
                    }

                    $autoMenuItems[$name] = [
                        'label' => '<i class="fa fa-cube"></i> <span>' . ucfirst($name) . '</span>',
                        'url'   => ['/' . $module->id]
                    ];
                    if (count($items)){
                    	$autoMenuItems[$name]['url'] = '#';
                    	$autoMenuItems[$name]['items'] = $items;
                    }
            }
        }

        $menuItems = ArrayHelper::merge($menuItems, $autoMenuItems);

        return $menuItems;
    }

    public function getControllers($module = null)
    {
        if ($module === null) {
            $module = \Yii::$app;
        } else {
            $module = \Yii::$app->getModule($module);
        }
        foreach (scandir($module->getControllerPath()) AS $i => $name) {
            if (substr($name, 0, 1) == '.') {
                continue;
            }
            $controllers[] = \yii\helpers\Inflector::camel2id(str_replace('Controller.php', '', $name));
        }
        return $controllers;
    }
}
