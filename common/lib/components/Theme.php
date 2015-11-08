<?php

namespace common\lib\components;

use Yii;
use yii\helpers\FileHelper;

/**
 * 参考之 https://github.com/sheillendra/yii2-theme
 */
class Theme extends \yii\base\Theme {
    
    public $active;

    /**
     * @inheritdoc
     */
    public function applyTo($path)
    {
        if($this->active){
                $pathMap = $this->pathMap[$this->active];
        }else{
                $pathMap = $this->pathMap;
                if (empty($pathMap)) {
                        if (($basePath = $this->getBasePath()) === null) {
                                throw new InvalidConfigException('The "basePath" property must be set.');
                        }
                        $pathMap = [Yii::$app->getBasePath() => [$basePath]];
                }
        }
		
        $path = FileHelper::normalizePath($path);
        foreach ($pathMap as $from => $tos) {
            $from = FileHelper::normalizePath(Yii::getAlias($from)) . DIRECTORY_SEPARATOR; 
            if (strpos($path, $from) === 0) {
                $n = strlen($from);
                foreach ((array) $tos as $to) {
                    $to = FileHelper::normalizePath(Yii::getAlias($to)) . DIRECTORY_SEPARATOR;
                    $file = $to . substr($path, $n);
                    if (is_file($file)) {
                        return $file;
                    }
                }
            }
        }
        return $path;
    }
}