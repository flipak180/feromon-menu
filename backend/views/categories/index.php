<?php

use common\components\Helper;
use common\models\Category;
use himiklab\sortablegrid\SortableGridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
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
            'title',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {
                    return Helper::thumb($model->image, 500, 50);
                },
                'filter' => false,
                'headerOptions' => ['style' => 'width: 500px;'],
            ],
            //'description:ntext',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->parent ? Html::a($model->parent->title, ['categories/update', 'id' => $model->parent_id]) : '[не указан]';
                },
                'filter' => Html::activeDropDownList($searchModel, 'parent_id', ArrayHelper::map(Category::getList(true), 'id', 'title'), ['class' => 'form-control', 'prompt' => '[все]']),
            ],
            [
                'attribute' => 'view',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->getViewName();
                },
                'filter' => Html::activeDropDownList($searchModel, 'view', Category::getViewsList(), ['class' => 'form-control', 'prompt' => '[все]']),
                'headerOptions' => ['style' => 'width: 200px;'],
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'filter' => false,
                'headerOptions' => ['style' => 'width: 200px;'],
            ],
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}'],
        ],
    ]); ?>
</div>
