<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\Team;

$this->title = Yii::t('app', 'Registrierung');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= \Yii::t('app', 'Ihr Account wird nach der Registrierung von Hand freigeschaltet.') ?></p>

    <div class="container">
       <div class="row">
            <div class="col-lg-7">

                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "<div class=\"col-lg-3\">{label}</div>\n<div class=\"col-lg-4\">{input}</div>\n"
                                        . "<div class=\"col-lg-5\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>

                    <?= $form->field($model, 'short_name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'mail_address')->textInput() ?>

                    <?= $form->field($model, 'password_1')->passwordInput() ?>

                    <?= $form->field($model, 'password_2')->passwordInput() ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton(Yii::t('app', 'Registrierung'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-lg-5">
                <?=
                 app\components\InputInfoWidget::widget(['model' => $model, 'formId' => 'registrationform']);
                ?>
            </div>
       </div>
    </div>

</div>
