<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\LinkPager;
use app\models\Category;


AppAsset::register($this);
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
        'brandLabel' => 'HBM NATIV - Деревообробні верстати',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (
                ['label' => 'Вхід', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Вихід (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php
                $items = [
                    ['label' => 'Головна', 'url' => ['/site/index']],
                    ['label' => 'Контакти', 'url' => ['/site/contact']],
                ];
                echo Menu::widget([
                    'options' => ['class' => 'nav nav-pills nav-stacked nav-main'],
                    'items' => $items
                ]);
                ?>
                <hr/>
                <?php if (!Yii::$app->user->isGuest) { 
                    $items = [
                        ['label' => 'Адміністрування', 'url' => ['/site/admin']]
                    ];
                    echo Menu::widget([
                        'options' => ['class' => 'nav nav-pills nav-stacked nav-admin'],
                        'items' => $items
                    ]);
                } ?>
                <h3>Ми пропонуємо</h3>
                <?php
                $items = [];
                $categoriesCount = Category::find()->count();
                $categories = Category::find()
                    ->orderBy('order_index, name')
                    ->limit(8)
                    ->all();
                foreach ($categories as $category):
                    array_push($items, [
                        'label' => Html::encode("{$category->name}"), 
                        'url' => ['/nativ/category/view', 'id' => $category->id],
                    ]); 
                endforeach;
                array_push($items, ['label' => '... всі категорії <span class="badge">'.$categoriesCount.'</span>', 'url' => ['/nativ/category/index']]);
                echo Menu::widget([
                    'encodeLabels' => false,
                    'options' => ['class' => 'nav nav-pills nav-stacked nav-products'],
                    'items' => $items
                ]);
                ?>
            </div>
            <div class="col-lg-9">
                <?= Breadcrumbs::widget([
                    'homeLink' => ['label' => 'Головна', 'url' => Yii::$app->getHomeUrl()],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; HBM NATIV, <?= date('Y') ?></p>
        <p class="pull-right"><span class="glyphicon glyphicon glyphicon-phone-alt" aria-hidden="true"></span>&nbsp;+380 (98) 123-25-65<br/>
        <span class="glyphicon glyphicon glyphicon-phone-alt" aria-hidden="true"></span>&nbsp;+380 (95) 091-98-59</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
