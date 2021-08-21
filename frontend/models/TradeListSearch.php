<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TradeList;

/**
 * TradeListSearch represents the model behind the search form of `common\models\TradeList`.
 */
class TradeListSearch extends TradeList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'server', 'seller', 'buyer', 'status', 'sell_item', 'sell_item_type', 'need_item', 'need_item_type'], 'integer'],
            [['message', 'create_at', 'finished_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TradeList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['status' => SORT_ASC]],
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
            'server' => $this->server,
            'seller' => $this->seller,
            'buyer' => $this->buyer,
            'status' => $this->status,
            'sell_item' => $this->sell_item,
            'sell_item_type' => $this->sell_item_type,
            'need_item' => $this->need_item,
            'need_item_type' => $this->need_item_type,
            'create_at' => $this->create_at,
            'finished_at' => $this->finished_at,
        ]);

        $query->andFilterWhere(['ilike', 'message', $this->message]);

        return $dataProvider;
    }
}
