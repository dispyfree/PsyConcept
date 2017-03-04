<?php


use app\assets\FancyBoxAsset;
FancyBoxAsset::register($this); 


use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-view fancybox col_left">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class='container card card-block'>
        <div class='row'>
            <div class='col-8'>
                <?= $model->description; ?> 
            </div>
            
            <div class='col-4'>
                <p>
                    <?php if(Yii::$app->user->getIdentity()->management){ ?>
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]) ?>
                   <?php } ?>
                    
                </p>
                 <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'short_name',
                        'full_name',
                        'license_costs',
                        'duration',
                        'required_personnel',
                        'applicability_bottom_age_bound',
                        'applicability_upper_age_bound',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <hr />
    <p>
        <?php
            foreach($model->images as $image){
                $imgId = 'image_' . $image->id;
                echo Html::a(Html::img(Url::to(['image/view', 'id' => $image->id]), ['class' => 'thumbnailScaler']), Url::to(['image/view', 'id' => $image->id]), 
                            ['id' => $imgId, 'title' => $model->description, 'class' => 'imageLink']);
            }
        ?>
    </p>


</div>

<?= $this->registerJs("$('.fancybox a.imageLink').fancybox();"); ?>
