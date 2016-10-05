<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\nativ\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\nativ\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['/nativ/category/index']];
$category = Category::find()
    ->where(['id' => $model->id_category])
    ->one();
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['/nativ/category/view', 'id' => $model->id_category]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) { ?>
    <p>
        <?= Html::a('Редагувати продукт', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити продукт', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви дійсно бажаєте видалити цей продукт?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Додати зображення', ['/nativ/images/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>

    <div class="row">
        <div class="col-lg-8">
            <?= nl2br(Html::encode($model->descr)) ?>
        </div>
        <div class="col-lg-4">
            <h3><span class="label label-success pull-right"><?= $model->price ?> &euro;</span></h3>
        </div>
    </div>

</div>
		