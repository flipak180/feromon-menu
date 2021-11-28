<?php

use common\components\Helper;
use common\models\Category;
use himiklab\sortablegrid\SortableGridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавление товара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width: 75px;'],
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->getTitleWithSpots();
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {
                    return Helper::thumb($model->image, 50, 50);
                },
                'filter' => false,
                'headerOptions' => ['style' => 'width: 100px;'],
            ],
            //'description:ntext',
            [
                'attribute' => 'price',
                'headerOptions' => ['style' => 'width: 100px;'],
            ],
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->category ? Html::a($model->category->title, ['categories/update', 'id' => $model->category_id]) : '[не указан]';
                },
                'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::getList(), 'id', 'title'), ['class' => 'form-control', 'prompt' => '[все]']),
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'filter' => false,
                'headerOptions' => ['style' => 'width: 200px;'],
            ],
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
