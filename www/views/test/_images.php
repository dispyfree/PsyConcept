<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

use yii\helpers\Url;
?>

<h3> <?= Yii::t('app', 'Bilder') ?></h3>

<div class='fancybox'>
<?= GridView::widget([
        'dataProvider' => $imageDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //See here:http://fancybox.net/howto
            ['attribute' => 'file_name', 'content' => 
                function($model, $key, $index, $column){
                    $imgId = 'image_' . $model->id;
                    return Html::a(Html::encode($model->file_name), Url::to(['image/view', 'id' => $model->id]), 
                            ['id' => $imgId, 'title' => $model->description, 'class' => 'imageLink']);
                }],

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'image'],
        ],
    ]); ?>
</div>
<?= $this->registerJs("$('.fancybox a.imageLink').fancybox();"); ?>

<hr />
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],  'action' => ['image/upload'],]) ?>
            <?= $form->field($imageModel, 'test_id')->hiddenInput()->label(false) ?>
            <?= $form->field($imageModel, 'imageFile')->fileInput() ?>
            <?= $form->field($imageModel, 'description')->textarea() ?>
            <?= Html::submitButton(Yii::t('app', 'Bild hinzufügen'), ['class' => 'btn btn-success']) ?>    

<?php ActiveForm::end() ?>

