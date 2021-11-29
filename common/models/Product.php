<?php

namespace common\models;

use common\components\Helper;
use himiklab\sortablegrid\SortableGridBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

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
 * @property ProductSpot[] $spots
 */
class Product extends \yii\db\ActiveRecord
{
    public $image_field;
    public $image2_field;
    public $spots_field;

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
     *
     */
    public function afterFind()
    {
        $this->setupSpots();
        parent::afterFind();
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
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        $this->handleSpots();
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
            [['spots_field'], 'safe']
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpots()
    {
        return $this->hasMany(ProductSpot::className(), ['product_id' => 'id']);
    }

    /**
     *
     */
    public function setupSpots()
    {
        $this->spots_field = [];
        foreach ($this->spots as $spot) {
            $this->spots_field[$spot->spot_id] = [
                'active' => $spot->is_active ? 1 : 0,
                'price' => $spot->price
            ];
        }
    }

    /**
     *
     */
    public function fillSpots()
    {
        /** @var Spot $spot */
        foreach (Spot::find()->all() as $spot) {
            $newSpot = new ProductSpot();
            $newSpot->product_id = $this->id;
            $newSpot->spot_id = $spot->id;
            $newSpot->price = $this->price;
            $newSpot->is_active = true;
            $newSpot->save();
        }
    }

    /**
     *
     */
    public function handleSpots()
    {
        $currentSpots = [];
        foreach ($this->spots as $spot) {
            $currentSpots[$spot->spot_id] = $spot;
        }

        foreach ($this->spots_field as $spotId => $data) {
            $currentSpot = $currentSpots[$spotId] ?? null;
            if ($currentSpot) {
                $currentSpot->price = $data['price'];
                $currentSpot->is_active = $data['active'];
                $currentSpot->save();
            } else {
                $newSpot = new ProductSpot();
                $newSpot->product_id = $this->id;
                $newSpot->spot_id = $spotId;
                $newSpot->price = $data['price'];
                $newSpot->is_active = $data['active'];
                $newSpot->save();
            }
        }
    }

    /**
     * @param $spotId
     * @return array
     */
    public static function getTree($spotId): array
    {
        $flat = [];

        $categories = Category::find()->orderBy('parent_id, id')->asArray()->all();
        $products = Product::find()->joinWith('spots s')->andWhere(['s.spot_id' => $spotId, 's.is_active' => true])->asArray()->all();

        foreach ($categories as $category) {
            $flat[$category['id']] = ArrayHelper::merge($category, ['categories' => [], 'products' => [], 'is_active' => false]);
        }

        foreach ($products as $product) {
            $flat[$product['category_id']]['is_active'] = true;
            $flat[$product['category_id']]['products'][] = $product;
        }

        return self::getTreeLevel($flat, 0);
    }

    /**
     * @param $categories
     * @param $parentId
     * @param bool $isActive
     * @return array
     */
    private static function getTreeLevel($categories, $parentId, &$isActive = false): array
    {
        $tree = [];
        foreach ($categories as $category) {
            if (!$parentId) {
                $isActive = false;
            }

            if ($parentId != $category['parent_id']) {
                continue;
            }

            if (count($category['products'])) {
                $isActive = true;
            }

            $category['categories'] = self::getTreeLevel($categories, $category['id'], $isActive);
            $tree[$category['id']] = $category;
            $tree[$category['id']]['is_active'] = $isActive;
        }
        return $tree;
    }

    /**
     * @return string
     */
    public function getTitleWithSpots(): string
    {
        $arr = [];
        foreach ($this->spots as $spot) {
            $title = mb_substr($spot->spot->title, 0, 2);
            $arr[] = $spot->price ? "$title - <i>$spot->price р.</i>" : $title;
        }
        $spotsText = implode('; ', $arr);
        return "<b>$this->title</b><br><small>$spotsText</small>";
    }
}
