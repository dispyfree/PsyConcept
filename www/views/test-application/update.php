<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TestApplication */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Test Application',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Test Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="test-application-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
