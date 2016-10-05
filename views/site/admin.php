<?php

use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = 'Адміністрування';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-4">
                <h3>Категорії</h3>
                <?= Html::a('Переглянути', ['/nativ/category/index'], ['class' => 'btn btn-default']) ?>&nbsp;
                <?= Html::a('Додати', ['/nativ/category/create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-lg-4">
                <h3>Продукти</h3>
                <?= Html::a('Переглянути', ['/nativ/product/index'], ['class' => 'btn btn-default']) ?>&nbsp;
                <?= Html::a('Додати', ['/nativ/product/create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-lg-4">
                <h3>Зображення</h3>
                <?= Html::a('Переглянути', ['/nativ/images/index'], ['class' => 'btn btn-default']) ?>&nbsp;
                <?= Html::a('Додати', ['/nativ/images/create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>
</div>
