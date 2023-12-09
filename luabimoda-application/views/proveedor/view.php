<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Proveedor $model */

$this->title = $model->codigo." - ". $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Proveedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="proveedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'codigo' => $model->codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'codigo' => $model->codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que deseas eliminar este Proveedor?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'tipo_documento',
            'documento',
            'nombre',
            'email:email',
            'telefono',
            'direccion',
        ],
    ]) ?>

</div>
