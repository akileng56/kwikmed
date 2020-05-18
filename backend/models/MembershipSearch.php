<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Membership;

/**
 * MembershipSearch represents the model behind the search form about `common\models\Membership`.
 */
class MembershipSearch extends Membership
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'location', 'telephone', 'mobileno', 'certifier', 'certification_status', 'membership_status', 'products', 'remarks', 'category'], 'safe'],
            [['email', 'contact_person', 'id'], 'integer'],
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
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Membership::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'email' => $this->email,
            'contact_person' => $this->contact_person,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'mobileno', $this->mobileno])
            ->andFilterWhere(['like', 'certifier', $this->certifier])
            ->andFilterWhere(['like', 'certification_status', $this->certification_status])
            ->andFilterWhere(['like', 'membership_status', $this->membership_status])
            ->andFilterWhere(['like', 'products', $this->products])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
