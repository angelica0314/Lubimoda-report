<?php

namespace app\controllers;

use Yii;
use app\models\Pedido;
use app\models\Detallepedido;
use yii\data\ActiveDataProvider;
use app\models\DetallepedidoSearch;
use app\models\Proveedor;
use app\models\Empleado;
use app\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;


/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionUpdateAttribute($codigo, $attribute, $value)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = Detallepedido::findOne($codigo);

        if ($model) {
            $model->$attribute = $value;

            if ($model->save()) {
                return ['success' => true];
            } else {
                return ['success' => false, 'errors' => $model->errors];
            }
        }

        return ['success' => false, 'message' => 'Detallepedido not found'];
    }

    /**
     * Lists all Pedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param int $codigo Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($codigo)
    {
        $searchModelDetalle = new DetallepedidoSearch();

        $pedido = $this->findModel($codigo);
        $detallePedidoDataProvider = new ActiveDataProvider([
            'query' => Detallepedido::find()->where(['codigo_pedido' => $pedido->codigo]),
            'pagination' => [
                'pageSize' => 10, // Puedes ajustar el tamaño de la página según tus necesidades
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($codigo),
            'detallePedidoDataProvider' => $detallePedidoDataProvider,
            'searchModelDetalle' => $searchModelDetalle,
        ]);
    }



    public function actionAgregardetalle($codigo){
        return $this->redirect(['detallepedido/create','codigo'=>$codigo]);
    }
    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pedido();
        $proveedores = Proveedor::find()->all();
        $empleados = Empleado::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'codigo' => $model->codigo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'proveedores' => $proveedores,
            'empleados' => $empleados,
        ]);
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $codigo Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codigo)
    {
        $model = $this->findModel($codigo);
        $proveedores = Proveedor::find()->all();
        $empleados = Empleado::find()->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codigo' => $model->codigo]);
        }

        return $this->render('update', [
            'model' => $model,
            'proveedores' => $proveedores,
            'empleados' => $empleados,
            
        ]);
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $codigo Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($codigo)
    {
        $this->findModel($codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $codigo Codigo
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codigo)
    {
        if (($model = Pedido::findOne(['codigo' => $codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
