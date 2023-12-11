<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */

$this->title = 'Agregar Detalle - Venta N° '.$model->codigo_venta;
?>
<div class="detalleventa-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'ventas' => $ventas,
        'productos' => $productos,
    ]) ?>

</div>
