<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property int $documento
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property string $telefono
 * @property string $direccion
 * @property string $ciudad
 * @property string $email
 *
 * @property Pedido[] $pedidos
 * @property Venta[] $ventas
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['documento', 'nombres', 'apellidos', 'fecha_nacimiento', 'telefono', 'direccion', 'ciudad', 'email'], 'required'],
            [['documento'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['nombres', 'apellidos', 'telefono', 'direccion'], 'string', 'max' => 250],
            [['ciudad'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 200],
            [['documento'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'documento' => 'Documento',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['documento_empleado' => 'documento']);
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::class, ['documento_empleado' => 'documento']);
    }
}
