<?php

namespace common\lib\base;

use Yii;


/**
 * ActiveRecord
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * 重写load
     * @param array $data
     * @param string $formName
     * @return boolean
     */
    public function load($data = null, $formName = null) {
        if($data == null){
            $data = Yii::$app->getRequest()->post();
        }
        return parent::load($data, $formName);
    }



    /**
     * 验证重复提交 
     * @return boolean
     */
    public function validateReapet($data = null, $formName = null) {
        $tokenParam = "pageToken";
        $tokenSaveParam = "reapetToken";
        $useCookie = true;
        $token = null;
        $request = Yii::$app->getRequest();
        if(Yii::$app->controller->enableCsrfValidation){
            $token = $request->getBodyParam($request->csrfParam);
            if(!$token){
                $token = $request->getCsrfTokenFromHeader();
            } 
        }
        else{
            $token =  $request->post($tokenParam);
            if(!$token){
                $token =  $request->get($tokenParam);
            }
        }
        if($token){
            $token = Html::encode($token);
        }
        if($useCookie){
            $saveToken = $request->cookies->getValue($tokenSaveParam);
        }
        else{
            $saveToken = Yii::$app->getSession()->get($tokenSaveParam);
        }
        if(null === $token){
            return $this->load($data, $tokenSaveParam);
        }
        if($token == $saveToken){
            return false;
        }
        if($useCookie){
            $request->cookies->add(new Cookie([
                'name' => $tokenSaveParam,
                'value' => $token,
            ]));
        }
        else{
            Yii::$app->getSession()->set($tokenSaveParam, $token);
        }
        return  $this->load($data, $tokenSaveParam);
    }


































//    /**
//     * 验证重复提交 
//     * @param type $data
//     * @param type $formName
//     * @return boolean
//     */
//    public function validateReapet($data = null, $formName = null) {
//        $tokenParam = "pageToken";
//        $tokenSaveParam = "reapetToken";
//        $token = '' ;
//        if(Yii::$app->controller->enableCsrfValidation){
//            $request = Yii::$app->getRequest();
//            $token = $request->getBodyParam($request->csrfParam);
//            if(!$token){
//                $token = $request->getCsrfTokenFromHeader();
//            } 
//        }
//        else{
//            $token =  $request->post($tokenParam);
//            if(!$token){
//                $token =  $request->get($tokenParam);
//            }
//        }
//        if($token){
//            $token = Html::encode($token);
//        }
//        $pageToken = Yii::$app->getSession()->get($tokenSaveParam);
//        if($token == $pageToken){
//            return false;
//        }
//        Yii::$app->getSession()->set($tokenSaveParam, $token);
//        return $this->load($data, $formName);
//    }


//	public static function findOne($condition = null, $order = null)
//	{
//		$query = static::find();
//		if($condition == null)
//		{
//			if($order !== null)
//			{
//				$query = $query->orderBy($order);
//			}
//			return $query->one();
//		}
//		
//		if(ArrayHelper::isAssociative($condition))
//		{
//			// hash condition
//			$ret = $query->andWhere($condition);
//			if($order !== null)
//			{
//				$ret = $ret->orderBy($order);
//			}
//			return $ret->one();
//		}
//		else
//		{
//			// query by primary key
//			$primaryKey = static::primaryKey();
//			if(isset($primaryKey[0]))
//			{
//				$ret = $query->andWhere([$primaryKey[0] => $condition]);
//				if($order !== null)
//				{
//					$ret = $ret->orderBy($order);
//				}
//				return $ret->one();
//			}
//			else
//			{
//				throw new InvalidConfigException(get_called_class() . ' must have a primary key.');
//			}
//		}
//	}
//
//	public static function findAll($condition = null, $order = null)
//	{
//		$query = static::find();
//		if($condition == null)
//		{
//			if($order !== null)
//			{
//				$query = $query->orderBy($order);
//			}
//			return $query->all();
//		}
//		
//		if(ArrayHelper::isAssociative($condition))
//		{
//			// hash condition
//			$ret = $query->andWhere($condition);
//			if($order !== null)
//			{
//				$ret = $ret->orderBy($order);
//			}
//			return $ret->all();
//		}
//		else
//		{
//			// query by primary key(s)
//			$primaryKey = static::primaryKey();
//			if(isset($primaryKey[0]))
//			{
//				$ret = $query->andWhere([$primaryKey[0] => $condition]);
//				if($order !== null)
//				{
//					$ret = $ret->orderBy($order);
//				}
//				return $ret->all();
//			}
//			else
//			{
//				throw new InvalidConfigException(get_called_class() . ' must have a primary key.');
//			}
//		}
//	}
        
        
}
