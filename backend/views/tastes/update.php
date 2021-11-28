<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Taste */

$this->title = 'Редактирование вкуса: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вкусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="taste-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
