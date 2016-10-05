<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\nativ\models\Category;


/* @var $this yii\web\View */
/* @var $model app\modules\nativ\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?php
    $dataList=[
        0 => 'Активний продукт',
        1 => 'Неактивний продукт (не відображати)'
    ];
    ?>
    <?=$form->field($model, 'status')->dropDownList($dataList, ['prompt'=>'Виберіть статус']) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?php
    $dataList=ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name');
    ?>
    <?=$form->field($model, 'id_category')->dropDownList($dataList, ['prompt'=>'Виберіть категорію']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Редагувати', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
