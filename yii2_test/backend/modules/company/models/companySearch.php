<?php

namespace backend\modules\company\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\company\models\Company;

/**
 * CompanySearch represents the model behind the search form about `backend\modules\company\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'address', 'phone_number', 'email', 'website', 'bank_info', 'pic_stamp', 'pic_logo', 'pic_signature', 'tax', 'manager'], 'safe'],
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
        $query = Company::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'bank_info', $this->bank_info])
            ->andFilterWhere(['like', 'pic_stamp', $this->pic_stamp])
            ->andFilterWhere(['like', 'pic_logo', $this->pic_logo])
            ->andFilterWhere(['like', 'pic_signature', $this->pic_signature])
            ->andFilterWhere(['like', 'tax', $this->tax])
            ->andFilterWhere(['like', 'manager', $this->manager]);

        return $dataProvider;
    }
}
