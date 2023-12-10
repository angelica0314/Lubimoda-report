<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Venta;
use app\models\Producto;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_venta')->dropDownList(
    ArrayHelper::map($ventas, 'codigo', function($model) {
        return $model['codigo'] . ' - ' . $model['descripcion'];
    }),
    ['prompt' => 'Selecciona venta']
    ) ?>

    <?= $form->field($model, 'codigo_producto')->dropDownList(
    ArrayHelper::map($productos, 'codigo', function($model) {
        return $model['codigo'] . ' - ' . $model['nombre'];
    }),
    ['prompt' => 'Selecciona un producto']
    ) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
