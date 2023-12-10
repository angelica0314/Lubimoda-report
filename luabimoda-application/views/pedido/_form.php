<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Empleado;
use app\models\Proveedor;

/** @var yii\web\View $this */
/** @var app\models\Pedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'documento_empleado')->dropDownList(
    ArrayHelper::map($empleados, 'documento', function($model) {
        return $model['nombres'] . ' ' . $model['apellidos'];
    }),
    ['prompt' => 'Selecciona un empleado']
    ) ?>

    <?= $form->field($model, 'codigo_proveedor')->dropDownList(
    ArrayHelper::map($proveedores, 'codigo', function($model) {
        return $model['codigo'] . ' - ' . $model['nombre'];
    }),
    ['prompt' => 'Selecciona un proveedor']
    ) ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::class, [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy/MM/dd', // Ajusta el formato de la fecha aquí
    'clientOptions' => [
        'changeMonth' => true,
        'changeYear' => true,
        'yearRange' => '1900:' . date('Y'),
    ],
    ]); ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>
    
    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
