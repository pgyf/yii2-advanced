<?php
namespace backend\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\User;
use common\lib\enum\EnumUser;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type','status', 'create_time', 'update_time'], 'integer'],
            [['username', 'auth_key', 'password', 'email','mobile'], 'safe'],
            ['type', 'in', 'range' => EnumUser::getAllValue(EnumUser::TYPE)],
            ['status', 'in', 'range' => EnumUser::getAllValue(EnumUser::STATUS)],
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
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);
        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
        ->andFilterWhere(['like', 'mobile', $this->mobile]);
        return $dataProvider;
    }
}