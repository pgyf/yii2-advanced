<?php

namespace backend\lib\extensions\mdmsoft\admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\lib\extensions\yii\data\Sort;
use common\lib\enum\EnumUser;

/**
 * AssignmentSearch represents the model behind the search form about Assignment.
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class UserSearch extends \backend\models\User
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username'], 'safe'],
            ['status','in' , 'range' => EnumUser::getAllValue(EnumUser::STATUS)]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    /**
     * @inheritdoc
     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => Yii::t('rbac-admin', 'ID'),
//            'username' => Yii::t('rbac-admin', 'Username'),
//            'name' => Yii::t('rbac-admin', 'Name'),
//        ];
//    }

    /**
     * Create data provider for Assignment model.
     * @param  array                        $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $asTableName = 't';
        $query = static::find()->from([$asTableName => static::tableName()]);
        $query->asTableName($asTableName);
        //$query->isAllBackendUser();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'class' => Sort::className(),  
            ],
            'pagination' => ['pageSize' => 1],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            't.id' => $this->id,
            't.status' => $this->status,
        ]);
        $query->addLikeWhere([
            't.username' => $this->username,
        ]);
        return $dataProvider;
    }
}
