<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property string $id
 * @property string $route
 * @property string $description
 * @property integer $create_time
 * @property string $user_id
 * @property string $ip
 */
class AdminLog extends \common\models\table\AdminLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['create_time'], 'required'],
            ['ip','filter','filter' => 'ip2long'],
            [['create_time', 'user_id', 'ip'], 'integer'],
            [['route'], 'string', 'max' => 255],
            [['user_id'], 'exist','targetClass' => User::className(),'targetAttribute' => 'id'],
        ];
    }
}
