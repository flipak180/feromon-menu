<?php

namespace common\models;

use common\components\Helper;
use himiklab\sortablegrid\SortableGridBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property string|null $image2
 * @property string|null $description
 * @property string|null $price
 * @property int $category_id
 * @property int $position
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public $image_field;
    public $image2_field;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'position'
            ],
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!$this->position) {
            $this->position = 0;
        }
        Helper::uploadImage($this);
        Helper::uploadImage($this, 'image2');
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id', 'position'], 'integer'],
            [['title', 'image', 'image2', 'price'], 'string', 'max' => 255],
            [['image_field', 'image2_field'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg', 'webp'], 'maxSize' => 1024*1024*2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'image' => 'Изображение',
            'image_field' => 'Изображение',
            'image2' => 'Доп. изображение',
            'image2_field' => 'Доп. изображение',
            'description' => 'Описание',
            'price' => 'Цена',
            'category_id' => 'Категория',
            'position' => 'Позиция',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
