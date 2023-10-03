<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SliderItem */

$this->title = 'Редактирование слайда: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="slider-item-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
