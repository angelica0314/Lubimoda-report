<?php

use app\models\Material;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MaterialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Listado de materiales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            'nombre',
            'descripcion',
            'color',
            'codigo_proveedor',
            //'cantidad',
            //'unidad_medida',
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Material $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'codigo' => $model->codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
