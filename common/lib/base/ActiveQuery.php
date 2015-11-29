<?php

namespace common\lib\base;

/**
 * Description of ActiveQuery
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-2
 */
class ActiveQuery extends \yii\db\ActiveQuery{

    public $tableNickname;

    public function asTableName($asName = 't'){
        $this->tableNickname = $asName;
    }


    public function asFieldName($field){
        if($this->tableNickname){
            return $this->tableNickname.'.'.$field;
        }
        return $field;
    }
    

    /**
     * 增加like条件
     * @param array $likeCondition
     */
    public function addLikeWhere($likeCondition){
        if($likeCondition){
            foreach ($likeCondition as $key => $value) {
                if($value){
                    $this->andFilterWhere(['like', $key, $value.'%',false]);
                }
            }
        }
        return  $this;
    }
    
    
    /**
     * 增加查询时间范围条件
     * @param string $field
     * @param string $fieldValue
     */
    public function addDateRangeWhere($field, $fieldValue ,$separator = ' - '){
        if($fieldValue !== null && $fieldValue !== '' && strpos($fieldValue,$separator))
        {
            $dateArr = explode($separator, $fieldValue);
            $startDate = strtotime($dateArr[0]);
            $endDate = strtotime($dateArr[1]) + 86399; //11:59:59
            if($startDate && $endDate){
                $endDate += 86399;
                $this->andFilterWhere(['between', $field, $startDate, $endDate]);
            }
        }
        return  $this;
    }
    
    
   /**
     * 增加查询时间条件
     * @param string $field
     * @param string $fieldValue
     */
    public function addDateWhere($field, $fieldValue){
        if($fieldValue !== null && $fieldValue !== '')
        {
            $fieldValue = strtotime($fieldValue);
            if($fieldValue){
                $this->andFilterWhere([$field => $fieldValue]);
            }
        }
        return  $this;
    }
    
    /**
     * 增加查询时间范围条件
     * @param string $field
     * @param string $fieldValue
     */
    public function addIpWhere($field, $fieldValue,$separator = '.'){
        if($fieldValue !== null && $fieldValue !== '' && strpos($fieldValue,$separator))
        {
            $fieldValue = ip2long($fieldValue);
            if($fieldValue){
                $this->andFilterWhere([$field => $fieldValue]);
            }
        }
        return $this;
    }
    
}
