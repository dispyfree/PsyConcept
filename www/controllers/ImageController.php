<?php

namespace app\controllers;

use Yii;
use app\models\Image;
use app\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\ImageUpload;
use yii\web\UploadedFile;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends Controller
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
     * Displays a single Image model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $path = Yii::getAlias('@app/data/uploads/') . $model->file_name;
        if (file_exists($path))
        {
            //@todo: fix mime type
            Yii::$app->response->sendFile($path, null, ['mimeType' => 'image/jpeg', 'inline' => true]);
            Yii::$app->response->send();
        }
        else{
            throw new NotFoundHttpException(Yii::t('app', 'Die angefragte Ressource existiert nicht'));
        }
    }
    
    public function actionUpload()
    {
       $model = new ImageUpload();

        if (Yii::$app->request->isPost) {
            //Will not return true because imageFile is obviously not populated. Does load anyway. 
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->upload()) {
                $img = new Image();
                $img->test_id = $model->test_id;
                $img->description = $model->description;
                $img->file_name = $model->getFullFileName();
                if($img->save()){
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Bild wurde hinzugefügt'));
                }
                else{
                    die(var_dump($img->getErrors()));
                    Yii::$app->session->setFlash('error', Yii::t('app', 'Bild konnte nicht abgespeichert werden'));
                }
            }
            else{
                Yii::$app->session->setFlash('error', Yii::t('app', 'Bild konnte nicht hochgeladen werden'));
            }
        }

        return $this->redirect(['/test/update', 'id' => $model->test_id]);
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/test/update', 'id' => $model->test_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Image model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $test_id = $model->test_id;
        $model->delete();

        return $this->redirect(['/test/update', 'id' => $test_id]);
    }

    /**
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
