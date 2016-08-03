<?php

namespace backend\modules\detail\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\detail\models\Detail;
use backend\modules\quotation\models\Quotation;
use backend\modules\detail\models\DetailSearch;
/**
 * DetailtSearch represents the model behind the search form about `backend\modules\detail\models\Detail`.
 */
class DetailtSearch extends Detail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_quotation', 'id_receipt'], 'integer'],
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
            'id_quotation' => $this->id_quotation,
            'id_receipt' => $this->id_receipt,
            'unit_price' => $this->unit_price,
        ]);

        $query->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'quantity', $this->quantity]);

        return $dataProvider;
    }
}
