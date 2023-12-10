<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $codigo
 * @property string $descripcion
 * @property float $total
 * @property float $cantidad
 * @property string $fecha
 * @property int $documento_empleado
 * @property int $documento_cliente
 *
 * @property DetalleVenta[] $detalleVentas
 * @property Cliente $documentoCliente
 * @property Empleado $documentoEmpleado
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'total', 'cantidad', 'fecha', 'documento_empleado', 'documento_cliente'], 'required'],
            [['total', 'cantidad'], 'number'],
            [['fecha'], 'safe'],
            [['documento_empleado', 'documento_cliente'], 'integer'],
            [['descripcion'], 'string', 'max' => 250],
            [['documento_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::class, 'targetAttribute' => ['documento_empleado' => 'documento']],
            [['documento_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['documento_cliente' => 'documento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'total' => 'Total',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
            'documento_empleado' => 'Empleado',
            'documento_cliente' => 'Cliente',
        ];
    }

    /**
     * Gets query for [[DetalleVentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, ['codigo_venta' => 'codigo']);
    }

    /**
     * Gets query for [[DocumentoCliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoCliente()
    {
        return $this->hasOne(Cliente::class, ['documento' => 'documento_cliente']);
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
