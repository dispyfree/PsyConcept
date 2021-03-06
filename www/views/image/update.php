<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Image',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Images')];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <hr />
    <?= Html::img(['image/view', 'id' => $model->id], ['style' => 'max-width:90%;', 'class' => 'thumbnail']) ?>

</div>
