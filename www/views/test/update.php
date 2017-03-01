<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Test',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$normModel = new app\models\Norm();
$normModel->test_id = $model->id;

?>
<div class="row">
    <div class="col-8">
        <div class="test-update card card-box" style='padding:20px;'> 

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        
        <hr />
        <p>
            <h1><?= Html::encode(Yii::t('app', 'Eigenschaften')) ?></h1> <br />
            <div class="card card-block">
                 <?= GridView::widget([
                    'dataProvider' => $charDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'characteristic.name',
                        'value',

                        ['class' => 'yii\grid\ActionColumn', 'visibleButtons' => ['view' => false, 'update' => false, 'edit' => false],
                            'controller' => 'test-characteristic'],
                    ],
                ]); ?>

                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($testCharModel, 'test_id')->hiddenInput()->label(false) ?>
                <div class="row" style='margin: 20px;'>
                    <div class="col-7 card card-block">
                        <div class="row">
                            <div class="col-5">
                                <?= $form->field($testCharModel, 'characteristic_id')->dropDownList(
                                        ArrayHelper::map($testCharModel->getCharacteristicsDropDown(), 'id','name'), [
                                        'prompt' => Yii::t('app', 'Merkmal auswählen'),
                                    ])->label(Yii::t('app', 'Merkmal')) ?>
                            </div>
                            <div class="col-6">
                                 <?= $form->field($testCharModel, 'value')->textInput() ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Merkmal angeben'), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>

                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </p>
    
    </div>
    
    <div class="col-4">
        <div class="test-update card card-box" style='padding:20px;'> 
            <?= $this->render('@app/views/norm/_form', ['model' => $normModel, 'normDataProvider' => $normDataProvider]); ?>
        </div>
     </div>

</div>
