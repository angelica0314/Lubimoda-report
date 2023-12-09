<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materiales".
 *
 * @property int $codigo
 * @property string $unidad_medida
 * @property string $descripcion
 * @property string $color
 * @property string $nombre
 * @property float $cantidad
 * @property int $codigo_proveedor
 *
 * @property Proveedore $codigoProveedor
 * @property DetallePedido[] $detallePedidos
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materiales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'unidad_medida', 'descripcion', 'color', 'nombre', 'cantidad', 'codigo_proveedor'], 'required'],
            [['codigo', 'codigo_proveedor'], 'integer'],
            [['cantidad'], 'number'],
            [['unidad_medida', 'color'], 'string', 'max' => 100],
            [['descripcion', 'nombre'], 'string', 'max' => 250],
            [['codigo'], 'unique'],
            [['codigo_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedore::class, 'targetAttribute' => ['codigo_proveedor' => 'codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'unidad_medida' => 'Unidad Medida',
            'descripcion' => 'Descripcion',
            'color' => 'Color',
            'nombre' => 'Nombre',
            'cantidad' => 'Cantidad',
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
        return $this->hasMany(DetallePedido::class, ['codigo_material' => 'codigo']);
    }
}
