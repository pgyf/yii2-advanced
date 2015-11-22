<?php

namespace backend\lib\extensions\mdmsoft\admin\components;

//use Yii;
//use yii\caching\TagDependency;
//use backend\lib\extensions\mdmsoft\admin\models\Menu;

/**
 * MenuHelper used to generate menu depend of user role.
 * Usage
 * 
 * ~~~
 * use mdm\admin\components\MenuHelper;
 * use yii\bootstrap\Nav;
 *
 * echo Nav::widget([
 *    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
 * ]);
 * ~~~
 * 
 * To reformat returned, provide callback to method.
 * 
 * ~~~
 * $callback = function ($menu) {
 *    $data = eval($menu['data']);
 *    return [
 *        'label' => $menu['name'],
 *        'url' => [$menu['route']],
 *        'options' => $data,
 *        'items' => $menu['children']
 *        ]
 *    ]
 * }
 *
 * $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
 * ~~~
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class MenuHelper extends \mdm\admin\components\MenuHelper
{

}
