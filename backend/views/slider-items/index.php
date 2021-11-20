<?php

use common\components\Helper;
use himiklab\sortablegrid\SortableGridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SliderItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайды';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="slider-item-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить слайд', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return Helper::thumb($model->image, 150, 150);
                },
                'filter' => false,
                'headerOptions' => ['style' => 'width: 100px;'],
            ],
            'link',
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
