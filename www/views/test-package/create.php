<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TestPackage */

$this->title = Yii::t('app', 'Create Test Package');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Test Packages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-package-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
