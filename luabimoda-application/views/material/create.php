<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Material $model */

$this->title = 'Agregar Material';
$this->params['breadcrumbs'][] = ['label' => 'Materiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'proveedores' => $proveedores,
    ]) ?>

</div>
