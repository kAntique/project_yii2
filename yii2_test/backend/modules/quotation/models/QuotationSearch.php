<?php

namespace backend\modules\quotation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\quotation\models\Quotation;

/**
 * QuotationSearch represents the model behind the search form about `backend\modules\quotation\models\Quotation`.
 */
class QuotationSearch extends Quotation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_company', 'id_customer'], 'integer'],
            [['id_doc_qu', 'date', 'dev_time', 'payment', 'guaruantee'], 'safe'],
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
        $query = Quotation::find();

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
            'id_company' => $this->id_company,
            'id_customer' => $this->id_customer,
        ]);

        $query->andFilterWhere(['like', 'id_doc_qu', $this->id_doc_qu])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'dev_time', $this->dev_time])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'guaruantee', $this->guaruantee]);

        return $dataProvider;
    }
}
