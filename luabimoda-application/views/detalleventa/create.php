<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */

$this->title = 'Ingresar DetalleVenta';
$this->params['breadcrumbs'][] = ['label' => 'DetalleVentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleventa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ventas' => $ventas,
        'productos' => $productos,
    ]) ?>

</div>
