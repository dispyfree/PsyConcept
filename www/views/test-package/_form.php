<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TestPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_test_id')->textInput() ?>

    <?= $form->field($model, 'child_test_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
