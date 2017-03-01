<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CriterionCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<br />
<div class="criterion-category-form">
    <div class="row">
        <div class="col-5 card card-block">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Erstellen') : Yii::t('app', 'Aktualisieren'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
