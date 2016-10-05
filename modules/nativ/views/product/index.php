<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\nativ\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) { ?>
    <p>
        <?= Html::a('Додати продукт', ['create'], ['class' => 'btn btn-success']) ?>&nbsp;
        <?= Html::a('Додати зображення', ['/nativ/images/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    <div class="row">
    <?php foreach ($products as $product) { ?>

        <div class="col-sm-6 col-md-6">
            <div class="thumbnail thumbnail-product">

                <a href="/basic/web/index.php?r=nativ%2Fproduct%2Fview&id=<?= $product->id ?>">
                    <img src="/basic/static/images/default_category.png" alt="<?= $product->name ?>">
                </a>

                <div class="caption">
                    <h3><?= HTML::a($product->name, ['/nativ/product/view', 'id' => $product->id]) ?></h3>
                    <p><?= nl2br(Html::encode($product->descr)) ?></p>
                    <div class="gradient"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
        <?php 
        if (count($products) == 0) {
            echo '<h3 class="no-data">На жаль, в даній категорії немає товарів</h3>';
        }
    ?>
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
