<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = Yii::t('app', 'Test erstellen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="test-create">
    <div class="row">
        <div class="col-8">
            <div class="card card-block"> 
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>

</div>
