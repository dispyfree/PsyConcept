<?php

namespace app\controllers;

use Yii;
use app\models\Test;
use app\models\TestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider; 

use app\models\TestCharacteristic;
use app\models\Norm;
use app\models\Image;
use app\models\ImageUpload;

/**
 * TestController implements the CRUD actions for Test model.
 */
class TestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Test models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Test model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Test model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Test model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        //Handle changes of characteristics
        $charProvider = new ActiveDataProvider([
            'query' => TestCharacteristic::find()->andFilterWhere(['test_id' => $id]),
        ]);
        
        $testChar = new TestCharacteristic();
        
        if ($testChar->load(Yii::$app->request->post()) && $testChar->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Merkmal wurde hinzugefügt'));
        }
         
        $testChar->test_id = $model->id;
        
        //Handle changes of characteristics
        $imageProvider = new ActiveDataProvider([
            'query' => Image::find()->andFilterWhere(['test_id' => $id]),
        ]);
        $imageModel = new ImageUpload();
        $imageModel->test_id = $model->id;
        
        
        //manage norm changes
        $normProvider = new ActiveDataProvider([
            'query' => Norm::find()->andFilterWhere(['test_id' => $model->id])
        ]);
        $norm = new \app\models\Norm();
        
        if ($norm->load(Yii::$app->request->post()) && $norm->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Normierung wurde hinzugefügt'));
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'normDataProvider' => $normProvider,
                'charDataProvider' => $charProvider,
                'testCharModel' => $testChar,
                'imageDataProvider' => $imageProvider,
                'imageModel' => $imageModel
            ]);
        }
    }

    /**
     * Deletes an existing Test model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
