<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Round */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rounds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="round-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'id',
            'counter',
            [
                'attribute' => 'active',
                'format'    => 'boolean',
                'label'     => Yii::t('app', 'aktiv')
            ],
            [
                'attribute' => 'scheduled_activation',
                'format'    => 'date',
                'label'     => Yii::t('app', 'voraussichtlicher Start')
            ],
        ],
    ]) ?>

</div>
