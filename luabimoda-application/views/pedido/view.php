<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\db\ActiveQuery;
use app\models\Material;
use yii\grid\EditableColumn;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\Pedido $model */


$this->title = 'Pedido N° '.$model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'codigo' => $model->codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'codigo' => $model->codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que deseas eliminar este Pedido?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'cantidad',
            'fecha',
            'total',
            'documento_empleado',
            'descripcion',
            'codigo_proveedor',
        ],
    ]) ?>


<h3>Detalle del pedido</h3>



<?= GridView::widget([
        'dataProvider' => $detallePedidoDataProvider,
        'filterModel' => $searchModelDetalle,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            //'codigo_pedido',
            [
                'label' => 'Material',
                'attribute' => 'codigo_material',
                'value' => function ($model) {
                    // Accede al modelo de empleado desde el modelo de detalle
                    $material = Material::getModelMaterial($model->codigo_material);
                    
                    // Retorna el formato deseado (puedes ajustar esto según tu modelo)
                    return $material ? $material['codigo'] .  ' - ' . $material['nombre'] : 'N/A';
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
                            ['detallepedido/delete', 'codigo' => $model->codigo],
                            [
                                'title' => 'Eliminar',
                                'data-confirm' => '¿Estás seguro de que quieres eliminar este elemento?',
                                'data-method' => 'post',
                            ]
                        );
                    },
                ],
            ],
        ]
    ]); 
    ?>


<?= Html::a('Agregar Detalle', ['agregardetalle', 'codigo' => $model->codigo], ['class' => 'btn btn-outline-secondary']) ?>

</div>
