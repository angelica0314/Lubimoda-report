<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property int $codigo
 * @property int $documento
 * @property string $nombre
 * @property int $email
 * @property string $telefono
 * @property string $direccion
 *
 * @property Materiale[] $materiales
 * @property Pedido[] $pedidos
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'documento', 'nombre', 'email', 'telefono', 'direccion'], 'required'],
            [['codigo', 'documento', 'email'], 'integer'],
            [['nombre', 'telefono', 'direccion'], 'string', 'max' => 250],
            [['codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'documento' => 'Documento',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * Gets query for [[Materiales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateriales()
    {
        return $this->hasMany(Materiale::class, ['codigo_proveedor' => 'codigo']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['codigo_proveedor' => 'codigo']);
    }
}
