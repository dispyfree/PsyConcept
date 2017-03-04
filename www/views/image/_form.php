<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Image */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-form card card-box">
    <?php $form = ActiveForm::begin(); ?>
        <div class='container' style='margin:10px'>
        <div class='row'>
            <div class='col-4'>
                <?= $form->field($model, 'file_name')->textInput(['disabled' => true]) ?>

            <div class="form-group">
                    <?= $form->field($model, 'test_id')->hiddenInput()->label(false) ?>
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            </div>

            <div class='col-8'>
                <?= $form->field($model, 'description')->textInput() ?>
            </div>
        </div>
        </div>
    
    <?php ActiveForm::end(); ?>


</div>
