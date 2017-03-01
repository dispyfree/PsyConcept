<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Norm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="norm-form">
    <h3> <?= Yii::t('app', 'Normierungen'); ?> </h3>
    <?= GridView::widget([
        'dataProvider' => $normDataProvider,
        'columns' => [
            ['attribute' => 'applicability_bottom_age_bound', 'label' => Yii::t('app', 'von')],
            ['attribute' => 'applicability_upper_age_bound', 'label' => Yii::t('app', 'bis')],

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'norm', 'visibleButtons' => ['view' => false, 'update' => false, 'edit' => false]],
        ],
    ]); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'test_id')->hiddenInput()->label(false) ?>

    <div class="card card-box" style='padding:10px;'>
        <h3> <?= Yii::t('app', 'Normierung hinzufügen'); ?></h3>
    <div class="row" >
        <div class="col-6">
            <?= $form->field($model, 'applicability_bottom_age_bound')->textInput()->label(Yii::t('app', 'untere Grenze')) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'applicability_upper_age_bound')->textInput()->label(Yii::t('app','obere Grenze')) ?>
        </div>
    </div>
        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Hinzufügen'), ['class' =>  'btn btn-success' ]) ?>
        </div>
    </div>
       

    <?php ActiveForm::end(); ?>

</div>
