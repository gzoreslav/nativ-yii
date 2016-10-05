<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use app\modules\nativ\models\Product;
use yii\data\Pagination;


/* @var $this yii\web\View */
/* @var $model app\modules\nativ\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) { ?>
        <p>
            <?= Html::a('Редагувати категорію', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Видалити категорію', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Ви дійсно бажаєте видалити цю категорію?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Додати продукт', ['/nativ/product/create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>

    <?php 
    $AllProducts = Product::find()
        ->orderBy('order_index, name')
        ->where(['id_category' => $model->id]);
    $pages = new Pagination(['totalCount' => $AllProducts->count(), 'pageSize' => 6]);
    $products = $AllProducts
        ->offset($pages->offset)
        ->limit(6)
        ->all();
    ?>
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
