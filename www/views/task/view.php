<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use  yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description:ntext',
            'round_id',
        ],
    ]) ?>
     
    <hr />
    <p>
        <h1><?= Html::encode(Yii::t('app', 'Eigenschaften')) ?></h1> <br />
        <div class="card card-block">
             <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'characteristic.name',
                    'value',

                    ['class' => 'yii\grid\ActionColumn', 'visibleButtons' => ['view' => false, 'update' => false, 'edit' => false],
                        'controller' => 'task-characteristic'],
                ],
            ]); ?>
            
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($taskCharModel, 'task_id')->hiddenInput()->label(false) ?>
            <div class="row" style='margin: 20px;'>
                <div class="col-7 card card-block">
                    <div class="row">
                        <div class="col-5">
                            <?= $form->field($taskCharModel, 'characteristic_id')->dropDownList(
                                    ArrayHelper::map($taskCharModel->getCharacteristicsDropDown(), 'id','name'), [
                                    'prompt' => Yii::t('app', 'Merkmal auswählen'),
                                ])->label(Yii::t('app', 'Merkmal')) ?>
                        </div>
                        <div class="col-6">
                             <?= $form->field($taskCharModel, 'value')->textInput() ?>
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
