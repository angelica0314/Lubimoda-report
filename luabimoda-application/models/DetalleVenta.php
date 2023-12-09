<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_ventas".
 *
 * @property int $codigo
 * @property float $precio_unitario
 * @property float $cantidad
 * @property int $codigo_venta
 * @property int $codigo_producto
 *
 * @property Producto $codigoProducto
 * @property Venta $codigoVenta
 */
class DetalleVenta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'precio_unitario', 'cantidad', 'codigo_venta', 'codigo_producto'], 'required'],
            [['codigo', 'codigo_venta', 'codigo_producto'], 'integer'],
            [['precio_unitario', 'cantidad'], 'number'],
            [['codigo'], 'unique'],
            [['codigo_venta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::class, 'targetAttribute' => ['codigo_venta' => 'codigo']],
            [['codigo_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['codigo_producto' => 'codigo']],
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
            'codigo_venta' => 'Codigo Venta',
            'codigo_producto' => 'Codigo Producto',
        ];
    }

    /**
     * Gets query for [[CodigoProducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoProducto()
    {
        return $this->hasOne(Producto::class, ['codigo' => 'codigo_producto']);
    }

    /**
     * Gets query for [[CodigoVenta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoVenta()
    {
        return $this->hasOne(Venta::class, ['codigo' => 'codigo_venta']);
    }
}
