<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\db\ActiveQuery;
use app\models\Material;

/** @var yii\web\View $this */
/** @var app\models\Pedido $model */

$this->title = $model->codigo;
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
        'dataProvider' => $dataProviderDetalle,
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
                
            ],
        ],
    ]); ?>


</div>
