<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = Yii::t('app', 'Aufgabe erstellen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
            <div class="col-5 card card-box">
                <p />
                <div class="alert alert-info" role="alert">
                    <p><strong> <?= Yii::t('app', 'Aufgaben, die schon aktiven Runden zugeordnet werden, sind sofort sicht- und bearbeitbar'); ?></strong></p>
                    <?= Yii::t('app', 'Weitere Informationen wie Charakteristika etc. können nach dem Erstellen der Aufgabe eingetragen werden'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
