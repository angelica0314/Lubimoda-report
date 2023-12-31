<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_pedidos".
 *
 * @property int $codigo
 * @property float $precio_unitario
 * @property float $cantidad
 * @property int $codigo_pedido
 * @property int $codigo_material
 *
 * @property Material $codigoMaterial
 * @property Pedido $codigoPedido
 */
class Detallepedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['precio_unitario', 'cantidad', 'codigo_pedido', 'codigo_material'], 'required'],
            [['precio_unitario', 'cantidad'], 'number'],
            [['codigo_pedido', 'codigo_material'], 'integer'],
            [['codigo_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::class, 'targetAttribute' => ['codigo_pedido' => 'codigo']],
            [['codigo_material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::class, 'targetAttribute' => ['codigo_material' => 'codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'precio_unitario' => 'Precio Unitario',
            'cantidad' => 'Cantidad',
            'codigo_pedido' => 'Pedido',
            'codigo_material' => 'Materiales',
        ];
    }

    /**
     * Gets query for [[CodigoMaterial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMaterial()
    {
        return $this->hasOne(Material::class, ['codigo' => 'codigo_material']);
    }

    

    /**
     * Gets query for [[CodigoPedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoPedido()
    {
        return $this->hasOne(Pedido::class, ['codigo' => 'codigo_pedido']);
    }
}
