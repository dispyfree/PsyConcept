<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-view">

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
            [
                'attribute' => 'active',
                'format'    => 'boolean',
                'label'     => Yii::t('app', 'aktiv')
            ],
            [
                'attribute' => 'management',
                'format'    => 'boolean',
                'label'     => Yii::t('app', 'Admin-Account')
            ],
            [
                'attribute' => 'short_name',
                'format'    => 'text',
                'label'     => Yii::t('app', 'Teamkürzel')
            ],
            [
                'attribute' => 'mail_address',
                'format'    => 'text',
                'label'     => Yii::t('app', 'E-Mail-Adresse')
            ],
            [
                'attribute' => 'balance',
                'format'    => 'decimal',
                'label'     => Yii::t('app', 'Kontostand')
            ],
        ],
    ]) ?>

</div>
