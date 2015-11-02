<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\lib\validators;

use Yii;
use yii\web\JsExpression;
use yii\helpers\Json;

/**
 * PhoneValidator validates that the attribute value is a valid phone.
 * 目前只验证中国的手机号
 */
class PhoneValidator extends \yii\validators\Validator
{
    /**
     * 参考http://www.oschina.net/code/snippet_238351_48624
     * var isChinaMobile = /^134[0-8]\d{7}$|^(?:13[5-9]|147|15[0-27-9]|178|18[2-478])\d{8}$/; //移动方面最新答复
     * var isChinaUnion  = /^(?:13[0-2]|145|15[56]|176|18[56])\d{8}$/; //向联通微博确认并未回复
     * var isChinaTelcom = /^(?:133|153|177|18[019])\d{8}$/; //1349号段 电信方面没给出答复，视作不存在
     * var isOtherTelphone   = /^170([059])\d{7}$/;//其他运营商
     * @var string the regular expression used to validate the attribute value.
     * @see http://www.regular-expressions.info/email.html
     */
    public $pattern;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if($this->pattern === null){
            //中国移动
            $isChinaMobile = "^134[0-8]\d{7}$|^(?:13[5-9]|147|15[0-27-9]|178|18[2-478])\d{8}$";
            //中国联通
            $isChinaUnion = "^(?:13[0-2]|145|15[56]|176|18[56])\d{8}$";
            //中国电信
            $isChinaTelcom = "^(?:133|153|177|18[019])\d{8}$";
            //其他
            $isOtherTelphone = "^170([059])\d{7}$";
            $this->pattern = "/($isChinaMobile)|($isChinaUnion)|($isChinaTelcom)|($isOtherTelphone)/";
        }
        
        if ($this->message === null) {
            $this->message = Yii::t('yii', '{attribute} is invalid.');
        }
    }

    /**
     * @inheritdoc
     */
    protected function validateValue($value)
    {
        $valid = true;
        // make sure string length is limited to avoid DOS attacks
        if (!is_numeric($value) || strlen($value) > 11) {
            $valid = false;
        } 
        if (!preg_match($this->pattern, $value)) {
            $valid = false;
        } 
        return $valid ? null : [$this->message, []];
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $options = [
            'pattern' => new JsExpression($this->pattern),
            'message' => Yii::$app->getI18n()->format($this->message, [
                'attribute' => $model->getAttributeLabel($attribute),
            ], Yii::$app->language),
        ];
        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        \yii\validators\ValidationAsset::register($view);

        return 'yii.validation.regularExpression(value, messages, ' . Json::htmlEncode($options) . ');';
    }
}
