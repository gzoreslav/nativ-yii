<?php

namespace app\modules\nativ\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $title
 * @property string $image_url
 * @property integer $order_index
 * @property string $descr
 * @property integer $id_product
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image_url', 'descr', 'id_product'], 'required'],
            [['order_index', 'id_product'], 'integer'],
            [['descr'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['image_url'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва',
            'image_url' => 'Url',
            'order_index' => 'Індекс сортування',
            'descr' => 'Опис',
            'id_product' => 'Продукт',
        ];
    }
}
