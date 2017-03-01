<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>
    <br />
    <div class="container form-group">
        <div class="row">
            <div class="col">
                <div class="card card-block">
                <?= $form->field($model, 'short_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'Teamkürzel')) ?>
                <?= $form->field($model, 'mail_address')->textInput()->label(Yii::t('app', 'E-Mail-Adresse')) ?>
                <?= $form->field($model, 'balance')->textInput()->label(Yii::t('app', 'Kontostand')) ?>
                </div>
            </div>
            
            <div class="col">
                <div class="card card-block">
                    <div class="alert alert-success" role="alert">
                        <?= Yii::t('app', '<strong>Aktivierung:</strong> Benutzeraccounts müssen nach der Registrierung einmalig manuell aktiviert werden.'); ?>
                        <?= $form->field($model, 'active')->checkbox() ?>
                    </div>
                    
                    <div class="alert alert-warning" role="alert">
                        <?= Yii::t('app', '<strong>Warnung:</strong> Durch Aktivieren von \'management\' werden dem entsprechenden Account Administratorrechte verliehen'); ?>
                        <?= $form->field($model, 'management')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
