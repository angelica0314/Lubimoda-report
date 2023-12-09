<?php

use app\models\Proveedor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProveedorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Consulta de proveedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Proveedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            //'tipo_documento',
            'documento',
            'nombre',
            'email:email',
            'telefono',
            //'direccion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Proveedor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'codigo' => $model->codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
