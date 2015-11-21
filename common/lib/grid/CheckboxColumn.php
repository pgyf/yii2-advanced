<?php

namespace common\lib\grid;

use Closure;
use yii\helpers\Html;

/**
 * Description of CheckboxColumn
 * https://github.com/justinvoelker/yii2-awesomebootstrapcheckbox
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-15
 */
class CheckboxColumn extends \yii\grid\CheckboxColumn{

    /**
     * @inheritdoc
     */
    protected function renderHeaderCellContent()
    {
        $name = rtrim($this->name, '[]') . '_all';
        $id = $this->grid->options['id'];
        $options = json_encode([
            'name' => $this->name,
            'multiple' => $this->multiple,
            'checkAll' => $name,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $this->grid->getView()->registerJs("jQuery('#$id').yiiGridView('setSelectionColumn', $options);");
        if ($this->header !== null || !$this->multiple) {
            return parent::renderHeaderCellContent();
        } else {
            return Html::tag('div', Html::checkBox($name, false, ['class' => 'select-on-check-all', 'id' => $name])
                . Html::tag('label', null, ['for' => 'selection_all']), ['class' => 'checkbox']);
        }
    }
    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->checkboxOptions instanceof Closure) {
            $options = call_user_func($this->checkboxOptions, $model, $key, $index, $this);
        } else {
            $options = $this->checkboxOptions;
            if (!isset($options['value'])) {
                $options['value'] = is_array($key) ? json_encode($key,
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $key;
            }
            $options['id'] = 'selection_' . $key;
        }
        return Html::tag('div', Html::checkbox($this->name, !empty($options['checked']), $options)
            . Html::tag('label', null, ['for' => $options['id']]), ['class' => 'checkbox']);
    }
    
}
