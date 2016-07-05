<?php
namespace common\lib\enum;

use Yii;

/**
 * 日志表枚举
 * @author liyunfang <381296986@qq.com>
 * @date 2015-03-03
 */
class EnumActionLog extends EnumBase{

//*********************************
//*  type 日志类型
//*********************************    
    const TYPE = 'type';

    const TYPE_CREATE  = 'create';
    const TYPE_DELETE   = 'delete';
    const TYPE_UPDATE   = 'update';
    const TYPE_QUERY = 'query';
    const TYPE_INFO = 'info';
    const TYPE_ERROR = 'error';
    
    protected static function typeList() {
        return [
            static::TYPE_CREATE => Yii::t('enum','Create'),
            static::TYPE_DELETE => Yii::t('enum','Delete'),
            static::TYPE_UPDATE => Yii::t('enum','Update'),
            static::TYPE_QUERY => Yii::t('enum','Query'),
            static::TYPE_INFO => Yii::t('enum','Info'),
            static::TYPE_ERROR => Yii::t('enum','Error'),
        ];
    }

}
