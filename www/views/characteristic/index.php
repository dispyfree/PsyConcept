<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CharacteristicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Characteristics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Charakteristikum hinzufügen'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            ['attribute' => 'criterionCategory.name', 'label' => Yii::t('app', 'Kategorie')],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
