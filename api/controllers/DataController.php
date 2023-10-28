<?php

namespace app\controllers;

use common\components\Helper;
use common\models\Category;
use common\models\Product;
use common\models\SliderItem;
use common\models\Spot;
use Yii;
use yii\helpers\ArrayHelper;

class DataController extends BaseApiController
{

    /**
     * @param $parent
     * @return array
     * @throws \yii\db\Exception
     */
    public function actionCategories($parent = null)
    {
        $result = [];

        /** @var Category[] $categories */
        $categories = Category::find()->all();
        $totalProductsMap = Yii::$app->db->createCommand('SELECT category_id, count(*) as total FROM products GROUP BY category_id')
            ->queryAll();

        foreach ($categories as $category) {
            $key = array_search($category->id, array_column($totalProductsMap, 'category_id'));
            $result[] = ArrayHelper::merge($category->attributes, [
                'total_products' => ($key !== false) ? (int)$totalProductsMap[$key]['total'] : 0,
            ]);
        }

        return $result;
    }

    /**
     * @param $place
     * @param $category
     * @return array
     */
    public function actionProducts($place = null, $category = null)
    {
        if (!$place) {
            return [];
        }

        $spot = Spot::findOne(['url' => $place]);
        if (!$spot) {
            return [];
        }

        $categories = [$category];
        /** @var Category $subCategories */
        $subCategories = Category::find()->where(['parent_id' => $category])->all();
        foreach ($subCategories as $subCategory) {
            $categories[] = $subCategory->id;
        }

        $items = [];
        /** @var Product[] $models */
        $models = Product::find()
            ->joinWith('spots s')
            ->andWhere(['s.spot_id' => $spot->id, 's.is_active' => true])
            ->andWhere(['in', 'category_id', $categories])
            ->orderBy(['position' => SORT_ASC])
            ->all();
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

    /**
     * @param $place
     * @return array
     */
    public function actionBanners($place = null)
    {
        if (!$place) {
            return [];
        }

        $spot = Spot::findOne(['url' => $place]);
        if (!$spot) {
            return [];
        }

        $result = [];

        /** @var SliderItem[] $slides */
        $slides = SliderItem::find()->orderBy(['position' => SORT_ASC])->all();
        foreach ($slides as $slide) {
            if (in_array($spot->id, $slide->spots_ids)) {
                $result[] = $slide;
            }
        }
        return $result;
    }

}
