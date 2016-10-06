<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\nativ\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зображення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (!Yii::$app->user->isGuest) { ?>
    <p>
        <?= Html::a('Додати зображення', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'image_url:url',
            'order_index',
            'descr:ntext',
            // 'id_product',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
