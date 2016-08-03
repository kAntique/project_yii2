<?php

namespace backend\modules\detail\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\detail\models\Detail;

/**
 * DetailSearch represents the model behind the search form about `backend\modules\detail\models\Detail`.
 */
class DetailSearch extends Detail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quotation_id', 'receipt_id'], 'integer'],
            [['product_description', 'quantity'], 'safe'],
            [['unit_price'], 'number'],
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
        $query = Detail::find();

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
            'unit_price' => $this->unit_price,
            'quotation_id' => $this->quotation_id,
            'receipt_id' => $this->receipt_id,
        ]);

        $query->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'quantity', $this->quantity]);

        return $dataProvider;
    }
}
