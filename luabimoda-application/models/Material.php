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
 * @property Proveedor $codigoProveedor
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
            [['unidad_medida', 'descripcion', 'color', 'nombre', 'cantidad', 'codigo_proveedor'], 'required'],
            [['cantidad'], 'number'],
            [['codigo_proveedor'], 'integer'],
            [['unidad_medida', 'color'], 'string', 'max' => 100],
            [['descripcion', 'nombre'], 'string', 'max' => 250],
            [['codigo_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::class, 'targetAttribute' => ['codigo_proveedor' => 'codigo']],
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
            'codigo_proveedor' => 'Proveedor',
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
        return $this->hasMany(DetallePedido::class, ['codigo_material' => 'codigo']);
    }
}
