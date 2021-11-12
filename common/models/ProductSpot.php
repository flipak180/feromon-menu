<?php

namespace common\models;

/**
 * This is the model class for table "product_spots".
 *
 * @property int $id
 * @property int $product_id
 * @property int $spot_id
 */
class ProductSpot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_spots';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'spot_id'], 'required'],
            [['product_id', 'spot_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'spot_id' => 'Заведение',
        ];
    }
}
