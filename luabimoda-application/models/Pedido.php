<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $codigo
 * @property float $cantidad
 * @property string $fecha
 * @property float $total
 * @property int $documento_empleado
 * @property string $descripcion
 * @property int $codigo_proveedor
 *
 * @property Proveedor $codigoProveedor
 * @property DetallePedido[] $detallePedidos
 * @property Empleado $documentoEmpleado
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cantidad', 'fecha', 'total', 'documento_empleado', 'descripcion', 'codigo_proveedor'], 'required'],
            [['total','cantidad'], 'number'],
            [['fecha'], 'safe'],
            [['documento_empleado', 'codigo_proveedor'], 'integer'],
            [['descripcion'], 'string', 'max' => 250],
            [['codigo_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::class, 'targetAttribute' => ['codigo_proveedor' => 'codigo']],
            [['documento_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::class, 'targetAttribute' => ['documento_empleado' => 'documento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
            'total' => 'Total',
            'documento_empleado' => 'Empleado',
            'codigo_proveedor' => 'Proveedor',
            'descripcion' => 'Descripcion',
            
        ];
    }

    /**
     * Gets query for [[CodigoProveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoProveedor()
    {
        return $this->hasOne(Proveedor::class, ['codigo' => 'codigo_proveedor']);
    }

    /**
     * Gets query for [[DetallePedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetallePedidos()
    {
        return $this->hasMany(DetallePedido::class, ['codigo_pedido' => 'codigo']);
    }

    /**
     * Gets query for [[DocumentoEmpleado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoEmpleado()
    {
        return $this->hasOne(Empleado::class, ['documento' => 'documento_empleado']);
    }
}
