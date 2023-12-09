<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $codigo
 * @property string $nombre
 * @property string $descripcion
 * @property string $estampado
 * @property string $talla
 * @property string $categoria
 * @property string $genero
 *
 * @property DetalleVenta[] $detalleVentas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'estampado', 'talla', 'categoria', 'genero'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 200],
            [['estampado', 'talla', 'categoria', 'genero'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'estampado' => 'Estampado',
            'talla' => 'Talla',
            'categoria' => 'Categoria',
            'genero' => 'Genero',
        ];
    }

    /**
     * Gets query for [[DetalleVentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, ['codigo_producto' => 'codigo']);
    }
}
