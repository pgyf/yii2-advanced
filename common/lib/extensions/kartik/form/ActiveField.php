<?php

namespace common\lib\extensions\kartik\form;

use common\lib\helpers\Html;

/**
 * Description of ActiveField
 * https://github.com/justinvoelker/yii2-awesomebootstrapcheckbox
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-15
 */
class ActiveField extends \kartik\form\ActiveField{

//    /**
//     * @inheritdoc
//     */
//    public $checkboxTemplate = "{input}\n{error}\n{hint}";
//    /**
//     * @inheritdoc
//     */
//    public $radioTemplate = "{input}\n{error}\n{hint}";
//    /**
//     * @inheritdoc
//     */
//    public $horizontalCheckboxTemplate = "{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
//    /**
//     * @inheritdoc
//     */
//    public $horizontalRadioTemplate = "{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
//    /**
//     * @inheritdoc
//     */
//    public function checkbox($options = [], $enclosedByLabel = true)
//    {
//        if ($enclosedByLabel) {
//            if (!isset($options['template'])) {
//                $this->template = $this->form->layout === 'horizontal' ?
//                    $this->horizontalCheckboxTemplate : $this->checkboxTemplate;
//            } else {
//                $this->template = $options['template'];
//                unset($options['template']);
//            }
//            if ($this->form->layout === 'horizontal') {
//                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
//            }
//            $this->labelOptions['class'] = null;
//        }
//        if ($enclosedByLabel) {
//            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
//            $this->parts['{label}'] = '';
//        } else {
//            if (isset($options['label']) && !isset($this->parts['{label}'])) {
//                $this->parts['{label}'] = $options['label'];
//                if (!empty($options['labelOptions'])) {
//                    $this->labelOptions = $options['labelOptions'];
//                }
//            }
//            unset($options['labelOptions'], $options['divOptions']);
//            $options['label'] = null;
//            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
//        }
//        $this->adjustLabelFor($options);
//        return $this;
//    }
//    /**
//     * @inheritdoc
//     */
//    public function radio($options = [], $enclosedByLabel = true)
//    {
//        if ($enclosedByLabel) {
//            if (!isset($options['template'])) {
//                $this->template = $this->form->layout === 'horizontal' ?
//                    $this->horizontalRadioTemplate : $this->radioTemplate;
//            } else {
//                $this->template = $options['template'];
//                unset($options['template']);
//            }
//            if ($this->form->layout === 'horizontal') {
//                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
//            }
//            $this->labelOptions['class'] = null;
//        }
//        if ($enclosedByLabel) {
//            $this->parts['{input}'] = Html::activeRadio($this->model, $this->attribute, $options);
//            $this->parts['{label}'] = '';
//        } else {
//            if (isset($options['label']) && !isset($this->parts['{label}'])) {
//                $this->parts['{label}'] = $options['label'];
//                if (!empty($options['labelOptions'])) {
//                    $this->labelOptions = $options['labelOptions'];
//                }
//            }
//            unset($options['labelOptions'], $options['divOptions']);
//            $options['label'] = null;
//            $this->parts['{input}'] = Html::activeRadio($this->model, $this->attribute, $options);
//        }
//        $this->adjustLabelFor($options);
//        return $this;
//    }
//    /**
//     * Note that for this extension, the 'item' option has been removed.
//     *
//     * @inheritdoc
//     */
//    public function checkboxList($items, $options = [])
//    {
//        if ($this->inline) {
//            if (!isset($options['template'])) {
//                $this->template = $this->inlineCheckboxListTemplate;
//            } else {
//                $this->template = $options['template'];
//                unset($options['template']);
//            }
//            Html::addCssClass($options['itemOptions']['divOptions'], 'checkbox-inline');
//        }
//        $this->adjustLabelFor($options);
//        $this->parts['{input}'] = Html::activeCheckboxList($this->model, $this->attribute, $items, $options);
//        return $this;
//    }
//    /**
//     * Note that for this extension, the 'item' option has been removed.
//     *
//     * @inheritdoc
//     */
//    public function radioList($items, $options = [])
//    {
//        if ($this->inline) {
//            if (!isset($options['template'])) {
//                $this->template = $this->inlineRadioListTemplate;
//            } else {
//                $this->template = $options['template'];
//                unset($options['template']);
//            }
//            Html::addCssClass($options['itemOptions']['divOptions'], 'radio-inline');
//        }
//        $this->adjustLabelFor($options);
//        $this->parts['{input}'] = Html::activeRadioList($this->model, $this->attribute, $items, $options);
//        return $this;
//    }
    
}
