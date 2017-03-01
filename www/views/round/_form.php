<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Round */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="round-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-block col-5">
        <?= $form->field($model, 'counter')->dropDownList([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8])->label(Yii::t('app', 'Rundennummer')) ?>
        <?= $form->field($model, 'scheduled_activation')->textInput()->label(Yii::t('app', 'voraussichtlicher Start')) ?>
        <p />
        <?= $form->field($model, 'active')->checkbox() ?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Runde erstellen') : Yii::t('app', 'Runde updaten'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    </div>   
    <?php ActiveForm::end(); ?>

</div>
