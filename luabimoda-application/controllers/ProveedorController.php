<?php

namespace app\controllers;

use app\models\Proveedor;
use app\models\ProveedorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProveedorController implements the CRUD actions for Proveedor model.
 */
class ProveedorController extends Controller
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
     * Lists all Proveedor models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProveedorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proveedor model.
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
     * Creates a new Proveedor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Proveedor();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'codigo' => $model->codigo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proveedor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $codigo Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codigo)
    {
        $model = $this->findModel($codigo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codigo' => $model->codigo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proveedor model.
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
     * Finds the Proveedor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $codigo Codigo
     * @return Proveedor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codigo)
    {
        if (($model = Proveedor::findOne(['codigo' => $codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
