<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pedido;
use app\models\Material;

/** @var yii\web\View $this */
/** @var app\models\Detallepedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detallepedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_material')->dropDownList(
    ArrayHelper::map($materiales, 'codigo', function($model) {
        return $model['codigo'] . ' - ' . $model['descripcion'];
    }),
    ['prompt' => 'Selecciona un material']
    ) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput() ?>

    <div class="form-group">
        <?= Html::a('Volver', ['volver', 'codigo' => $model->codigo_pedido], ['class' => 'btn btn-secondary']) ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
