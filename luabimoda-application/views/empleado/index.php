<?php

use app\models\Empleado;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EmpleadoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Consulta de empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'documento',
            'nombres',
            'apellidos',
            //'fecha_nacimiento',
            'telefono',
            //'direccion',
            //'ciudad',
            'email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Empleado $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'documento' => $model->documento]);
                 }
            ],
        ],
    ]); ?>


</div>
