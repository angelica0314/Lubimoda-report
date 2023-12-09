<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $codigo
 * @property float $cantidad
 * @property int $fecha
 * @property int $total
 * @property int $documento_empleado
 * @property string $descripcion
 * @property int $codigo_proveedor
 *
 * @property Proveedore $codigoProveedor
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
            [['codigo', 'cantidad', 'fecha', 'total', 'documento_empleado', 'descripcion', 'codigo_proveedor'], 'required'],
            [['codigo', 'fecha', 'total', 'documento_empleado', 'codigo_proveedor'], 'integer'],
            [['cantidad'], 'number'],
            [['descripcion'], 'string', 'max' => 250],
            [['codigo'], 'unique'],
            [['codigo_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedore::class, 'targetAttribute' => ['codigo_proveedor' => 'codigo']],
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
            'documento_empleado' => 'Documento Empleado',
            'descripcion' => 'Descripcion',
            'codigo_proveedor' => 'Codigo Proveedor',
        ];
    }

    /**
     * Gets query for [[CodigoProveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoProveedor()
    {
        return $this->hasOne(Proveedore::class, ['codigo' => 'codigo_proveedor']);
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
