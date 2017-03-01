<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskCharacteristic;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Deletes an existing Task model.
 * If deletion is successful, the browser will be redirected to the 'index' page.
 * @param integer $id
 * @return mixed
 *
 * 
 */
class TaskCharacteristicController extends Controller{
    
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
    
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $task = $model->task;
        if($model->delete())
            Yii::$app->session->setFlash('success', Yii::t('app', 'Merkmal wurde entfernt'));
        else
            Yii::$app->session->setFlash('error', Yii::t('app', 'Merkmal konnte nicht entfernt werden'));
        
        return $this->redirect(['/task/view', 'id' => $task->id]);
            
    }
    
    /**
     * Finds the TaskCharacteristic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskCharacteristic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
