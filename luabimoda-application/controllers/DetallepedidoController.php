<?php

namespace app\controllers;

use app\models\Detallepedido;
use app\models\Material;
use app\models\Pedido;
use app\models\DetallepedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallepedidoController implements the CRUD actions for Detallepedido model.
 */
class DetallepedidoController extends Controller
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

    

    /**
     * Lists all Detallepedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetallepedidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallepedido model.
     * @param int $codigo Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($codigo),
        ]);
    }

    /**
     * Creates a new Detallepedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($codigo)
    {
        $model = new Detallepedido();
        $model->codigo_pedido = $codigo;
        $pedidos = Pedido::find()->all();
        $materiales = Material::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'codigo' => $model->codigo]);
                return $this->redirect(['pedido/view','codigo' => $model->codigo_pedido]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'pedidos' => $pedidos,
            'materiales' => $materiales,
        ]);
    }

    /**
     * Updates an existing Detallepedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $codigo Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codigo)
    {
        $model = $this->findModel($codigo);
        $pedidos = Pedido::find()->all();
        $materiales = Material::find()->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codigo' => $model->codigo]);
        }

        return $this->render('update', [
            'model' => $model,
            'pedidos' => $pedidos,
            'materiales' => $materiales,
        ]);
    }

    /**
     * Deletes an existing Detallepedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $codigo Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($codigo)
    {
        $model = $this->findModel($codigo);
        $codigo_pedido = $model->codigo_pedido;
        $this->findModel($codigo)->delete();
        

        return $this->redirect(['pedido/view','codigo' => $codigo_pedido]);
    }

    public function actionVolver($codigo)
    {

        return $this->redirect(['pedido/view','codigo' => $codigo]);
    }

    /**
     * Finds the Detallepedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $codigo Codigo
     * @return Detallepedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codigo)
    {
        if (($model = Detallepedido::findOne(['codigo' => $codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
