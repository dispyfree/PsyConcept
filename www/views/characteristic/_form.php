<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Characteristic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characteristic-form" style='margin: 10px;'> 
    <br /> 
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'criterion_category_id')->dropDownList(ArrayHelper::map($model->getCriterionCategoryDropDown(), 'id','name'), [
                    'prompt' => Yii::t('app', 'Kategorie auswählen'),
            ])->label('Kategorie') ?>


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

</div>
