<?php

namespace common\lib\i18n;

class Formatter extends \yii\i18n\Formatter
{
    public function asDate($value, $format = null)
    {
        if(!$value){
            return $this->nullDisplay;
        }
        return parent::asDate($value, $format);
    }
    
    public function asTime($value, $format = null)
    {
        if(!$value){
            return $this->nullDisplay;
        }
        return parent::asTime($value, $format);
    }
    
    public function asDatetime($value, $format = null)
    {
        if(!$value){
            return $this->nullDisplay;
        }
        return parent::asDatetime($value, $format);
    }
 

//    public function asTimestamp($value)
//    {
//        if ($value === null) {
//            return $this->nullDisplay;
//        }
//        $timestamp = $this->normalizeDatetimeValue($value);
//        return number_format($timestamp->format('U'), 0, '.', '');
//    }

 
}
