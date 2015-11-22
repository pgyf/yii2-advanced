<?php

namespace backend\lib\extensions\mdmsoft\admin\components;

use Yii;
use yii\db\Connection;
use yii\caching\Cache;
use yii\helpers\ArrayHelper;

/**
 * Configs
 * Used for configure some value. To set config you can use [[\yii\base\Application::$params]]
 * 
 * ~~~
 * return [
 *     
 *     'mdm.admin.configs' => [
 *         'db' => 'customDb',
 *         'menuTable' => 'admin_menu',
 *     ]
 * ];
 * ~~~
 * 
 * or use [[\Yii::$container]]
 * 
 * ~~~
 * Yii::$container->set('mdm\admin\components\Configs',[
 *     'db' => 'customDb',
 *     'menuTable' => 'admin_menu',
 * ]);
 * ~~~
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Configs extends \mdm\admin\components\Configs
{
    /**
     * @var Connection Database connection.
     */
    public $db = 'db';

    /**
     * @var Cache Cache component.
     */
    public $cache = 'cache';

    /**
     * @var integer Cache duration. Default to a month.
     */
    public $cacheDuration = 2592000;

    /**
     * @var string Menu table name.
     */
    public $menuTable = '{{%admin_menu}}';

}
