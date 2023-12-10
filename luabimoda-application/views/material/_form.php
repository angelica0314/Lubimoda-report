<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Proveedor;

/** @var yii\web\View $this */
/** @var app\models\Material $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_proveedor')->dropDownList(
    ArrayHelper::map($proveedores, 'codigo', 'nombre'), // Ajusta según la estructura de tu modelo Proveedor
    ['prompt' => 'Selecciona un proveedor']
    ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'unidad_medida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
