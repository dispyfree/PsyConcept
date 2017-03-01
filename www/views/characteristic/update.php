<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Characteristic */

$this->title = Yii::t('app', 'Änderung: ', [
    'modelClass' => 'Characteristic',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Characteristics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="characteristic-update">

    
    <div class="row">
         <div class="col-7">
             <div class ="card card-block">
                 <h1><?= Html::encode($this->title) ?></h1>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
             </div>
        </div>
    </div>

</div>
