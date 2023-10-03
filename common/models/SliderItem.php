<?php

namespace common\models;

use common\components\Helper;
use himiklab\sortablegrid\SortableGridBehavior;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "slider_items".
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property string|null $link
 * @property int $position
 * @property int $created_at
 * @property int $updated_at
 * @property string $spots_ids

 */
class SliderItem extends \yii\db\ActiveRecord
{
    public $image_field;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_items';
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
        $this->spots_ids = implode(',', $this->spots_ids);
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->spots_ids = explode(',', $this->spots_ids);
        parent::afterFind();
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['position'], 'integer'],
            [['title', 'image', 'link'], 'string', 'max' => 255],
            [['image_field'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg', 'webp'], 'maxSize' => 2024*1024*2],
            [['spots_ids'], 'safe'],
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
            'link' => 'Ссылка',
            'position' => 'Позиция',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * @return SliderItem[]
     */
    public static function getList()
    {
        return SliderItem::find()->orderBy('position')->all();
    }
}
