<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

//Register bootstrap grid css 
$this->registerCssFile('@web/css/bootstrap-grid.css');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', 'PsyConcept'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $isGuest = Yii::$app->user->isGuest;
    $isAdmin = !$isGuest && Yii::$app->user->getIdentity()->management;
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => Yii::t('app', 'Funktionen'),
                'items' => [
                    ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
                    ['label' => Yii::t('app', 'Teams'), 'url' => ['/team/index'], 'visible' => $isAdmin],
                    ['label' => Yii::t('app', 'Runden'), 'url' => ['/round/index'], 'visible' => $isAdmin],
                    ['label' => Yii::t('app', 'Aufgaben'), 'url' => ['/task/index'], 'visible' => $isAdmin],
                    '<li class="divider"></li>',
                    ['label' => Yii::t('app', 'Tests'), 'url' => ['/test/index'], 'visible' => $isAdmin],
                    ['label' => Yii::t('app', 'Normen'), 'url' => ['/norm/index'], 'visible' => $isAdmin],
                    '<li class="divider"></li>',
                    ['label' => Yii::t('app', 'Charakteristiken'), 'url' => ['/characteristic/index'], 'visible' => $isAdmin],
                    ['label' => Yii::t('app', 'Charak. Kat.'), 'url' => ['/criterion-category/index'], 'visible' => $isAdmin],
                ],
            ],
            
            ['label' => Yii::t('app', 'Registrieren'), 'url' => ['/site/register'], 'visible' => $isGuest],
            ['label' => Yii::t('app', 'Mein Account'), 'url' => ['/site/account'], 'visible' => !$isGuest],
            Yii::$app->user->isGuest ? (
                ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->short_name . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'),
            //spacing
            ['label' => ''],
            ['label' => ''],
            ['label' => Yii::t('app', 'Über'), 'url' => ['/site/about']],
            ['label' => Yii::t('app', 'Kontakt'), 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
        <?php
            foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
            }
        ?>
        
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
