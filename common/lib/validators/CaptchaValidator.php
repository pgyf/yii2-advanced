<?php

namespace common\lib\validators;

use Yii;
use yii\validators\ValidationAsset;
/**
 * Description of CaptchaValidator
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-09-15
 */
class CaptchaValidator extends \yii\captcha\CaptchaValidator{
    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($object, $attribute, $view)
    {
        $captcha = $this->createCaptchaAction();
        $code = $captcha->getVerifyCode(true);
        $hash = $captcha->generateValidationHash($this->caseSensitive ? $code : strtolower($code));
        $options = [
            'hash' => $hash,
            'hashKey' => 'yiiCaptcha/' . $this->captchaAction,
            'caseSensitive' => $this->caseSensitive,
            'message' => Yii::$app->getI18n()->format($this->message, [
                'attribute' => $object->getAttributeLabel($attribute),
            ], Yii::$app->language),
        ];
        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        ValidationAsset::register($view);

        return 'yii.validation.captcha(value, messages, ' . json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ');';
    }
}
