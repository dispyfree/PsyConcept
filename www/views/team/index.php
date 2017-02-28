<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teams');
$this->params['breadcrumbs'][] = $this->title;

// Html::a(Yii::t('app', 'Create Team'), ['create'], ['class' => 'btn btn-success']) 
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'active',
            'management',
            'short_name',
            'mail_address',
            'balance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
