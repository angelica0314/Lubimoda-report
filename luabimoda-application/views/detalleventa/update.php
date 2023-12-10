<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */

$this->title = 'Actualizar Detalle Venta: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'DetalleVentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'codigo' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="detalleventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
