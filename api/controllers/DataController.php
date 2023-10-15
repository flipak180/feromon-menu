<?php

namespace app\controllers;

use common\components\Helper;
use common\models\Category;
use common\models\Product;
use common\models\SliderItem;

class DataController extends BaseApiController
{

    public function actionCategories($parent = null)
    {
        return Category::find()->all();
    }

    public function actionProducts($place = null, $category = null)
    {
        if (!$place) {
            return [];
        }


        $categories = [$category];
        $subCategories = Category::find()->where(['parent_id' => $category])->all();
        foreach ($subCategories as $subCategory) {
            $categories[] = $subCategory->id;
        }

        $items = [];
        /** @var Product[] $models */
        $models = Product::find()->where(['in', 'category_id', $categories])->orderBy(['position' => SORT_ASC])->all();
        foreach ($models as $model) {
            $items[] = [
                'id' => $model->id,
                'title' => $model->title,
                'category_id' => $model->category_id,
                'price' => $model->price,
                'description' => $model->description,
                'image' => Helper::thumb($model->image, 340, 400, [], true),
                'big_image' => Helper::thumb($model->image, 680, 800, [], true),
            ];
        }
        return $items;
    }

    public function actionBanners()
    {
        return SliderItem::find()->orderBy(['position' => SORT_ASC])->all();
    }

}
