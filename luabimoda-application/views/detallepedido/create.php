<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallepedido $model */

$this->title = 'Agregar Detalle - Pedido N° '.$model->codigo_pedido;

?>
<div class="detallepedido-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'pedidos' => $pedidos,
        'materiales' => $materiales,
    ]) ?>

</div>
