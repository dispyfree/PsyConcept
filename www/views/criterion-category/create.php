<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CriterionCategory */

$this->title = Yii::t('app', 'Create Criterion Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Criterion Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterion-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
