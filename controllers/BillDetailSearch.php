<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BillDetail;

/**
 * BillDetailSearch represents the model behind the search form of `app\models\BillDetail`.
 */
class BillDetailSearch extends BillDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'amount', 'size_product', 'sum_price', 'code_color', 'id_product', 'id_bill'], 'integer'],
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
        $query = BillDetail::find();

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
            'amount' => $this->amount,
            'size_product' => $this->size_product,
            'sum_price' => $this->sum_price,
            'code_color' => $this->code_color,
            'id_product' => $this->id_product,
            'id_bill' => $this->id_bill,
        ]);

        return $dataProvider;
    }
}
