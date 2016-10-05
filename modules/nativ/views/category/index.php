<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\nativ\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категорії';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (!Yii::$app->user->isGuest) { ?>
        <p>
            <?= Html::a('Додати категорію', ['create'], ['class' => 'btn btn-success']) ?>&nbsp;
            <?= Html::a('Додати продукт', ['/nativ/product/create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>
    <div class="row">
    <?php foreach ($categories as $category) { ?>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">

                <a href="/basic/web/index.php?r=nativ%2Fcategory%2Fview&id=<?= $category->id ?>">
                    <img src="/basic/static/images/default_category.png" alt="<?= $category->name ?>">
                </a>

                <div class="caption">
                    <?= HTML::a($category->name, ['/nativ/category/view', 'id' => $category->id]) ?>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>
        </div>
    </div>
</div>
