<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
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
 * @property Venta[] $ventas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
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
            [['nombres', 'apellidos', 'telefono', 'direccion', 'email'], 'string', 'max' => 250],
            [['ciudad'], 'string', 'max' => 100],
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
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::class, ['documento_cliente' => 'documento']);
    }
}
