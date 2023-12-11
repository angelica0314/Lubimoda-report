<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\db\ActiveQuery;
use app\models\Producto;
use yii\grid\EditableColumn;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Venta $model */

$this->title ='Venta N° '. $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="venta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'codigo' => $model->codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'codigo' => $model->codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que deseas eliminar este Venta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'descripcion',
            'total',
            'cantidad',
            'fecha',
            'documento_empleado',
            'documento_cliente',
        ],
    ]) ?>


    <h3>Detalle Venta</h3>

<?= GridView::widget([
        'dataProvider' => $dataProviderDetalle,
        'filterModel' => $searchModelDetalle,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            //'codigo_venta',
            [
                'label' => 'Producto',
                'attribute' => 'codigo_producto',
                'value' => function ($model) {
                    // Accede al modelo de empleado desde el modelo de detalle
                    $producto = Producto::getModelProducto($model->codigo_producto);
                    
                    // Retorna el formato deseado (puedes ajustar esto según tu modelo)
                    return $producto ? $producto['codigo'] .  ' - ' . $producto['nombre'] : 'N/A';
                },
                'format' => 'raw',
                'enableSorting' => true,
            ],
            'cantidad',
            'precio_unitario',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}', // Solo mostrar el botón de eliminar
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '<span class="fas fa-trash"></span>',
                            ['detalleventa/delete', 'codigo' => $model->codigo],
                            [
                                'title' => 'Eliminar',
                                'data-confirm' => '¿Estás seguro de que quieres eliminar este elemento?',
                                'data-method' => 'post',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>

<?= Html::a('Agregar Detalle', ['agregardetalle', 'codigo' => $model->codigo], ['class' => 'btn btn-outline-secondary']) ?>

</div>
