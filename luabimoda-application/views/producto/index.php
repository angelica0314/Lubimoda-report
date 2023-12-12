<?php

use app\models\Producto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Listado de productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Producto', ['create'], ['class' => 'btn btn-success']) ?>
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
            'estampado',
            //'talla',
            'categoria',
            //'genero',
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['title' => 'Acciones'],
                'urlCreator' => function ($action, Producto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'codigo' => $model->codigo]);
                 }
            ],
           /* [
                'class' => ActionColumn::className(),
                'headerOptions' => ['title' => 'Acciones'], // Tooltip para toda la columna de acciones
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => 'Ver Detalles', // Tooltip para el botón de ver
                            'data-toggle' => 'tooltip',
                            // ... otros atributos ...
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Actualizar', // Tooltip para el botón de actualizar
                            'data-toggle' => 'tooltip',
                            // ... otros atributos ...
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Eliminar', // Tooltip para el botón de eliminar
                            'data-toggle' => 'tooltip',
                            'data-confirm' => '¿Estás seguro de que quieres eliminar este elemento?',
                            // ... otros atributos ...
                        ]);
                    },
                ],
               'urlCreator' => function ($action, $model, $key, $index) {
                    // Utiliza Url::toRoute para generar las URLs personalizadas
                    $controller = 'tu-controlador'; // Reemplaza con el nombre de tu controlador
                    $params = ['id' => $model->id]; // Reemplaza con los parámetros necesarios
    
                    return Url::toRoute([$controller . '/' . $action, 'id' => $model->id]);
                },
                
            ],*/
        ],
    ]); ?>


</div>
