<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\db\ActiveQuery;
use app\models\Producto;

/** @var yii\web\View $this */
/** @var app\models\Venta $model */

$this->title = $model->codigo;
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
    <h3>Detalle del pedido</h3>

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
                
            ],
        ],
    ]); ?>

</div>
