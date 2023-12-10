<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallepedido $model */

$this->title = 'Actualizar DetallePedido: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'DetallePedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'codigo' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="detallepedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pedidos' => $pedidos,
        'materiales' => $materiales,
    ]) ?>

</div>
