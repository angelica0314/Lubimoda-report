<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pedido $model */

$this->title = 'Actualizar Pedido: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'codigo' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
