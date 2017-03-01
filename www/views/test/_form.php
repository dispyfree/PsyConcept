<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Test */
/* @var $form yii\widgets\ActiveForm */

$requiredPersonnel = [];
for($i = 1; $i < 10; $i++)
    $requiredPersonnel[$i] = $i;

?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-2">
            <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-2">
            <?= $form->field($model, 'license_costs')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <?= $form->field($model, 'duration')->textInput() ?>
        </div>
        
        <div class="col-3">
            <?= $form->field($model, 'required_personnel')->dropdownList($requiredPersonnel) ?>
        </div>
        
        <div class="col-3">
            <?= $form->field($model, 'applicability_bottom_age_bound')->textInput() ?>
        </div>
        
        <div class="col-3">
            <?= $form->field($model, 'applicability_upper_age_bound')->textInput() ?>
        </div>
    </div>


    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
