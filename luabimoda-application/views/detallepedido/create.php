<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallepedido $model */

$this->title = 'Ingresar DetallePedido';
$this->params['breadcrumbs'][] = ['label' => 'DetallePedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallepedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
