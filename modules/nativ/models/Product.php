<?php

namespace app\modules\nativ\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $descr
 * @property integer $status
 * @property double $price
 * @property integer $id_category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'descr', 'id_category'], 'required'],
            [['descr'], 'string'],
            [['status', 'id_category'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'descr' => 'Опис',
            'status' => 'Статус',
            'price' => 'Ціна',
            'id_category' => 'Категорія',
        ];
    }
}
