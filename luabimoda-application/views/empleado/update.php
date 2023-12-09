<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Empleado $model */

$this->title = 'Actualizar Empleado: ' . $model->documento;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->documento, 'url' => ['view', 'documento' => $model->documento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="empleado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
