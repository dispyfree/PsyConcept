<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TestAcquirement */

$this->title = Yii::t('app', 'Create Test Acquirement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Test Acquirements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-acquirement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
