<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallepedido;

/**
 * DetallepedidoSearch represents the model behind the search form of `app\models\Detallepedido`.
 */
class DetallepedidoSearch extends Detallepedido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'codigo_pedido', 'codigo_material'], 'integer'],
            [['precio_unitario', 'cantidad'], 'number'],
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
        $query = Detallepedido::find();

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
            'codigo' => $this->codigo,
            'precio_unitario' => $this->precio_unitario,
            'cantidad' => $this->cantidad,
            'codigo_pedido' => $this->codigo_pedido,
            'codigo_material' => $this->codigo_material,
        ]);

        return $dataProvider;
    }
}
