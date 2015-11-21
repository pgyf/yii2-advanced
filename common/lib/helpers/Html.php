<?php

namespace common\lib\helpers;

/**
 * Description of Html
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-15
 */
class Html extends \kartik\helpers\Html{

    /**
     * https://github.com/justinvoelker/yii2-awesomebootstrapcheckbox
     */
    public static function radio($name, $checked = false, $options = [])
    {
        $options['checked'] = (bool)$checked;
        $value = array_key_exists('value', $options) ? $options['value'] : '1';
        if (isset($options['uncheck'])) {
            // add a hidden field so that if the radio button is not selected, it still submits a value
            $hidden = static::hiddenInput($name, $options['uncheck']);
            unset($options['uncheck']);
        } else {
            $hidden = '';
        }
        if (isset($options['label'])) {
            $label = $options['label'];
            $labelOptions = isset($options['labelOptions']) ? $options['labelOptions'] : [];
            $divOptions = isset($options['divOptions']) ? $options['divOptions'] : [];
            Html::addCssClass($divOptions, 'radio');
            unset($options['label'], $options['labelOptions'], $options['divOptions']);
            $options['id'] = str_replace(['[]', '][', '[', ']', ' '], ['', '-', '-', '', '-'], $name) . '-' . $value;
            $content = Html::tag('div', static::input('radio', $name, $value, $options)
                . static::label($label, $options['id'], $labelOptions), $divOptions);
            return $hidden . $content;
        } else {
            return $hidden . static::input('radio', $name, $value, $options);
        }
    }
    /**
     * https://github.com/justinvoelker/yii2-awesomebootstrapcheckbox
     */
    public static function checkbox($name, $checked = false, $options = [])
    {
        $options['checked'] = (bool)$checked;
        $value = array_key_exists('value', $options) ? $options['value'] : '1';
        if (isset($options['uncheck'])) {
            // add a hidden field so that if the checkbox is not selected, it still submits a value
            $hidden = static::hiddenInput($name, $options['uncheck']);
            unset($options['uncheck']);
        } else {
            $hidden = '';
        }
        if (isset($options['label'])) {
            $label = $options['label'];
            $labelOptions = isset($options['labelOptions']) ? $options['labelOptions'] : [];
            $divOptions = isset($options['divOptions']) ? $options['divOptions'] : [];
            Html::addCssClass($divOptions, 'checkbox');
            unset($options['label'], $options['labelOptions'], $options['divOptions']);
            $options['id'] = str_replace(['[]', '][', '[', ']', ' '], ['', '-', '-', '', '-'], $name) . '-' . $value;
            $content = Html::tag('div', static::input('checkbox', $name, $value, $options)
                . static::label($label, $options['id'], $labelOptions), $divOptions);
            return $hidden . $content;
        } else {
            return $hidden . static::input('checkbox', $name, $value, $options);
        }
    }
    
  
    
}
