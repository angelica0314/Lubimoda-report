<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Empleado $model */

$this->title = $model->documento." - ".$model->nombres." ".$model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empleado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'documento' => $model->documento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'documento' => $model->documento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que deseas eliminar este Empleado?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'documento',
            'nombres',
            'apellidos',
            'fecha_nacimiento',
            'telefono',
            'direccion',
            'ciudad',
            'email:email',
        ],
    ]) ?>

</div>
