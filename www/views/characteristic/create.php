<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Characteristic */

$this->title = Yii::t('app', 'Charakteristikum erstellen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Characteristics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container">
        <div class="row">
            <div class="col-5 card card-box" style="margin-right:20px;">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
            <div class="col-5 card card-box">
                <p />
                <div class="alert alert-info" role="alert">
                    <?= Yii::t('app', 'Charakteristika dienen dazu, die Merkmale von Tests und Aufgaben zu charakterisieren. Dabei repräsentiert ein Charakteristikum als Objekt ein Merkmal; die konkrete Zuweisung von Werten für bestimmte Merkmale erfolgt jeweils bei den einzelnen Tests und/oder Aufgaben '); ?>
                </div>
            </div>
        </div>
    </div>

</div>
