<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleventa;

/**
 * DetalleventaSearch represents the model behind the search form of `app\models\Detalleventa`.
 */
class DetalleventaSearch extends Detalleventa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'codigo_venta', 'codigo_producto'], 'integer'],
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
        $query = Detalleventa::find();

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
            'codigo_venta' => $this->codigo_venta,
            'codigo_producto' => $this->codigo_producto,
        ]);

        return $dataProvider;
    }
}
