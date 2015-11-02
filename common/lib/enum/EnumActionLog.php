<?php
namespace common\lib\enum;

use common\messages\Trans;

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
            static::TYPE_CREATE => Trans::tEnum('Create'),
            static::TYPE_DELETE => Trans::tEnum('Delete'),
            static::TYPE_UPDATE => Trans::tEnum('Update'),
            static::TYPE_QUERY => Trans::tEnum('Query'),
            static::TYPE_INFO => Trans::tEnum('Info'),
            static::TYPE_ERROR => Trans::tEnum('Error'),
        ];
    }

}
