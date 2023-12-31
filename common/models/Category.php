<?php

namespace common\models;

use common\components\Helper;
use himiklab\sortablegrid\SortableGridBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property string|null $description
 * @property int|null $parent_id
 * @property int|null $view
 * @property int $position
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $parent
 */
class Category extends \yii\db\ActiveRecord
{
    public $image_field;

    const VIEW_1_COLS = 1;
    const VIEW_2_COLS = 2;
    const VIEW_3_COLS = 3;
    const VIEW_4_COLS = 4;
    const VIEW_TABLE = 5;
    const VIEW_ACCORDION = 6;
    const VIEW_ACCORDION_TABLE = 7;
    const VIEW_SLIDER = 8;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
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
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['parent_id', 'view'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['image_field'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg', 'webp'], 'maxSize' => 1024*1024*2],
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
            'description' => 'Описание',
            'parent_id' => 'Родитель',
            'view' => 'Отображение',
            'position' => 'Позиция',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return string[]
     */
    public static function getViewsList()
    {
        return [
            // self::VIEW_1_COLS => 'Одна колонка',
            self::VIEW_2_COLS => 'Две колонки',
            self::VIEW_3_COLS => 'Три колонки',
            self::VIEW_4_COLS => 'Четыре колонки',
            self::VIEW_TABLE => 'Таблица',
            self::VIEW_ACCORDION => 'Аккордион',
            self::VIEW_ACCORDION_TABLE => 'Аккордион таблица',
            self::VIEW_SLIDER => 'Слайдер',
        ];
    }

    /**
     * @return string
     */
    public function getViewName(): string
    {
        return self::getViewsList()[$this->view];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->parent ? $this->parent->title . ' / ' . $this->title : $this->title;
    }

    /**
     * @param false $onlyRoot
     * @param null $parentId
     * @return Category[]
     */
    public static function getList($onlyRoot = false, $parentId = null): array
    {
        $categories = Category::find();
        if ($onlyRoot) {
            $categories->where(['parent_id' => null]);
        }
        if ($parentId) {
            $categories->where(['parent_id' => $parentId]);
        }
        return $categories->orderBy(['position' => SORT_ASC])->all();
    }
}
